<?php 
/* OLD outage process
@if(! $count_outage)
	
@else
	<div class="lightbox" id="outage-box">
		<div id="outPopUp">
			<div class="outages">
				<div id="out-btn" class="out-btn">
					<div class="col-md-4">
						<div class="glyphicon glyphicon-exclamation-sign text-left"></div> Outage 
					</div>
					<div class="col-md-4 col-md-offset-4 text-right">
						<button onclick="outage(1)" class="btn btn-danger"><div class="glyphicon glyphicon-remove"></div></button>
					</div>
				</div>
				<div class="outages-article">
					<div class="nano" style="height:500px;">
					    <div class="nano-content">
					    	@foreach($article_outage as $outs_art)
						    	<div class="outages-div">
									<div class="outage-title">
						                {{ $outs_art->article_title }}
						            </div>
						            <div class="outage-subtitle">
						                Posted on <span class="info-text">{{ date('F d, Y', strtotime($outs_art->article_date)) }}</span> by <span class="info-text">{{ $outs_art->article_creator }}</span>
						            </div>
						            <div class="content-article">
						               {!! $outs_art->article_content !!}
						            </div>
						    	</div>
					    	@endforeach
					    	<br />
							<div class="text-right">
								<a href="{{ url('agent_page') }}" class="btn btn-primary">Proceed to Chat</a>
							</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button onclick="outage(2)" class="outage-btn"><div class="glyphicon glyphicon-exclamation-sign"></div> Outage Report</button>
@endif
*/?>
<!-- Script -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{ asset('js/jquery.backgroundPosition.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('js/jquery.pagepiling.min.js') }}" type="text/javascript"></script>-->
<script src="{{ asset('js/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('bxslider/jquery.bxslider.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider({
          mode: 'fade',
          speed: 700,
          captions: false,
          auto: true,
          responsive: true,
          pager: false
        });
    });
</script>
@include('layouts/chatbutton')
</body>
</html>
