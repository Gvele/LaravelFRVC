@extends('layouts.app')

@section('content')
    <h1>Carts</h1>
      
    @if (count($posts)>0)
        @foreach ($posts as  $post)
         <div class="card card-body  mb-1 ">
          <h3><a href="/posts/{{$post[0]->id}}"> {{$post[0]->title}}</a></h3>
           <div><h6>Total {{$post[1]}}</h6> </div>
           <div><h6>Total price  {{$post[0]->price * $post[1] }}</h6> </div>
          <br> 
          Written on {{$post[0]->created_at}} 

          <form action="/carts/{{$post[0]->id}}" method="POST">
            @csrf
            @method('DELETE')
            {{Form::submit('Delete From Carts', ['class'=>'btn btn-danger'])}}
            </form>  
       
         </div>
        @endforeach
        
    @else 
           <p>No posts found!</p> 
    @endif
     
@endsection