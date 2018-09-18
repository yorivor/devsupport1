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
                        <?php
                            $article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->first();
                            $ctech = count($article);
                        ?>
                        <br />
                        <br />
                        <br />
                        <?php
                        $article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->get();
                        $ctech = count($article);
                        ?>

                        @if(!$ctech)
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
                            <div class="row">
                                <div class="col-md-4" style="text-align:left;">
                                    <a href="{{ url('ticketing') }}"  target="_blank"><img src="{{ asset('images/btn_ticketus.png') }}" /></a>
                                </div>
                                <div class="col-md-4">
                                    <script type="text/javascript">
                                        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,'http://support.51talk.com/scripts/track.js',
                                    function(e){ chatButton = LiveAgent.createButton('24c13fca', e); });
                                    </script>
                                </div>
                                <div class="col-md-4" style="text-align:right;">
                                    <a href="{{ url('outage_concern') }}"  target="_blank"><img src="{{ asset('images/btn_outage.png') }}" /></a>
                                </div>
                            </div>
                        @endif
                        
	            	</div>
	            </div>
	            <div class="row">
	            	<div class="col-md-10"></div>
	            	<div class="col-md-2 text-right">
                    <br />
                    <a href="{{ url('baseknowledge') }}" class="btn btn-info">Back</a>
                  </div>
	            </div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-article">
    <div class="knowborder">
                    <h2>Knowledge Base - {{ $headings }}</h2>
                </div>
                <div>
                    <div>
                        <h2>{{ $title_article }}</h2>
                        {!! $content_article !!}
                        <?php
                            $article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->orderBy('article_id', 'desc')->first();
                            $ctech = count($article);
                        ?>
                        <br />
                        <br />
                        <br />
                        <?php
                        $article = DB::table('article')->where('article_category', 'Tech')->where('article_active', 'Active')->get();
                        $ctech = count($article);
                        ?>

                        @if(!$ctech)
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
                            <div class="row">
                                <div class="col-md-4" style="text-align:left;">
                                    <a href="{{ url('ticketing') }}"  target="_blank"><img src="{{ asset('images/btn_ticketus.png') }}" /></a>
                                </div>
                                <div class="col-md-4">
                                    <script type="text/javascript">
                                        (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,'http://support.51talk.com/scripts/track.js',
                                    function(e){ chatButton = LiveAgent.createButton('24c13fca', e); });
                                    </script>
                                </div>
                                <div class="col-md-4" style="text-align:right;">
                                    <a href="{{ url('outage_concern') }}"  target="_blank"><img src="{{ asset('images/btn_outage.png') }}" /></a>
                                </div>
                            </div>
                        @endif
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2 text-right">
                    <br />
                    <a href="{{ url('baseknowledge') }}" class="btn btn-info">Back</a>
                  </div>
                </div>
            </div>
</div>
@include('../layouts/footer3')