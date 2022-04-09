<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\ContactFormMessage;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $get_contact_data = ContactPage::first();
        return view('contact', compact('get_contact_data'));
    }
    public function contact(Request $request){
        $contact = ContactFormMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        if($contact){
            return response()->json([
                'message' => 'Your message has been sent. Thank you!'
            ]);
        }else{
            return response()->json([
                'message' => 'Something Wrong'
            ]);
        }
    }
}
