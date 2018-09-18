@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<h2 style="color:#000;">Knowledge Base</h2>
            	</div>
            	<?php
	            	$knowledge = DB::table('knowledge_category')->paginate(10);
	       			$count = count($knowledge);
            	?>
            	@if(!$count)
            	@else
	            	<?php $i = 0; ?>
	            	@foreach($knowledge as $know)
	            		@if($i == 0)
	            			<a href="{{ url('knowsubcat/'.$know->knowledge_category_id) }}">
		            			<div class="knowlist">
		            				<div class="row">
			            				<div class="col-md-10"">
					            			{{ $know->category }}
					            		</div>
					            		<div class="col-md-2 text-right">
				            				<div class="glyphicon glyphicon-expand"></div>
				            			</div>
				            		</div>
				            	</div>
			            	</a>
	            			<?php $i++; ?>
	            		@else
	            			<a href="{{ url('knowsubcat/'.$know->knowledge_category_id) }}">
		            			<div class="knowlist2">
				            		<div class="row">
			            				<div class="col-md-10"">
					            			{{ $know->category }}
					            		</div>
					            		<div class="col-md-2 text-right">
				            				<div class="glyphicon glyphicon-expand"></div>
				            			</div>
				            		</div>
				            	</div>
			            	</a>
	            			<?php $i=0; ?>
	            		@endif
	            	@endforeach
	            	{{ $knowledge->links() }}
            	@endif
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
	<div class="row">
		<div class="col-sm-9 text-center">
			<h3 style="color:#000;">Knowledge Base</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9 ">
			<?php
            	$knowledge = DB::table('knowledge_category')->paginate(10);
       			$count = count($knowledge);
        	?>
        	@if(!$count)
        	@else
            	<?php $i = 0; ?>
            	@foreach($knowledge as $know)
            		@if($i == 0)
            			<a href="{{ url('knowsubcat/'.$know->knowledge_category_id) }}">
	            			<div class="knowlist">
	            				<div class="row">
		            				<div class="col-md-4"">
				            			{{ $know->category }}
				            		</div>
			            		</div>
			            	</div>
		            	</a>
            			<?php $i++; ?>
            		@else
            			<a href="{{ url('knowsubcat/'.$know->knowledge_category_id) }}">
	            			<div class="knowlist2">
			            		<div class="row">
		            				<div class="col-md-4"">
				            			{{ $know->category }}
				            		</div>
			            		</div>
			            	</div>
		            	</a>
            			<?php $i=0; ?>
            		@endif
            	@endforeach
            	{{ $knowledge->links() }}
        	@endif
		</div>
	</div>
</div>
@include('layouts/footer2')