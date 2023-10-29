<x-layout>
	<div class="container">
		@include('partial._hero') {{-- include the hero content --}}
		@include('partial._search') {{-- include the search bar --}}
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