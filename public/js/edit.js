$(document).ready(function() {
  const id = $("#reg_id").text().trim()
  const url = "/find/" + id

  $.ajax({
    url: url,
    type: "GET",
    dataType: "json",
    data: {
      id: id
    },
    success: function(data) {
      console.log(data)
      $("#anyo").val(data.anyo)
      $("#regime").val(data.id_regimen)
      $("#amount").val(data.monto)
      $("#beca").val(data.tipo_beca)
      $("#facultaty").val(data.codfac)
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
})
