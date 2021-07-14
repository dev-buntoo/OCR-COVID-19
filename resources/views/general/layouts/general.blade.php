<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OCR-COVID-19 | @yield('pageTitle')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    @include('general.partials.style')
    @yield('pageCss')
</head>

<body>


	<div id="fh5co-page">
		<header id="fh5co-header" role="banner">
			<div class="container">
				<div class="header-inner">
					<h1><a href="index.html" class="navbar-brand align-top">
							<img src="{{asset('general/images/logo/logo.png')}}" alt="" width="75px" class="logo-navbar">
						</a></h1>
					<nav role="navigation" class="navbar-expand-md">
						<ul class="text-uppercase">
							<li><a href="{{ route('about')}}">About</a></li>
							<li><a href="work.html">Prevention</a></li>
							<li><a href="services.html">Symptoms</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="cta"><a href="#">Registor</a></li>
							<li class="cta l"><a href="#">login</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

@yield('pageContent')


		<footer id="fh5co-footer" role="contentinfo">

			<div class="container">

				<div class="col-md-12 fh5co-copyright text-center">
					<p>&copy; 2021. All Rights Reserved. <span>Designed with <i
								class="icon-heart"></i> by <a href="#"
								target="_blank"> Haroon Abid Awan (VU ID: BC180200007)</a></span></p>
				</div>

			</div>
		</footer>
	</div>
  @include('general.partials.script')
  @yield('pageScript')
</body>

</html>