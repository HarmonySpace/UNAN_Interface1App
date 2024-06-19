$(document).ready(function() {
  const id = $("#reg_id").text().trim()
  const url = "/find/" + id
  const form = $("#form")
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

      form.submit(function(event) {
        event.preventDefault()
        const url2 = "/update/" + id
        if (form.valid()) {
          $.ajax({
            url: url2,
            type: "POST",
            //dataType: 'json',
            data: {
              codfac: $("#facultaty").val(),
              tipo_beca: $("#beca").val(),
              id_regimen: $("#regime").val(),
              monto: $("#amount").val(),
              anyo: $("#anyo").val(),
            },
            success: function(res) {
              console.log(res)
              window.location.href = "/"
            },
            error: function(status, error) {
              console.error(status, error)
            }
          })
        }
      })
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
})
