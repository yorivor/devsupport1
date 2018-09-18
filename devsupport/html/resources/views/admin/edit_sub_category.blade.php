@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Add Category -> Edit Sub Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_sub_category.post', [$knowledge_id, $subid]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('sub_category') ? ' has-error' : '' }}">
                            <label for="sub_category" class="col-md-4 control-label">Sub Category: </label>

                            <div class="col-md-6">
                                <input id="sub_category" type="text" class="form-control" name="sub_category" value="{{ $subcategory->sub_category }}" required autofocus>

                                @if ($errors->has('sub_category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                            </div>
                            @if(session()->has('errors'))
                                <div class="alert alert-danger">
                                    {{ session()->get('errors') }}
                                </div>
                            @endif
                        @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                 <a href="{{ url('sub_category/'.$knowledge_id) }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
