@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts)>0)
          
         @foreach ($posts as $post)
         <div class="card card-body  mb-1 ">
          <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
          <br> 
         Written on {{$post->created_at}} 
         @if(!Auth::guest())
         <div class="col-md-12 bg-light text-right">
          <form action="/carts" method="POST">
                @csrf
                <input type="hidden" value="{{$post->id}}" name="post_id">
                {{Form::submit('Favourite', ['class'=>'btn btn-warning ml-2'])}}
            </form> 
         </div>
         @endif
         </div>
        @endforeach
        <div class="d-flex justify-content-center">
        {{$posts->links()}}
        
        </div>
    @else 
           <p>No posts found!</p> 
    @endif
   
@endsection
