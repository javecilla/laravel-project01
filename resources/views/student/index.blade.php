<x-layout>
@include('partial._hero') {{-- include the hero content --}}
@include('partial._search') {{-- include the search bar --}}
	<div class="container">
		<div class="row">
			{{-- Check if this data empty or not --}}
			@if($students->count() == 0)
				<h4 class="text-center text-muted">Opps! No record found. <i class="fa-regular fa-face-sad-tear"></i></h4>
			@else
				@foreach($students as $student)
					{{-- Call the card student component --}}
					<x-student-card :student="$student"/>
		  	@endforeach
		  @endif
		</div>
	</div>
@include('partial._pagination') {{-- include the pagination --}}
</x-layout>