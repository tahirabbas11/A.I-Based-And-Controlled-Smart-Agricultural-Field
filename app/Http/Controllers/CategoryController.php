<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        
        if(routePermissionGiven('category'))
        {
            $search = $request->search;
            $data = new Category();
            $data = $data->orderBy('id', 'desc');
            if ($search != null) {
                $data = $data->where('name', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");
            }
            $data = $data->get();
            return view('admin.category.index', compact('data'));
        }
        else{
           return redirectError('Sorry You can not access this Page');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(routePermissionGiven('create category'))
        {
            $data = null;
            $category = Category::where('parent_id', 0)->orderby('id', 'desc')->get();
            return view('admin.category.create', compact('data', 'category'));
        }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->request->remove('_token');
        $data = $request->input();
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/category'), $fileName);
            $data['image'] = 'uploads/category/' . $fileName;
        }
        Category::create($data);
        return redirect()->back()->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(routePermissionGiven('edit category'))
        {
            $data = Category::find($id);
            $category = Category::where('parent_id', 0)->orderby('id', 'desc')->get();
            return view('admin.category.create', compact('data', 'category'));
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->input();
        if ($request->hasFile('image')) {
            if (File::exists(public_path($category->image))) {
                File::delete(public_path($category->image));
            }
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/category'), $fileName);
            $data['image'] = 'uploads/category/' . $fileName;
        }
        $category->update($data);
        return redirect()->back()->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $status = $category->status;
        if ($status == 0) {
            $category->status = 1;
            $message = 'Deactive';
        } else {
            $category->status = 0;
            $message = 'Active';
        }
        $category->save();
        return redirect()->back()->with('success', 'Category ' . $message);
    }
}
