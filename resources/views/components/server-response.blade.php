@if(session('success'))
  <div role="alert"
  	x-data="{show: true}"
  	x-init="setTimeout(() => show = false, 2000)"
  	x-show="show"
  	class="alert alert-success d-flex align-items-center" >
    <i class="fa-solid fa-circle-check"></i>&nbsp;
    <div>{{ session('success') }}</div>
  </div>
@elseif(session('error'))
  <div role="alert"
  	x-data="{show: true}"
  	x-init="setTimeout(() => show = false, 2000)"
  	x-show="show"
  	class="alert alert-danger d-flex align-items-center" >
    <i class="fa-solid fa-circle-exclamation"></i>&nbsp;
    <div>{{ session('error') }}</div>
  </div>
@endif