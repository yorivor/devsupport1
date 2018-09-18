@include('layouts/header2')
<div class="page-body">
    <div class="page-contentlist">
        <div class="page-centerize">
            <div class="page-listing" style="color:#000;">
            	<div class="knowborder">
            		<h2>Knowledge Base - {{ $headings }}</h2>
            	</div>
	           	<div>
					<div>
						<h2>{{ $title_article }}</h2>
	            		{!! $content_article !!}
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-10"></div>
	            	<div class="col-md-2 text-right">
                    <br />
                    @if($sub == 0)
                    	<a href="{{ url('knowsubcat/'.$knowid) }}" class="btn btn-info">Back</a>
                    @else
                    	<a href="{{ url('knowsublist/'.$knowid.'/'.$sub) }}" class="btn btn-info">Back</a>
                    @endif
                  </div>
	            </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
    <div class="row">
        <div class="col-sm-9 text-center">
            <h5>Knowledge Base - {{ $headings }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <h4>{{ $title_article }}</h4>
            {!! $content_article !!}
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-10"></div>
        <div class="col-md-2">
          <br />
          @if($sub == 0)
            <a href="{{ url('knowsubcat/'.$knowid) }}" class="btn btn-info">Back</a>
          @else
            <a href="{{ url('knowsublist/'.$knowid.'/'.$sub) }}" class="btn btn-info">Back</a>
          @endif
        </div>
    </div>
    <br />
    <br />
    <br />
</div>
@include('layouts/footer2')