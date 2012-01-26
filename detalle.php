<?php
//GETS
$oper = $_GET["oper"];
$app = $_GET["app"];
$crit = $_GET["crit"];
$ger = $_GET["ger"];
$fechaa = $_GET["fa"];
$fechab = $_GET["fb"];
$caso = $_GET["cas"];
$gerencia = $_GET["gerencia"];
$aplicativo = $_GET["apli"];
$estado = $_GET["est"];
$area = $_GET["area"];
$ambiente = $_GET["ambiente"];

$casot = $_GET["caso"];
$prioridadt = $_GET["prioridad"];
$aplicativot = $_GET["aplit"];
$gerenciagral = $_GET["gergral"];
$monit = $_GET["monit"];
$sla = $_GET["sla"];

//Encabezados
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=\"reporte$report.csv\"");

//Conexión a la BD
include("modelo/conexion.php");
$vinculo =  mysql_connect($dbServ, $dbUser, $dbPass);
			mysql_select_db($dbDB, $vinculo);

if ($oper==1)
{
$title = "Detalle por Aplicacion\n";
$query = "SELECT * FROM remedy WHERE crit_aplicativo='$app' ";
if ($caso!='') $query .= "AND caso='$caso' ";
if ($gerencia!='') $query .= "AND crit_gerencia='$gerencia' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($fechaa!='' && $fechab=='') $query .= "AND nuevo_time LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND nuevo_time BETWEEN '$fechaa' AND '$fechab'";
if ($ambiente=='Produccion' || $ambiente =='') $query .= "AND crit_ambiente='Produccion' ";
if ($ambiente!='Produccion') $query .= "AND crit_ambiente like 'Prueba%' ";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==2)
{
$title = "Detalle por Criterio Especifico\n";
$query = "SELECT * FROM remedy WHERE crit_agrup2='$crit'AND crit_ambiente='Produccion' ";
if ($caso!='') $query .= "AND caso='$caso' ";
if ($gerencia!='') $query .= "AND crit_gerencia='$gerencia' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo'";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($fechaa!='' && $fechab=='') $query .= "AND nuevo_time LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND nuevo_time BETWEEN '$fechaa' AND '$fechab' ";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==3)
{
$title = "Detalle por Gerencia\n";
$query = "SELECT * FROM remedy WHERE 1=1 ";
if ($gerencia!='') $query .= "AND crit_gerencia='$gerencia' ";
if ($caso!='') $query .= "AND caso='$caso' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($fechaa!='' && $fechab=='') $query .= "AND nuevo_time LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND nuevo_time BETWEEN '$fechaa' AND '$fechab'";
if ($ambiente=='Produccion' || $ambiente =='') $query .= "AND crit_ambiente='Produccion' ";
if ($ambiente!='Produccion') $query .= "AND crit_ambiente like 'Prueba%' ";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==4)
{
$title = "Detalle por Criterio General\n";
$query = "SELECT * FROM remedy WHERE crit_ambiente='Produccion' ";
if ($crit!='') $query .= "AND crit_agrup1='$crit' ";
if ($caso!='') $query .= "AND caso='$caso' ";
if ($gerencia!='') $query .= "AND crit_gerencia='$gerencia' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($fechaa!='' && $fechab=='') $query .= "AND nuevo_time LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND nuevo_time BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==5)
{
$title = "Detalle de Tiempos\n";
$query = "SELECT * FROM TimeArea WHERE crit_ambiente='Produccion' AND crit_caso='$casot' ";
if ($prioridad!='') $query .= "AND Prioridad='$prioridad' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($fechaa!='' && $fechab=='') $query .= "AND crit_cerrado_el LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND crit_cerrado_el BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==6)
{
$title = "Detalle de NDS\n";
$query = "SELECT * FROM TimeArea WHERE crit_ambiente='Produccion' ";
if ($area!='') $query .= "AND arearesolutoria='$area' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($fechaa!='' && $fechab=='') $query .= "AND crit_cerrado_el LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND crit_cerrado_el BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==7)
{
$title = "Detalle de NDS\n";
$query = "SELECT * FROM TimeArea WHERE crit_ambiente='Produccion' AND crit_caso='$casot' ";
if ($prioridad!='') $query .= "AND Prioridad='$prioridad' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($fechaa!='' && $fechab=='') $query .= "AND crit_cerrado_el LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND crit_cerrado_el BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==8)
{
$title = "Detalle de NDS por Aplicacion\n";
$query = "SELECT * FROM TimeArea WHERE crit_ambiente='Produccion' AND crit_aplicativo='$aplicativot' ";
if ($area!='') $query .= "AND arearesolutoria='$area' ";
if ($prioridad!='') $query .= "AND Prioridad='$prioridad' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($fechaa!='' && $fechab=='') $query .= "AND crit_cerrado_el LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND crit_cerrado_el BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}	

else if ($oper==9)
{
$title = "Detalle de NDS por Gerencia\n";
$query = "SELECT * FROM TimeArea WHERE crit_ambiente='Produccion' AND crit_gerencia='$gerencia' ";
if ($area!='') $query .= "AND arearesolutoria='$area' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($fechaa!='' && $fechab=='') $query .= "AND crit_cerrado_el LIKE '".substr($fechaa, 0,7)."%' ";
if ($fechab!='') $query .= "AND crit_cerrado_el BETWEEN '$fechaa' AND '$fechab'";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==10)
{
$title = "Detalle de Tickets en Proceso\n";
$query = "SELECT * FROM TimeArea_diario WHERE crit_cargado_el = DATE_FORMAT(NOW(), '%Y-%m-%d') ";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($area!='') $query .= "AND arearesolutoria='$area' ";
if ($ambiente=='Produccion' || $ambiente =='') $query .= "AND crit_ambiente='Produccion' ";
if ($ambiente!='Produccion') $query .= "AND crit_ambiente like 'Prueba%' ";
$export0 = mysql_query($query, $vinculo);
}

else if ($oper==11)
{
$title = "Detalle de Tickets en Proceso\n";
$query = "SELECT * FROM TimeArea_diario WHERE crit_cargado_el = DATE_FORMAT(NOW(), '%Y-%m-%d') ";
if ($estado!='') $query .= "AND estado='$estado' ";
if ($ger!='') $query .= "AND crit_gerencia='$ger' ";
if ($gerenciagral!='') $query .= "AND Gerencia_General='$gerenciagral' ";
if ($aplicativo!='') $query .= "AND crit_aplicativo='$aplicativo' ";
if ($sla!='') $query .= "AND crit_sla='$sla' ";
if ($monit!='') $query .= "AND crit_monitoreable='$monit' ";
if ($area!='') $query .= "AND arearesolutoria='$area' ";
if ($ambiente=='Produccion' || $ambiente =='') $query .= "AND crit_ambiente='Produccion' ";
if ($ambiente!='Produccion') $query .= "AND crit_ambiente like 'Prueba%' ";
$export0 = mysql_query($query, $vinculo);
}

	if (!$export0) die('No se pudo obtener el Detalle');
	$data0 = "";

	$fields0 = mysql_num_fields ( $export0 );
	
	for ( $i = 0; $i < $fields0; $i++ )
	{
		$data0 .= mysql_field_name( $export0 , $i ) . ";";
	}
	 $data0 = $data0 . "\n";

	while( $row0 = mysql_fetch_row( $export0 ))
	{
		$line0 = '';
		foreach( $row0 as $value0 )
		{                                            
			if ( ( !isset( $value0 ) ) || ( $value0 == "" ) )
			{
				$value0 = "-;";
			}
			else
			{
				$value0 = $value0 . ";";
			}
			$line0 .= $value0;
		}
		$data0 .= trim( $line0 ) . "\n";
	}
	
	//Imprimir Resultados
	//echo $query;
	echo $title;
	echo $data0;
	echo "\n";
?>
