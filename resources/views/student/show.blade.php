<x-layout>
	<div class="container">
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col-md-8">
					{{-- call the card component --}}
					<x-card class="mb-3" style="max-width: 700px;">
					  <div class="row g-0">
					    <div class="col-md-4">
					      <img src="{{asset('/images/default.profile.jpg')}}" class="img-fluid rounded-start"
					      	alt="..." loading="lazy"/>
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">{{$student->name}}
					        	<span class="float-end"><a href="/" class="btn btn-light btn-sm border-0"><i class="fa-solid fa-arrow-left"></i> Back</a></span>
					        </h5>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{$student->year}}
								  </span>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{$student->course}}
								  </span>
								  <span class="badge text-bg-primary rounded-pill">
								  	{{$student->section}}
								  </span>
								  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					        <p class="card-text"><small class="text-body-secondary">Posted on October 24, 2023</small></p>
					      </div>
					    </div>
					  </div>
					</x-card>
				</div>
				<div class="col-md-4">
					<x-card class="border-0" style="max-width: 700px;">
						<form action="" method="POST" accept-charset="utf-8">
					    <div class="input-group">
						    <div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
									<label for="floatingTextarea">Write your comments</label>
								</div>
								<button type="button" class="input-group-text" id="basic-addon2">
									<i class="fa-solid fa-paper-plane"></i>&nbsp; Send
								</button>
							</div>
					 	</form>
						<div class="accordion accordion-flush" id="accordionFlushExample">
						  <div class="accordion-item">
						    <h2 class="accordion-header">
						      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
						       <a class="navbar-brand" href="#">
	    								<img src="{{asset('/images/students/javecilla.png')}}"
	    									class="rounded-circle"
	    									alt="Student Profile" width="28" height="26"/>
	    								Jerome Avecilla <p><small class="text-muted">Commented on October 24, 2023</small></p>
	    							</a>
						      </button>
						    </h2>
						    <div id="flush-collapseOne" class="accordion-collapse collapse"
						    data-bs-parent="#accordionFlushExample">
						      <div class="accordion-body">
						      	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius ac ex sollicitudin imperdiet. Morbi egestas sit amet justo et iaculis. Praesent eget sem malesuada, porttitor magna et, accumsan mi. Pellentesque vel eleifend lacus. Fusce eros arcu, posuere sed pulvinar bibendum, egestas sit amet nibh.
						      </div>
						    </div>
						  </div>
						</div>
					</x-card>
				</div>
			</div>
		</div>
		</div>
	</div>
</x-layout>