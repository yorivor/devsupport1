@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Whats Hot Management
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('add_hotcat') }}" class="links-icon">
                                <div class="glyphicon glyphicon-asterisk"></div>
                                <div class="icon-title">Add Categories</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('add_hotarticle') }}" class="links-icon">
                                <div class="glyphicon glyphicon-plus"></div>
                                <div class="icon-title">Add Articles</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('list_whatshot') }}" class="links-icon">
                                <div class="glyphicon glyphicon-th-list"></div>
                                <div class="icon-title">List Articles</div>
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
