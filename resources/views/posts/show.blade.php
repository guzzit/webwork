@extends('layout.app')

@section('content')
    <a href='/posts' class='btn btn-primary'>Go Back</a>
    <h1>{{$post->title}}</h1>
    <img src='/storage/coverimage/{{$post->cover_image}}' style='width:500px; height:250px' alt="">
    <br><br>
        <div>
            {!! $post->body !!}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
        @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <a href='/posts/{{$post->id}}/edit' class='btn btn-primary btn-sm'>Edit</a>
        {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger', 'onclick'=>'return confirm("Are you sure you want to delete your post?")'])}}
        {!! Form::close() !!}
        @endif
        @endif
@endsection