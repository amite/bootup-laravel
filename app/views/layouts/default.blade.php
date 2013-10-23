<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="{{ Config::get('application.language') }}"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="{{ Config::get('application.language') }}"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="{{ Config::get('application.language') }}"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="{{ Config::get('application.language') }}"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8;FF=3;OtherUA=4" />
    <title>{{ (!empty($head->title) ? $head->title . ' - ' : '') }} @lang('app.app.name')</title>
    <meta name="description" content="{{ (!empty($head->description) ? $head->description : Lang::get('app.app.description')) }}">
    <meta name="author" content="Ellipse Synergie">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//google-analytics.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//code.jquery.com">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" type="text/css">
    
    {{ HTML::style('assets/plugins/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/css/common.css') }}
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="assets/plugins/bootstrap/plugins/html5shiv.js"></script>
      <script src="assets/plugins/bootstrap/plugins/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container col-md-6 col-md-offset-3">
        
        @yield('content')

    </div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	{{ HTML::script('assets/js/jquery.js') }}
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	{{ HTML::script('assets/plugins/bootstrap/js/bootstrap.min.js') }}
	@if (App::environment() == 'production')
    <script>
        <!-- Google Analytics -->
    </script>
    @endif
</body>
</html>
