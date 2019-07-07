<!doctype html>
<html lang="en">
@section('title', 'Form')
@include('template.frontend.head')

<body>

	@include('template.frontend.header')
	<!-- Begin page content -->
	<div class="container-fluid">
		@yield('content')
	</div>

	@include('template.frontend.footer')
	@include('template.frontend.script')

</body>
</html>