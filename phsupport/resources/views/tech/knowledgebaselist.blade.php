@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<?php
            			$article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
            			$ctech = count($article);

            			$penalty = DB::table('article')->select('article_title')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
            			$ctech2 = count($penalty);
            		?>
            		@if(!$ctech)
            		@else
        				<div class="outage-form">
        					<div class="row">
			            		<div class="col-md-1">
			            			<div class="outagesign">
			            				<div class="glyphicon glyphicon-exclamation-sign"></div>
			            			</div>
			            		</div>
			            		<div class="col-md-9">
			            			<h4><b>Outage:</b></h4>
			            			@if($ctech > 1)
			            				<marquee>
			            					<h4>
					            				@foreach($article as $asf)
						            				{{ $asf->article_content }}, 
					            				@endforeach
				            				</h4>
			            				</marquee>
			            			@else
			            				<h4>
			            					@foreach($article as $asf)
					            				{{ $asf->article_content }}
				            				@endforeach
			            				</h4>
		            				@endif
		            				@if(! $ctech2)
		            				@else
		            				<h4>
			            				<b>Other Info:</b> 
			            				@if($ctech2 == NULL)
		            						@foreach($penalty as $pen)
				            					{{ $pen->article_title }}, 
			            					@endforeach
			            				@else
											@foreach($penalty as $pen)
												@if(! $pen->article_title)
			            						@else
				            						{{ $pen->article_title }}
				            					@endif
			            					@endforeach
										@endif
									</h4>
									@endif
			            		</div>
			            		<div class="col-md-2" style="text-align: right;">
			            			<a href="http://support.51talk.com/submit_ticket"  target="_blank"><img src="{{ asset('images/btn_ticn.png') }}" /></a>
			            		</div>
		            		</div>
	            		</div>
            		@endif
            		<div class="row">
            			<div class="col-md-4">
            				<h2 style="color:#000;">Current Issues: </h2>
            			</div>
            			<div class="col-md-6">
            				@if($time == 0)
            				@else
            					<h2 style="color:#000;">Current Waiting Time: {{ $time }} Minutes</h2>
            				@endif
            			</div>
            		</div>
            	</div>
            	<?php
	            	$top_articles = DB::table('top_articles')->first();
	       			$count = count($top_articles);
            	?>
            	@if(!$count)
            	@else
            		<!------------------------------ ONE ------------------------------>
            		@if(! $top_articles->article_one)
            		@else
            		<?php
            			$one = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_one)->first();
            		?>
	            	<a href="{{ url('descknow/'.$one->knowledge_category_id.'/'.$one->sub_knowledge_category_id.'/'.$top_articles->article_one) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10">
					    			{{ $one->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ TWO ------------------------------>
					@if(! $top_articles->article_two)
            		@else
					<?php
            			$two = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_two)->first();
            		?>
	            	<a href="{{ url('descknow/'.$two->knowledge_category_id.'/'.$two->sub_knowledge_category_id.'/'.$top_articles->article_two) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10">
					    			{{ $two->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ THREE ------------------------------>
					@if(! $top_articles->article_three)
            		@else
					<?php
            			$three = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_three)->first();
            		?>
	            	<a href="{{ url('descknow/'.$three->knowledge_category_id.'/'.$three->sub_knowledge_category_id.'/'.$top_articles->article_three) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $three->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ FOUR ------------------------------>
					@if(! $top_articles->article_four)
            		@else
					<?php
            			$four = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_four)->first();
            		?>
	            	<a href="{{ url('descknow/'.$four->knowledge_category_id.'/'.$four->sub_knowledge_category_id.'/'.$top_articles->article_four) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $four->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ FIVE ------------------------------>
					@if(! $top_articles->article_five)
            		@else
					<?php
            			$five = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_five)->first();
            		?>
	            	<a href="{{ url('descknow/'.$five->knowledge_category_id.'/'.$five->sub_knowledge_category_id.'/'.$top_articles->article_five) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $five->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ SIX ------------------------------>
					@if(! $top_articles->article_six)
            		@else
					<?php
            			$six = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_six)->first();
            		?>
	            	<a href="{{ url('descknow/'.$six->knowledge_category_id.'/'.$six->sub_knowledge_category_id.'/'.$top_articles->article_six) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $six->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ SEVEN ------------------------------>
					@if(! $top_articles->article_seven)
            		@else
					<?php
            			$seven = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_seven)->first();
            		?>
	            	<a href="{{ url('descknow/'.$seven->knowledge_category_id.'/'.$seven->sub_knowledge_category_id.'/'.$top_articles->article_seven) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $seven->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ EIGHT ------------------------------>
					@if(! $top_articles->article_eight)
            		@else
					<?php
            			$eight = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_eight)->first();
            		?>
	            	<a href="{{ url('descknow/'.$eight->knowledge_category_id.'/'.$eight->sub_knowledge_category_id.'/'.$top_articles->article_eight) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $eight->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ NINE ------------------------------>
					@if(! $top_articles->article_nine)
            		@else
					<?php
            			$nine = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_nine)->first();
            		?>
	            	<a href="{{ url('descknow/'.$nine->knowledge_category_id.'/'.$nine->sub_knowledge_category_id.'/'.$top_articles->article_nine) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $nine->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ TEN ------------------------------>
					@if(! $top_articles->article_ten)
            		@else
					<?php
            			$ten = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_ten)->first();
            		?>
	            	<a href="{{ url('descknow/'.$ten->knowledge_category_id.'/'.$ten->sub_knowledge_category_id.'/'.$top_articles->article_ten) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $ten->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
            	@endif
            </div>
            @if(!$ctech)
            	<br />
	            <br />
	            <br />
	            <div class="row">
	                <div class="col-md-6" style="text-align:right;">
	                    <a href="{{ url('ticketing') }}"  target="_blank"><img src="{{ asset('images/btn_ticketus.png') }}" /></a>
	                </div>
	                <div class="col-md-3">
	                    <script type="text/javascript">
	                        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,'http://support.51talk.com/scripts/track.js',
	                    function(e){ chatButton = LiveAgent.createButton('24c13fca', e); });
	                    </script>
	                </div>
	            </div>
            @else
            
            @endif
        </div>
    </div>
</div>
<div class="mobile-article">
	<div class="page-centerize">
            <div class="page-listing">
            	<div class="knowborder">
            		<?php
            			$article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
            			$ctech = count($article);

            			$penalty = DB::table('article')->select('article_title')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->get();
            			$ctech2 = count($penalty);
            		?>
            		@if(!$ctech)
            		@else
        				<div class="outage-form">
        					<div class="row">
			            		<div class="col-md-1">
			            			<div class="outagesign">
			            				<div class="glyphicon glyphicon-exclamation-sign"></div>
			            			</div>
			            		</div>
			            		<div class="col-md-9">
			            			<h4><b>Outage:</b></h4>
			            			@if($ctech > 1)
			            				<marquee>
			            					<h4>
					            				@foreach($article as $asf)
						            				{{ $asf->article_content }}, 
					            				@endforeach
				            				</h4>
			            				</marquee>
			            			@else
			            				<h4>
			            					@foreach($article as $asf)
					            				{{ $asf->article_content }}
				            				@endforeach
			            				</h4>
		            				@endif
		            				@if(! $ctech2)
		            				@else
		            				<h4>
			            				<b>Other Info:</b> 
			            				@if($ctech2 == NULL)
		            						@foreach($penalty as $pen)
				            					{{ $pen->article_title }}, 
			            					@endforeach
			            				@else
											@foreach($penalty as $pen)
												@if(! $pen->article_title)
			            						@else
				            						{{ $pen->article_title }}
				            					@endif
			            					@endforeach
										@endif
									</h4>
									@endif
			            		</div>
			            		<div class="col-md-2" style="text-align: right;">
			            			<a href="http://support.51talk.com/submit_ticket"  target="_blank"><img src="{{ asset('images/btn_ticn.png') }}" /></a>
			            		</div>
		            		</div>
	            		</div>
            		@endif
            		<div class="row">
            			<div class="col-md-4">
            				<h2 style="color:#000;">Current Issues: </h2>
            			</div>
            			<div class="col-md-6">
            				@if($time == 0)
            				@else
            					<h2 style="color:#000;">Current Waiting Time: {{ $time }} Minutes</h2>
            				@endif
            			</div>
            		</div>
            	</div>
            	<?php
	            	$top_articles = DB::table('top_articles')->first();
	       			$count = count($top_articles);
            	?>
            	@if(!$count)
            	@else
            		<!------------------------------ ONE ------------------------------>
            		@if(! $top_articles->article_one)
            		@else
            		<?php
            			$one = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_one)->first();
            		?>
	            	<a href="{{ url('descknow/'.$one->knowledge_category_id.'/'.$one->sub_knowledge_category_id.'/'.$top_articles->article_one) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10">
					    			{{ $one->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ TWO ------------------------------>
					@if(! $top_articles->article_two)
            		@else
					<?php
            			$two = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_two)->first();
            		?>
	            	<a href="{{ url('descknow/'.$two->knowledge_category_id.'/'.$two->sub_knowledge_category_id.'/'.$top_articles->article_two) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10">
					    			{{ $two->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ THREE ------------------------------>
					@if(! $top_articles->article_three)
            		@else
					<?php
            			$three = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_three)->first();
            		?>
	            	<a href="{{ url('descknow/'.$three->knowledge_category_id.'/'.$three->sub_knowledge_category_id.'/'.$top_articles->article_three) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $three->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ FOUR ------------------------------>
					@if(! $top_articles->article_four)
            		@else
					<?php
            			$four = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_four)->first();
            		?>
	            	<a href="{{ url('descknow/'.$four->knowledge_category_id.'/'.$four->sub_knowledge_category_id.'/'.$top_articles->article_four) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $four->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ FIVE ------------------------------>
					@if(! $top_articles->article_five)
            		@else
					<?php
            			$five = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_five)->first();
            		?>
	            	<a href="{{ url('descknow/'.$five->knowledge_category_id.'/'.$five->sub_knowledge_category_id.'/'.$top_articles->article_five) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $five->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ SIX ------------------------------>
					@if(! $top_articles->article_six)
            		@else
					<?php
            			$six = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_six)->first();
            		?>
	            	<a href="{{ url('descknow/'.$six->knowledge_category_id.'/'.$six->sub_knowledge_category_id.'/'.$top_articles->article_six) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $six->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ SEVEN ------------------------------>
					@if(! $top_articles->article_seven)
            		@else
					<?php
            			$seven = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_seven)->first();
            		?>
	            	<a href="{{ url('descknow/'.$seven->knowledge_category_id.'/'.$seven->sub_knowledge_category_id.'/'.$top_articles->article_seven) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $seven->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ EIGHT ------------------------------>
					@if(! $top_articles->article_eight)
            		@else
					<?php
            			$eight = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_eight)->first();
            		?>
	            	<a href="{{ url('descknow/'.$eight->knowledge_category_id.'/'.$eight->sub_knowledge_category_id.'/'.$top_articles->article_eight) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $eight->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ NINE ------------------------------>
					@if(! $top_articles->article_nine)
            		@else
					<?php
            			$nine = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_nine)->first();
            		?>
	            	<a href="{{ url('descknow/'.$nine->knowledge_category_id.'/'.$nine->sub_knowledge_category_id.'/'.$top_articles->article_nine) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $nine->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
					<!------------------------------ TEN ------------------------------>
					@if(! $top_articles->article_ten)
            		@else
					<?php
            			$ten = DB::table('knowledge_article')->where('knowledge_article_id', $top_articles->article_ten)->first();
            		?>
	            	<a href="{{ url('descknow/'.$ten->knowledge_category_id.'/'.$ten->sub_knowledge_category_id.'/'.$top_articles->article_ten) }}">
						<div class="knowlist">
							<div class="row">
								<div class="col-md-10"">
					    			{{ $ten->knowledge_article_title }}
					    		</div>
					    		<div class="col-md-2 text-right">
									<div class="glyphicon glyphicon-expand"></div>
								</div>
							</div>
						</div>
					</a>
					@endif
            	@endif
            </div>
            @if(!$ctech)
            	<br />
	            <br />
	            <br />
	            <div class="row">
	                <div class="col-md-6" style="text-align:right;">
	                    <a href="{{ url('ticketing') }}"  target="_blank"><img src="{{ asset('images/btn_ticketus.png') }}" /></a>
	                </div>
	                <div class="col-md-3">
	                    <script type="text/javascript">
	                        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,'http://support.51talk.com/scripts/track.js',
	                    function(e){ chatButton = LiveAgent.createButton('24c13fca', e); });
	                    </script>
	                </div>
	            </div>
            @else
            
            @endif
        </div>
    </div>
</div>
@include('../layouts/footer3')