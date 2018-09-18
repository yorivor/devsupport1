@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Add Category -> Sub Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sub_category.post', $knowledge_id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('sub_category') ? ' has-error' : '' }}">
                            <label for="sub_category" class="col-md-4 control-label">Sub Category: </label>

                            <div class="col-md-6">
                                <input id="sub_category" type="text" class="form-control" name="sub_category" value="{{ old('sub_category') }}" required autofocus>

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
                                 <a href="{{ url('add_category') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td>Sub Category Name</td>
                                <td>Date Created</td>
                                <td></td>
                            </tr>
                            <?php 
                                $category = DB::table('sub_knowledge_category')->where('knowledge_category_id', $knowledge_id)->orderBy('knowledge_category_id', 'desc')->paginate(10);
                                $count = count($category);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($category as $cate)
                                    <tr>
                                        <td>{{ $cate->sub_category }}</td>
                                        <td>{{ $cate->created_at }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ url('add_knowledge_article/'.$knowledge_id.'/'.$cate->id) }}" data-toggle="tooltip" title="Create Article"><div class="glyphicon glyphicon-align-justify"></div></a> 
                                            <a class="btn btn-info" href="{{ url('edit_sub_category/'.$knowledge_id.'/'.$cate->id) }}" data-toggle="tooltip" title="Edit Sub Category"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('delete_sub_category/'.$knowledge_id.'/'.$cate->id) }}" data-toggle="tooltip" title="Delete Sub Category"><div class="glyphicon glyphicon-trash"></div></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        {{ $category->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
