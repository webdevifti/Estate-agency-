<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $get_intro_slider_property = Property::limit(4)->get();
        $get_property = Property::all();
        $get_agents = Agent::where('bookmark','best')->limit(3)->get();
        $get_testimonials = Testimonial::where('status',1)->get();
        return view('index', compact('get_intro_slider_property','get_property','get_agents','get_testimonials'));
    }
}
