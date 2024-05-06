new DataTable('#tabel')

$(document).on("click", ".btn-hapus", function() {
    var id = $(this).data('id')
    $(".modal-body #id").val(id)
});