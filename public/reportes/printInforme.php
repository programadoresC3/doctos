<?php
/**
 * Created by PhpStorm.
 * User: Supervisión
 * Date: 13/03/2017
 * Time: 12:50 PM
 */
$iddoc = $_GET["laf1"];
$idrep = $_GET["laf2"];

// rutas para la apertura de reporte y para el guardado en una ubicación del servidor

$my_report = "C:\\wamp\\www\\doctos\\public\\reportes\\informe_actividades.rpt"; // Ruta fisica al reporte en el servidor
$exp_pdf = "C:\\wamp\\www\\doctos\\public\\reportes\\informe_actividades.pdf"; // ruta fisica donde se guardara el PDF resultado en el servidor


// Instancio el Object Factory de Crystal Reports
try
{
    $ObjectFactory = New COM("CrystalReports.ObjectFactory");
    // Creo una instancia del Componente de Diseñador de Crystal Reports
    try
    {
        $crapp = $ObjectFactory->CreateObject("CrystalDesignRuntime.Application");
        // Mando abrir mi reporte
        $creport = $crapp->OpenReport($my_report, 1);
    }
    catch(Exception $e)
    {
        echo $e->getMessage()."<br />";
        print_r($e->getTrace());
        exit();
    }

    // Conexion a la base de datos
    //$creport->Database->Tables(1)->SetLogOnInfo("10.10.100.37", "InvRecMat", "sa", "Eradaelp2014");
    $creport->Database->Tables(1)->SetLogOnInfo("(local)", "documentos", "sa", "Eradaelp2014");

    //Con Enable Parameter Promting evito que lanze el formulario de captura de parametros ya que el browser del usuario no puede interactuar con el escritorio o el componente que crea el formulario.
    $creport->EnableParameterPrompting = 0;

    //limpiar caché
    $creport->DiscardSavedData;
    // $creport->ReadRecords();

    //obetener la lista de parámetros necesarios para la apertura del cristal report
    $param = $creport->ParameterFields;

    //asignación de valores para los parámetros:
    //1 = curp; 2 = num evaluacion; 3 = usuario evaluador
    $param->Item(1)->AddCurrentValue($iddoc);
    $param->Item(2)->AddCurrentValue($idrep);

    //opciones de exportación
    $creport->ExportOptions->DiskFileName = $exp_pdf;
    $creport->ExportOptions->PDFExportAllPages = true;
    $creport->ExportOptions->DestinationType = 1;
    $creport->ExportOptions->FormatType = 31;

    // Exporto el reporte
    $creport->Export(false);
}
catch (Exception $e)
{
    echo $e->getMessage()."<br />";
    print_r($e->getTrace());
    exit();
}

// Limpiar objetos
$creport = null;
$crapp = null;
$ObjectFactory = null;
$param = null;

$len = filesize($exp_pdf);
header("Content-type: application/pdf");
header("Content-Length: $len");
header("Content-Disposition: inline; filename=Descripcion.pdf");
header("Content-Transfer-Encoding: binary");
// Con esto leeo el archivo para que en conjuncion con el envio de headers el navegador del cliente interprete el contenido del archivo.
readfile($exp_pdf);