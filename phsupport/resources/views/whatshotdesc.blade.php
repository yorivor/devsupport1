@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing" style="color:#000;">
            	<div class="knowborder">
            		<h2 style="color:#000;">What's Hot - {{ $whatshot_cat->what_title }}</h2>
            	</div>
	           	<div class="nano" style="height:700px;">
					<div class="nano-content">
						<h2>{{ $whatshot->title }}</h2>
	            		{!! $whatshot->content !!}
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-10"></div>
	            	<div class="col-md-2 text-right">
                    <br />
                    	<a href="{{ url('whatshotlist/'.$id) }}" class="btn btn-info">Back</a>
                  </div>
	            </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
    <div class="row">
        <div class="col-sm-9 text-center">
            <h5>What's Hot - {{ $whatshot_cat->what_title }} -</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <h4>{{ $whatshot->title }}</h4>
            {!! $whatshot->content !!}
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <br />
            <a href="{{ url('whatshotlist/'.$id) }}" class="btn btn-info">Back</a>
        </div>
    </div>
    <br />
    <br />
    <br />
</div>
@include('layouts/footer2')