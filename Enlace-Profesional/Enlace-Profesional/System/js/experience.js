function agregarInfo(id){
    $('#idExperiencia').val(id);
    $.post("app/response-updateExperience.php", { id: id}, function(data){   
        $('#institucion1').val(data.institution);
        $('#supervisor').val(data.supervisor);
        $('#telefono').val(data.supervisorPhone);
        $('#titulo').val(data.titulo);
        $('#fechaInicio').val(data.start);
        $('#cargos').text(data.duties);
        if(data.actual==='S'){
            document.getElementById("defaultCheck1").checked = true;
            $('#finalizaredit').hide();
        }else{
            $('#fechaFin').val(data.end);
        }
        
    },"json");

}