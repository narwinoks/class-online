@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.roadmap.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $roadMap['id'] }}" name="id">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Form Edit RoadMap</h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name"
                                aria-describedby="name-helper" name="name" value="{{ old('name', $roadMap['name']) }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" placeholder="Price"
                                        aria-describedby="name-helper" name="price"
                                        value="{{ old('price', $roadMap['price']) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="type" class="form-label">Type</label>
                                    <select id="type" class="form-select" name="type">
                                        <option value="">Type</option>
                                        <option value="free">Free</option>
                                        <option value="premium">Premium</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select id="level" class="form-select" name="level">
                                <option value="">Level</option>
                                @foreach ($level as $key => $value)
                                    <option value="{{ $value }}" @selected($value == $roadMap['level'])>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $roadMap['description']) }}</textarea>
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

                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        </div>
                    </div>

                </div>
            </div>
    </form>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="{{ $roadMap['logo'] }}" alt="{{ $roadMap['id'] }}">
            </div>
        </div>
    </div>
    </div>
@endsection
@push('styles')
    <style>
        .cropit-preview {
            width: 120px;
            height: 100px;
        }

        .cropit-preview-image-container {
            width: 120px;
            height: 100px;
        }

        .cropit-preview-image {
            min-width: 120px;
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
