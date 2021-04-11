@extends('layouts.app')

@section('content')
     <a href="/posts" class="btn btn-dark" >Go Back</a>  
     <br><br>

     <h1>{{$post->title}}</h1>
     
     <div>
         <p>{{$post->description}}<p>
     </div>
     <hr>
     <small>Written on {{$post->created_at}}</small>
     <hr>
      @if(!auth()->guest())
         @if(auth()->user()->id== $post->user_id)  
            <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>

                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                </form>
         @endif
        @endif
@endsection
