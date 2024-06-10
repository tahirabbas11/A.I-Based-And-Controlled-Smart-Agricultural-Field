<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use File;

class ConfigController extends Controller
{
    public function favicon(){
    	$data = Config::find(1);
    	return view('admin.config.favicon', compact('data'));
    }

    public function logo(){
    	$data = Config::find(2);
    	return view('admin.config.logo', compact('data'));
    }

    public function configSettings(){
    	$data = Config::whereNotIn('id', [1, 2])->where('is_config', 1)->get();
    	return view('admin.config.details', compact('data'));
    }

    public function configPost(Request $request){
        $data = $request->all();
        foreach ($data as $key => $value) {
            if($key != '_token'){
                $config = Config::where('flag_type', '=',  $key)->first();
                if ($request->hasFile($key)) {
                    $fileName = $key.'.'.$value->extension();
                    if (File::exists(public_path('uploads/'.$fileName))) {
                        File::delete(public_path('uploads/'.$fileName));
                    }
                    $value->move(public_path('uploads'), $fileName);
                    $config->flag_value = 'uploads/'.$fileName;
                }else{
                   $config->flag_value = $value;
                }
                $config->save();
            } 
        }
        return redirect()->back()->with('success', 'Data Updated');
    }

    public function configOption(){
        $data = Config::whereNotIn('id', [1, 2])->where('is_config', 1)->get();
        return view('admin.config.option', compact('data'));
    }

    public function configOptionUpdate(Request $request){
        $data = $request->all();
        if($request->action == 0){
            $config = new Config();
            $config->create($data);
            return redirect()->back()->with('success', 'Config Added');
        }else{
            $config = Config::find($request->config_id);
            $config->fill($data)->save();
            return redirect()->back()->with('success', 'Config Updated');
        }
    }
}
