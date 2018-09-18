@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    About Management
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('whoweare') }}" class="links-icon">
                                <div class="glyphicon glyphicon-star"></div>
                                <div class="icon-title">Who We Are</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('whatwevalue') }}" class="links-icon">
                                <div class="glyphicon glyphicon-ok-circle"></div>
                                <div class="icon-title">What We Value</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('ourbrand') }}" class="links-icon">
                                <div class="glyphicon glyphicon-tags"></div>
                                <div class="icon-title">Our Brand</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('ourmission') }}" class="links-icon">
                                <div class="glyphicon glyphicon-plane"></div>
                                <div class="icon-title">Our Mission</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('ourvision') }}" class="links-icon">
                                <div class="glyphicon glyphicon-eye-open"></div>
                                <div class="icon-title">Our Vision</div>
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
