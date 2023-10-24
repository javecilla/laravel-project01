@props(['student']) {{-- enclose this card to props --}}

<div class="col-md-3">
	<x-card class="mb-3">
		<img src="{{asset('/images/default.profile.jpg')}}" class="card-img-top" alt="..." loading="lazy"/>
		<div class="card-body">
			<h5 class="card-title">{{$student->name}}</h5>
			<a href="/?year={{urlencode($student->year)}}" class="badge text-bg-primary rounded-pill text-decoration-none">
				{{$student->year}}</a>
			<a href="/?course={{urlencode($student->course)}}" class="badge text-bg-primary rounded-pill text-decoration-none">
				{{$student->course}}</a>
			<a href="/?section={{urlencode($student->section)}}" class="badge text-bg-primary rounded-pill text-decoration-none">
				{{$student->section}}</a>
			<p class="card-text">
				Some quick example text to build on the card title and make up the bulk of the card's content.
			</p>
			<p class="card-text"><small class="text-body-secondary">Posted on October 24, 2023</small></p>
			<div id="action" class="float-end">
				<a href="/students/forum/{{$student->sid}}/" class="btn btn-light btn-sm border-0">
					<i class="fa-solid fa-comment"></i> Comment  <span class="countComments">0</span>
				</a>
				<a href="#" class="btn btn-secondary btn-sm border-0">
					<i class="fa-solid fa-thumbs-up"></i> Like <span class="countLikes">0</span>
				</a>
			</div>
		</div>
	</x-card>
</div>