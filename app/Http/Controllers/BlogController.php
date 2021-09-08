<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BlogModel::with('category')->get();
        return view('backend.blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::all();
        return view('backend.blog.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'blog_name' => 'required',
            'blog_image' => 'required',
            'category_model_id' => 'required',
            'blog_content' => 'required',
            'short_blog_content' => 'required'
        ]);
        $validated['users_id'] = $request->user()->id;
        $file = $request->file('blog_image');
        $extension = $request->file('blog_image')->getClientOriginalExtension();
        $file_name = uniqid().'.'.$extension;
        $file->move(public_path('\blog_images'), $file_name);

        $validated['blog_image'] = $file_name;

        $post = BlogModel::create($validated);

        if($post){
            return redirect()->back()->with('success', 'Insert Successfully');
        }else{
            return redirect()->back()->with('error', 'Please try again');
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
        $blog = BlogModel::find($id);
        return view('backend.blog.edit',compact('blog'));
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
        $blog = BlogModel::find($id);

        $validated = $request->validate([
            'blog_name' => 'required',
            'blog_image' => 'dimensions:width=600,height=333',
            'blog_content' => 'required',
            'short_blog_content' => 'required'
        ]);
//
//        $blog->blog_name       = $request->blog_name;
//        $blog->user_id      = $request->user()->id;
//        $blog->blog_content = $request->blog_content;
//        $blog->short_blog_content = $request->short_blog_content;

        $file = $request->file('blog_image');

        if($file){
            $extension = $request->file('blog_image')->getClientOriginalExtension();
            $file_name = uniqid().'.'.$extension;
            $file->move(public_path('\blog_images'), $file_name);

            $validated['blog_image'] = $file_name;
        }else{
            $validated['blog_image'] = $request->blog_image_already;
        }
        $validated['users_id'] = $request->user()->id;
        //$blog->blog_image = $blog_image;

        $blog->save($validated);

        return redirect()->back()->with('success', 'Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = BlogModel::find($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
