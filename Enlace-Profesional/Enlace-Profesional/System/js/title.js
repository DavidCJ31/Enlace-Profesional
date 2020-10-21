function buscarTitulo() {
  var grado = $("#gradoAcademicoUNA").val();
  var area = $("#areaA").val();
  var elegido = obtenerQueryTitulo(grado);
  // console.log("grad: "+grado);
  // console.log("area:"+area);
  // console.log("elegido: "+elegido);
  $.post("app/response-titles.php", { grado: elegido, area: area }, function(
    data
  ) {
    $("#titulo").html(data);
    // alert("data:"+data);
  });
}

function obtenerQueryTitulo(grado) {
  if (grado === "Diplomado") {
    return "'Diplomado%'";
  }
  if (grado === "Profesorado") {
    return "'Profesorado%'";
  }
  if (grado === "Bachillerato") {
    return "'Bachillerato%'";
  }
  if (grado === "Licenciatura") {
    return "'Licenciatura%'";
  }
  if (grado === "Especialidad") {
    return "'Especialidad%'";
  }
  if (grado === "Maestría") {
    return "'Maestría%' or academic_degree like 'Magíster%'";
  }
  if (grado === "Doctorado") {
    return "'Doctorado%'";
  }
  if (grado === "Postdoctorado") {
    return "'Postdoctorado%'";
  }
}
