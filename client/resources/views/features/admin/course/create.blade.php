@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.course.store') }}">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Form Add Banner</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
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
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="type" class="form-label">Level</label>
                                <select id="type" class="form-select" name="level">
                                    <option value="">Level</option>
                                    @foreach ($level as $key => $lev)
                                        <option @selected(old('level') == $lev) value="{{ $lev }}">{{ $lev }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label">Kategori</label>
                                <select id="type" class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    <option value="">Type</option>
                                    @foreach ($categories as $key => $category)
                                        <option @selected(old('category_id') == $lev) value="{{ $category['id'] }}">
                                            {{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div id="category_id" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="type" class="form-label">Roadmap</label>
                                <select id="type" class="form-select @error('roadmap_id') is-invalid @enderror"
                                    name="roadmap_id">
                                    <option value="">Type</option>
                                    @foreach ($roadmaps as $key => $roadmap)
                                        <option @selected(old('roadmap_id') == $lev) value="{{ $roadmap['id'] }}">
                                            {{ $roadmap['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('roadmap_id')
                                    <div id="roadmap_id" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select id="type" class="form-select" name="type">
                                    <option value="">Type</option>
                                    <option value="free">Free</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price"
                                    aria-describedby="price-helper" name="price" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="type" class="form-label">Mentor</label>
                                    <select id="type" class="form-select @error('mentor_id') is-invalid @enderror"
                                        name="mentor_id">
                                        <option value="">Mentor</option>
                                        @foreach ($mentors as $key => $mentor)
                                            <option @selected(old('mentor_id') == $mentor['id']) value="{{ $mentor['id'] }}">
                                                {{ $mentor['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('mentor_id')
                                        <div id="mentor_id" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea class="form-control" name="excerpt" id="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <label for="full-editor" class="form-label">Description</label>
                                <textarea class="form-control" id="full-editor" rows="6" name="description">{{ old('description') }}</textarea>
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
                                <input type="hidden" name="thumbnail"
                                    class="hidden-image-data @error('thumbnail') is-invalid @enderror" />
                                @error('thumbnail')
                                    <div id="thumbnail" class="invalid-feedback">
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
    <link rel="stylesheet" href="{{ asset('assets/admin/') }}/assets/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/') }}/assets/vendor/libs/quill/editor.css" />
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
    <!-- Vendors JS -->
    <script src="{{ asset('assets/admin/') }}/assets/vendor/libs/quill/katex.js"></script>
    <script src="{{ asset('assets/admin/') }}/assets/vendor/libs/quill/quill.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/admin/') }}/assets/js/forms-editors.js"></script>
@endpush
