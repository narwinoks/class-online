<form action="{{ route('admin.course.destroy', $model['id']) }}" method="post">
    @method('DELETE')
    @csrf
    <a href="{{ route('admin.course.edit', $model['id']) }}" class="btn btn-primary btn-sm">Update</a>
    <button type="submit" class="btn btn-danger btn-sm" id="delete">Delete</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('button#delete').on('click', function(e) {
        e.preventDefault();
        var form = event.target.form;
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah kamu yakin hapus data ini?',
            text: "Daya yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
</script>
