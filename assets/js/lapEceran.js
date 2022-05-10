let url,
  lapEceran = $("#tbllapeceran").DataTable({
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
    columnDefs: [
      {
        targets: [0],
        render: function (data, type, row) {
          if (row.index > 2) {
            return "<div style='background-color:red'>" + data + "<div>";
          }
          return data;
        },
      },
    ],
  });

function reloadTable() {
  lapEceran.ajax.reload();
}

function detail(a) {
  console.log(a);
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
      lapEceran.ajax.reload();
    },
    error: (a) => {
      console.log(a);
    },
  });
}

lapEceran.on("order.dt search.dt", () => {
  lapEceran
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
