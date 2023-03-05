@extends('templates.admin.main')
@section('content')
    <button class="btn btn-success btn-sm my-5 btn-add-lesson" data-id="{{ $chapter['id'] }}">Add Lesson</button>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <h5 class="card-header">Chapters</h5>
                <div class="card-body">
                    <div class="card mb-3 border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $chapter['name'] }}</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-edit-chapter"
                                data-id="{{ $chapter['id'] }}" data-course="{{ $chapter['course_id'] }}">Edit</a>
                            {{-- <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-chapter"
                                data-id="{{ $chapter['id'] }}">Delete</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="row">
                    <h5 class="card-header">Detail Lessons</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($lessons as $key => $lesson)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-img-top overflow-hidden">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/{{ $lesson['video'] }}?rel=0"></iframe>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lesson['name'] }}</h5>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated
                                                {{ \Carbon\Carbon::parse($lesson['createdAt'])->diffForHumans() }}</small>
                                        </p>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-edit-lesson"
                                            data-id="{{ $lesson['id'] }}" data-lesson="{{ $lesson['chapter_id'] }}">Edit</a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-lesson"
                                            data-id="{{ $lesson['id'] }}">Delete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
@push('scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });
            editChapter();
            saveEditChapter();
            deleteChapters();
            addLesson();
            saveLesson();
            editLesson();
            updateLesson();
            deleteLessons();
        })

        function editChapter() {
            $("body").on("click", ".btn-edit-chapter", function(e) {
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

        function showError(msg) {
            $("#error-alert").text("Error: " + msg).show();
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

        function addLesson() {
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

        function editLesson() {
            $(".btn-edit-lesson").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: '{{ route('admin.lessons.edit') }}',
                    data: {
                        chapter_id: $(this).attr("data-lesson"),
                        id: $(this).attr("data-id"),
                        key: "edit_lesson",
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
                        window.location.reload();
                    },
                    error: function(err) {
                        showError(err.responseJSON.message);
                    }
                });
            });
        }

        function updateLesson() {
            $("body").on("click", ".edit-lesson", function(e) {
                var chapter_id = $("#chapter_id").val();
                var name = $("#chapter").val();
                var video = $("#video").val();
                var id = $("#lesson_id").val();
                $.ajax({
                    type: "PUT",
                    url: '{{ route('admin.lessons.update') }}',
                    data: {
                        id: id,
                        chapter_id: chapter_id,
                        name: name,
                        video: video
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

        function deleteLessons() {
            $("body").on("click", ".delete-lesson", function(e) {
                var lessonId = $(this).attr("data-id");
                $.ajax({
                    type: "DELETE",
                    url: '{{ route('admin.lessons.delete') }}',
                    data: {
                        id: lessonId,
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
    </script>
@endpush
