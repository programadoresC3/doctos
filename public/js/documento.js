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

$('#txtAsunto').wysihtml5({
    locale: 'es-ES',
    toolbar: {
        'fa':          true,
        'font-styles': false, //Font styling, e.g. h1, h2, etc. Default true
        'emphasis':    true, //Italics, bold, etc. Default true
        'lists':       true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        'html':        false, //Button which allows you to edit the generated HTML. Default false
        'link':        false, //Button to insert a link. Default true
        'image':       false, //Button to insert an image. Default true,
        'color':       false, //Button to change color of font
        'blockquote':  false, //Blockquote
    }
});
