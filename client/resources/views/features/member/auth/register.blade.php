@extends('templates.member.main')
@section('content')
    <main class="bg-light" id="main" style="padding-top: 150px;padding-bottom: 150px">
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 my-auto">
                        <div class="card card-rounded border-0 shadow">
                            <div class="card-body m-4 m-md-5 rounded-3">
                                <div class="text-center mb-4">
                                    <h3 class="text-secondary">Register</h3>
                                </div>
                                <form method="POST" action="{{ route('auth.prosesRegister') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-envelope"></i></span>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="Email" aria-label="email" name="email"
                                            aria-describedby="basic-addon1" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="password" aria-label="password"
                                            aria-describedby="basic-addon1" name="password" value="{{old('password')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                        <input type="password" class="form-control" placeholder="confirm password"
                                            aria-label="Username" aria-describedby="basic-addon1" id="confirmPassword"
                                            name="password_confirmation" value="{{old('password_confirmation')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="toggleConfirmPassword">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success border-0 btn-lg">Login</button>
                                    </div>
                                </form>
                                <div class="text-center my-5">
                                    <a href="{{route('auth.prosesLogin')}}" class="text-decoration-none text-muted">have an account?
                                        Login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        /* Add click event listener to the toggle button */
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // Toggle the type attribute of the password input field
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye icon on the button
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        /* Add click event listener to the toggle button */
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirPassword = document.querySelector('#confirmPassword');
        toggleConfirmPassword.addEventListener('click', function(e) {
            // Toggle the type attribute of the password input field
            const type = confirPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirPassword.setAttribute('type', type);
            // Toggle the eye icon on the button
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@endpush
@push('styles')
    <style>
        /* Hide the password input field by default */
        #password {
            padding-right: 2.5rem;
        }

        /* Style the toggle button */
        #togglePassword {
            position: absolute;
            right: 0;
            z-index: 2;
            margin-top: -1.5rem;
        }
    </style>
@endpush
