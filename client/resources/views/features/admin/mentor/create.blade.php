@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.mentor.store') }}">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Form Add Banner</h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="name" class="form-label">Title</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        id="name" placeholder="Name" aria-describedby="name-helper" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div id="name" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email Address" aria-describedby="email-helper"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div id="email" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <label for="profession" class="form-label">Profession</label>
                                <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                    id="profession" placeholder="Profession" aria-describedby="profession-helper"
                                    name="profession">
                                @error('profession')
                                    <div id="profession" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="image-editor">
                                <input type="file" class="cropit-image-input mb-3">
                                <div class="cropit-preview"></div>
                                <div class="image-size-label">
                                    Resize image
                                </div>
                                <input type="range" class="cropit-image-zoom-input">
                                <input type="hidden" name="profile"
                                    class="hidden-image-data @error('profile') is-invalid @enderror" />
                                @error('profile')
                                    <div id="profile" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                    </div>

                </div>
            </div>
    </form>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>
    </div>
@endsection
@push('styles')
    <style>
        .cropit-preview {
            width: 200px;
            height: 200px;
        }

        .cropit-preview-image-container {
            width: 200px;
            height: 200px;
        }

        .cropit-preview-image {
            min-width: 200px;
            min-height: 200px;
        }
    </style>
@endpush
@push('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery.cropit.js') }}"></script>zz
    <script>
        $(function() {
            $('.image-editor').cropit({
                imageState: {
                    src: '{{ asset('img/default-image.jpg') }}'
                },
                exportZoom: 1.5,
                imageBackground: false,
                imageBackgroundBorderWidth: 20
            });

            $('form').submit(function() {
                var imageData = $('.image-editor').cropit('export', {
                    type: 'image/jpeg',
                    quality: 0.75
                });
                console.log(imageData);
                $('.hidden-image-data').val(imageData);

                return true;
            });
        });
    </script>
@endpush
