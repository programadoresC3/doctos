/**
 * Created by Supervisión on 03/03/2017.
 */
jQuery(document).ready(function($) {
    //datepicker
    $("#fechaA").datepicker({
            format:"dd/mm/yyyy",
            autoclose:true
        })
        .on("changeDate", function(e){
            //enviar informacion ajax de la fecha seleccionada
            //alert("Fecha A:");
            $.ajax({
                    url: $('#formConcentrado').attr('action'),
                    type: 'post',
                    data: $('#formConcentrado').serialize(),
                    beforeSend: function(){
                        $("#cargando").show();
                    }
                })
                .done(function(result) {
                    $("#cargando").hide();
                    $("#dvResultadosConcentrado").html(result);
                })
                .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#cargando").hide();
                    bootbox.alert("Imposible obtener las observaciones: "+errorThrown);
                });
        });



    $("#informe").click(function(event){
       //alert("Aqui esta");
        var f1 = $("#fechaDe").val().trim(),
            f2 = $("#fechaA").val().trim();

       //alert(f1+' '+f2);
        ruta='public/reportes/printInforme.php';

        //alert(ruta);

        parametro01 = "laf1="+f1;
        parametro02 = "laf2="+f2;

        laurl = ruta+"?"+parametro01+"&"+parametro02;

        //alert(laurl);

        window.open(laurl);
    });


    $("#fechaDe").datepicker({
        format:"dd/mm/yyyy",
        autoclose:true
    });

    //añadir automaticamente las diagonales
    $(".fecha").keyup(function(event) {
        /* Act on the event */
        if (event.keyCode != 8){
            if ($(this).val().length == 2)
                $(this).val($(this).val() + "/");

            else if ($(this).val().length == 5)
                $(this).val($(this).val() + "/");
        }
        else
        {
            var temp = $(this).val();

            if ($(this).val().length == 5)
                $(this).val(temp.substring(0,4));

            else if ($(this).val().length == 2)
                $(this).val(temp.substring(0,1));
        }
    });
});