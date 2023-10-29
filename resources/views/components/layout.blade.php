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
	<link href="{{asset('/toastr/toastr.min.css')}} " rel="stylesheet"/>
</head>
<body>
	<nav class="navbar bg-body-tertiary sticky-top mb-4">
  		<div class="container">
    		<a class="navbar-brand" href="{{ (auth()->user()) ? '/student/posts' : '/' }}">
	    		<img src="{{asset('/images/logo.png')}}" alt="Favicon" width="90" height="75" loading="lazy"/>
	    		<span class="text-muted"><strong>JRASU.EDU.PH</strong></span>
	    	</a>
    		<button class="navbar-toggler border-0 btn"
    			type="button" data-bs-toggle="offcanvas"
    			data-bs-target="#offcanvasDarkNavbar"
    			aria-controls="offcanvasDarkNavbar"
    			aria-label="Toggle navigation">
     			<i class="fa-solid fa-bars fs-3"></i>
    		</button>
    		<div class="offcanvas offcanvas-end text-bg-light"
    			tabindex="-1" id="offcanvasDarkNavbar"
    			aria-labelledby="offcanvasDarkNavbarLabel">
			   <div class="offcanvas-header">
			      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">JRASU.EDU.PH</h5>
			      <button type="button" class="btn-close btn-close-dark"
			      data-bs-dismiss="offcanvas" aria-label="Close"></button>
			   </div>
		     	<div class="offcanvas-body">
		        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
		        		@auth
		        			<li class="nav-item">
		            		<a class="btn" href="/student/profile">
		            			<i class="fa-solid fa-user"></i> Profile
		            		</a>
		          		</li>
			          	<li class="nav-item">
			          		<form action="{{ url('/users/logout') }}" method="POST">
			          			@csrf
							     		<button type="submit" class="btn bg-none">
							     			<i class="fa-solid fa-right-from-bracket"></i> Logout
							     		</button>
			            	</form>
			          	</li>
		        		@else
			          	<li class="nav-item">
			            	<a class="btn" href="/students/registration/">
			            		<i class="fa-solid fa-user-plus"></i> Register
			            	</a>
			          	</li>
			          	<li class="nav-item">
			            	<a class="btn" href="/auth/login/">
			            		<i class="fa-solid fa-right-to-bracket"></i> Login
			            	</a>
			          	</li>
		          	@endauth
		        	</ul>
      		</div>
    		</div>
  		</div>
	</nav>
	<main id="mainContainer">
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
</body>
<script src="{{asset('/jquery/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('/toastr/toastr.min.js')}}"></script>
<script src="{{asset('/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('/bootstrap/js/bootstrap.min.js')}} "></script>
<x-server-response/>
</html>