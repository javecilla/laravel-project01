<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<link href="{{asset('/images/logo.png')}}" rel="icon" type="image/jpg" sizes="16x16"/>
	<link href="{{asset('/fontawesome/css/all.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4 sticky-top">
	  <div class="container">
	    <a class="navbar-brand" href="/">
	    	<img src="{{asset('/images/logo.png')}}" alt="Favicon" width="90" height="75"/>
	    	<span class="text-muted"><strong>JRASU.EDU.PH</strong></span>
	    </a>
	    <ul class="nav col-md-4 justify-content-end">
	     	<li class="nav-item">
	     		<a href="/students/registration/" class="px-3 btn btn-primary">
	     			<i class="fa-solid fa-user-plus"></i> Register
	     		</a>
	     	</li>&nbsp;
	     	<li class="nav-item">
	     		<a href="/auth/login/" class="px-3 btn btn-secondary"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
	     	</li>
	   </ul>
	  </div>
	</nav>
	<main>
		{{$slot}}
	</main>
	<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container">
    	<p class="col-md-4 mb-0 text-muted">&copy; 2023 Jack Roberto Anti-Selos University</p>
		<a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
		   <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
		</a>
	   <ul class="nav col-md-4 justify-content-end">
	     	<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
	      <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
	   </ul>
  	</footer>

	<script src="{{asset('/fontawesome/js/all.min.js')}}"></script>
	<script src="{{asset('/bootstrap/js/bootstrap.min.js')}} "></script>
	<script src="{{asset('/alpinejs/alpine.min.js')}}" defer></script>
</body>
</html>