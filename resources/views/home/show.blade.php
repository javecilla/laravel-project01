<x-layout>
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col-md-7">
					<x-card class="mb-3">
					  <div class="row g-0">
					    <div class="col-md-4">
					      	<img class="img-fluid rounded-start"
					      		alt="Student Profile" loading="lazy"
								src="{{ ($post->student->profile)
									? asset('/storage/' . $post->student->profile)
									: asset('/images/default.profile.jpg') }}"
					      	/>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">{{ $post->student->name }}
					        	<span class="float-end">
					        		<a href="{{ (auth()->user()) ? '/student/posts/' : '/' }}"
					        		class="btn btn-light btn-sm border-0">
					        		<i class="fa-solid fa-arrow-left"></i> Back</a>
					        	</span>
					        </h5>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{ $post->student->year }}
								  </span>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{ $post->student->course }}
								  </span>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{ $post->student->section }}
								  </span>
								  <p class="card-text">
								  		{{ $post->description }}
								 	</p>
					        <p class="card-text"><small class="text-body-secondary">Posted on October 24, 2023</small></p>
					      </div>
					    </div>
					  </div>
					</x-card>
				</div>
				<div class="col-md-5">
					<x-card class="border-0" >
						<form action="{{ url('/comment/post') }}" method="POST" accept-charset="UTF-8">
							@csrf
							<input type="hidden" name="post_id" value="{{ $post->pid }}"/>
					    	<div class="input-group">
						    	<div class="form-floating">
									<textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
									placeholder="Leave a comment here"
									id="commentText" name="comment"></textarea>

									<label for="commentText">Write your comments</label>
									<div class="invalid-feedback">
										@error('comment')
						                	{{ $message }}
						              	@enderror
									</div>
								</div>
								<button type="submit" class="input-group-text" id="basic-addon2">
									<i class="fa-solid fa-paper-plane"></i>&nbsp; Send
								</button>
							</div>
					 	</form>
						<div class="accordion accordion-flush" id="accordionFlushExample">
							@if($comments->count() > 0)
								@foreach ($comments as $comment)
							  	<div class="accordion-item">
								    <h2 class="accordion-header">
								      <button class="accordion-button collapsed"
								      	type="button"
								      	data-bs-toggle="collapse"
								      	data-bs-target="#flushcollapseOne{{$comment->cid}}"
								      	aria-expanded="false"
								      	aria-controls="flush-collapseOne">
								       <a class="navbar-brand" href="#">
			    							<img src="{{ ($comment->student->profile)
											? asset('/storage/' . $comment->student->profile)
											: asset('/images/default.profile.jpg') }}"
			    							class="rounded-circle"
			    							alt="Student Profile"
			    							width="30" height="30"
			    							loading="lazy"/>
			    							{{ ($comment->student->name)
			    								? $comment->student->name
			    								: 'Anonymous '}}
			    							<p><small class="text-muted">
			    								Commented on {{ $comment->created_at->format('F d, Y') }}</small>
			    							</p>
			    						</a>
								      </button>
								    </h2>
							    	<div id="flushcollapseOne{{$comment->cid}}" class="accordion-collapse collapse"
							    		data-bs-parent="#accordionFlushExample">
								      	<div class="accordion-body">
								      		{{ $comment->context }}
								      	</div>
							    	</div>
							  	</div>
						  		@endforeach
						  	@else
						  		<h4 class="text-center text-muted mt-3">Opps! There is no comment records found. <i class="fa-regular fa-face-sad-tear"></i></h4>
						  	@endif
						</div>
					</x-card>
				</div>
			</div>
		</div>
		</div>
	</div>
</x-layout>