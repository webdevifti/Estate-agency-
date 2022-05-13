<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = BlogPost::all();
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $getActiveCategory = Category::where('status',1)->get();
        return view('admin.pages.blog.create', compact('getActiveCategory'));
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
            'title' => 'required|string',
            'category_id' => 'required',
            'article' => 'required',
            'thumbnail' => 'required'
        ]);

        try{
            $slug = trim(strtolower(str_replace(' ','-', $request->title)));
            $last_id = BlogPost::insertGetId([
                'title' => $request->title,
                'slug' => $slug,
                'article' => $request->article,
                'category_id' => $request->category_id,
                'author_name' => Auth::user()->name,
                'created_at' => Carbon::now(),

            ]);
            $request->validate([
                'thumbnail' => 'mimes:jpg,png,jpeg'
            ]);
            $extension = $request->thumbnail->getClientOriginalExtension();
            $imageName = $last_id.'.'.$extension;
            // $image_path = public_path('uploads/properties/'.$properties_id->property_thumbnail);
            // if (file_exists($image_path)) {
            //     unlink($image_path);
            // }
            $prp = BlogPost::find($last_id);
            $prp->thumbnails = $imageName;
            $prp->save();
            $request->thumbnail->move(public_path('uploads/blog/thumbnails/'), $imageName);
            return back()->with('success', 'Post Published successfully');
            
        }catch(Exception $e){
            return back()->with('error', 'Error Occured while publishing');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($blogPost)
    {
        //
        $getActiveCategory = Category::where('status', 1)->get();
        $blog = BlogPost::find($blogPost);
        return view('admin.pages.blog.edit', compact('getActiveCategory','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }



    public function statusChange($id){
        $blog = BlogPost::find($id);
        if($blog->status == 1){
            $blog->status = 0;
            $blog->save();
            return back()->with('success','Status Change successfully');
        }else{
            $blog->status = 1;
            $blog->save();
            return back()->with('success','Status Change successfully');
        }
    }
}
