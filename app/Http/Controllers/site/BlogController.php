<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $getActiveBlog = BlogPost::where('status',1)->orderBy('created_at','DESC')->paginate(12);
        $last_id = BlogPost::max('id');
        return view('blog-grid', compact('getActiveBlog', 'last_id'));
    }
    public function show($slug){
        $getBlog = BlogPost::where('slug', $slug)->first();
        return view('blog-single', compact('getBlog'));
    }
}
