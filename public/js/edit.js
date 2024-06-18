$(document).ready(function() {
  const id = $("#reg_id").text().trim()

  $.ajax({
    url: "/find",
    type: "GET",
    dataType: "json",
    data: {
      id: id
    },
    success: function(res) {
      console.log(res)
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
})
