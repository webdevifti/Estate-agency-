<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'category' => 'required'
        ]);

        $in = Category::create([
            'category' => $request->category,
        ]);

        if($in){
            return back()->with('success','Category Added');
        }else{
            return back()->with('error', 'Something wrong');
        }

    }
}
