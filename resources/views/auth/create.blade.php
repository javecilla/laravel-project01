<x-layout>
	<div class="container col-xl-10 col-xxl-8 px-3">
    <div class="row align-items-center g-lg-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">JRASU Student Portal</h1>
        <p class="col-lg-10 fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius ac ex sollicitudin imperdiet. Morbi egestas sit amet justo et iaculis. Praesent eget sem malesuada, porttitor magna et, accumsan mi. Pellentesque vel eleifend lacus. Fusce eros arcu, posuere sed pulvinar bibendum, egestas sit amet nibh</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form method="POST" action="{{ url('/users/autheticate/') }}"
        class="p-4 p-md-5 border rounded-3 bg-light">
          @csrf
          <label class="mb-2">Login your account</label>
          <div class="form-floating mb-2">
            <input type="text" autocomplete="off"  placeholder="Email"
              class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
              id="email" name="email"
              value="{{ old('email') }}"
            />
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
              id="password" name="password"
              value="{{ old('password') }}"
            />
            <div class="invalid-feedback">
              @error('password')
                {{ $message }}
              @enderror
            </div>
            <label for="password">Password <span class="text-danger">*</span></label>
          </div>
          <div class="mb-3"></div>
          <button class="btn btn-primary btn-lg w-100 mb-1 border-0" type="submit">
            Login</button>
          <a href="/" class="btn btn-light btn-lg w-100 border-0">Back</a>
          <hr class="my-4">
          <p class="text-center"><small class="text-muted">&copy; 2023 Jack Roberto Anti-Selos University</small></p>
        </form>
      </div>
    </div>
  </div>
</x-layout>