@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Blog Categories</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                @foreach($categories as $category)
                    @if ($category->blog->count() > 0)
                        <li><a href="{{route('category.show', $category->code)}}">{{ $category->name }}</a></li>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection