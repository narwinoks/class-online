@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.banner.update') }}">
        @csrf
        <input type="hidden" value="{{ $banner['id'] }}" name="id">
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Default</h5>
                    <div class="card-body">
                        <div>
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="title"
                                aria-describedby="title-helper" name="title" value="{{ old('title', $banner['title']) }}">
                        </div>
                        <div class="mb-3">
                            <label for="defaultSelect" class="form-label">Default select</label>
                            <select id="defaultSelect" class="form-select" name="type">
                                <option value="">Default select</option>
                                @foreach ($types as $key => $type)
                                    <option @selected($banner['type'] == $type) value="{{ $type }}">{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $banner['description']) }}</textarea>
                        </div>
                        <div class="my-3">
                            <div class="image-editor">
                                <input type="file" class="cropit-image-input mb-3">
                                <div class="cropit-preview"></div>
                                <div class="image-size-label">
                                    Resize image
                                </div>
                                <input type="range" class="cropit-image-zoom-input">
                                <input type="hidden" name="image_data" class="hidden-image-data" />

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
                <img width="300px" src="{{ $banner['image'] }}" alt="">
            </div>
        </div>
    </div>
    </div>
@endsection
@push('styles')
    <style>
        .cropit-preview {
            width: 600px;
            height: 200px;
        }

        .cropit-preview-image-container {
            width: 600px;
            height: 200px;
        }

        .cropit-preview-image {
            min-width: 600px;
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
