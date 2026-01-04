@if (session()->has('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "Okey",
            customClass: {
                confirmButton: "btn btn-success"
            },
            buttonsStyling: false
        });
    </script>
@elseif ($errors->any())
    <script>
        Swal.fire({
            title: "Gagal!",
            html: "<ul>" +
                @foreach ($errors->all() as $error)
                    "<li>{{ $error }}</li>" +
                @endforeach
                "</ul>",
            icon: "error",
            confirmButtonText: "Okey",
            customClass: {
                confirmButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
    </script>
@endif
