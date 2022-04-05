<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class TestimonialController extends Controller
{
    //

    public function index(){
        return view('admin.pages.testimonials.index');
    }

    public function create(Request $request){
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_review' => 'required',
            'client_photo' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        $testimonial = Testimonial::insertGetId([
            'client_name' => $request->client_name,
            'client_review' =>$request->client_review,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        if($request->client_photo){
            $imageName = $testimonial.'_'.'.'.$request->file('client_photo')->getClientOriginalExtension();
            $path = public_path('uploads/client_photos/');
            $request->client_photo->move($path, $imageName);
            $test = Testimonial::find($testimonial);
            $test->client_photo = $imageName;
            $test->save();
        }
       return back();
    }
}
