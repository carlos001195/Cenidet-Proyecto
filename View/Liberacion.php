<?php 
// si el link de liberacion viene el el paramtro de mail , si no lo mandaremos la index
    if (!isset($_GET['mail'])){
  header ("Location: index.php");
    }else {
    session_start();
    $_SESSION['mail']=$_GET['mail'];

 }
?>

<!DOCTYPE html>
<html lang="es">
  <meta http-equiv="content-type" content="text/html; utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/index.css">
<link rel="stylesheet" href="../Source/css/liberacion.css ">
<head><title>Liberacion</title></head>

<body>
<script src="../Controller/js/jquey.js"></script>

<?php include "../include/banner_tenc.php";?>
<div class="conteiner">

    <div id="div-liberacion" class="content">
      
    <div  class="mail-lib">
            <label>Nivel de Satisfaccion</label>
            <select id="calificacion">
            <?php
            for ($num=1;$num<=10;$num++){
                    echo "<option>".$num."</option>";
            }
            ?>
            </select>
        </div>

        <div class="mail-lib"> 
        
            <label>Comentario</label>
            <textarea id="comentario">
            </textarea> 
        </div>
        <div class="mail-lib"> 
        
        <button id="liberar_button">Liberar</button>
          </div>

    </div>
    <?php 
    include "../include/Estatus_Liberacion.php";
    ?>
</div>

<script src="../Controller/js/liberacion.js"></script>

</body>
</html>