<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new User();
        $data = $data->orderBy('id', 'desc');
        if($search != null){
            $data = $data->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%");
        }
        $data = $data->get();
        return view('admin.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;
        return view('admin.customer.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 2;
        $user->save();
        return redirect()->back()->with('success', 'Customer Added');
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
        $data = User::find($id);
        return view('admin.customer.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = array();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed|min:6'
            ]);
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/user'), $fileName);
            $user->image = 'uploads/user/'.$fileName;
        }
        $user->update();
        return redirect()->back()->with('success', 'Customer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $status = $user->status;
        if($status == 0){
            $user->status = 1;
            $message = 'Deactive';
        }else{
            $user->status = 0;
            $message = 'Active';
        }
        $user->save();
        return redirect()->back()->with('success', 'Customer '.$message);
    }
}
