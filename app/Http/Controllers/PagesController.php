<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function home()
    {
        return view('components.pages.home');
    }

    public function input()
    {
        return view('input');
    }

    public function schedule()
    {
        return view('schedule');
    }

    public function login()
    {
        return view('login');
    }
    public function daatauser()
    {
        return view('datauser');
    }

    public function profile()
    {
        return view('profile');
    }

    public function test()
    {
        return view('test');
    }
}
