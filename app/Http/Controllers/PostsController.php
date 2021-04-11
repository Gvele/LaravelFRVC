<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
 

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts=Post::orderBy('created_at', 'desc')->get(); 
        $posts=Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts); 

    }

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth', ['except'=> ['index', 'show'] ]);
        }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create'); 
    }

    /**cl
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[ 
            'title' =>'required|max:255',
            'description'=>'required'
       ]); 
       
       $post= new Post(); 
       $post->title=$request->input('title'); 
       $post->description=$request->input('description'); 
       $post->user_id=auth()->user()->id; 
       $post->save(); 
        return redirect('/posts')->with('success','Post created!'); 
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
        $post=Post::find($id); 
        return  view('posts.show')->with('post',$post); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id); 

        //Check for correct user
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error', 'Unauthorized page!'); 
        }
        return  view('posts.edit')->with('post',$post); 
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
        $this->validate($request,[ 
            'title' =>'required|max:255',
            'description'=>'required'
       ]); 


       $post= Post::find($id); 
       $post->title=$request->input('title'); 
       $post->description=$request->input('description'); 
       $post->save(); 
        return redirect('/posts')->with('success','Post Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id); 
        
//Check for correct user
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error', 'Unauthorized page!'); 
        }
        
        $post->delete(); 
        return redirect('/posts')->with('success','Post Deleted!');
    }
}
 

 