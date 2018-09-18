@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Article Management
                </div>

                <div class="panel-body">
                    <div class="row">
                        @if(Auth::user()->department == "Technical Team")
                        @else
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('advirosry_add') }}" class="links-icon">
                                <div class="glyphicon glyphicon-info-sign"></div>
                                <div class="icon-title">Advisory</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ route('article_add') }}" class="links-icon">
                                <div class="glyphicon glyphicon-alert"></div>
                                <div class="icon-title">Add Outage</div>
                            </a>
                        </div>
                        @endif
                        @if(Auth::user()->department == "Lesson Support")
                        @else
                            <div class="col-xs-6 col-sm-3 icons">
                                <a href="{{ url('techs') }}" class="links-icon">
                                    <div class="glyphicon glyphicon-cog"></div>
                                    <div class="icon-title">Tech Outage</div>
                                </a>
                            </div>
                        @endif
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
