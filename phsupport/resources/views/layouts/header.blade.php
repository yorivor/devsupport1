<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
	    <meta property="og:image" content="{{ URL::asset('/images/logo.png') }}" />
	    <meta property="og:title" content="51 Talk PH Support" />
	    <title>51Talk PH Support Portal | Teach. Learn. Earn.</title>
	    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/mobile.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/mouseparallax.css') }}" />
		<!--<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.pagepiling.css') }}" />-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/marquee.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/nanoscroller.css') }}" />
		<link href="{{ asset('bxslider/jquery.bxslider.css') }}" rel="stylesheet">

		<!-- javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/mobile_menu.js') }}"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="{{ asset('bootstrap-dist/css/bootstrap.css') }}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="{{ asset('bootstrap-dist/css/bootstrap-theme.css') }}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="{{ asset('bootstrap-dist/js/bootstrap.js') }}"></script>
		<script src="https://dev.zopim.com/web-sdk/latest/web-sdk.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120993506-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-120993506-2');
		</script>
	</head>
<body>
<div class="nav">
	<div class="nav-body">
		<div class="port-title">
			PH Support Page
		</div>
		<div id="menu" class="menu">
			<a id="hm" class="btn-menu active" href="#home">Home</a>
			<a class="btn-menu" href="{{ URL('knowledgebase') }}">Knowledge Base</a>
			<a class="btn-menu" href="{{ URL('whatshot') }}" target="_new">What's Hot</a>
			<a class="btn-menu" href="http://support.51talk.com/submit_ticket" target="_new">Submit Ticket</a>
			<a class="btn-sign" href="http://support.51talk.com/login" target="_new">Sign in</a>
		</div>
	</div>
</div>
<div class="mobile-nav">
	<div class="logo-m">
		<img src="images/logo.png" style="width:100%;" />
	</div>
	<button id="btn-menu" class="btn-menu" onclick="show_menu(1)">
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
	</button>
</div>
<div class="menu-hover" id="menu2">
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-menu active" href="#home">Home</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-menu" href="#about">About</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-menu" href="{{ URL('knowledgebase') }}">Knowledge Base</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-menu" href="http://support.51talk.com/submit_ticket" target="_new">Submit Ticket</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-sign" href="http://support.51talk.com/login" target="_new">Sign in</a>
	</div>
</div>
