<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $get_team_member = TeamMember::all();
        return view('admin.pages.team.index', compact('get_team_member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $create = new TeamMember;
        $create->name = $request->name;
        $create->email = $request->email;
        $create->phone = $request->phone;
        $create->facebook = $request->facebook;
        $create->instagram = $request->instagram;
        $create->twitter = $request->twitter;
        $create->linkedin = $request->linkedin;
        $create->bio = $request->bio;
        $saved = $create->save();
        $last_id = $create->id;

        if($saved){

        }else{
            return back()->with('error','Something wrong');
        }
        if($request->photo){
            $imageName = $last_id.'_'.'.'.$request->file('photo')->getClientOriginalExtension();
            $path = public_path('uploads/teams/');
            $request->photo->move($path, $imageName);
            $team = TeamMember::find($last_id);
            $team->photo = $imageName;
            $img_upload = $team->save();
            if($img_upload){
                return back()->with('success','Team Member Added Successfully');
            }else{
                return back()->with('error','Something wrong');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $team = TeamMember::find($id);
       
        if(file_exists(public_path('uploads/teams/'.$team->photo))){
            unlink(public_path('uploads/teams/'.$team->photo));
            }else{
                return back()->with('error','File does not exists.');
            }
        $team->delete();
        return back()->with('success','Team Member Deleted');
    }

    public function statusChange($id){
        $team = TeamMember::find($id);
        if($team->status == 1){
            $team->status = 0;
            $team->save();
            return back()->with('success','Status Change successfully');
        }else{
            $team->status = 1;
            $team->save();
            return back()->with('success','Status Change successfully');
        }
    }
}
