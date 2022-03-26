let url,
  pengguna = $("#tblpengguna").DataTable({
    responsive: !0,
    scrollX: !0,
    ajax: PGreadUrl,
    columnDefs: [{ searcable: !1, orderable: !1, targets: 0 }],
    order: [[1, "asc"]],
    columns: [
      { data: "no" },
      { data: "nama" },
      { data: "username" },
      { data: "level" },
      { data: "status" },
      { data: "action" },
    ],
  });

function reloadTable() {
  pengguna.ajax.reload();
}

function addData() {
  $.ajax({
    url: PGaddUrl,
    type: "post",
    dataType: "json",
    data: $("#PGformadd").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Menambahkan Pengguna", "success"),
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
      url: PGremoveUrl,
      type: "post",
      dataType: "json",
      data: { id: a },
      success: () => {
        Swal.fire("Sukses", "Sukses Menghapus Pengguna", "success"), reloadTable();
      },
      error: (a) => {
        console.log(a);
      },
    });
  });
}

function editData() {
  $.ajax({
    url: PGeditUrl,
    type: "post",
    dataType: "json",
    data: $("#PGformedit").serialize(),
    success: () => {
      $(".modal").modal("hide"),
        Swal.fire("Sukses", "Sukses Mengedit Pengguna", "success"),
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
    url: PGget_penggunaUrl,
    type: "post",
    dataType: "json",
    data: { id: a },
    success: (a) => {
      $('[name="id"]').val(a.user_id),
        $('[name="edtnama"]').val(a.user_nama),
        $('[name="edtusername"]').val(a.user_username),
        $('[name="Etpassword"]').val(a.user_password),
        $("#PGmodaledit").modal("show"),
        $(".modal-title").html("Edit Suplier"),
        $('.modal button[type="submit"]').html("Edit"),
        (url = "edit");

        if(a.user_level === "1"){
          $("#edtlevel").val("1").change();
        } else {
          $("#edtlevel").val("2").change();
        }
    },
    error: (a) => {
      console.log(a);
    },
  });
}

pengguna.on("order.dt search.dt", () => {
  pengguna
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
