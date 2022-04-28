<?php

require "conexion.php";
$connec=new Connection_db();

header ('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=BackupSolicitud.csv');

$output=fopen("php://output","w");


$sql=$connec->conexion();
$smtp=$sql->prepare("SELECT  reg.*,de.opcion as opcion, de.detalles as detalle,persona.nombre as NombreS,
concat(tec.Nombre,' ',tec.ApellidoP,' ',tec.ApellidoM) 
as nombre 
,
CASE
    WHEN reg.Activacion = 1 THEN 'Activado'
    WHEN reg.Activacion = 0 THEN 'no actvado'
  
END   as activ

from registro reg left  JOIN tecnico tec on  reg.idTecnico=tec.idTecnico 
left join (SELECT em.Correo,concat(em.Nombre1,' ',em.Nombre2,' ',em.Apellido1,' ',em.Apellido2) 
as nombre FROM empleado em union SELECT es.Correo,es.Nombre  as nombre from estudiante es) persona   on reg.CorreoSolic=persona.Correo
left join detalles de on de.idRegistro=reg.idRegistro ");

$smtp->execute();

$result=$smtp->fetchall(PDO::FETCH_ASSOC);

fputcsv($output,array("idRegistro",
"Nombre (Correo)",
"Tecnico",
"TipoServicio",
"Opcion",
"Detalles",
"status",
"FechaRegistro",
'FechaL',
'Valoracion',
'Comentario',
'Activacion',
));

foreach ( $result as $row  ){
  
fputcsv($output,array(
$row['idRegistro'],  
$row['NombreS']."({$row['CorreoSolic']})",
$row['nombre'],
$row['TipoS'],
$row['opcion'],
$row['detalle'],
$row['statusS'],
$row['FechaR'],
$row['FechaL'],
$row['Valoracion'],
$row['Comentario'],
$row['Activacion']." ({$row['activ']})",
),",", '"');
}
$connec=null;
$smtp=null;

fclose($output);