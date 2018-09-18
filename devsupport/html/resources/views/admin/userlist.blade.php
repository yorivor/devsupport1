@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Management -> User List
                </div>
                <div class="panel-body">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="row" style="padding: 10px;">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Department</td>
                                <td>Position</td>
                                <td></td>
                            </tr>
                            <?php $count = count($users); ?>
                                @if (! $count)
                                <tr>
                                    <td colspan="4" align="center"> No Recored! </td>
                                </tr>
                                @else
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->department }}</td>
                                            <td>{{ $user->position }}</td>
                                            <td>
                                                @if(Auth::user()->position == "Super Admin")
                                                    <a class="btn btn-warning" data-toggle="tooltip" title="Change Password" href="{{ url('change_pass/'.$user->id) }}"><div class="glyphicon glyphicon-option-horizontal"></div></a>
                                                @else
                                                @endif
                                                <a class="btn btn-info" data-toggle="tooltip" title="Edit User" href="{{ url('edit_user/'.$user->id) }}"><div class="glyphicon glyphicon-edit"></div></a>
                                                @if(Auth::user()->position == "Super Admin" OR Auth::user()->position == "Admin")
                                                    <a class="btn btn-danger" data-toggle="tooltip" title="Delete User" href="{{ url('delete_user/'.$user->id) }}"><div class="glyphicon glyphicon-trash"></div></a>
                                                @else
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                        </table>
                        <br />
                        <a href="{{ url('user_management') }}" class="btn btn-primary">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
