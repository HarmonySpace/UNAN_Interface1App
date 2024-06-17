$(document).ready(function() {
  const table = $("#table")
  $.ajax({
    url: "/src/Controller.php",
    method: "GET",
    success: function(data) {
      console.log(data)
      $.get("/src/partials/data-table.mustache", function(template) {
        const rendered = Mustache.render(template, {data: data})
        table.html(rendered)
      })
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
})
