@include('templates.admin.head')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">
        @include('templates.admin.nav')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 h5 mb-4"><span class="text-muted fw-light">UI elements /</span> Alerts</h4>
            @yield('content')
        </div>
    </div>
</div>
@include('templates.admin.footer')
