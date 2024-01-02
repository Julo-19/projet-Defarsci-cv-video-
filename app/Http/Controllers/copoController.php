<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class copoController extends Controller
{
    public function index()
    {

        $post=Post::all();
        return view('copo',compact('post'));
    }
}
