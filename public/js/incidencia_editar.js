jQuery(document).ready(function($){
    $("#btnEnviar").click(function(event) {
        if(validar() === false) {
            bootbox.alert("No puede continuar");
        }
        else {
            //bootbox.alert("Si puede continuar");
            $.ajax({
                    url: $('#formDocumento').attr('action'),
                    type: 'post',
                    data: $('#formDocumento').serialize(),
                })
                .done(function (result) {
                    if (result == 1) {
                        bootbox.alert('Documento Actualizado Satisfactoriamente', function(){
                            window.location.href=$('#document').val();
                        });
                    }
                })
                .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Imposible hacer la función solicitada");
                });
        }
    });
});

function validar()
{
    if($("#txtObservacion").val().trim() === "") {
        bootbox.alert("Debe indicar la observación de la Incidencia");
        return false;
    }
    else if($("#txtFechaincidencia").val().trim() === "") {
        bootbox.alert("Debe indicar la fecha de la Incidencia");
        return false;
    }
    else if($("#cmbGenera").val().trim() === "") {
        bootbox.alert("Debe indicar a la persona que genera la Incidencia");
        return false;
    }
    else {
        return true;
    }
}