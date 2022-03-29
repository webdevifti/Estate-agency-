<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyAttribute;
use App\Models\PropertyImage;
use Carbon\Carbon;
use Exception;
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

    public function store(PropertyRequest $request){

        try{
            $uniqid = 'property_'.rand(111111,999999);
            $agent_id = session('Loggedagent');
            $slug = trim(str_replace(' ','-', $request->property_name));
            
            $properties_id = Property::insertGetId([
                'property_unid' => $uniqid,
                'agent_id' => $agent_id,
                'property_name' => $request->property_name,
                'property_slug' => $slug,
                'property_description' => $request->property_description,
                'property_location' => $request->property_location,
                'property_price' => $request->property_price,
                'property_type' => $request->property_type,
                'property_status' => $request->property_status,
                'property_area' => $request->property_area,
                'property_baths' => $request->property_baths,
                'property_garages' => $request->property_garage,
                'property_beds' => $request->property_beds,
                'created_at' => Carbon::now(),
            ]);
            if($request->property_thumbnail){
                $request->validate([
                    'property_thumbnail' => 'mimes:jpg,png,jpeg'
                ]);
                $extension = $request->property_thumbnail->getClientOriginalExtension();
                $imageName = $properties_id.'.'.$extension;
                // $image_path = public_path('uploads/properties/'.$properties_id->property_thumbnail);
                // if (file_exists($image_path)) {
                //     unlink($image_path);
                // }
                $prp = Property::find($properties_id);
                $prp->property_thumbnail = $imageName;
                $prp->save();
                $request->property_thumbnail->move(public_path('uploads/properties/thumbnails/'), $imageName);
            }
            if($request->hasfile('property_images'))
             {
    
                foreach($request->file('property_images') as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $name = $properties_id.'.'.$extension;
                    $image->move(public_path().'/uploads/properties/propertyimages/', $name);
                       
                    PropertyImage::create([
                       'property_id' => $properties_id,
                       'image' => $name
                   ]);
                }
             }
            foreach($request->amenities as $amenity){
                PropertyAmenity::create([
                    'property_id' => $properties_id,
                    'amenitity' => $amenity
                ]);
            }
    
            if($request->property_video){
                $request->validate([
                    'property_video' => 'mimes:mp4'
                ]);
                $extension = $request->property_video->getClientOriginalExtension();
                $pvideo = $properties_id.'.'.$extension;
                $request->property_video->move(public_path('uploads/properties/videos/'), $pvideo);
            }
            if($request->property_foor_plan){
                $request->validate([
                    'property_foor_plan' => 'mimes:jpg,png,jpeg'
                ]);
                $extension = $request->property_foor_plan->getClientOriginalExtension();
                $p_foor_image = $properties_id.'.'.$extension;
                $request->property_foor_plan->move(public_path('uploads/properties/floorimages/'), $p_foor_image);
            }
            PropertyAttribute::create([
                'property_id' => $properties_id,
                'property_video' => $pvideo,
                'property_floor_plan' => $p_foor_image,
                'property_ubication' => $request->ubication,
            ]);
    
            return back()->with('success','You successfully added a property');
        }catch(Exception $e){
            return back()->with('error','Something happened wrong');
        }
        
    }
}
