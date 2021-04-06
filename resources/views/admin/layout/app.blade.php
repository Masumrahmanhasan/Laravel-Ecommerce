<!DOCTYPE html>
<html lang="en">
@include('admin.partials.head')
<body>

@include('admin.partials.menu')
@include('admin.partials.navbar')

    <div class="sl-mainpanel">
        @yield('content')
    </div>

@include('admin.partials.scripts')

</body>
</html>
