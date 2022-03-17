@if(!empty(config('dz.public.global.js')))
	@foreach(config('dz.public.global.js') as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
@if(!empty(config('dz.public.pagelevel.js.'.$action)))
	@foreach(config('dz.public.pagelevel.js.'.$action) as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif
	<!--		<script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>
			<script src="{{ asset('js/deznav-init.js') }}" type="text/javascript"></script> -->
<!--	{{-- Education Theme JS --}}
 @if(!empty(config('dz.public.education.pagelevel.js.'.$action)))
	@foreach(config('dz.public.education.pagelevel.js.'.$action) as $script)
			<script src="{{ asset($script) }}" type="text/javascript"></script>
	@endforeach
@endif	-->