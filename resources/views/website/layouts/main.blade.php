<!DOCTYPE html>
<html lang="en">
	@include('website.partials.head')
    @include('website.partials.styles')
	<body>
    @include('website.partials.navigation')
		
    @yield('content')

    @include('website.partials.foot')
    @include('website.partials.scripts')

    @yield('scripts')

	</body>
</html>