<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    //

    public function index(){
        $get_data = ContactPage::first();
        // dd($get_data);
        return view('admin.pages.contact.index', compact('get_data'));
    }

    public function pageinfoTop(Request $request, $id){
        ContactPage::find($id)->update([
            'title' => $request->page_title,
            'description' => $request->page_desc
        ]);
        return back()->with('success', 'Updated');
    }

    public function mapUpdate(Request $request, $id){
        ContactPage::find($id)->update([
            'google_map' => $request->map
        ]);
        return back()->with('success', 'Updated');
    }

    public function ContactInfoUpdate(Request $request, $id){
        ContactPage::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return back()->with('success', 'Updated');
    }

    public function ContactSocialUpdate(Request $request, $id){
        ContactPage::find($id)->update([
            'facebook' => $request->fb,
            'twitter' => $request->twtr,
            'instagram' => $request->insta,
            'linkedin' => $request->linkdin
        ]);
        return back()->with('success', 'Updated');
    }
}
