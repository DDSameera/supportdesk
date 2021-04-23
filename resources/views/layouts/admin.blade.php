<!doctype html>
<html lang="en">
@include('layouts.inc.header',["title"=>$title])
<body>
@include('layouts.inc.navbar')
<div class="container container-fluid">
    @yield('content')
</div>
@include('layouts.inc.footer')
</body>
</html>
