@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <article>
                <div class="jumbotron">
                    <h1>{{$blog->title}}</h1>
                    <a href="{{action('BlogController@edit',[$blog->id])}}"; style = "float:right">Edit</a>
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <p>{{$blog->body}}</p>
                    @foreach($blog->category as $category)
                        <li><a href="{{route('category.show', $category->code)}}">{{ $category->name }}</a></li>
                    @endforeach
                </div>
            </article>
        </div>
    </main>
@endsection