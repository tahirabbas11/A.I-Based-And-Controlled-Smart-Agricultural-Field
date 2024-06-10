<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new Banner();
        $data = $data->orderBy('id', 'desc');
        if($search != null){
            $data = $data->where('title', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");
        }
        $data = $data->get();
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view('admin.banner.create', compact('data'));
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
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banner'), $fileName);
            $data['image'] = 'uploads/banner/'.$fileName;
        }
        Banner::create($data);
        return redirect()->back()->with('success', 'Banner Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->input();
        if ($request->hasFile('image')) {
            if (File::exists(public_path($banner->image))) {
                File::delete(public_path($banner->image));
            }
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/banner'), $fileName);
            $data['image'] = 'uploads/banner/'.$fileName;
        }
        $banner->update($data);
        return redirect()->back()->with('success', 'Banner Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $status = $banner->status;
        if($status == 0){
            $banner->status = 1;
            $message = 'Deactive';
        }else{
            $banner->status = 0;
            $message = 'Active';
        }
        $banner->save();
        return redirect()->back()->with('success', 'Banner '.$message);
    }
}
