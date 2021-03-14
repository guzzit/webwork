@extends('layout.app')
@section('content')
       <h1>{{$title}}</h1> 
       <h3>the finest networking platform in Nigeria.</h3>
       <p>{{$date}}</p>
       @if(count($services)>0)
            <ul class='list-group'>
                @foreach($services as $service)
                    <li class='list-group-item'>{{$service}}</li>
                @endforeach
            </ul>
       @endif
       
@endsection
