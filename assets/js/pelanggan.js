let url,
  pelanggan = $("#tblpelanggan").DataTable({
    responsive: !0,
    scrollX: !0,
    ajax: PLGreadUrl,
    columnDefs: [{ searcable: !1, orderable: !1, targets: 0 }],
    order: [[1, "asc"]],
    columns: [
      { data: "kode" },
      { data: "nama" },
      { data: "notelp" },
      { data: "alamat" },
      { data: "nik" },
      { data: "point" },
      { data: "action" },
    ],
  });
function reloadTable() {
  pelanggan.ajax.reload();
}

function addData() {
  $.ajax({
    url: PLGaddUrl,
    type: "post",
    dataType: "json",
    data: $("#PLGformadd").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Menambahkan Pelanggan", "success"),
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
      url: PLGremoveUrl,
      type: "post",
      dataType: "json",
      data: { id: a },
      success: () => {
        Swal.fire("Sukses", "Sukses Menghapus Pelanggan", "success"),
          reloadTable();
      },
      error: (a) => {
        console.log(a);
      },
    });
  });
}

function editData() {
  $.ajax({
    url: PLGeditUrl,
    type: "post",
    dataType: "json",
    data: $("#PLGformedit").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Mengedit Pelanggan", "success"),
        reloadTable();
    },
    error: (a) => {
      console.log(a);
    },
  });
}

function edit(a) {
  $.ajax({
    url: PLGget_pelangganUrl,
    type: "post",
    dataType: "json",
    data: { id: a },
    success: (a) => {
      $('[name="id"]').val(a.id),
        $('[name="edtnama"]').val(a.nama),
        $('[name="edtalamat"]').val(a.alamat),
        $('[name="edttelepon"]').val(a.notelp),
        $('[name="edtnik"]').val(a.nik),
        $("#PLGmodaledit").modal("show"),
        $(".modal-title").html("Edit Suplier"),
        $('.modal button[type="submit"]').html("Edit"),
        (url = "edit");
    },
    error: (a) => {
      console.log(a);
    },
  });
}

pelanggan.on("order.dt search.dt", () => {
  pelanggan
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
