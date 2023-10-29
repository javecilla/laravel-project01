{{-- Message Alert --}}
@if(session('success') || session('error'))
	<script>
	  jQuery(document).ready(function() {
	    toastr.options = {
	     	"debug": false,
	     	"rtl": false,
	     	"newestOnTop": false,
	     	"preventDuplicates": false,
	     	"progressBar": true,
	    	"showDuration": "300",
      		"hideDuration": "1000",
	     	"timeOut": 3000,
	     	"extendedTimeOut": 0,
	     	"closeButton": true,
	     	"closeMethod": 'fadeOut',
	     	"closeEasing": 'swing',
	     	"hideEasing": "linear",
	     	"showMethod": "fadeIn",
       		"hideMethod": "fadeOut",
	    	"positionClass": 'toast-bottom-right',
	    };

	    @if(session('success'))
	      toastr.success("{{ session('success') }}");
	    @else
	      toastr.error("{{ session('error') }}");
	    @endif
	  });
	</script>
@endif