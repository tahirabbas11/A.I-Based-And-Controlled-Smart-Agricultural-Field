<?php

namespace Illuminate\Foundation\Auth;
use Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    protected function redirectTo(){
    
        if (Auth::user()->role == 1)
        {
            return route('admin.dashboard');
        }
        if (Auth::user()->role == 2)
        {
            return route('admin.dashboard');
        }
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
      
            return $this->redirectTo();
        }

            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
