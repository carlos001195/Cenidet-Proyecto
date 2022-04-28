<?php 

include_once '../Model/conexion.php';
$conn=new Connection_db();
?>
<!DOCTYPE html>
<html lang="es-MX">
        <meta http-equiv="content-type" content="text/html; utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Source/css/normalize.css">
        <link rel="stylesheet" href="../Source/css/index.css">
        <link rel="stylesheet" href="../Source/css/table.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  
        <head>
        <title>Bitácora</title>
    </head>

<body>

<?php include "../include/banner_tenc.php";

?>
<header>

<div class="title-div"><h1 class="bitacora">BITÁCORA DE SOLICITUDES</h1></div>

</header>
<a href="index.php" class="btn btn-secondary">Inicio</a>
<br>
<br>
<?php 

session_start();

if (isset($_SESSION['mensaje'])){
     
    echo '<div class="modal fade" id="modalRecordatorio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Recordatorio</h5>
          
        </div>
        <div class="modal-body">
        <label for="recipient-name" class="col-form-label">Favor de revisar su correo para verificar la solicitud, de esta manera se le asignará un técnico y a la brevedad se comunicará con usted.</label>
          
          
        </div>
      </div>
    </div>
  </div>
  ';
    session_destroy();      
}

?>


<?php

  ?>
<table id ="table-bitacora" class="table table-primary table-hover table-bordered table-striped"> 
<thead class="table-dark">

        <th>Usuario</th>
        <th>Técnico</th>
        <th>Servicio</th>
        <th>Fecha de Solicitud</th>
        <th>Estado</th>
</thead>
    <tbody>
     
   <?php

  foreach($conn->ListaBitacora() as $fila){
     echo "<tr>
        <td>{$fila['nombre']}</td>
        <td>{$fila['nombreT']}</td>
        <td>{$fila['TipoS']}</td>
        <td>{$fila['FechaR']}</td>
        <td>{$fila['statusS']}</td>
        </tr>";
    }
?>
    
    </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

var intervalID = window.setInterval(miFuncion, 5000, 'Parametro 1');

function miFuncion(a) {
 

  $("#modalRecordatorio").modal("show");

}


$(document).ready(function() {
  

  $("#modalRecordatorio").modal("show");

});





</script>
</body>
</html>
