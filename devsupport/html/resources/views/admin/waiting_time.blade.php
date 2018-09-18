@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Waiting Time</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('time_what.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('waiting_message') ? ' has-error' : '' }}">
                            <label for="waiting_message" class="col-md-4 control-label">Waiting Time: </label>

                            <div class="col-md-6">
                                
                                    @if(!$count)
                                        <input type="text" id="waiting_message" class="form-control" name="waiting_message" value="{{ old('waiting_message') }}" required autofocus />
                                    @else
                                        <input type="text" id="waiting_message" class="form-control" name="waiting_message" value="{{ $waiting->message_time }}" required autofocus />
                                    @endif

                                @if(session()->has('waiting_message'))
                                    <span style="color:red;" class="help-block">
                                        <strong>{{ session()->get('waiting_message') }}</strong>
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
                                 <a href="{{ url('knowledge_management') }}" class="btn btn-primary">
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
