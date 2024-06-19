$(document).ready(function() {
  const form = $("#form")
  form.submit(function(event) {
    event.preventDefault()
    if (form.valid()) {
      $.ajax({
        url: "/store",
        type: "POST",
        dataType: 'json',
        data: {
          codfac: $("#facultaty").val(),
          tipo_beca: $("#beca").val(),
          id_regimen: $("#regime").val(),
          monto: $("#amount").val(),
          anyo: $("#anyo").val()
        },
        success: function(res) {
          window.location.href = "/"
        },
        error: function(status, error) {
          console.error(status, error)
        }
      })
    }

  })
})
