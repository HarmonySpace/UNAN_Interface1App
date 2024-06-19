$(document).ready(function() {
  const nav = $("#nav")
  const links = [
    {
      label: "Home",
      link: "/"
    },
    {
      label: "Nuevo",
      link: "/create"
    }]
  $.get("/src/partials/nav.mustache", function(template) {
    const rendered = Mustache.render(template, { links: links })
    nav.html(rendered)
  })
})
