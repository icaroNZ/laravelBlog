@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Administrator Control Panel</h1>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-primary"><a style="color:#fff" href="{{ url('/blog/create') }}">Create Blog</a> </button>
                <button class="btn btn-primary"><a style="color:#fff" href="{{ url('/blog/trashed') }}">Trashed Blogs</a> </button>
                <button class="btn btn-primary"><a style="color:#fff" href="{{ url('/user') }}">Users</a> </button>
                <button class="btn btn-primary"><a style="color:#fff" href="{{ url('/category/create') }}">Create Categories</a> </button>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">Recent Blogs</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </thead>
                            <tbody>
                                @foreach($blog as $blog)
                                <tr>
                                    {!!  $status = $blog->status == 0 ? 'Draft' : 'Published' !!}
                                    {!!  $button = $blog->status == 1 ? 'Draft' : 'Published' !!}
                                    <td>{!! $blog->title !!}</td>
                                    <td>{!! str_limit($blog->body,150) !!}</td>
                                    <td>{!! $status !!}</td>
                                    <td>
                                        {{ Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogController@publish', $blog->id]]) }}
                                            {{ Form::hidden('status', $status == 'Draft' ? 1 : 0) }}
                                            {{ Form::submit($button , ['class' => 'btn btn-success']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection