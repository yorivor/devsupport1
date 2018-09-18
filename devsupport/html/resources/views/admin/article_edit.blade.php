@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article Management -> Edit Outage</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('article_edit.post', $article->article_id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('article_title') ? ' has-error' : '' }}">
                            <label for="article_title" class="col-md-4 control-label">Article Title: </label>

                            <div class="col-md-6">
                                <input id="article_title" type="text" class="form-control" name="article_title" value="{{ $article->article_title }}" required autofocus>

                                @if ($errors->has('article_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('article_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('article_date') ? ' has-error' : '' }}">
                            <label for="article_date" class="col-md-4 control-label">Article Date: </label>

                            <div class="col-md-6">
                                <input id="article_date datepicker" type="text" class="form-control datepicker" name="article_date" value="{{ $date_article }}" data-provide="datepicker" required autofocus>

                                @if ($errors->has('article_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('article_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('article_content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="article_content">Article Content: </label>
                                <br />
                                <textarea id="content article_content" type="text" rows="20" class="form-control my-editor" name="article_content" autofocus>{{ $article->article_content }}</textarea>
                            </div>
                            @if ($errors->has('article_content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article_content') }}</strong>
                                </span>
                            @endif
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
                                 <a href="{{ url('article_add') }}" class="btn btn-primary">
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
