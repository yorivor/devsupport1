@include('layouts/header2')
<div class="page-body">
    <div class="page-content">
        <div class="page-centerize">
            <div class="knowborder">
                @if(! $count_outage)
                <h2 style="color:#000;">Advisory</h2>
                @else
                <h2 style="color:#000;">Downtime Advisory</h2>
                @endif
            </div>
            <div class="content-testing">
                <div class="outage-title">
                    {{ $article_outage->article_title }}
                </div>
                <div class="outage-subtitle">
                    Posted on <span class="info-text">{{ date('F d, Y', strtotime($article_outage->article_date)) }}</span>
                </div>
                <br />
                <div class="content-article">
                   {!! $article_outage->article_content !!}
                </div>
            </div>
            <br />
            <div class="text-right">
                <!--
                <a href="{{ url('articlelist') }}">
                    <button class="btn btn-primary">Back to List</button>
                </a>
                -->
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
    <div class="row">
        <div class="col-sm-9 text-center">
            @if(! $count_outage)
            <h3 style="color:#000;">Advisory</h3>
            @else
            <h3 style="color:#000;">Downtime Advisory</h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <h5>{{ $article_outage->article_title }}</h5>
        </div>
        <div class="col-sm-9">
             Posted on <span class="info-text">{{ date('F d, Y', strtotime($article_outage->article_date)) }}</span>
        </div>
        <div class="col-md-6" style="font-size: 11px; padding: 20px;">
             {!! $article_outage->article_content !!}
        </div>
    </div>
    <div class="row text-center">
        <!--
        <a href="{{ url('articlelist') }}">
            <button class="btn btn-primary">Back to List</button>
        </a>
        -->
    </div>
    <br />
    <br />
    <br />
</div>
@include('layouts/footer2')