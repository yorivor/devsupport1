
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
