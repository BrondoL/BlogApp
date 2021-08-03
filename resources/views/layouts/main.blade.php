<!doctype html>
<html lang="en">

@include('layouts.header')

<body>
    @include('layouts.navbar')

    <div class="container mt-3">
        @yield('content')
    </div>

    @include('layouts.script')
</body>

</html>
