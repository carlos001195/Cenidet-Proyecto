 <?php
    
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    

    class classSendMail{
          // correo de administrado puede poner el correo que enviara los correos
        const correoAdmin="carlos.floresmontes11@gmail.com";
        const contraseña="36AA5171b7@";
        const smtpCorreo="smtp.gmail.com";
        const puerto="587";

        private ?string $id;
        private ?string $Nombre;
        private ?string $NombreT;     
        private ?string $CorreoT;
        private ?string $FechaR;
        private ?string $Area;
        private ?string $Tipo;
        private ?string $opcion;
        private ?string $detalle;
        
        

      function __construct($id,$Nombre,$NombreT,$CorreoT,$FechaR,$Area,$Tipo,$opcion,$detalle){
           $this->id=$id;
           $this->Nombre=$Nombre;
           $this->NombreT=$NombreT;
           $this->CorreoT=$CorreoT;
           $this->FechaR=$FechaR;
           $this->Area=$Area;
           $this->Tipo=$Tipo;
           $this->opcion=$opcion;
           $this->detalle=$detalle;

      }
      
  
  function mailAdmin(){
    $mail = new PHPMailer(true);
            
             
      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->SMTPSecure = 'tls';
          $mail->Host       = self::smtpCorreo;                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = self::correoAdmin;                     // SMTP username
          $mail->Password   = self::contraseña;                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = self::puerto;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
          //Recipients
          $mail->setFrom(self::correoAdmin,"Sistema De Solicitud/Asignacion");
          $mail->addAddress(self::correoAdmin);
          
          $mail->Subject = 'Asignacion de Servicio'; //ENVIO AL AMINISTADOR
          $mail->isHTML(true);   
        
          $mail->Body    = "Se ha realizado  la verificación de la solicitud  del tipo: <b>'{$this->Tipo}'</b> 
          <br>Nombre de la persona  quien lo solicito es: <b>{$this->Nombre}</b>
           el dia de {$this->FechaR},<p> En el Area de <b>{$this->Area}.</b>
           </p><br>El Tecnico que lo atendera sera: <b>{$this->NombreT}</b>
          <br>{$this->opcion} <p>{$this->detalle}</p>"; 
        
         $mail->send();
                  
        

      } catch (Exception $e) {
       
      return false;  
      }
      return false;
  }
  
private function getprotocolo(){
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $urlP  ="https://"; 
    }else{
      $urlP  ="http://"; 
    }
  return $urlP;
}
 
  function mailAdminT(){

     $mail = new PHPMailer(true);

      
    try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->SMTPSecure = 'tls';
      $mail->Host       =  self::smtpCorreo;                      // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = self::correoAdmin;                     // SMTP username
      $mail->Password   = self::contraseña;                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = self::puerto;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom(self::correoAdmin,"Sistema De Solicitud/Asignacion");
      $mail->addAddress($this->CorreoT);
    
      $mail->Subject = 'Asignacion de Servicio'; //ENVIO AL AMINISTADOR
      $mail->isHTML(true);   
    
     
    
         $mail->Body    = "
         Se ha realizado  la ".utf8_decode("verificación")." de la  solicitud del tipo: <b>'{$this->Tipo}'</b> 
         <br>Nombre de la persona  quien lo solicito es: <b>{$this->Nombre}</b> el dia de {$this->FechaR},<p> En el Area de <b>". utf8_decode($this->Area)."</b><br>
       <b>Detalles del problema</b><br>
         <br>{$this->opcion} <p>{$this->detalle}</p>

             <a href={$this->getprotocolo()}{$_SERVER["HTTP_HOST"]}/View/Asignacion.php?solicitud={$this->id}>Tomar Solicitud</a>";

         $mail->send();

    } catch (Exception $e) {
    
    return false;  
    }
    return false;
  }


  }