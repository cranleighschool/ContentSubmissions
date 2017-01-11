<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cranleigh Marketing - @yield('title')</title>

    <!-- Styles -->
   <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	
    <!-- Fonts -->
    


	<script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({
		selector:'textarea.wysiwyg',
		height:250,
		menubar:false,
		plugins: "paste",
		paste_as_text: true,
		toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | forecolor backcolor',
	});</script>
	@yield('head')
</head>
<?php

	$s = new App\Schools();
	?>
<body id="app-layout" class="{{ $s->get_site() }}">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cranleigh Marketing
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class=""><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									<input type="submit" value="logout" style="display: none;">
								</form>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- #app-navbar-collapse -->
        </div><!-- .container -->
    </nav>

    @yield('content')

    <!-- JavaScripts -->
	<script src="{{ elixir('js/app.js') }}"></script>
	@yield('footer-scripts')
</body>
</html>
