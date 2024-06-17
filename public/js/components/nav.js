$(document).ready(function() {
  const nav = $("#nav")
  const links = [
    {
      label: "Home",
      link: "/"
    },
    {
      label: "Nuevo",
      link: "/src/views/create.html"
    },
    {
      label: "Editar",
      link: "/src/views/edit.html"
    }
  ]
  $.get("/src/partials/nav.mustache", function(template) {
    const rendered = Mustache.render(template, {links: links})
    nav.html(rendered)
  })
})