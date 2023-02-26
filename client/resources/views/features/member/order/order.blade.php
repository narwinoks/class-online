@extends('templates.member.member')
@section('content')
<section class="main">
    <div class="row">
            <div class="col-lg-12">
                <h1 class="h4 header-primary mb-3">
                My Transactions
                </h1>
                <p class="subtitle-primary">
                Daftar pembelian kelas Premium Anda <br class="desktop"> untuk karir masa depan yang cerah
                </p>
            </div>
            <div class="card bg-white px-4 py-4">
                    <table class="table" id="table-order">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Name</th>
                            <th>Tipe Kelas</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>  
            </div>
    </div>
</section>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/plugins/data-tables/dataTables.bootstrap5.min.css')}}">
<style>
    .dataTables_filter{
        border-radius: 50%
    }
</style>
@endpush
@push('scripts')
<script src="{{asset('assets/plugins/data-tables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/data-tables/dataTables.bootstrap5.min.js')}}"></script>
<script>
    var table = $("#table-order").DataTable({
    processing: true,
    serverSide: true,
    ajax:{
        url :"{{route('member.order.data')}}"
    },
    columns: [
        {
            data: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },

        { 
                data: "image",
                render: function (data, type, row) {
                    return '<img src="'+data+'" width="50" height="50">';
                }
            },

        {
            data: "course_name",
        },
        {
            data: "type",
        },
        {
            data: "meta_data.course_price",
        },
        {
            data: "createdAt",
        },
        {
            data: "status",
        },
    ],
    aLengthMenu: [
        [5, 10, 15, -1],
        [5, 10, 15, "All"],
    ],
    iDisplayLength: 10,
    language: {
        search: "",
    },
});

</script>
@endpush