<td style="white-space: nowrap !important;">
    <div class="d-inline">
        <div class="form-button-action">
            @if ($read != null)
                <button type="button" data-toggle="tooltip" style="border:none;" class="badge bg-warning"
                    data-original-title="View Data" onclick="window.location.href = '/read/{{ $read }}'">
                    <i class="fa fa-eye text-dark"></i>
                </button>
            @endif
            @if ($print != null)
                <button type="button" data-toggle="tooltip" style="border:none;" class="badge bg-primary"
                    data-original-title="Print Data" onclick="window.location.href = '/print/{{ $print }}'">
                    <i class="fa fa-print"></i>
                </button>
            @endif
            @if ($modal != null)
                <button type="button" class="badge bg-warning" data-toggle="modal"
                    data-target="#{{ $modal }}" style="border:none;"> <i
                        class="fa fa-edit"></i></button>
            @endif
            @if ($delete != null)
                <form action="/destroy/{{ $delete }}" class="d-inline" method="post">
                    @method('post')
                    @csrf
                    <button class="m-1 badge bg-danger show-alert-delete-box" style="border: none;"
                        data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                </form>
            @endif
        </div>
    </div>
</td>
<script src="{{ asset('adminassets/js/jquery.3.2.1.min.js') }}"></script>
<script>
    $('.show-alert-delete-box').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Tidak Dapat Kembali!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Sekarang!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });
</script>
