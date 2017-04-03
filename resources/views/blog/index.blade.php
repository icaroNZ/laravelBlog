@extends('layouts.app')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif
    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Blog Posts</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @foreach($blogs as $blog)
                    <article>
                        <a href="{{action('BlogController@show',[$blog->id])}}"><h3>{{$blog->title}}</h3></a>
                        <p>{{$blog->body}}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </main>
@endsection