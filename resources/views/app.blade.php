<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"> <![endif]-->
<!--[if !IE]><!-->
<html class="app sidebar sidebar-fusion sidebar-kis footer-sticky navbar-sticky"><!-- <![endif]-->
	<head>
		<title>Genera Documentos</title>

		<!-- Meta -->
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

		<!-- CSS DEFINITION -->
		<link rel="shortcut icon" href="{{ asset('public/img/logo.png') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/base-styles.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('public/css/admin.css') }}" />

		@yield('css')

		<script>
			if (/*@cc_on!@*/false && document.documentMode === 10) {
				document.documentElement.className+=' ie ie10';
			}
		</script>

	</head>

	<body class="scripts-async menu-right-hidden">
		<!-- Main Container Fluid -->
		<div class="container-fluid menu-hidden">
			@include('menu')
			<!-- Content -->
			<div id="content">
				@include('navbar')
				<div class="layout-app">
					@yield('contenido')
				</div>
			</div>

			<!-- // Content END -->
			<div class="clearfix"></div>

			<!-- Footer -->
			<div id="footer" class="hidden-print">
				<!--  Copyright Line -->
				<div class="copy">&copy; {{ date('Y') }} - <a href="#">Control de Documentos Internos</a> - Unidad de Informática - Sistemas</div>
				<!--  End Copyright Line -->
			</div>
			<!-- Footer END -->
		</div>

		<script data-id="App.Config">
			var basePath           = '',
					commonPath             = '/assets/',
					rootPath               = '',
					DEV                    = false,
					componentsPath         = '/assets/components/',
					layoutApp              = false,
					module                 = 'admin';

			var primaryColor       = '#013f78',
					dangerColor            = '#b55151',
					successColor           = '#609450',
					infoColor              = '#4a8bc2',
					warningColor           = '#ab7a4b',
					inverseColor           = '#45484d';

			var themerPrimaryColor = primaryColor;
		</script>

		<script src="{{ asset('public/js/base-scripts.js') }}"></script>
		@yield('js')
	</body>
</html>