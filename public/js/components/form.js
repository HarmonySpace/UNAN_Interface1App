$(document).ready(function() {
  const form = $("#form")
  const select1 = $("#select1")
  const select2 = $("#select2")
  const select3 = $("#select3")
  const select1_i = {
    label: "Año",
    id: "anyo"
  }
  const select2_i = {
    label: "Tipo de beca",
    id: "beca"
  }
  const select3_i = {
    label: "Régimen académico",
    id: "regime"
  }
  //get years
  const currentYear = new Date().getFullYear();
  const years = Array.from({ length: 30 }, (_, i) => currentYear - i);
  const options = years.map((item) => {
    return {
      text: item,
      value: item
    }
  })
  $.get("/src/partials/select.mustache", function(template) {
    const rendered_years = Mustache.render(template, {
      select: select1_i,
      options: options
    })
    select1.html(rendered_years)
  })
  // other selects
  const beca_type = ['Interna', 'Externa']
  const options2 = beca_type.map((item) => {
    return {
      text: item,
      value: item.toLowerCase()
    }
  })
  $.get("/src/partials/select.mustache", function(template) {
    const rendered_years = Mustache.render(template, {
      select: select2_i,
      options: options2
    })
    select2.html(rendered_years)
  })
  const regime = ['1', '2', '3', '4', '5', '6']
  const options3 = regime.map((item) => {
    return {
      text: item,
      value: item
    }
  })
  $.get("/src/partials/select.mustache", function(template) {
    const rendered_years = Mustache.render(template, {
      select: select3_i,
      options: options3
    })
    select3.html(rendered_years)
  })

  //form evaluation
  form.validate({
    rules: {
      anyo: {
        required: true
      },
      beca: {
        required: true
      },
      regime: {
        required: true
      }
    }
  })
})
