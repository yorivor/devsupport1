<!-- Script -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{ asset('js/jquery.nanoscroller.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(".nano").nanoScroller();
</script>
@if($menu == 5)
<a href="{{ URL('lstoparticles') }}" target="_blank"><img src="{{ asset('images/supportbutton.png') }}" class="button-chat-left" /></a>

<a href="{{ URL('baseknowledge') }}" target="_new"><img src="{{ asset('images/chatbuttonpng.png') }}" class="button-chat" /></a>
@else
	@include('layouts/chatbutton')
@endif
</body>
</html>