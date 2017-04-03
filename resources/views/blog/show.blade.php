@extends('layouts.app')
@section('content')
    @php
        $admin = false;
        if ((Auth::user()) && (Auth::user()->role_id == 1)){
             $admin = true;
        }
    @endphp
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1>{{$blog->title}}</h1>
                @if ($admin)
                    <a class="btn btn-primary btn-lg" href="{{action('BlogController@edit',[$blog->id])}}">Edit</a>
                @endif
            </div>
            <div class="panel-body">
                <p>{{$blog->body}}</p>
            </div>
        </div>
         <div class="panel-footer">
             <h4>Categories</h4>
             @foreach($blog->category as $category)
                 <li style="list-style-type: none"><a href="{{route('category.show', $category->code)}}">{{ $category->name }}</a></li>
             @endforeach
         </div>
        <div>
            <div class="container">
                <h2>Comments:</h2>
                @foreach($blog->comment as $comment)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{ $comment->comment }}
                            @if ($admin)
                                <div style="float:right">
                                {!! Form::open(['action' => ['CommentController@destroy', $comment->id], 'method' => 'delete']) !!}
                                     {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-lg']) !!}
                                {!! Form::close() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
        </div>

            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::open(['method' => 'POST', 'action' => 'CommentController@store']) !!}
                <div>
                    {!! Form::hidden('blogId', $blog->id) !!}

                    {!! Form::label('comment', 'Comment:') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>

    </div>
@endsection