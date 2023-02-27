@include('templates.admin.head')
@include('templates.admin.nav')
@include('templates.admin.sidebar')

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('templates.admin.footer')
