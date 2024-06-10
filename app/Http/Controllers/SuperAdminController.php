<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Auth;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isSuper');
    }
    public function index()
    {
        $permissions = Permission::all();     
        return view('super.permissions.index',compact('permissions'));
    }
}
