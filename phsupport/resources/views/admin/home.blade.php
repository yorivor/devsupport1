@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Welcome
                </div>
                <div class="panel-body">
                    <div class="row">
                        @if(Auth::user()->position == "Super Admin" OR Auth::user()->position == "Admin")
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('user_management') }}" class="links-icon">
                                <div class="glyphicon glyphicon-user"></div>
                                <div class="icon-title">User Management</div>
                            </a>
                        </div>
                        @else
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="#" class="links-icon">
                                <div class="glyphicon glyphicon-user"></div>
                                <div class="icon-title">User Management</div>
                            </a>
                        </div>
                        @endif
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('article_management') }}" class="links-icon">
                                <div class="glyphicon glyphicon-list-alt"></div>
                                <div class="icon-title">Outage Management</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('knowledge_management') }}" class="links-icon">
                                <div class="glyphicon glyphicon-folder-open"></div>
                                <div class="icon-title">Article Management</div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('slide_management') }}" class="links-icon">
                                <div class="glyphicon glyphicon-picture"></div>
                                <div class="icon-title">Slide Management</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('whatshot_management') }}" class="links-icon">
                                <div class="glyphicon glyphicon-fire"></div>
                                <div class="icon-title">Whats Hot Management</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
