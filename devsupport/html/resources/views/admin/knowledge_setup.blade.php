@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Knowledge Base Management -> Add Category -> Category Setup
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('cat_article/'.$knowledge_id) }}" class="links-icon">
                                <div class="glyphicon glyphicon-align-justify"></div>
                                <div class="icon-title">Create Category Article</div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3 icons">
                            <a href="{{ url('sub_category/'.$knowledge_id) }}" class="links-icon">
                                <div class="glyphicon glyphicon-align-left"></div>
                                <div class="icon-title">Create Sub Category</div>
                            </a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{ url('add_category') }}" class="btn btn-primary">
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
