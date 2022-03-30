<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Agent;
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
        $get_all_properties = Property::paginate(9);
        if(request()->query('sort') !== null){
            $sort = request()->query('sort');
            if($sort == 'asc_to_desc'){
                $get_all_properties = Property::orderBy('created_at','ASC')->paginate(9);
            }else if($sort == 'desc_to_asc'){
                $get_all_properties = Property::orderBy('created_at','DESC')->paginate(9);
            }else if($sort == 'for_rent'){
                $get_all_properties = Property::where('property_status','rent')->paginate(9);
            }
            else if($sort == 'for_sale'){
                $get_all_properties = Property::where('property_status','sale')->paginate(9);
            }
            else if($sort == 'price_asc'){
                $get_all_properties = Property::orderBy('property_price','ASC')->paginate(9);
            }
            else if($sort == 'price_desc'){
                $get_all_properties = Property::orderBy('property_price','DESC')->paginate(9);
            }
        }
        return view('property-grid', compact('get_all_properties'));
    }

    public function show($slug){
        $get_signle_property = Property::where('property_slug', $slug)->first();
        $get_amenity = PropertyAmenity::where('property_id', $get_signle_property->id)->get();
        $get_images = PropertyImage::where('property_id', $get_signle_property->id)->get();
        $get_this_property_agent_info = Agent::where('id', $get_signle_property->agent_id)->first();
        $get_properties_attr = PropertyAttribute::where('property_id', $get_signle_property->id)->get();
        return view('property-single', compact('get_signle_property','get_amenity','get_images','get_this_property_agent_info','get_properties_attr'));
    }

    public function create(){
        return view('create-property');
    }

    public function store(PropertyRequest $request){

        try{
            $uniqid = 'property_'.rand(111111,999999);
            $agent_id = session('Loggedagent');
            $slug = trim(strtolower(str_replace(' ','-', $request->property_name)));
            
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
            if($request->property_images)
             {
    
                foreach($request->property_images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $name = rand(1111,9999).'.'.$extension;
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
                PropertyAttribute::create([
                    'property_id' => $properties_id,
                    'property_video' => $pvideo,
                    
                    'property_ubication' => $request->ubication,
                ]);
            }
            if($request->property_foor_plan){
                $request->validate([
                    'property_foor_plan' => 'mimes:jpg,png,jpeg'
                ]);
                $extension = $request->property_foor_plan->getClientOriginalExtension();
                $p_foor_image = $properties_id.'.'.$extension;
                $request->property_foor_plan->move(public_path('uploads/properties/floorimages/'), $p_foor_image);
                PropertyAttribute::create([
                    'property_id' => $properties_id,
                    'property_floor_plan' => $p_foor_image,
                    'property_ubication' => $request->ubication,
                ]);
            }
            
    
            return back()->with('success','You successfully added a property');
        }catch(Exception $e){
            return back()->with('error','Something happened wrong');
        }
        
    }
}
