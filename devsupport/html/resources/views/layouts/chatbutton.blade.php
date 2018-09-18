@if(! $count_outage)
<a href="{{ URL('lstoparticles') }}" target="_blank"><img src="{{ asset('images/supportbutton.png') }}" class="button-chat-left" /></a>

<a href="{{ URL('baseknowledge') }}" target="_blank"><img src="{{ asset('images/chatbuttonpng.png') }}" class="button-chat" /></a>
@else
@endif