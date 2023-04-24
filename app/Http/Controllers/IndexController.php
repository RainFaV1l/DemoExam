<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Return view home
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */

    public function home()
    {
        return view('pages.home');
    }

    /**
     * Register Page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }
}
