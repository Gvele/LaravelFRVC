@extends('layouts.app')

@section('content')
    <h1>Update Post</h1>
    <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
         <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title',$post->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
         </div>  
         <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $post->description, ['class'=>'form-control', 'placeholder'=>'Description'])}}
         </div> 
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    </form>

@endsection
