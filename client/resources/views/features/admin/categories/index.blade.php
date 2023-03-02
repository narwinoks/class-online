@extends('templates.admin.main')
@section('content')
    <div class="row">
        <div class="">
            <a href="{{ route('admin.categories.create') }}" class="text-end btn btn-success btn-sm">Tambah Banner</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-banner table border-top table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/admin/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // DataTable
            $('.datatables-banner').DataTable({
                ajax: {
                    url: "{{ route('admin.data.categories') }}",
                    type: 'GET'
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },

                    {
                        data: "logo",
                        render: function(data, type, row) {
                            return '<img src="' + data + '" width="50" height="50">';
                        }
                    },

                    {
                        data: 'name'
                    },
                    {
                        data: 'action'
                    },
                ],
                language: {
                    sLengthMenu: "_MENU_",
                    search: "Search",
                    searchPlaceholder: "Search.."
                },

            });

        });
    </script>
@endpush
