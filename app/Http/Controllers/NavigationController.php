<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{

    public function login()
    {
        return view('section.login');
    }

    public function home()
    {
        return view('section.home');
    }

    public function items()
    {
        return view('section.items');
    }

    public function repair()
    {
        return view('section.repair');
    }

    public function report()
    {
        return view('section.reportPage.itemsReport');
    }
}
