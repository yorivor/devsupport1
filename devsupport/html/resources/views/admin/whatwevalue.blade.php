@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">About Management -> What We Value</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('whatwevalue.post') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('article_content') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="article_content">Content: </label>
                                <br />
                                <textarea id="content article_content" type="text" class="form-control my-editor" name="article_content" autofocus>
                                @if(! $counting)
                                        {{ old('article_content') }}
                                    @else
                                        {{ $whatwevalue->content }}
                                    @endif
                                </textarea>
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
                                 <a href="{{ url('about_management') }}" class="btn btn-primary">
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
