@include('templates.member.head')
<style>
        .icon-nav {
        font-size: 20px;
    }

    main {
        height: 100vh;
    }
    </style>
<main class="bg-light">
    @include('templates.member.nav')
    <section style="padding-top: 150px;">
        <div class="container">
            <div class="row justify-content-between">
                 @include('templates.member.sidebar')
                <div class="col-lg-10 text-muted px-4 px-lg-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</main>
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('assets/plugins/swiper/swiper-element-bundle.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/plugins/bs-notify.min.js')}}"></script>
@stack('scripts')
@include('components.alert')
</body>
</html>
