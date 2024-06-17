$(document).ready(function() {
  // const nav = $("#nav")
  const table = $("#table")
  // $.get("/src/partials/nav.mustache", function(template){
  //   const rendered = Mustache.render(template)
  //   nav.html(rendered)
  // })
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
