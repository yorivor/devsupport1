@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">What's Hot Management -> List Article</div>
                <div class="panel-body">
                    <div class="rows">
                        <table class="table table-striped">
                            <tr>
                                <td>Category Name</td>
                                <td>Category</td>
                                <td>Date Created</td>
                                <td></td>
                            </tr>
                            <?php 
                                $whatshot = DB::table('whatshot')->orderBy('whatshot_id', 'desc')->paginate(10);
                                $count = count($whatshot);
                            ?>
                            @if (! $count)
                            <tr>
                                <td colspan="4"> No Recored! </td>
                            </tr>
                            @else
                                @foreach($whatshot as $hotwhats)
                                    <tr>
                                        <td>{{ $hotwhats->title }}</td>
                                        <td>
                                            <?php 
                                                $whatshot_cat = DB::table('whatshot_cat')->where('what_id', $hotwhats->category)->first();
                                                $counting = count($whatshot_cat);
                                            ?>
                                            @if(! $whatshot_cat)
                                            @else
                                                {{ $whatshot_cat->what_title }}
                                            @endif
                                        </td>
                                        <td>{{ $hotwhats->created_at }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('edit_hotarticles/'.$hotwhats->whatshot_id) }}" data-toggle="tooltip" title="Edit Category"><div class="glyphicon glyphicon-edit"></div></a> 
                                            <a  class="btn btn-danger" href="{{ url('delete_hotart/'.$hotwhats->whatshot_id) }}" data-toggle="tooltip" title="Delete Category"><div class="glyphicon glyphicon-trash"></div></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        {{ $whatshot->links() }}
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="col-md-6">
                             <a href="{{ url('whatshot_management') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
