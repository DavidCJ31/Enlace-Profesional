$( document ).ready(function() {
    var provinciaDB = $('#provinciadb').val();
    var cantonDB = $('#cantondb').val();
    var provincia = obtenerIdProvincia(provinciaDB);
    var grado = $('#gradoAcademico').val();
    var area = $('#areaA').val();
    var titulo = $('#tit').val();
    
    var elegido = obtenerQueryTitulo(grado);
    // console.log(elegido);
    // console.log(titulo);
    // console.log(area);
    //carga por defecto la lista de cantones de acuerdo a la db
        $.post("app/response.php", { elegido: provincia,db: cantonDB }, function(data){
            $("#canton").html(data);
            
            });
   

    $.post("app/response-degree.php", { grado: elegido, titulo: titulo, area: area }, function(data){
        $("#titulo").html(data);

            //alert("data:"+data);
        });
});

//busca cantones por medio de una provincia
function buscarCantones(){
    var provi = document.getElementById("provincia");
    var valor = provi.options[provi.selectedIndex].value;
    var elegido = obtenerIdProvincia(valor);
    var cantonDB = $('#cantondb').val();
    $.post("app/response.php", { elegido: elegido,db: cantonDB }, function(data){
    $("#canton").html(data);
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

function agregarDiscapacidad(){
    var discapacidad = $('#discapacidad').val();
    if(document.getElementById("disc").checked == true){
        document.getElementById("tipo_Disc").style.display = 'block';
        }else{
            document.getElementById("tipo_Disc").style.display = 'none';
    }
    
}