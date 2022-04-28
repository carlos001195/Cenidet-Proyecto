<?php 
  include_once "../Model/conexion.php";
  $conexion=new Connection_db();
  $smtp=$conexion->conexion();

  session_start();
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sitio para Solicitar un Tecnico para solucionar su problema">
    <script src="../Controller/js/jquey.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

<link rel="stylesheet" href="../Source/css/normalize.css">
<link rel="stylesheet" href="../Source/css/index.css">
<link rel="stylesheet" href="../Source/css/login-admin.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<head><title>Index</title></head>


<body>
    <div class="main-windows"> 
    <header>
    <?php 
    
    include "../include/banner_tenc.php";    ?>
    </header>
<div class="content-reparation">
    
<div class="line-menu">
   <div class="menu-div">
          <a href="Login.php" >Registrar Solicitud</a>
            <a href="Bitacora.php">Bitácora de Solicitud</a>
       
   </div>
</div>


<?php

if (isset($_SESSION['admin']) && !isset($_REQUEST['admin'])){
    echo '<div id="login.admin" class="wrapper-not fadeInDown-not">';
    
  }else
  if(isset($_REQUEST['admin']) && !isset($_SESSION['admin'])){
    $exe=$smtp->prepare("SELECT * FROM usuario ");
    $exe->execute();
    $resutado=$exe->fetchAll() ;

      foreach($resutado as $fila){

            if ( $fila['contraseña']==sha1($_POST['password'],false)
            &&  $fila['Nombre']==$_POST['usuario']) {
              
              $_SESSION['admin']="admin";
                
              echo "<script>  
                window.location.assign('admin.php');
                </script>";
                } 
                else 
                {      
              echo '<div id="login.admin" class="wrapper fadeInDown">';
              }
            } 
                    
    }

    else{
      echo '<div id="login.admin" class="wrapper-not fadeInDown-not">';
    }
?>


<div id="formContent">
<div id="closelogin" class="close_login"><a>X</a></div>

    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first2">
     
      <h3>Administrador</h3>
    </div>

    <!-- Login Form -->
    <form id="formlogin" enctype="multipart/form-data" method="post"
    action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <input type="text" id="login"     class="fadeIn " name="usuario" placeholder="USUARIO" autocomplete="off">
      <input type="password" id="password" class="fadeIn " name="password" placeholder="Contraseña" autocomplete="off">
      <input type="submit"                 class="fadeIn " name="admin" value="Entrar">
    </form>
</div>
</div>



<div class="logo-reparacion">
<img src="../Source/img/servicio.png" class="img-servicio">
</div>
</div>
<script src="../Controller/js/login-admin.js"></script>
</div>
<script>
   $('#formlogin').trigger("reset");
   

</script>
</body>
</html>
