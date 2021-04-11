@extends('layouts.app')

@section('content')
    <h1>Carts</h1>
    @if (count($posts)>0)
        @foreach ($posts as $post)
         <div class="card card-body  mb-1 ">
          <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
          <br> 
         Written on {{$post->created_at}} 
       
         </div>
        @endforeach
        
    @else 
           <p>No posts found!</p> 
    @endif
   
@endsection