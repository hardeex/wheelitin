<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }


    public function howItWorks()
    {
        return view('pages.how-it-works');
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

    public function faq()
    {
        return view('pages.faq');
    }

    public function privacy()
    {
        return('pages.privacy');
    }

    
}
