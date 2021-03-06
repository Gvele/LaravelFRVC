@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="/posts" method="POST">
        @csrf
         
         <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
         </div>  
         <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::number('price', '', ['class'=>'form-control', 'placeholder'=>'Price'  ,'step'=>'0.01'])}}
         </div>
         <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class'=>'form-control', 'placeholder'=>'Description'])}}
         </div> 
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    </form>

@endsection
