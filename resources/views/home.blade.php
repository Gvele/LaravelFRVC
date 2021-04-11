@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ url('/posts/create') }}">Create Post</a>
                     <br><br>
                    <h3>Your blog  posts</h3>
                       @if(count($posts)>0)
                        <table class="table table-striped">
                            <thead>
                            <tr> 
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="/posts/{{$post->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    </form>
                               </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else 
                        <p>You have no posts</p>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
