@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Knowledge Base Management
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('add_category') }}" class="links-icon">
                                <div class="glyphicon glyphicon-option-vertical"></div>
                                <div class="icon-title">Knowledge Base</div>
                            </a>
                        </div>
                        @if(Auth::user()->department == "Technical Team")
                        @else
                            <div class="col-xs-6 col-sm-3 icons">
                                <a href="{{ url('ls_top_knowbase') }}" class="links-icon">
                                    <div class="glyphicon glyphicon-tasks"></div>
                                    <div class="icon-title">LS Top KB</div>
                                </a>
                            </div>
                        @endif
                        @if(Auth::user()->department == "Lesson Support")
                        @else
                            <div class="col-xs-6 col-sm-3 icons">
                                <a href="{{ url('top_knowbase') }}" class="links-icon">
                                    <div class="glyphicon glyphicon-signal"></div>
                                    <div class="icon-title">Top Knowledge Base</div>
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
