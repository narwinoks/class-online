<div class="col-lg-2">
    <div style="border-radius: 10px ;" class="card  shadow-sm border-0 sticky-top d-none d-lg-block">
        <div class="card-body p-2 p-xl-3">
            <ul class="nav nav-pills flex-column border-0">
                <a class="nav-link d-flex flex-column text-center py-3" href="/learn">
                    <span class="icon-nav text-success"><i class="fas fa-home"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">Dashboard</span></div>
                </a>
                <a class="nav-link d-flex flex-column text-center py-3" href="/learn">
                    <span class="icon-nav text-success"><i class="fas fa-map"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">My
                            Roadmap</span></div>
                </a>
                <a class="nav-link d-flex flex-column text-center py-3" href="{{ route('member.my-course.index') }}">
                    <span class="icon-nav text-success"><i class="fas fa-book"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">My
                            Courses</span></div>
                </a>
                <a class="nav-link d-flex flex-column text-center py-3" href="{{ route('member.order.index') }}">
                    <span class="icon-nav text-success"><i class="fas fa-shopping-cart"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">My
                            Order</span></div>
                </a>
                <a class="nav-link d-flex flex-column text-center py-3" href="{{ route('member.profile.index') }}">
                    <span class="icon-nav text-success"><i class="fas fa-user"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">My
                            Profile</span></div>
                </a>
                <a class="nav-link d-flex flex-column text-center py-3"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                    style="cursor: pointer;">
                    <span class="icon-nav text-success"><i class="fas fa-arrow-right"></i></span>
                    <div class="fw-semilight text-muted small"><span class="d-none d-xl-block">
                            Logout</span></div>
                    <form action="{{ route('auth.prosesLogout') }}" class="d-none" method="POST" id="logout-form">
                        @method('DELETE')
                        @csrf
                    </form>
                </a>
            </ul>
        </div>
    </div>
</div>
