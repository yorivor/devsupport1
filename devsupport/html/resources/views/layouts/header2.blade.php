<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
	    <meta property="og:image" content="{{ URL::asset('/images/logo.png') }}" />
	    <meta property="og:title" content="51 Talk PH Support" />
	    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	    <title>51Talk PH Support Portal | Teach. Learn. Earn.</title>
	    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/outage.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/mobile.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/nanoscroller.css') }}" />
		<!-- javascript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="{{ asset('js/mobile_menu.js') }}"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="{{ asset('bootstrap-dist/css/bootstrap.css') }}"  crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="{{ asset('bootstrap-dist/css/bootstrap-theme.css') }}" crossorigin="anonymous">

		<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">

		<!-- Latest compiled and minified JavaScript -->
		<script src="{{ asset('bootstrap-dist/js/bootstrap.js') }}" crossorigin="anonymous"></script>

		<script src="{{ asset('js/bootstrap-datetimepicker.js') }}" crossorigin="anonymous"></script>

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
			<a class="btn-menu" href="{{ URL('/#home') }}">Home</a>
			<a class="btn-menu" href="{{ URL('knowledgebase') }}">Knowledge Base</a>
			<a class="btn-menu" href="{{ URL('whatshot') }}" target="_new">What's Hot</a>
			<a class="btn-menu" href="http://support.51talk.com/submit_ticket" target="_new">Submit Ticket</a>
			<a class="btn-sign" href="http://support.51talk.com/login" target="_new">Sign in</a>
		</div>
	</div>
</div>
<div class="mobile-nav">
	<div class="logo-m">
		<img src="{{ url('images/logo.png') }}" style="width:100%;" />
	</div>
	<button id="btn-menu" class="btn-menu" onclick="show_menu(1)">
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
		<div style="border-radius:1px; height:2px; background:#fff; width:22px; margin-bottom:5px;">&nbsp;</div>
	</button>
</div>
<div class="menu-hover" id="menu2">
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a data-menuanchor="home" class="btn-menu active" href="{{ URL('/') }}">Home</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a data-menuanchor="about" class="btn-menu" href="{{ URL('/#about') }}">About</a>
	</div>
	<div style="font-size: 16px;padding: 10px; border-bottom:1px solid #9b4d00;">
		<a class="btn-menu" href="{{ URL('articlelist') }}">Downtime Advisory</a>
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