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

    public function pageinfoTop(Request $request){
        dd($request->all());
    }
}
