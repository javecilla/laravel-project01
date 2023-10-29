@props(['post']) {{-- enclose this card to props --}}

<div class="col-md-3">
	<x-card class="mb-3">
		<img class="card-img-top" alt="Student Profile" loading="lazy" height="270"
			src="{{ ($post->student->profile)
				? asset('/storage/' . $post->student->profile)
				: asset('/images/default.profile.jpg') }}"
		/>
		<div class="card-body">
			<h5 class="card-title">{{ $post->student->name }}</h5>
			<a href="{{ (auth()->user()) ? '/student/posts' : '/' }}?year={{ urlencode($post->student->year) }}"
				class="badge text-bg-primary rounded-pill text-decoration-none">
				{{ $post->student->year }}</a>
			<a href="{{ (auth()->user()) ? '/student/posts' : '/' }}?course={{ urlencode($post->student->course) }}" class="badge text-bg-primary rounded-pill text-decoration-none">
				{{ $post->student->course }}</a>
			<a href="{{ (auth()->user()) ? '/student/posts' : '/' }}?section={{ urlencode($post->student->section) }}" class="badge text-bg-primary rounded-pill text-decoration-none">
				{{ $post->student->section }}</a>
			<p class="card-text">
				{{ $post->description }}
			</p>
			<p class="card-text">
    			<small class="text-body-secondary">
    				Posted on {{ $post->created_at->format('F d, Y') }}
    			</small>
			</p>
			<div id="action" class="float-end">
				<a href="/student/post/{{ $post->pid }}/" class="btn btn-light btn-sm border-0">
					<i class="fa-solid fa-comment"></i> Comment
					<span class="countComments">{{ $post->comments->count() }}</span>
				</a>
				<a href="#" class="btn btn-secondary btn-sm border-0">
					<i class="fa-solid fa-thumbs-up"></i> Like <span class="countLikes">0</span>
				</a>
			</div>
		</div>
	</x-card>
</div>