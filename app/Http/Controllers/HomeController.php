<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $get_slider_property = Property::orderBy('created_at', 'DESC')->limit(4);
        return view('index', compact('get_slider_property'));
    }
}
