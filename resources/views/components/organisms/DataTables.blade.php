<style>
    .table-toolbar {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.search-bar {
    margin-right: 15px;
}

.pagination {
    float: right;
}

</style>
<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data {{ $tabel }}</h4>
            @if ($modal != null)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $modal }}"
                    style="border-radius:5px;"> <i class="fa-solid fa-plus"></i> Tambah Data</button>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="{{ $jenis }}" class="display table table-striped table-hover">
                    {{ $slot }}
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('adminassets/js/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('adminassets/js/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi DataTable
        if (!$.fn.DataTable.isDataTable('#{{ $jenis }}')) {
            var table = $('#{{ $jenis }}').DataTable({
                "pageLength": 5,
                "dom": '<"top"f>rt<"bottom"lp><"clear">',
                "initComplete": function() {
                    // Tambahkan pencarian kustom
                    $('#search-input').on('keyup', function() {
                        table.search(this.value).draw();
                    });
                }
            });
        }

        // Inisialisasi DataTable dengan filter multi kolom
        if (!$.fn.DataTable.isDataTable('#multi-filter-select')) {
            $('#multi-filter-select').DataTable({
                "pageLength": 5,
                "initComplete": function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    });
                }
            });
        }

        // Tambah baris
        if (!$.fn.DataTable.isDataTable('#add-row')) {
            $('#add-row').DataTable({
                "pageLength": 5,
            });
        }

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').DataTable().row.add([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]).draw();
            $('#addRowModal').modal('hide');
        });

        var rowCount = $('#multi-filter-select').find('tbody tr').length;

        if (rowCount === 0) {
            // Tabel kosong, tampilkan pesan
            $('#multi-filter-select').replaceWith('<p>Mafi qolbi ghoirullah</p>');
        }
    });
</script>