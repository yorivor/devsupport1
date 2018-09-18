@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Add Category -> Sub Category ->Edit Knowledge Base Article</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('edit_knowledge_article.post', [$knowledge_id, $subid, $kaid]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('knowledge_article_title') ? ' has-error' : '' }}">
                            <label for="knowledge_article_title" class="col-md-4 control-label">Title: </label>

                            <div class="col-md-6">
                                <input id="knowledge_article_title" type="text" class="form-control" name="   knowledge_article_title" value="{{ $karticle->knowledge_article_title }}" required autofocus>

                                @if ($errors->has('knowledge_article_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('knowledge_article_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('knowledge_article_date') ? ' has-error' : '' }}">
                            <label for="knowledge_article_date" class="col-md-4 control-label">Date: </label>

                            <div class="col-md-6">
                                <input id="knowledge_article_date datepicker" type="text" class="form-control datepicker" name="knowledge_article_date" value="{{ $date_article }}" data-provide="datepicker" required autofocus>

                                @if ($errors->has('knowledge_article_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('knowledge_article_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('knowledge_article_content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="knowledge_article_content">Content: </label>
                                <br />
                                <textarea id="content knowledge_article_content" rows="20" type="text" class="form-control my-editor" name="knowledge_article_content" autofocus>{{ $karticle->knowledge_article_content }}</textarea>
                            </div>
                            @if ($errors->has('knowledge_article_content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('knowledge_article_content') }}</strong>
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
                                    Submit
                                </button>
                                @if($subid == 0)
                                    <a href="{{ url('cat_article/'.$knowledge_id) }}" class="btn btn-primary">
                                        Back
                                    </a>
                                @else
                                    <a href="{{ url('add_knowledge_article/'.$knowledge_id.'/'.$subid) }}" class="btn btn-primary">
                                        Back
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
