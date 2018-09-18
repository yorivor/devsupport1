@include('layouts/header2')
<div class="page-body">
    <div class="page-content">
        <div class="page-centerize">
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
                <a href="{{ url('agent_page') }}" class="btn btn-primary">Proceed to Chat</a>
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
    <div class="page-content">
        <div class="page-centerize">
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
                <a href="{{ url('agent_page') }}" class="btn btn-primary">Proceed to Chat</a>
            </div>
        </div>
    </div>
</div>
@include('layouts/footer4')