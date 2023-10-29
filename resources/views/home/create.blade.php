<x-layout>
	<div class="container col-xl-10 col-xxl-8 px-3 ">
    <div class="row align-items-center g-lg-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">JRASU Student Registration Form</h1>
        <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius ac ex sollicitudin imperdiet. Morbi egestas sit amet justo et iaculis. Praesent eget sem malesuada, porttitor magna et, accumsan mi. Pellentesque vel eleifend lacus. Fusce eros arcu, posuere sed pulvinar bibendum, egestas sit amet nibh</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        {{-- Server response alert message for submission success or not --}}
        {{-- <x-server-response/> --}}
        <form method="POST" action="{{ url('/students/registration/') }}"
          enctype="multipart/form-data"
          class="p-4 p-md-5 border rounded-3 bg-light">
          @csrf {{-- to prevent crosssite scripting attacks--}}
          <label class="mb-2">Account Information</label>
          <div class="form-floating mb-2">
            <input type="text" placeholder="Email" autocomplete="off"
              class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
              id="email" name="email" value="{{ old('email') }}"/>
            <div class="invalid-feedback">
              @error('email')
                {{ $message }}
              @enderror
            </div>
            <label for="email">Email <span class="text-danger">*</span></label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" placeholder="Password"
              class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
              id="password" name="password" value="{{ old('password') }}"/>
            <div class="invalid-feedback">
              @error('password')
                {{ $message }}
              @enderror
            </div>
            <label for="password">Password <span class="text-danger">*</span></label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" placeholder="Confirm Password"
              class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
              id="password_confirmation" name="password_confirmation"
              value="{{ old('password_confirmation') }}"/>
            <div class="invalid-feedback">
              @error('password_confirmation')
                {{ $message }}
              @enderror
            </div>
            <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
          </div>
          <div class="mb-3">
            <label class="mb-2">Student Information</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" placeholder="Full Name" autocomplete="off"
              class="form-control {{ $errors->has('fullName') ? 'is-invalid' : '' }}"
              id="fullName" name="fullName" value="{{ old('fullName') }}"/>
            <div class="invalid-feedback">
              @error('fullName')
                {{ $message }}
              @enderror
            </div>
            <label for="fullName">Full Name <span class="text-danger">*</span></label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select {{ $errors->has('yearLevel') ? 'is-invalid' : '' }}"
              id="yearLevel" name="yearLevel">
              <option value="" @if(old('yearLevel') === null) selected @endif>
              -- SELECT --</option>
              <option value="1st year" @if(old('yearLevel') === '1st year') selected @endif>
              1st year</option>
              <option value="2nd year" @if(old('yearLevel') === '2nd year') selected @endif>
              2nd year</option>
              <option value="3rd year" @if(old('yearLevel') === '3rd year') selected @endif>
              3rd year</option>
              <option value="4th year" @if(old('yearLevel') === '4th year') selected @endif>
              4th year</option>
            </select>
            <div class="invalid-feedback">
              @error('yearLevel')
                {{ $message }}
              @enderror
            </div>
            <label for="yearLevel">Year Level <span class="text-danger">*</span></label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select {{ $errors->has('course') ? 'is-invalid' : '' }}"
              id="course" name="course">
              <option value="" @if(old('course') === null) selected @endif>
              -- SELECT --</option>
              <option value="BS in Anti-Silos" @if(old('course') === 'BS in Anti-Silos') selected @endif>BS in Anti-Silos</option>
              <option value="BS in Romantic Relations" @if(old('course') === 'BS in Romantic Relations') selected @endif>BS in Romantic Relations</option>
              <option value="BS in Silos Rights" @if(old('course') === 'BS in Silos Rights') selected @endif>BS in Silos Rights</option>
              <option value="BS in Boybestfriend Execution" @if(old('course') === 'BS in Boybestfriend Execution') selected @endif>BS in Boybestfriend Execution</option>
            </select>
            <div class="invalid-feedback">
              @error('course')
                {{ $message }}
              @enderror
            </div>
            <label for="course">Course <span class="text-danger">*</span></label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select {{ $errors->has('section') ? 'is-invalid' : '' }}"
              id="section" name="section">
              <option value="" @if(old('section') === null) selected @endif>
              -- SELECT --</option>
              <option value="Sana All Mapanghe" @if(old('section') === 'Sana All Mapanghe') selected @endif>Sana All Mapanghe</option>
              <option value="Ako nalang kasi" @if(old('section') === 'Ako nalang kasi') selected @endif>Ako nalang kasi</option>
              <option value="I miss you" @if(old('section') === 'I miss you') selected @endif>I miss you</option>
              <option value="Di kita gaganunin" @if(old('section') === 'Di kita gaganunin') selected @endif>Di kita gaganunin</option>
            </select>
            <div class="invalid-feedback">
              @error('section')
                {{ $message }}
              @enderror
            </div>
            <label for="section">Section<span class="text-danger">*</span></label>
          </div>
          <div class="mb-3">
            <label class="mb-2">Student Profile</label>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="profile">
              <i class="fa-solid fa-image text-muted"></i>
            </label>
            <input type="file" class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}"
              name="profile" id="profile" accept="images/.png, .jpg, .jpeg"
            />
            <div class="invalid-feedback">
              @error('profile')
                {{ $message }}
              @enderror
            </div>
          </div>

          <button class="btn btn-primary btn-lg w-100 mb-1 border-0" type="submit">
            Submit</button>
          <a href="/" class="btn btn-light btn-lg w-100 border-0">Back</a>
          <hr class="my-4">
          <p class="text-center"><small class="text-muted">&copy; 2023 Jack Roberto Anti-Selos University</small></p>
        </form>
      </div>
    </div>
  </div>
</x-layout>