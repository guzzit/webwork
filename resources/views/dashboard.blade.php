@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary mb-3">Create New Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td><h3>{{$post->title}}</h3>
                                    <small>Written on {{$post->created_at}}</small>
                                </td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td>
                                        {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger', 'onclick'=>'return confirm("Are you sure you want to delete your post?")'])}}
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <div>
                            You have no Posts
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
