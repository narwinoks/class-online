@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.categories.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $category['id'] }}" name="id">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Default</h5>
                    <div class="card-body">
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name"
                                aria-describedby="name-helper" name="name" value="{{ old('name', $category['name']) }}">
                        </div>
                        <div class="my-3">
                            <div class="image-editor">
                                <input type="file" class="cropit-image-input mb-3">
                                <div class="cropit-preview"></div>
                                <div class="image-size-label">
                                    Resize image
                                </div>
                                <input type="range" class="cropit-image-zoom-input">
                                <input type="hidden" name="logo" class="hidden-image-data" />
                                <input type="hidden" name="logo_old" value="{{ $category['logo'] }}" />

                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm" type="submit">Upload</button>
                        </div>
                    </div>

                </div>
            </div>
    </form>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{ $category['logo'] }}" width="100px" alt="">
            </div>
        </div>
    </div>
    </div>
@endsection
@push('styles')
    <style>
        .cropit-preview {
            width: 100px;
            height: 100px;
        }

        .cropit-preview-image-container {
            width: 100px;
            height: 100px;
        }

        .cropit-preview-image {
            min-width: 100px;
            min-height: 100px;
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
