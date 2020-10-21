function ajustar(id) {
  $("#idUNA").val(id);
  $.post(
    "app/response-updatetitle.php",
    { id: id },
    function(data) {
      $("#title").html(data.opTitulo);
      $("#areaAcad")
        .val(data.area)
        .prop("selected", true);
      $("#gradoA")
        .val(data.grado)
        .prop("selected", true);
      $("#title")
        .val(data.titulo)
        .prop("selected", "true");
    },
    "json"
  );
}

function buscarTit() {
  var grado1 = $("#gradoA").val();
  var area1 = $("#areaAcad").val();
  var elegido1 = obtenerQueryTitulo1(grado1);
  // console.log("grad: "+grado1);
  // console.log("area:"+area1);
  // console.log("elegido: "+elegido1);
  $.post("app/response-titles.php", { grado: elegido1, area: area1 }, function(
    data
  ) {
    $("#title").html(data);
    // alert("data:"+data);
  });
}

function obtenerQueryTitulo1(grado) {
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
