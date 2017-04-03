@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Create Category</h1>
            </div>
            <div class="col-sm-8">
                <h3>Create Categories:</h3>

                {!! Form::open(['method' => 'POST', 'action' => 'CategoryController@store']) !!}
                <div>
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-sm-4">
                <h3>List of Categories:</h3>
                @foreach($categories as $category)

                    <li style="list-style-type:none;">
                        <a href="{{ route('category.show', $category->code) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </div>
        </div>

    </main>




@endsection