<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Mail\AgentWelcomeMail;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class AgentController extends Controller
{
    //

    public function index(){
        return view('agents-grid');
    }
    public function show(){
        return view('agent-single');
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
        return view('account', compact('get_logged_agent'));
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
}
