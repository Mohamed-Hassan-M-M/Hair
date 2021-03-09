<!DOCTYPE html>
<html lang="en">
@include('website.includes.head')
<body>

<div class="site-wrap">

    @include('website.includes.header')

    @include('website.includes.navbar')

    @yield('content')

    @include('website.includes.footer')

</div>

@include('website.includes.script')
@yield('script')
</body>
</html>
