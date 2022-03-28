<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        return view('blog-grid');
    }
    public function show(){
        return view('blog-single');
    }
}
