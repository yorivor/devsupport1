@include('layouts/header2')
<div class="page-body">
    <div class="page-content">
        <div class="page-centerize">
            <div class="outage-title">
                {{ $article_outage->article_title }}
            </div>
            <div class="outage-subtitle">
                Posted on <span class="info-text">{{ date('F d, Y', strtotime($article_outage->article_date)) }}</span> by <span class="info-text">{{ $article_outage->article_creator }}</span>
            </div>
            <br />
            <div class="content-article">
               {!! $article_outage->article_content !!}
            </div>
            <br />
        </div>
    </div>
</div>
@include('layouts/footer2')