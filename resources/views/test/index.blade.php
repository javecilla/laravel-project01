<h4>Hello</h4>

{{-- @foreach($users as $user)
	<h1>{{ $user->name }}</h1>
	<p>{{ $user->student->year }}</p>
@endforeach --}}

@foreach($posts as $post)
	<h1>{{ $post->student_id }}</h1>
	<p>{{ $post->student->name }}</p>
	<p>{{ $post->description }}</p>
@endforeach