<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function index(){
        $team = TeamMember::where('status',1)->get();
        return view('about', compact('team'));
    }
}
