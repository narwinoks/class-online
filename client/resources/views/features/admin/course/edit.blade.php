@extends('templates.admin.main')
@section('content')
    <form method="POST" action="{{ route('admin.course.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $course['id'] }}" name="id">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <h5 class="card-header">Form Edit Course</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                            id="name" placeholder="Name" aria-describedby="name-helper" name="name"
                                            value="{{ old('name', $course['name']) }}">
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
                                <label for="type" class="form-label">Status</label>
                                <select id="type" class="form-select @error('status') is-invalid @enderror"
                                    name="status">
                                    <option value="">Status</option>
                                    <option @selected($course['status'] == 'published') value="published">Published</option>
                                    <option @selected($course['status'] == 'draft') value="draft">Draft</option>
                                </select>
                                @error('status')
                                    <div id="status" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="type" class="form-label">Level</label>
                                <select id="type" class="form-select" name="level">
                                    <option value="">Level</option>
                                    @foreach ($level as $key => $lev)
                                        <option @selected(old('level') == $lev || $lev == $course['level']) value="{{ $lev }}">{{ $lev }}
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
                                        <option @selected(old('category_id') == $category['id'] || $category['id'] == $course['category_id']) value="{{ $category['id'] }}">
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
                                        <option @selected(old('roadmap_id') == $roadmap['id'] || $roadmap['id'] == $course['roadmap_id']) value="{{ $roadmap['id'] }}">
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
                                    <option @selected($course['type'] == 'free') value="free">Free</option>
                                    <option @selected($course['type'] == 'premium') value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price"
                                    aria-describedby="price-helper" name="price"
                                    value="{{ old('price', $course['price']) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <label for="type" class="form-label">Mentor</label>
                                    <select id="type" class="form-select @error('mentor_id') is-invalid @enderror"
                                        name="mentor_id">
                                        <option value="">Mentor</option>
                                        @foreach ($mentors as $key => $mentor)
                                            <option @selected(old('mentor_id') == $mentor['id'] || $course['mentor_id'] == $course['mentor_id']) value="{{ $mentor['id'] }}">
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
                            <div class="col-md-6">
                                <label for="type" class="form-label">Type</label>
                                <select id="type" class="form-select" name="type">
                                    <option value="">Type</option>
                                    <option @selected(true) value="free">Free</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <label for="excerpt" class="form-label">Excerpt</label>
                                <textarea class="form-control" name="excerpt" id="excerpt" rows="3">{{ old('excerpt', $course['excerpt']) }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div>
                                <label for="full-editor" class="form-label">Description</label>
                                <div id="full-editor">
                                    {{ $course['description'] }}
                                </div>
                                <input type="hidden" name="description" value="{{ $course['description'] }}">
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
                                <input type="hidden" value="{{ $course['thumbnail'] }}" name="thumbnail_old">
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
        <div class="card mb-4">
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-5" id="add-chapters" data-id="{{ $course['id'] }}">Add
                    Chapters</button>
                @foreach ($chapters as $key => $chapter)
                    <div class="card mb-3 border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $chapter['name'] }}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-edit-lesson"
                                data-id="{{ $chapter['id'] }}" data-course="{{ $chapter['course_id'] }}">Edit</a>
                            <button type="button" data-id="{{ $chapter['id'] }}"
                                class="btn btn-success btn-sm btn-add-lesson">
                                Add Lesson
                            </button>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-chapter"
                                data-id="{{ $chapter['id'] }}">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <!--modal box -->
    <div class="modal fade" id="modal-lessons-show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>
    <!--end modal -->
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
                    src: '{{ $course['thumbnail'] }}'
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
    <script src="{{ asset('assets/admin/assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/quill/quill.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/admin/assets/js/forms-editors.js') }}"></script>
    <script>
        const editor = document.getElementById('full-editor');
        const hiddenInput = document.querySelector('input[name="description"]');
        editor.addEventListener('input', () => {
            hiddenInput.value = editor.innerText;
        });
    </script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            buttonAdd();
            saveLesson();
            addChapters();
            saveChapters();
            deleteChapters();
            editChapter();
            saveEditChapter();
        })


        function buttonAdd() {
            $(".btn-add-lesson").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.lessons.create') }}',
                    data: {
                        chapter_id: $(this).attr("data-id"),
                        key: "add_lesson",
                    },
                    success: function(data) {
                        $(".modal-content").html(data);
                        $("#modal-lessons-show").modal("show");
                    },
                });
            });
        }

        function saveLesson() {
            $("body").on("click", ".save-lessons", function(e) {
                var chapter_id = $("#chapter_id").val();
                var name = $("#chapter").val();
                var video = $("#video").val();
                console.log(name);
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.lessons.store') }}',
                    data: {
                        chapter_id: chapter_id,
                        name: name,
                        video: video
                    },
                    success: function(data) {
                        toastr.success('Success !', 'Success', {
                            timeOut: 3000
                        });
                        $("#modal-lessons-show").modal("hide");
                    },
                    error: function(err) {
                        showError(err.responseJSON.message);
                    }
                });
            });
        }

        function showError(msg) {
            $("#error-alert").text("Error: " + msg).show();
        }


        function addChapters() {
            $("#add-chapters").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.chapters.create') }}',
                    data: {
                        course_id: $(this).attr("data-id"),
                        key: "add_chapters",
                    },
                    success: function(data) {
                        $(".modal-content").html(data);
                        $("#modal-lessons-show").modal("show");
                    },
                });
            });
        }

        function saveChapters() {
            $("body").on("click", ".save-chapter", function(e) {
                var course_id = $("#course_id").val();
                var name = $("#chapter").val();
                var description = $("#description").val();
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.chapters.store') }}',
                    data: {
                        course_id: course_id,
                        name: name,
                    },
                    success: function(data) {
                        toastr.success('Success !', 'Success', {
                            timeOut: 3000
                        });
                        $("#modal-lessons-show").modal("hide");
                        window.location.reload();
                    },
                    error: function(err) {
                        showError(err.responseJSON.message);
                    }
                });

            });

        }

        function deleteChapters() {
            $("body").on("click", ".delete-chapter", function(e) {
                var chapterId = $(this).attr("data-id");
                $.ajax({
                    type: "DELETE",
                    url: '{{ route('admin.chapters.delete') }}',
                    data: {
                        id: chapterId,
                    },
                    success: function(data) {
                        toastr.success('Success !', 'Success', {
                            timeOut: 3000
                        });
                        window.location.reload();
                    },
                    error: function(err) {
                        showError(err.responseJSON.message);
                    }
                });
            });
        }

        function editChapter() {
            $("body").on("click", ".btn-edit-lesson", function(e) {
                var chapterId = $(this).attr("data-id");
                var course_id = $(this).attr("data-course");
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.chapters.edit') }}',
                    data: {
                        id: chapterId,
                        key: "edit_chapters",
                        course_id: course_id,
                    },
                    success: function(data) {
                        $(".modal-content").html(data);
                        $("#modal-lessons-show").modal("show");
                    },
                });
            });
        }

        function saveEditChapter() {
            $("body").on("click", ".update-chapter", function(e) {
                var id = $("#id_chpater").val();
                var name = $("#chapter").val();
                var description = $("#description").val();
                var course_id = $("#course_id").val();

                $.ajax({
                    type: "PUT",
                    url: '{{ route('admin.chapters.update') }}',
                    data: {
                        id: id,
                        name: name,
                        course_id: course_id
                    },
                    success: function(data) {
                        toastr.success('Success !', 'Success', {
                            timeOut: 3000
                        });
                        $("#modal-lessons-show").modal("hide");
                        window.location.reload();
                    },
                    error: function(err) {
                        showError(err.responseJSON.message);
                    }
                });
            });
        }
    </script>
@endpush
