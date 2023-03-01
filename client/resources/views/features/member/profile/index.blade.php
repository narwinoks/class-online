@extends('templates.member.member')
@section('content')
    <section class="main">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" id="preview" src="{{ $user['avatar'] }}"
                            alt="" width="100px">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->

                        <button class="btn btn-success" id="button-image" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('member.profile.update') }}" enctype="multipart/form-data">
                            <input type="file" class="d-none" id="input-image" onchange="preview()" name="avatar">
                            @method('PUT')
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other
                                    users on the site)</label>
                                <input class="form-control" id="inputUsername" name="name" type="text"
                                    placeholder="Enter your username" value="{{ old('username', $user['name']) }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" value="Valerie">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter your last name" value="Luna">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Organization name</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="{{ $user['email'] }}" readonly>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" value="555-123-4567">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                        placeholder="Enter your birthday" value="06/10/1988">
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <!-- change password -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Update Password</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('member.profile.changePassword') }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <label class="small mb-1" for="old_password">Password Old</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-key"></i></span>
                                        <input type="password"
                                            class="form-control  @error('password_old') is-invalid @enderror"
                                            placeholder="Password Old" aria-label="password"
                                            aria-describedby="basic-addon1" name="password_old" id="old_password"
                                            value="{{ old('password_old') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePasswordOld">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password_old')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1" for="new_password">Password Old</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-key"></i></span>
                                        <input type="password"
                                            class="form-control  @error('password') is-invalid @enderror"
                                            placeholder="New Password" aria-label="password"
                                            aria-describedby="basic-addon1" name="password" id="new_password"
                                            value="{{ old('password') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePasswordNew">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 offset-6">
                                    <label class="small mb-1" for="confirm_password">Password Old</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-key"></i></span>
                                        <input type="password"
                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Password Old" aria-label="password"
                                            aria-describedby="basic-addon1" name="confirm_password" id="confirm_password"
                                            value="{{ old('confirm_password') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                id="togglePasswordConfirm">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('#button-image').click(function() {
            $('#input-image').trigger('click');
        });
        $(document).ready(function() {
            $("#button_cahnge_profile").click(function() {
                console.log("success!");
                $("#change-password").removeClass("d-none");
            });
        })

        function preview() {
            var preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush
@push('scripts')
    <script>
        /* Add click event listener to the toggle button */
        const togglePasswordOld = document.querySelector('#togglePasswordOld');
        const password_old = document.querySelector('#old_password');
        togglePasswordOld.addEventListener('click', function(e) {
            // Toggle the type attribute of the password input field
            const type = password_old.getAttribute('type') === 'password' ? 'text' : 'password';
            password_old.setAttribute('type', type);
            // Toggle the eye icon on the button
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });


        /* Add click event listener to the toggle button */
        const togglePasswordNew = document.querySelector('#togglePasswordNew');
        const password_new = document.querySelector('#new_password');
        togglePasswordNew.addEventListener('click', function(e) {
            // Toggle the type attribute of the password input field
            const type = password_new.getAttribute('type') === 'password' ? 'text' : 'password';
            password_new.setAttribute('type', type);
            // Toggle the eye icon on the button
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });


        /* Add click event listener to the toggle button */
        const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
        const password_confirm = document.querySelector('#confirm_password');
        togglePasswordConfirm.addEventListener('click', function(e) {
            // Toggle the type attribute of the password input field
            const type = password_confirm.getAttribute('type') === 'password' ? 'text' : 'password';
            password_confirm.setAttribute('type', type);
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
