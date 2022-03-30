<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $get_intro_slider_property = Property::orderBy('created_at', 'DESC')->limit(4);
        $get_property = Property::orderBy('created_at', 'DESC')->limit(6);
        return view('index', compact('get_intro_slider_property','get_property'));
    }
}
