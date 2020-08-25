<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
       return __('public.welcome',['name'=>'علی']);
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
