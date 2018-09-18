@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">What's Hot Management -> What's Hot Article</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add_hotarticles.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('article_title') ? ' has-error' : '' }}">
                            <label for="article_title" class="col-md-4 control-label">Title: </label>

                            <div class="col-md-6">
                                <input id="article_title" type="text" class="form-control" name="article_title" value="{{ old('article_title') }}" required autofocus>

                                @if ($errors->has('article_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('article_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">category: </label>
                            <div class="col-md-6">
                                <select id="category" class="form-control" name="category" required autofocus>
                                    <option value="">-- Select Category --</option>
                                    <?php 
                                        $hotcat = DB::table('whatshot_cat')->orderBy('what_id', 'desc')->get();
                                        $count = count($hotcat);
                                    ?>
                                    @if(!$count)
                                    @else
                                        @foreach($hotcat as $cathot)
                                            <option value="{{ $cathot->what_id }}">{{ $cathot->what_title }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('article_content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="article_content">Content: </label>
                                <br />
                                <textarea id="content article_content" rows="20" type="text" class="form-control my-editor" name="article_content" autofocus>{{ old('article_content') }}</textarea>
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
                                    Submit
                                </button>
                                 <a href="{{ url('whatshot_management') }}" class="btn btn-primary">
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
