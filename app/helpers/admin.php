<?php
function currentSelectedURL($route){

    return Request::routeIs($route) ? 'active' : '';
}

function routePermissionGiven($permission){
    return auth()->user()->can($permission) ? True : abort('403');
}
function redirectError($message)
{
    return redirect('permissions')->with('error',[
        'heading' => 'Access Denied!!',
        'message' => $message
    ]);
}
