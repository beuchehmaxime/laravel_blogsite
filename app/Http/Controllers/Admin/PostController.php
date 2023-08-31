<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.createpost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:255',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        $user_id = Auth::user()->id;
        if($request->file('photo')){
            $file = $request->file('photo');//replace prvious photo in the folder
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/img/posts'),$filename);
        }
        Post::insert([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $filename,
            'popular_post' => $request->popular_post,
            'featured_post' => $request->featured_post,
            'category_id' => $request->category_id,
            'user_id' => $user_id,
        ]);

        return redirect()->back()->with('successmessage','Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        if($request->file('photo')){
            $file = $request->file('photo');            
            @unlink(public_path('assets/img/posts/'.$data->photo));//replace prvious photo in the folder
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/img/posts'),$filename);            
            $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->back()->with('successmessage','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back()->with('successmessage','Post deleted successfully');
    }
}
