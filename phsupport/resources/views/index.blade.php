@include('layouts/header')
<div id="pagepiling">
	<div class="section" id="home">
		<div class="home-body">
			<div class="home-content">
				<div class="outage-announcement">
					@if(! $count_outage)
					@else
						<div class="marquee">
							@foreach($article_outage as $outage_article)
								<p><a href="{{ url('outage/'.$outage_article->article_id) }}">{{ $outage_article->article_title }}</a></p>
							@endforeach
						</div>
					@endif
				</div>
				<div class="home-bubble bubbling">
					<img src="{{ URL('images/img-bubble.png') }}" class="home-img" />
				</div>
				<div class="home-logo lefty">
					<img src="{{ URL('images/logo2.png') }}" class="home-img" />
				</div>
				<div class="teacher present">
					<img src="{{ URL('images/img-teacher.png') }}" class="home-img" />
				</div>
				<div class="home-massage">
					<div class="msg1 upp">
						Hi Teacher, our Lesson Support Associates are available
					</div>
					<div class="msg2 up">
						Mondays through Sundays, 6:00 AM to 12:00 AM, Beijing Time.
					</div>
				</div>
			</div>
			<br />
			<div class="sliding">
				<?php 
		            $slideshows = DB::table('slide')->get();
		            $count_slideshows = count($slideshows);
		            $date_today = date('Y-m-d');
		        ?>
		        @if(!$count_slideshows)
		        @else
		            <ul class="bxslider">
		            @foreach($slideshows as $slide)
		            	@if($date_today < $slide->start_date)
		                @else
		                	@if($date_today >= $slide->end_date)
		                	@else
			                	<li>
				                    <div class="cont-slide">
				                    	<a target="_new" href="{{ $slide->url }}">
				                        <img class="image" src="{{ asset($slide->image) }}" />
				                        </a>
				                    </div>
				                </li>
			                @endif
		                @endif
		            @endforeach   
		            </ul>             
		        @endif
			</div>
			<div class="home-border"></div>
			<?php 
				$article_advi = DB::table('article')
				->where('article_category', 'Outage')
				->where('article_active', 'Active')->orderBy('article_id', 'desc')->limit(4)->get();
				$count_advi = count($article_advi);
			?>
			@if(! $count_advi)
			@else
				<div class="advisory-section angat">
					<div class="advisory-body">
						@if(! $count_outage)
						<div class="advisory-header">Advisory</div>
						@else
						<div class="advisory-header">Downtime Advisory and Outages</div>
						@endif
						<div class="advisory-list">
							@foreach($article_advi as $advi_article)
								@if($advi_article->article_category == 'Outage')
									<a href="{{ URL('outage/'.$advi_article->article_id) }}">
										<div class="outage-alert">
											{{ $advi_article->article_title }}
										</div>
									</a>
								@else
									<a href="{{ URL('downtime/'.$advi_article->article_id) }}">
										<div class="advisory-title">
											{{ $advi_article->article_title }}
										</div>
									</a>
								@endif
							@endforeach
						</div>
						<!--
						<a href="{{ url('articlelist') }}">
							<div class="downtime_part">
								See More
							</div>
						</a>
						-->
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
<div class="m-place">
	<!-- mobile -->
	<div class="mobile-home" id="home">
		<div class="row">
			<div class="col-sm-9 text-center">
				<img src="{{ URL('images/sup_01.png') }}" class="m-sup" />
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 text-center m-msg">
				<h4>
					Hi Teacher, our Lesson Support Associates are available Mondays through Sundays, 6:00 AM to 12:00 AM, Beijing Time.
				</h4>
			</div>
		</div>
		<div class="row">
			<?php 
				$article_advi = DB::table('article')->where('article_active', 'Active')->orderBy('article_id', 'desc')->limit(4)->get();
				$count_advi = count($article_advi);
			?>
			@if(! $count_advi)
			@else
				<div class="col-md-4 text-center">
					@if(! $count_outage)
					<h3>Advisory</h3>
					@else
					<h3>Downtime Advisory and Outages</h3>
					@endif
				</div>
				<div class="col-sm-9 text-center">
					@foreach($article_advi as $advi_article)					
						@if($advi_article->article_category == 'Outage')
							<a class="btn btn-danger" href="{{ URL('outage/'.$advi_article->article_id) }}">
								{{ $advi_article->article_title }}
							</a>
						@else
							<a class="btn btn-primary" href="{{ URL('downtime/'.$advi_article->article_id) }}">
								{{ $advi_article->article_title }}
							</a>
						@endif
					@endforeach
				</div>
				<br />
				<div class="col-sm-9 text-center">
					<!--
					<a class="btn btn-default" href="{{ url('articlelist') }}">
						See More
					</a>
					-->
				</div>
			@endif
		</div>
	</div>
	<!-- mobile -->
	<div class="mobile-home" id="about">
		<div class="row">
			<div class="abouting">
				<div class="col-sm-9 text-center">
					<h3 style="color:#000;">About Us</h3>
				</div>
				<div class="col-sm-9 text-center">
					<div style="font-size: 10px; padding: 5px;">
						<?php
		    				$whoweare = DB::table('whoweare')->first();
							$count_whoweare = count($whoweare);
		    			 ?>
		    			 @if(! $count_whoweare)
		    			 	No Record!
		    			 @else
		    			 	{!! $whoweare->content !!}
		    			 @endif
					</div>
				</div>
				<div class="col-sm-9 text-center">
					<div style="font-size: 10px; padding: 5px;">
						<?php
		    				$whatwevalue = DB::table('whatwevalue')->first();
							$count_whatwevalue = count($whatwevalue);
		    			 ?>
		    			 @if(! $count_whatwevalue)
		    			 	No Record!
		    			 @else
		    			 	{!! $whatwevalue->content !!}
		    			 @endif
					</div>
				</div>
				<div class="col-sm-9 text-center">
					<div style="font-size: 10px; padding: 5px;">
						<?php
		    				$ourbrand = DB::table('ourbrand')->first();
							$count_ourbrand = count($ourbrand);
		    			 ?>
		    			 @if(! $count_ourbrand)
		    			 	No Record!
		    			 @else
		    			 	{!! $ourbrand->content !!}
		    			 @endif
					</div>
				</div>
				<div class="col-sm-9 text-center">
					<div style="font-size: 10px; padding: 5px;">
						<?php
		    				$ourmission = DB::table('ourmission')->first();
							$count_ourmission = count($ourmission);
		    			 ?>
		    			 @if(! $count_ourmission)
		    			 	No Record!
		    			 @else
		    			 	{!! $ourmission->content !!}
		    			 @endif
					</div>
				</div>
				<div class="col-sm-9 text-center">
					<div style="font-size: 10px; padding: 5px;">
						<?php
		    				$ourvision = DB::table('ourvision')->first();
							$count_ourvision = count($ourvision);
		    			 ?>
		    			 @if(! $count_ourvision)
		    			 	No Record!
		    			 @else
		    			 	{!! $ourvision->content !!}
		    			 @endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts/footer')
