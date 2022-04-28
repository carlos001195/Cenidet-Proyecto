<?php 
include_once '../Model/conexion.php';

session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>  window.history.back();</script>";
  }


    $admin=new Connection_db();
    $lista=$admin->listaTecnico();
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../Source/css/normalize.css">
    <link rel="stylesheet" href="../Source/css/index.css">
    <link rel="stylesheet" href="../Source/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Administrador</title>
</head>

<body>

<script src="../Controller/js/jquey.js"></script>

<?php 
include_once "../include/banner_tenc.php";

?>

<div class="conteiner">
<div class="item">
    <div id="menu-tecnico" class="menu-tecnico">
            <?php
            foreach($lista as $fila){
              if ($fila['status']==0){
                echo "<div class='perfil perfil-hover perfil-enabled' value={$fila['status']}>";
              }else{
                echo "<div class='perfil perfil-hover ' value={$fila['status']}>";
            
              }
            echo "
                <div class='conteiner-perfil'>
                <div class='imgtecn {$fila['idTecnico']}'>        
            
                <img src='../Source/img/perfil-tec.png' class='imgt  '>
                <div id='nombre-tec-menu' class='nombre-tecn'> {$fila['Nombre']}
                {$fila['ApellidoP']}</div>
            
                </div>
                </div>
                </div>";
            }
            
            ?>
        
          </div>
</div>

    
<div class="item">
<div class="menu-btns">
              <button type="button"                    class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Añadir Técnico</button>
              <button type="button" id ="btnhabilidad" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@getbootstrap">Añadir Habilidad</button>
              <button type="button" id ="btnedit"      class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-bs-whatever="@getbootstrap">Editar Técnico</button>
              <a href="../Model/backup.php" class="btn btn-success">Exportar Bitácora</a>
      


   <div class="modal fade" id="exampleModal" tabindex="-1" 
 aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Técnico</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="formTecnico">
      
      <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" id="recipient-Nombre" name="nombre">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellido P</label>
            <input type="text" class="form-control" id="recipient-Apellidop" name="apellido1"> 
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellido M</label>
            <input type="text" class="form-control" id="recipient-Apellidom" name="apellido2">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo</label>
            <input type="text" class="form-control" id="recipient-mail" name="correo">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="addTecnico" class="btn btn-success" data-bs-dismiss="modal">Añadir</button>
    
      </div>
        </form>    
    </div>
  </div>
 </div>
 </div>





 <div class="modal fade" id="exampleModal2" tabindex="-1" 
        aria-labelledby="exampleModalLabel" aria-hidden="true"> 
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post">
            <div class="mb-3">
            <label for="recipient-name" id="nombre-label"class="col-form-label">SS</label>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Habilidad</label>
            <select id="lista-habilidad" name="Prioridad"><?php 
        $lisT=array("EQUIPO DE COMPUTO"=>" EQUIPO DE COMPUTO Y SOFTWARE",
        "IMPRESORA"=>"IMPRESORA","INTERNET"=>"INTERNET Y TELEFONIA",
        "SERVICIO WEB"=>"SERVICIO WEB Y CORREO ELECTRONICO","SII"=>"SII",
        "OTRO"=>"OTRO");

          foreach($lisT as  $valor => $value){                        
             echo "<option value='{$valor}'>{$value}</option>";
             }
            
            ?>
            
            
            </select>
            </div>


            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prioridad</label>
            <select id="lista-prioridad" name="Prioridad"><?php 
            for($cont=1;$cont<=10;$cont++){
                echo "<option value='{$cont}'>{$cont}</option>";
            }?></select>
            </div>
            </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="addhabilidad"class="btn  btn-success" data-bs-dismiss="modal">Añadir</button>
          </div>
        </form>
    </div>
  </div>
 </div>       




  <div class="modal fade" id="exampleModaledit" tabindex="-1" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" >
      
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo</label>
            <input type="text" class="form-control " id="recipient-mailupdate" name="correo">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Estado</label>
            <div class="form-check form-switch">
      
            <input  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
            </div>

          </div>
          <div class="modal-footer">
        <button type="button" id="btn_exit" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="buttonupdate" class="btn btn-primary" >Actualizar</button>
        <button type="button" id="delete" class="btn btn-danger" >Eliminar</button>
    
      </div>
        </form>    
    </div>
  </div>
 </div>
 </div>

<a href="../Controller/outlogin.php" class="btn btn-danger">Cerrar Sesión</a>
</div>
<br>
<table class="table table-primary table-hover table-bordered table-striped"> 
<thead class="table-dark">

        <th>Habilidad</th>
        <th>Prioridad</th>
        <th>Acción</th>        
    </thead>
<tbody id="body"></tbody>
</table>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="../Controller/js/eventoAdmin.js"> 
</script>
</body>
</html>