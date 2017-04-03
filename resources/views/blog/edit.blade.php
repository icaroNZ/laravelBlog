@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Edit Blog</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@update', $blog->id]]) !!}
                <div>
                    @include('partials.error-messages')
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('body', 'Post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
                </div>
                <div>
                        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>

    </main>




@endsection