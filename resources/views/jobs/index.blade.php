@extends('layout.app')

@section('content')
    <h1>Posts</h1>
    @auth('employee')
        You are logged in I guess employee
    @endauth

    @auth('employer')
    You are logged in employer
@endauth
    @if(count($jobs)>0)
            @foreach($jobs as $job)
                <div class='card card-body bg-light mb-3'>
                    <div class='row'>
                        <div class='col-md-4 col-sm-4'>
                            <img style='width:100px; height:100px; border-radius:5%;' src='/storage/coverimage/{{$job->employer->logo}}' alt="">
                        </div>
                        <div class='col-md-8 col-sm-8'>
                                <h3><a href='/jobs/{{$job->id}}'>{{$job->job_title}}</a></h3>
                                <small>Posted on {{$job->created_at}} by {{$job->employer->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$jobs->links()}} 
    @else
        <p>No jobs found</p>
    @endif
@endsection