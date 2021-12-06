<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout/head')
</head>

<body>
    <div class="container-scroller">
        @include('layout/nav')

        <div class="container-fluid page-body-wrapper">
            @include('layout/sidebar')
            <div class="main-panel">
                @yield('content')
                @include('layout/footer')
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    @include('layout/js')
</body>

</html>
