<!-- Script -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{ asset('js/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(".nano").nanoScroller();
</script>
@if($menu == 5)
	<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'http://support.51talk.com/scripts/track.js',
function(e){ LiveAgent.createButton('2120ab9f', e); });
</script>

<a href="{{ URL('baseknowledge') }}" target="_new"><img src="{{ asset('images/chatbuttonpng.png') }}" class="button-chat" /></a>
@else
	@include('layouts/chatbutton')
@endif
</body>
</html>