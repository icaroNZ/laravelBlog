@extends('layouts.app')
@section('content')
    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Create Blog</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::open(['method' => 'POST', 'action' => 'BlogController@store']) !!}
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
                    {!! Form::select('category_id[]', $categories, null, ['id' => 'select2', 'class' => 'form-control', 'multiple']) !!}
                </div>
                <div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </main>
@endsection

