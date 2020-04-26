<?php


namespace App\Http\View\Composers;


use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view){
        //die(json_encode(Auth::guard('web')->user()));
        $view->with('user', Auth::guard('web')->user());
    }
}
