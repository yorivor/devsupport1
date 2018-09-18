@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Management
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('userlist') }}" class="links-icon">
                                <div class="glyphicon glyphicon-eye-open"></div>
                                <div class="icon-title">User List</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ route('register') }}" class="links-icon">
                                <div class="glyphicon glyphicon-plus"></div>
                                <div class="icon-title">Add User</div>
                            </a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{ url('home') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
