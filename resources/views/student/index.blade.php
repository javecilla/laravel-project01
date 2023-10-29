<x-layout>
	<div class="container">
		<ul class="nav nav-tabs mb-3">
		  <li class="nav-item">
		    <a class="nav-link {{ (isset($_GET['sid'])) ? 'text-muted' : 'active' }}"
		    href="/student/posts">All Posts</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link {{ (isset($_GET['sid'])) ? 'active' : 'text-muted' }}"
		    href="/student/posts?sid=1">My Posts</a>
		  </li>
		</ul>
		<div class="row">
			<div class="col-md-6">
				@include('partial._search') {{-- include the search bar --}}
			</div>
			<div class="col-md-6">
				<form action="{{ url('/create/post') }}" method="POST" accept-charset="UTF-8">
					@csrf
					<div class="input-group">
						<div class="form-floating">
							<textarea class="form-control {{ $errors->has('post') ? 'is-invalid' : '' }}"
							placeholder="Leave a post here"
							id="postText" name="post"></textarea>
							<label for="postText">What's on your minds?</label>
							<div class="invalid-feedback">
								@error('post')
						         {{ $message }}
						      @enderror
							</div>
						</div>

						<button type="submit" class="input-group-text" id="basic-addon2">
							<i class="fa-solid fa-paper-plane"></i>&nbsp; Post
						</button>
					</div>
				</form>
			</div>
		</div>
		<hr class="text-muted" />
		<div class="row">
			{{-- Check if this data empty or not --}}
			@if($posts->count() == 0)
				<h4 class="text-center text-muted">Opps! No record found. <i class="fa-regular fa-face-sad-tear"></i></h4>
			@else
				@foreach($posts as $post)
					{{-- Call the card student component --}}
					<x-post-card :post="$post"/>
		  		@endforeach
		  	@endif
		</div>
		@include('partial._pagination') {{-- include the pagination --}}
	</div>

</x-layout>