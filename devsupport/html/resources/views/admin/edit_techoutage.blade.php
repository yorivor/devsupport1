@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article Management -> Edit Downtime Advisory</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('techs_edit.post', $article->article_id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="content">Content: </label>
                                <br />
                                <textarea style="width:100%;" id="content" type="text" rows="20" name="content" required autofocus>{{ $article->article_content }}</textarea>
                            </div>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('penalty') ? ' has-error' : '' }}">
                            <label for="penalty" class="col-md-4 control-label">Other Info (Optional): </label>

                            <div class="col-md-6">
                                <input id="penalty" type="text" class="form-control" name="penalty" value="{{ $article->article_title }}" autofocus>

                                @if ($errors->has('penalty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penalty') }}</strong>
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
                                    Update
                                </button>
                                 <a href="{{ url('techs') }}" class="btn btn-primary">
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
