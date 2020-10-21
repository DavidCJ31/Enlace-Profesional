//busca titulos por medio de un grado academico
function buscarTitulo(){
    var grado = $('#gradoAcademico').val();
    var area = $('#areaA').val();
    var titulo = $('#tit').val();
    var elegido = obtenerQueryTitulo(grado);
                console.log("grad: "+grado);
                console.log("area:"+area);
                console.log("tit: "+ titulo);
                console.log("elegido: "+elegido);
    $.post("app/response-degree.php", { grado: elegido, titulo: titulo, area: area }, function(data){
    $("#titulo").html(data);
    //alert("data:"+data);
    });

} 



//toma la provincia y devuelve el id correspondiente
function obtenerIdProvincia(prov){
    if(prov === "San José"){
        return 1;
    }
    if(prov === "Alajuela"){
        return 2;
    }
    if(prov === "Cartago"){
        return 3;
    }
    if(prov === "Heredia"){
        return 4;
    }
    if(prov === "Guanacaste"){
        return 5;
    }
    if(prov === "Puntarenas"){
        return 6;
    }
    if(prov === "Limón"){
        return 7;
    }
}

function obtenerQueryTitulo(grado){
    if(grado === "Diplomado"){
        return "'Diplomado%'";
    }
    if(grado === "Profesorado"){
        return "'Profesorado%'";
    }
    if(grado === "Bachillerato"){
        return "'Bachillerato%'";
    }
    if(grado === "Licenciatura"){
        return "'Licenciatura%'";
    }
    if(grado === "Especialidad"){
        return "'Especialidad%'";
    }
    if(grado === "Maestría"){
        return "'Maestría%' or academic_degree like 'Magíster%'";
    }
    if(grado === "Doctorado"){
        return "'Doctorado%'";
    }
    if(grado === "Postdoctorado"){
        return "'Postdoctorado%'";
    }
}