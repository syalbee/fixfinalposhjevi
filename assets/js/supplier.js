let url,
  supplier = $("#tblsupplier").DataTable({
    responsive: !0,
    scrollX: !0,
    ajax: SPreadUrl,
    columnDefs: [{ searcable: !1, orderable: !1, targets: 0 }],
    order: [[1, "asc"]],
    columns: [
      { data: null },
      { data: "nama" },
      { data: "alamat" },
      { data: "telepon" },
      { data: "action" },
    ],
  });
function reloadTable() {
  supplier.ajax.reload();
}

function addData() {
  $.ajax({
    url: SPaddUrl,
    type: "post",
    dataType: "json",
    data: $("#SPformadd").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Menambahkan Suplier", "success"),
        reloadTable();
    },
    error: (a) => {
      console.log(a);
    },
  });
}

function remove(a) {
  Swal.fire({
    title: "Hapus",
    text: "Hapus data ini?",
    type: "warning",
    showCancelButton: !0,
  }).then(() => {
    $.ajax({
      url: SPremoveUrl,
      type: "post",
      dataType: "json",
      data: { id: a },
      success: () => {
        Swal.fire("Sukses", "Sukses Menghapus Suplier", "success"), reloadTable();
      },
      error: (a) => {
        console.log(a);
      },
    });
  });
}

function editData() {
  $.ajax({
    url: SPeditUrl,
    type: "post",
    dataType: "json",
    data: $("#SPformedit").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Mengedit Suplier", "success"),
        reloadTable();
    },
    error: (a) => {
      console.log(a);
    },
  });
}



function edit(a) {
	console.log(a);
  $.ajax({
    url: SPget_supplierUrl,
    type: "post",
    dataType: "json",
    data: { id: a },
    success: (a) => {
      $('[name="id"]').val(a.suplier_id),
        $('[name="edtnama"]').val(a.suplier_nama),
        $('[name="edtalamat"]').val(a.suplier_alamat),
        $('[name="edttelepon"]').val(a.suplier_notelp),
        $("#SPmodaledit").modal("show"),
        $(".modal-title").html("Edit Suplier"),
        $('.modal button[type="submit"]').html("Edit"),
        (url = "edit");
    },
    error: (a) => {
      console.log(a);
    },
  });
}

supplier.on("order.dt search.dt", () => {
  supplier
    .column(0, { search: "applied", order: "applied" })
    .nodes()
    .each((a, e) => {
      a.innerHTML = e + 1;
    });
}),
  $("#form").validate({
    errorElement: "span",
    errorPlacement: (e, t) => {
      e.addClass("invalid-feedback"), t.closest(".form-group").append(a);
    },
    submitHandler: () => {
      "edit" == url ? editData() : addData();
    },
  }),
  $(".modal").on("hidden.bs.modal", () => {
    $("#form")[0].reset(), $("#form").validate().resetForm();
  });
