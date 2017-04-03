@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Trashed Blog Posts</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @foreach($trashedBlogs as $blog)
                    <article>
                        <a href="{{action('BlogController@show',[$blog->id])}}"><h3>{{$blog->title}}</h3></a>
                        <p>{{$blog->body}}</p>
                        {!! Form::open(['method' => 'GET', 'action' => ['BlogController@restore', $blog->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Restore', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@removeFromDB', $blog->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete From DB', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </article>
                @endforeach
            </div>
        </div>
    </main>
@endsection