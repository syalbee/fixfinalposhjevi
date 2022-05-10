let url,
  lapgrosir = $("#tbllapgrosir").DataTable({
    responsive: !0,
    scrollX: !0,
    ajax: LAPreadUrl,
    columnDefs: [{ searcable: !1, orderable: !1, targets: 0 }],
    order: [[1, "asc"]],
    columns: [
      { data: null },
      { data: "jual_nofak" },
      { data: "jual_tanggal" },
      { data: "jual_total" },
      { data: "jual_jml_uang" },
      { data: "jual_kembalian" },
      { data: "petugas" },
      { data: "note" },
      { data: "sts" },
      { data: "action" },
    ],
  });
function reloadTable() {
  lapgrosir.ajax.reload();
}

function detail(a) {
  $("#LAPmodalDetail").modal("show");
  $("#detailBarang").load(LAPdetailurl + a);
}
function lunas(a) {
  console.log(a);
  $.ajax({
    url: TRGeditUrl,
    type: "post",
    dataType: "json",
    data: {
      jlStatus: a,
    },
    success: (a) => {
      console.log(a);
      lapgrosir.ajax.reload();
    },
    error: (a) => {
      console.log(a);
    },
  });
}
lapgrosir.on("order.dt search.dt", () => {
  lapgrosir
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
