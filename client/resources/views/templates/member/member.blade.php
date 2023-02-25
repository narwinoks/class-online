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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</body>

</html>
