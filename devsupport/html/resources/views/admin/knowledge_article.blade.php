@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Add Category -> Sub Category -> Knowledge Base Article</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add_knowledge_article.post', [$knowledge_id, $subid]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('knowledge_article_title') ? ' has-error' : '' }}">
                            <label for="knowledge_article_title" class="col-md-4 control-label">Title: </label>

                            <div class="col-md-6">
                                <input id="knowledge_article_title" type="text" class="form-control" name="   knowledge_article_title" value="{{ old('knowledge_article_title') }}" required autofocus>

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
                                <input id="knowledge_article_date datepicker" type="text" class="form-control datepicker" name="knowledge_article_date" value="{{ old('knowledge_article_date') }}" data-provide="datepicker" required autofocus>

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
                                <textarea id="content knowledge_article_content" rows="20" type="text" class="form-control my-editor" name="knowledge_article_content" autofocus>{{ old('knowledge_article_content') }}</textarea>
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
                                 <a href="{{ url('sub_category/'.$knowledge_id) }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td>Date Created</td>
                                <td></td>
                            </tr>
                            <?php 
                                $article = DB::table('knowledge_article')->where('knowledge_category_id', $knowledge_id)->where('sub_knowledge_category_id', $subid)->orderBy('knowledge_article_id', 'desc')->paginate(10);
                                $count = count($article);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($article as $articles)
                                    <tr>
                                        <td>{{ $articles->knowledge_article_title }}</td>
                                        <td>{{ $articles->knowledge_article_date }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/edit_knowledge_article/'.$knowledge_id.'/'.$subid.'/'.$articles->knowledge_article_id) }}" data-toggle="tooltip" title="Edit Knowledge Base"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('/delete_knowledge/'.$knowledge_id.'/'.$subid.'/'.$articles->knowledge_article_id) }}" data-toggle="tooltip" title="Delete Knowledge Base"><div class="glyphicon glyphicon-trash"></div></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        {{ $article->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
