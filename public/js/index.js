$(document).ready(function() {
  const rootDir = "../.."
  const table = $("#table")
  $.ajax({
    url: "/get",
    type: "GET",
    dataType: 'json',
    success: function(data) {
      $.get(rootDir + "/src/partials/data-table.mustache", function(template) {
        const rendered = Mustache.render(template, {data: data})
        table.html(rendered)
      })
    },
    error: function(status, error) {
      console.error(status, error)
    }
  })
})
