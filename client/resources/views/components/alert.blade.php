 <style>
  .alert .alert-success {
    background-color: green;
    color: white;
    border: none;
  }
  .close{
    display: none
  }
 </style>
 <script>
        @if (session()->get('success'))
            $.notify({
                // options
                message: '{{ session('success') }}'
            }, {
                // settings
                type: 'success',
                offset: {
                    x: 15,
                    y: 80
                }
            });
        @endif
    
    
        @if (session('info'))
            $.notify({
                // options
                message: '{{ session('info') }}'
            }, {
                // settings
                type: 'info',
                offset: {
                    x: 15,
                    y: 80
                }
            });
        @endif
    
        @if (session('danger'))
            $.notify({
                // options
                message: '{{ session('danger') }}'
            }, {
                // settings
                type: 'danger',
                offset: {
                    x: 15,
                    y: 80
                }
            });
        @endif
    
        @if (session('warning'))
            $.notify({
                // options
                message: '{{ session('warning') }}'
            }, {
                // settings
                type: 'warning',
                offset: {
                    x: 15,
                    y: 80
                }
            });
        @endif
    </script>
    