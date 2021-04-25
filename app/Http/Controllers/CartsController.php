<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Post;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $carts= DB::table('carts')
        ->select( "post_id", DB::raw('count(*) as total'))
        ->where("user_id", "=", $user_id)
        ->groupBy(  "post_id")
        ->get();
        
          //dd($carts); 
        
        $posts=array(); 
          foreach($carts as  $cart) {
              $posts[]=[Post::find($cart->post_id),$cart->total]   ;
            
          }
        
            //dd($posts) ; 
        return view('carts.index')->with('posts', $posts); 
    }



    /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
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
    public function store( Request $request)
    {
        //
         
         $id=$request->input('post_id');
         $post =  Post::find($id);
         $user_id =  auth()->user()->id;       

         $cart= new Cart(); 
         $cart->user_id=$user_id; 
         $cart->post_id=$post->id; 
         $cart->save(); 
         
              
         
        return redirect('/carts'); 
        
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
    public function destroy($postid)
    {
        //
      // dd($postid);

        $cart= Cart::where([
            ['post_id', '=', $postid],
            ['user_id', '=', auth()->user()->id]
          ])->first(); 
        
          //dd($cart); 
        //Check for correct user
        if(auth()->user()->id !== $cart->user_id)
        {
            return redirect('/carts')->with('error', 'Unauthorized page!'); 
        }
        
        $cart->delete(); 
        return redirect('/carts')->with('success','Post Deleted!');
     
    }
}
