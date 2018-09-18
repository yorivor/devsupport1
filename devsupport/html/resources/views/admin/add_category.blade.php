@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Knowledge Base Management -> Add Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add_category.post') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category: </label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
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
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td>Category Name</td>
                                <td>Date Created</td>
                                <td></td>
                            </tr>
                            <?php 
                                $category = DB::table('knowledge_category')->orderBy('knowledge_category_id', 'desc')->paginate(10);
                                $count = count($category);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($category as $cate)
                                    <tr>
                                        <td>{{ $cate->category }}</td>
                                        <td>{{ $cate->created_at }}</td>
                                        <td>
                                            <?php
                                                $checkof = DB::table('knowledge_article')->where('knowledge_category_id', $cate->knowledge_category_id)->where('sub_knowledge_category_id', 0)->get();
                                                $countchek = count($checkof);
                                            ?>
                                            @if(! $countchek)
                                                <?php
                                                    $check3 = DB::table('sub_knowledge_category')->where('knowledge_category_id', $cate->knowledge_category_id)->get();
                                                    $countchek3 = count($check3);
                                                ?>
                                                @if(! $countchek3)
                                                    <a class="btn btn-warning" href="{{ url('category_setup/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Category Setup"><div class="glyphicon glyphicon-cog"></div></a>
                                                @else
                                                    <a class="btn btn-success" href="{{ url('sub_category/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Sub Category"><div class="glyphicon glyphicon-align-left"></div></a>
                                                @endif
                                            @else
                                                <?php
                                                    $check2 = DB::table('knowledge_article')->where('knowledge_category_id', $cate->knowledge_category_id)->get();
                                                    $countchek2 = count($check2);
                                                ?>
                                                @if(! $countchek2)
                                                    <a class="btn btn-success" href="{{ url('sub_category/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Sub Category"><div class="glyphicon glyphicon-align-left"></div></a>
                                                @else
                                                    <a class="btn btn-success" href="{{ url('cat_article/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Create Article"><div class="glyphicon glyphicon-align-justify"></div></a>
                                                @endif
                                            @endif
                                            <a class="btn btn-info" href="{{ url('editd_category/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Edit Category"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('delete_category/'.$cate->knowledge_category_id) }}" data-toggle="tooltip" title="Delete Category"><div class="glyphicon glyphicon-trash"></div></a>
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
