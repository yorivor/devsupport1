@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
	                <h2 style="color:#000;">Downtime Advisory</h2>
	            </div>
            	<?php
            		$article_list = DB::table('article')->where('article_active', 'Active')->paginate(10);
        			$count = count($article_list);
            	?>
            	@if(! $count)
            	@else
	            	@foreach($article_list as $list)
	            		@if($list->article_category == "Outage")
	            			<a href="{{ URL('outage/'.$list->article_id) }}">
				            	<div class="outage-box">
				            		<div class="title_outage">{{ $list->article_title }}</div>
				            		<div class="content_outage">
				            			{{ substr(strip_tags($list->article_content), 0, 320) }}...
				            		</div>
				            	</div>
			            	</a>
		            	@else
		            		<a href="{{ URL('downtime/'.$list->article_id) }}">
			            		<div class="article-box">
				            		<div class="title_article">{{ $list->article_title }}</div>
				            		<div class="content_aritcle">
				            			{{ substr(strip_tags($list->article_content), 0, 320) }}...
				            		</div>
				            	</div>
			            	</a>
		            	@endif
	            	@endforeach
	            	{{ $article_list->links() }}
            	@endif
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
	<div class="row">
		<div class="col-sm-9 text-center">
			<h3 style="color:#000;">Downtime Advisory</h3>
		</div>
	</div>
	<div class="row">
		<?php
    		$article_list = DB::table('article')->where('article_active', 'Active')->paginate(10);
			$count = count($article_list);
    	?>
    	@if(! $count)
    	@else
        	@foreach($article_list as $list)
        		@if($list->article_category == "Outage")
        			<div class="col-sm-9 text-left">
            			<a href="{{ URL('outage/'.$list->article_id) }}">
			            	<div class="outage-box">
			            		<div class="col-md-6">
			            			<div class="title_outage">{{ $list->article_title }}</div>
			            		</div>
			            	</div>
		            	</a>
	            	</div>
            	@else
            		<div class="col-sm-9 text-left">
            		<a href="{{ URL('downtime/'.$list->article_id) }}">
	            		<div class="article-box">
	            			<div class="col-md-6">
		            			<div class="title_article">{{ $list->article_title }}</div>
		            		</div>
		            	</div>
	            	</a>
	            	</div>
            	@endif
        	@endforeach
        	{{ $article_list->links() }}
    	@endif
	</div>
	<br />
	<br />
	<br />
</div>
@include('layouts/footer2')