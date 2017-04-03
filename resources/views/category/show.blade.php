@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Blog on Category: {{$category->name}}</h1>
                <a style="float:right" href="{{ action('CategoryController@edit', [$category->id]) }}">Edit</a>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @foreach($category->blog as $blog)
                    <a href="{{action('BlogController@show',[$blog->id])}}"><h3>{{ $blog->title }}</h3></a>
                @endforeach
            </div>
        </div>
    </main>
@endsection