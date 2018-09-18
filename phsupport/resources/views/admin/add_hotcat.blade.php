@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">What's Hot Management -> Add Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add_hotcats.post') }}" enctype="multipart/form-data">
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
                                 <a href="{{ url('whatshot_management') }}" class="btn btn-primary">
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
                                $category = DB::table('whatshot_cat')->orderBy('what_id', 'desc')->paginate(10);
                                $count = count($category);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($category as $cate)
                                    <tr>
                                        <td>{{ $cate->what_title }}</td>
                                        <td>{{ $cate->created_at }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('edit_hotcat/'.$cate->what_id) }}" data-toggle="tooltip" title="Edit Category"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a id="sets"  class="btn btn-danger" onclick="id_number({{ $cate->what_id }})"  data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Delete Category"><div class="glyphicon glyphicon-trash"></div></a>

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
<script type="text/javascript">
   function id_number(val)
    {   
        var link = "{{ url('delete_hotcats') }}/"+val;
        document.getElementById("buts").setAttribute('href', link); 
        return false;  
    }
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Warning</h4>
      </div>
      <div class="modal-body bg-danger">
        All of the What's Hot Articles that related to this category will aslo be deleted
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id="buts" href="" type="button" class="btn btn-primary">Continue</a>
      </div>
    </div>
  </div>
</div>