@extends('layout.app')

@section('content')
    <a href='/posts' class='btn btn-primary'>Go Back</a>
    <h1>{{$job->job_title}}</h1>
    <img src='/storage/coverimage/{{$job->employer->logo}}' style='width:500px; height:250px' alt="">
    <br><br>
        <div>
            {!! $job->short_description !!}
        </div>
        <hr>
        <small>Written on {{$job->created_at}} by {{$job->employer->name}}</small>
        <hr>
        @if(!Auth::guest())
        @if(Auth::user()->id == $job->employer_id)
        <a href='/posts/{{$job->id}}/edit' class='btn btn-primary btn-sm'>Edit</a>
        {!!Form::open(['action'=>['PostsController@destroy', $job->id], 'method'=>'POST', 'class'=>'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger', 'onclick'=>'return confirm("Are you sure you want to delete your post?")'])}}
        {!! Form::close() !!}
        @endif
        @endif
@endsection