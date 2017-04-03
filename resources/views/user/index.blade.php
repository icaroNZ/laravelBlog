@extends('layouts.app')
@section('content')

    <main class="container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Users</h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-header">Users</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->created_at->diffForHumans() !!}</td>
                                    <td>
                                        {{ Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) }}
                                            {{ Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control']) }}

                                            {{ Form::submit('Update' , ['class' => 'btn btn-success']) }}
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