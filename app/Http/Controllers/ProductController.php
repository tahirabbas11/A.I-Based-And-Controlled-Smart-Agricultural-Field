<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use File;
use App\Models\Product;

class ProductController extends Controller
{
    public function removeColumns($columns, $columsToBeRemove)
    {
        foreach ($columsToBeRemove as $value) {
            if (($key = array_search($value, $columns)) !== false) {
                unset($columns[$key]);
            }
        }
        return $columns;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new Product();

        if ($search != null) {
            $query = Product::query();

            $table = $data->getTable();

            $columns = ['name', 'slug', 'short_desc', 'description'];

            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
            $data = $query->orderBy('name')->paginate(12);

            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        } else {
            $data = $data->paginate(12);
            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        }
        return view('admin.product.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view("admin.product.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        if ($request->hasFile('image')) {

            File::isDirectory(public_path('uploads/products')) or File::makeDirectory(public_path('uploads/products'), 0777, true, true);
            $fileName =  time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $fileName);
        }

        $data = array_merge($request->except(['image', '_token', 'gallery']), ['image' => 'uploads/products/' . $fileName]);

        if ($request->hasFile('gallery')) {
            $productImages = [];
            foreach ($request->file('gallery') as $key => $file) {

                $fileName = time() . '_' . strval($key + 1) . '.' . $file->extension();
                $file->move(public_path('uploads/products'), $fileName);

                array_push($productImages, 'uploads/products/' . $fileName);
            }
            $data = array_merge($data, ['images' => $productImages]);
        }

        $product = Product::create($data);

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (routePermissionGiven('edit product')) {

            $data = Product::find($id);
            return view('admin.product.create', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $request->validated();

        $product = Product::find($id);
        $data = $request->except(['image', '_token', 'gallery', '_method']);

        if ($request->hasFile('image')) {

            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            File::isDirectory(public_path('uploads/products')) or File::makeDirectory(public_path('uploads/products'), 0777, true, true);
            $fileName =  time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $fileName);
            $data = array_merge($data, ['image' => 'uploads/products/' . $fileName]);
        }
        if ($request->hasFile('gallery')) {
            $productImages = [];
            foreach ($request->file('gallery') as $key => $file) {

                $fileName = time() . '_' . strval($key + 1) . '.' . $file->extension();
                $file->move(public_path('uploads/products'), $fileName);

                array_push($productImages, 'uploads/products/' . $fileName);
            }
            $data = array_merge($data, ['images' => $productImages]);
        }

        $product->update($data);
        return response()->json(['status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        //delete image
        if (File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        //delete images
        $productImages = $product->images;
        if(count($productImages) > 0)
        {
            foreach($productImages as $image)
            {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted');
    }

    public function deleteImages(Request $request)
    {
        if (File::exists(public_path($request->input('path')))) {
            File::delete(public_path($request->input('path')));
        }
        $product = Product::find($request->input('key'));
        $imagesArray = $product->images;
        if (($key = array_search($request->input('path'), $imagesArray)) !== false) {
            unset($imagesArray[$key]);
        }
        $product->update(['images' => $imagesArray]);
        return response()->json(['status' => true]);
    }
}
