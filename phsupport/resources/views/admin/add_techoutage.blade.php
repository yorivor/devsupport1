@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Article Management -> Tech Outage</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('techs.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="content">Content: </label>
                                <br />
                                <textarea style="width:100%;" id="content" type="text" rows="20" name="content" required autofocus>{{ old('content') }}</textarea>
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
                                <input id="penalty" type="text" class="form-control" name="penalty" value="{{ old('penalty') }}" autofocus>

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
                                    Submit
                                </button>
                                 <a href="{{ url('article_management') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td>Content</td>
                                <td>Other Info</td>
                                <td>Created By</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                            <?php 
                                $article = DB::table('article')->where('article_category', 'Tech')->orderBy('article_id', 'desc')->paginate(10);
                                $count = count($article);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($article as $articles)
                                    <tr>
                                        <td>{{ $articles->article_content }}</td>
                                        <td>{{ $articles->article_title }}</td>
                                        <td>{{ $articles->article_creator }}</td>
                                        <td>
                                            @if($articles->article_active == "Active")
                                                <a class="btn btn-warning" href="{{ url('/article_resolve/'.$articles->article_id) }}" data-toggle="tooltip" title="Outage Resolve?">{{ $articles->article_active }}</a>
                                            @elseif($articles->article_active == "Resolve")
                                                <a class="btn btn-success" href="{{ url('/article_active/'.$articles->article_id) }}" data-toggle="tooltip" title="Do you want to Active?">{{ $articles->article_active }}</a>
                                            @else
                                            @endif

                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/techs_edit/'.$articles->article_id) }}" data-toggle="tooltip" title="Edit Outage"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('/article_delete/'.$articles->article_id) }}" data-toggle="tooltip" title="Delete Outage"><div class="glyphicon glyphicon-trash"></div></a>
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
