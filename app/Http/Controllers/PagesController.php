<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }


    public function about()
    {
        return view('pages.about');
    }


    public function services()
    {
        return view('pages.services');
    }


    public function contact()
    {
        return view('pages.contact');
    }

  

    public function help()
    {
        return view('pages.help');
    }

    

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function cookies()
    {
        return view('pages.cookies');
    }
}
