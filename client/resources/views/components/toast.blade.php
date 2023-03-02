
<script>
    @if (session('success'))
        toastr.success('{{ session('success') }}', 'Success', {
            timeOut: 3000
        });
    @endif
    @if (session('danger'))
        toastr.error('{{ session('danger') }}', 'Error', {
            timeOut: 3000
        });
    @endif
</script>
