<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use \Redirect, \Validator, \Session, \Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $post           = new Post;
        $post->title    = $request->input('title');
        $post->slugs    = $request->input('title');
        $post->user_id  = '5a60706592f6131a8c29a082';
        $post->content  = $request->input('content');
        $post->save();

        // create new product and save it
        $comment = new Comment;
        $comment->user_id = "5a60706592f6131a8c29a082";    
        $comment->comments = $request->input('comment');      
        $comment->post()->associate($post);
        $comment->save();
        Session::flash('message', 'You have successfully added employee');
        return Redirect::to('posts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $post = Post::find($id);
        return view('posts.show',compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        Request()->validate([

            'title' => 'required',

            'content' => 'required',

        ]);
        Post::find($id)->update($request->all());
        Session::flash('message', 'You have successfully update employee');
        return Redirect::to('posts');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                Post::find($id)->delete();

        return redirect()->route('posts.index')

                        ->with('success','Post deleted successfully');
    }


}
