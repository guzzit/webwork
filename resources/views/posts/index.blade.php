@extends('layout.app')

@section('content')
    <h1>Posts</h1>
    @auth('employee')
        You are logged in I guess employee
    @endauth

    @auth('employer')
    You are logged in employer
@endauth
    @if(count($posts)>0)
            @foreach($posts as $post)
                <div class='card card-body bg-light mb-3'>
                    <div class='row'>
                        <div class='col-md-4 col-sm-4'>
                            <img style='width:200px; height:100px' src='/storage/coverimage/{{$post->cover_image}}' alt="">
                        </div>
                        <div class='col-md-8 col-sm-8'>
                                <h3><a href='/posts/{{$post->id}}'>{{$post->title}}</a></h3>
                                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$posts->links()}} 
    @else
        <p>No posts found</p>
    @endif
@endsection