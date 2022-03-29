<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //
    public function index(){
        return view('property-grid');
    }

    public function show(){
        return view('property-single');
    }

    public function create(){
        return view('create-property');
    }

    public function store(Request $request){
        dd($request->all());
    }
}
