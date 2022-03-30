<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Mail\AgentWelcomeMail;
use App\Models\Agent;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class AgentController extends Controller
{
    //

    public function index(){
        $all_agents = Agent::paginate(6);
        return view('agents-grid',compact('all_agents'));
    }
    public function show($id){
        $find_agent = Agent::find($id);
        $get_this_agent_properties = Property::where('agent_id', $id)->get();
        return view('agent-single', compact('find_agent','get_this_agent_properties'));
    }

    public function join(){
        return view('join-agent');
    }

    public function registerAgent(AgentRequest $request){
        // dd($request->all());
        if($request->join == null){
            $str = 'abcdefghijklmnopqrstuvwxyz1234567890';
            $random = rand(11111111,99999999).$str;
            $agent_joining_id = Agent::insertGetId([
                'agent_fullname' => $request->fullname,
                'agent_email' => $request->agent_email,
                'agent_password' => Hash::make($request->password),
                'agent_verification_code' => sha1($random),
                'created_at' => Carbon::now()
            ]);

            if($agent_joining_id){

                $mail_data =  Agent::find($agent_joining_id);
                // dd($mail_data);
                 Mail::to($request->agent_email)->send(new AgentWelcomeMail($mail_data));
                 request()->session()->put('Loggedagent', $agent_joining_id);
                 return redirect('/agent/account')->with('complete_account', 'Please Complete Your Account.');
            }else{
                return redirect('/');
            }
        }
    }

    public function login(Request $request){
        if($request->login == null){

            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $check_agent = Agent::where('agent_email', $request->email)->first();
            if($check_agent){
                if(Hash::check($request->password, $check_agent->agent_password)){
                    if($check_agent->agent_status != 1){
                        return back()->with('status_wrong','Account Deactivated');
                    }else{
                        if($check_agent->agent_is_verified != 1){
                            return back()->with('verify_wrong','Account Not Verified, Check your email, where verification link has been sended.');
                        }else{
                            request()->session()->put('Loggedagent', $check_agent->id);
                            return redirect('/');
                        }
                    }
                }else{
                    return back()->with('pass_wrong','Password Invalied');
                }
            }else{
                return back()->with('email_wrong','Email Not Found!');

            }
        }
    }

    public function verifyAgent(){
        
        $code = request()->query('code');
        $get_agent = Agent::where('agent_verification_code', $code)->first();
        // dd($get_agent);
        if($get_agent->agent_verification_code == $code){
            $get_agent->agent_status = 1;
            $get_agent->agent_is_verified = 1;
            $get_agent->save();
            return redirect('/');
        }else{
            return abort(404, 'Page not found.');
        }
    }

    public function account(){
        $agent_id = session('Loggedagent');
        $get_logged_agent = Agent::where('id', $agent_id)->first();
        $get_logged_agent_property = Property::where('agent_id', $agent_id)->get();
        return view('account', compact('get_logged_agent','get_logged_agent_property'));
    }

    public function passwordUpdate(Request $request){
        $find_agent = Agent::find($request->id);
       if(Hash::check($request->old_password, $find_agent->agent_password)){
            $find_agent->agent_password = Hash::make($request->new_password);
            $find_agent->save();
            return back()->with('pass_change', 'Password has been changed');
       }else{
           return back()->with('pass_error','Password is invalid');
       }
    }

    public function logout(){
        request()->session()->put('Loggedagent');
        return redirect('/');
    }

    public function profileUpdate(Request $request){
        if($request->account_update == null){

            $agent = Agent::find($request->id);

            if($request->agent_photo){
                $request->validate([
                    'agent_photo' => 'mimes:jpg,png,jpeg'
                ]);
                $extension = $request->agent_photo->getClientOriginalExtension();
                $imageName = $request->id.'.'.$extension;
                $image_path = public_path('uploads/agents/'.$agent->agent_photo);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $agent->agent_photo = $imageName;
                $agent_update = $agent->save();
                $request->agent_photo->move(public_path('uploads/agents/'), $imageName);
                if($agent_update){
                    return back()->with('update_success','Save Changed');
                }else{
                    return back()->with('update_error','Something happened wrong!');
                }
            }else{
                $agent->agent_fullname = $request->agent_name;
                $agent->agent_profession = $request->agent_profession;
                $agent->agent_description = $request->agent_description;
                $agent->agent_contact_number = $request->agent_contact_number;
                $agent->agent_email = $request->agent_email;
                $agent->agent_skype = $request->agent_skype;
                $agent->agent_facebook = $request->agent_facebook;
                $agent->agent_twitter = $request->agent_twitter;
                $agent->agent_instagram = $request->agent_instagram;
                $agent->agent_linkedin = $request->agent_linkedin;
                $agent_update = $agent->save();
                if($agent_update){
                    return back()->with('update_success','Save Changed');
                }else{
                    return back()->with('update_error','Something happened wrong!');
    
                }
            }
        }
    }
}
