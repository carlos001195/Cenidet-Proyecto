
    <?php
    require '../Source/PHPMailer/Exception.php';
    require '../Source/PHPMailer/PHPMailer.php';
    require '../Source/PHPMailer/SMTP.php';
    
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
      
    function sendMailL($NombreSolicitante):bool{

       $mail = new PHPMailer(true);
       
       try {
           $mail->isSMTP();                                            // Send using SMTP
           $mail->SMTPSecure = 'tls';
           $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
           $mail->Username   = 'carlos.floresmontes11@gmail.com';                     // SMTP username
           $mail->Password   = '36AA5171b7@';                               // SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
           $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
       
           //Recipients
           $mail->setFrom('carlos.floresmontes11@gmail.com',"Tecnico/Cenidet");
           $mail->addAddress("carlos.floresmontes11@gmail.com" );      // Persona Encargada del sistema
        //   $mail->addAddress($mailuser); //persona dde quien la solicito
         
         // Set email format to HTML
           $mail->Subject = 'Liberacion de Servicio/CENIDET';
       
            
         $mail->Body    =   "Liberacion de servicio por parte del SR(a) {$NombreSolicitante}";
    
         
        if ($mail->send()==TRUE){
           return true;
          }
        else{    
          return false;
          }
        } catch (Exception $e) {
          return false;
        
        }
        
      
  }