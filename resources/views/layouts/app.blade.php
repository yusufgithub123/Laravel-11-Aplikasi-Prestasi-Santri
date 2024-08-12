<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    
@include('partials.sidebar')
    
<main class="content">
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

</main>

@include('partials.script')  

</body>
</html>
