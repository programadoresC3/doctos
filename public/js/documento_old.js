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
                       bootbox.alert('Documento Agregado Satisfactoriamente', function(){
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
    if($("#txtAsunto").val().trim() === "") {
        bootbox.alert("Debe indicar el asunto del documento");
        return false;
    }
    else {
        return true;
    }
}