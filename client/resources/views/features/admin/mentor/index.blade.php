@extends('templates.admin.main')
@section('content')
    <div class="row">
        @foreach ($mentors as $key => $mentor)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="dropdown btn-pinned">
                            <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                            </ul>
                        </div>
                        <div class="mx-auto mb-3">
                            <img src="{{ $mentor['profile'] }}" alt="Avatar Image" class="rounded-circle w-px-100">
                        </div>
                        <h5 class="mb-1 card-title">{{ $mentor['name'] }}</h5>
                        <span>{{ $mentor['profession'] }}</span>
                        <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                            <a href="javascript:;" class="me-1"><span class="badge bg-label-danger">Angular</span></a>
                            <a href="javascript:;"><span class="badge bg-label-info">React</span></a>
                        </div>

                        <div class="d-flex align-items-center justify-content-around my-4 py-2">
                            <div>
                                <h4 class="mb-1">112</h4>
                                <span>Projects</span>
                            </div>
                            <div>
                                <h4 class="mb-1">23.1k</h4>
                                <span>Tasks</span>
                            </div>
                            <div>
                                <h4 class="mb-1">1.28k</h4>
                                <span>Connections</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="btn btn-label-primary d-flex align-items-center me-3"><i
                                    class="bx bx-user-plus me-1"></i>Connect</a>
                            <a href="javascript:;" class="btn btn-label-secondary btn-icon"><i
                                    class="bx bx-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
