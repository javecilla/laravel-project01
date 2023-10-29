<x-layout>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<x-card class="mb-3 bg-light border-0">
					<div class="card-header">Account Information</div>
					<form method="POST" action="{{ url('/update/account') }}"
        				class="p-2 p-md-4 border rounded-3 bg-light">
        				@csrf
        				@method('PUT')
        				<input type="hidden" name="user_id" value="{{ $student->user->uid }}" />
						<div class="form-floating mb-2">
				         <input type="text" placeholder="Email"
				            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
				            id="email" name="email"
				            value="{{ $student->user->email }}"
				         />
	            		<div class="invalid-feedback">
	            			@error('email')
				               {{ $message }}
				            @enderror
	            		</div>
	            		<label for="email">Email </label>
	          		</div>
				      <div class="form-floating mb-2">
				         <input type="password" placeholder="Old Password"
				            class="form-control {{ $errors->has('password_old') ? 'is-invalid' : '' }}"
				            id="password_old" name="password_old"
				            value="{{ old('password_old') }}"
				         />
				         <div class="invalid-feedback">
					        	@error('password_old')
				               {{ $message }}
				            @enderror
				         </div>
				         <label for="password_old">Old Password <span class="text-danger">*</span></label>
				     	</div>
				      <div class="form-floating mb-2">
				         <input type="password" placeholder="New Password"
				            class="form-control {{ $errors->has('password_new') ? 'is-invalid' : '' }}"
				            id="password_new" name="password_new"
				            value="{{ old('password_new') }}"
				         />
				         <div class="invalid-feedback">
				         	@error('password_new')
				               {{ $message }}
				            @enderror
				         </div>
				         <label for="password_new">New Password <span class="text-danger">*</span></label>
				      </div>
	          		<button class="btn btn-primary btn-lg w-100 mb-1 border-0" type="submit">
	            	Update Account</button>
          		</form>
				</x-card>
			</div>
			<div class="col-md-8">
				<x-card class="mb-3 bg-light border-0">
					<div class="card-header">Student Information</div>
					<form method="POST" action="{{ url('/update/information') }}"
						enctype="multipart/form-data"
        				class="p-2 p-md-4 border rounded-3 bg-light">
        				@csrf
        				@method('PUT')
						<div class="row g-0">
					    	<div class="col-md-4">
					    		<input type="hidden" name="student_id" value="{{ $student->sid }}" />
					      	<img src="{{ ($student->profile) ? asset('/storage/' . $student->profile)
					   			: asset('/images/default.profile.jpg') }}"
					      		class="img-fluid rounded-start" alt="Student Profile"
					      		loading="lazy"
					      	/>
					      	<div class="input-group mb-3">
					            <input type="file"  accept="images/.png, .jpg, .jpeg"
					            	class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}"
					              name="profile" id="profile"
					            />
					            <div class="invalid-feedback">
						         	@error('profile')
						               {{ $message }}
						            @enderror
				         		</div>
					         </div>
					    	</div>
					    	<div class="col-md-8">
					      	<div class="card-body">
					      		<div class="form-floating mb-2">
						            <input type="text" placeholder="Full Name" autocomplete="off"
						              class="form-control" name="fullName" value="{{ $student->name }}"/>
						            <div class="invalid-feedback"></div>
						            <label for="fullName">Full Name</label>
						         </div>
					        		<div class="form-floating mb-2">
						            <select class="form-select" id="yearLevel" name="yearLevel">
						              <option value="1st year" {{ ($student->year === '1st year') ?  'selected' : ''}}>
						              1st year</option>
						              <option value="2nd year" {{ ($student->year === '2nd year') ?  'selected' : ''}}>
						              2nd year</option>
						              <option value="3rd year" {{ ($student->year === '3rd year') ?  'selected' : ''}}>
						              3rd year</option>
						              <option value="4th year" {{ ($student->year === '4th year') ?  'selected' : ''}}>
						              4th year</option>
						            </select>
						            <div class="invalid-feedback"></div>
						            <label for="fullName">Year</label>
						         </div>
						         <div class="form-floating mb-2">
						            <select class="form-select" id="course" name="course">
						              <option value="BS in Anti-Silos" {{ ($student->course === 'BS in Anti-Silos') ?  'selected' : ''}}>
						              BS in Anti-Silos</option>
						              <option value="BS in Romantic Relations" {{ ($student->course === 'BS in Romantic Relations') ?  'selected' : ''}}>
						              BS in Romantic Relations</option>
						              <option value="BS in Silos Rights" {{ ($student->course === 'BS in Silos Rights') ?  'selected' : ''}}>
						              BS in Silos Rights</option>
						              <option value="BS in Boybestfriend Execution" {{ ($student->course === 'BS in Boybestfriend Execution') ?  'selected' : ''}}>
						              BS in Boybestfriend Execution</option>
						            </select>
						            <div class="invalid-feedback"></div>
						            <label for="course">Course</label>
						         </div>
						         <div class="form-floating mb-2">
						            <select class="form-select" id="section" name="section">
						              <option value="Sana All Mapanghe" {{ ($student->section === 'Sana All Mapanghe') ?  'selected' : ''}}>
						              Sana All Mapanghe</option>
						              <option value="Ako nalang kasi" {{ ($student->section === 'Ako nalang kasi') ?  'selected' : ''}}>
						              Ako nalang kasi</option>
						              <option value="I miss you" {{ ($student->section === 'I miss you') ?  'selected' : ''}}>
						              I miss you/option>
						              <option value="Di kita gaganunin" {{ ($student->section === 'Di kita gaganunin') ?  'selected' : ''}}>
						              Di kita gaganunin</option>
						            </select>
						            <div class="invalid-feedback"></div>
						            <label for="section">Section</label>
						         </div>
					      	</div>
					    	</div>
					  	</div>
					  	<button class="btn btn-primary btn-lg w-100 mb-1 border-0" type="submit">
	            	Update Information</button>
				  </form>
				</x-card>
			</div>
		</div>
	</div>
</x-layout>