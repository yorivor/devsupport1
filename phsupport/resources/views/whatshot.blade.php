@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<h2 style="color:#000;">What's Hot</h2>
            	</div>
            	@if(!$count)
            	@else
	            	<?php $i = 0; ?>
	            	@foreach($whatshot_cat as $hotwhat)
	            		@if($i == 0)
	            			<a href="{{ url('whatshotlist/'.$hotwhat->what_id) }}">
		            			<div class="knowlist">
		            				<div class="row">
			            				<div class="col-md-10"">
					            			{{ $hotwhat->what_title }}
					            		</div>
					            		<div class="col-md-2 text-right">
				            				<div class="glyphicon glyphicon-expand"></div>
				            			</div>
				            		</div>
				            	</div>
			            	</a>
	            			<?php $i++; ?>
	            		@else
	            			<a href="{{ url('whatshotlist/'.$hotwhat->what_id) }}">
		            			<div class="knowlist2">
				            		<div class="row">
			            				<div class="col-md-10"">
					            			{{ $hotwhat->what_title }}
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
	            	{{ $whatshot_cat->links() }}
            	@endif
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
	<div class="row">
		<div class="col-sm-9 text-center">
			<h3 style="color:#000;">What's Hot</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9 ">
        	@if(!$count)
        	@else
            	<?php $i = 0; ?>
            	@foreach($whatshot_cat as $hotwhat)
            		@if($i == 0)
            			<a href="{{ url('whatshotlist/'.$hotwhat->what_id) }}">
	            			<div class="knowlist">
	            				<div class="row">
		            				<div class="col-md-4"">
				            			{{ $hotwhat->what_title }}
				            		</div>
			            		</div>
			            	</div>
		            	</a>
            			<?php $i++; ?>
            		@else
            			<a href="{{ url('whatshotlist/'.$hotwhat->what_id) }}">
	            			<div class="knowlist2">
			            		<div class="row">
		            				<div class="col-md-4"">
				            			{{ $hotwhat->what_title }}
				            		</div>
			            		</div>
			            	</div>
		            	</a>
            			<?php $i=0; ?>
            		@endif
            	@endforeach
            	{{ $whatshot_cat->links() }}
        	@endif
		</div>
	</div>
</div>
@include('layouts/footer2')