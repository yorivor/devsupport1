@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Slide Management -> Add Slide</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add_slide.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('slide_title') ? ' has-error' : '' }}">
                            <label for="slide_title" class="col-md-4 control-label">Slide Title: </label>

                            <div class="col-md-6">
                                <input id="slide_title" type="text" class="form-control" name="slide_title" value="{{ old('slide_title') }}" required autofocus>

                                @if ($errors->has('slide_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slide_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('slide_url') ? ' has-error' : '' }}">
                            <label for="slide_url" class="col-md-4 control-label">Slide URL: </label>

                            <div class="col-md-6">
                                <input id="slide_url" type="text" class="form-control" name="slide_url" value="{{ old('slide_url') }}" required autofocus>

                                @if ($errors->has('slide_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slide_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Start Date: </label>

                            <div class="col-md-6">
                                <input id="start_date datepicker" type="text" class="form-control datepicker" name="start_date" value="{{ old('start_date') }}" data-provide="datepicker" required autofocus>

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="end_date" class="col-md-4 control-label">End Date: </label>

                            <div class="col-md-6">
                                <input id="end_date datepicker" type="text" class="form-control datepicker" name="end_date" value="{{ old('end_date') }}" data-provide="datepicker" required autofocus>

                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('filepath') ? ' has-error' : '' }}">
                            <div style="padding:10px;">
                                <label for="filepath">Slide Image: </label>
                                <br />
                                <div class="input-group">
                                   <span class="input-group-btn">
                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                       <i class="fa fa-picture-o"></i> Choose
                                     </a>
                                   </span>
                                   <input id="thumbnail" class="form-control" type="text" name="filepath" value="{{ old('filepath') }}">
                                 </div>
                                 <img id="holder" style="margin-top:15px;max-height:100px;">
                                 @if ($errors->has('filepath'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filepath') }}</strong>
                                    </span>
                                @endif
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
                                 <a href="{{ url('slide_management') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td style="width:20%;">Image</td>
                                <td style="width:20%;">Title</td>
                                <td style="width:20%;">Start Date</td>
                                <td style="width:20%;">End Date</td>
                                <td style="width:20%;"></td>
                            </tr>
                            <?php 
                                $slide = DB::table('slide')->orderBy('slide_id', 'desc')->paginate(10);
                                $count = count($slide);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($slide as $slides)
                                    <tr>
                                        <td><img src="{{ asset($slides->image) }}" style="width:100%;" /></td>
                                        <td>{{ $slides->title }}</td>
                                        <td>{{ $slides->start_date }}</td>
                                        <td>{{ $slides->end_date }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('/edit_slide/'.$slides->slide_id) }}" data-toggle="tooltip" title="Edit Outage"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('/delete_slide/'.$slides->slide_id) }}" data-toggle="tooltip" title="Delete Outage"><div class="glyphicon glyphicon-trash"></div></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        {{ $slide->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
