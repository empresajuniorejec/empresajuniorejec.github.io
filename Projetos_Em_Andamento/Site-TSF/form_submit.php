<?php
   if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['duvida'])) {

      // envia email

      // destinatário
      // $to  = 'example@example.com.br';
      $to  = $_POST['email']; //Mudar para o e-mail do TSF
      
      $Nome   = $_POST['nome']; // Pega o valor do campo Nome
      $Fone   = $_POST['telefone']; // Pega o valor do campo Telefone
      $Email  = $_POST['email'];  // Pega o valor do campo Email
      $Duvida = $_POST['duvida']; // Pega os valores do campo Dúvida

      $Vai    = "Nome: $Nome<br>E-mail: $Email<br>Telefone: $Fone<br>Comentários: $Duvida<br>";

      require 'phpmailer/PHPMailerAutoload.php';


      //Create a new PHPMailer instance
      $mail = new PHPMailer;

      //Tell PHPMailer to use SMTP
      $mail->isSMTP();

      //Enable SMTP debugging
      // 0 = off (for production use)
      // 1 = client messages
      // 2 = client and server messages
      $mail->SMTPDebug = 0;

      //Ask for HTML-friendly debug output
      $mail->Debugoutput = 'html';

      //Set the hostname of the mail server
      $mail->Host = 'smtp.zoho.eu';
      // use
      // $mail->Host = gethostbyname('smtp.gmail.com');
      // if your network does not support SMTP over IPv6

      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 465;

      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'ssl';

      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;

      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "sitetsf@zoho.eu";

      //Password to use for SMTP authentication
      $mail->Password = "siteq2S2iNr80Wp5dTSF";

      //Set who the message is to be sent from
      $mail->setFrom("sitetsf@zoho.eu", 'Contato site TSF');

      //Set who the message is to be sent to
      $mail->addAddress($to, 'TSF');

      //Set the subject line
      $mail->Subject = 'Formulario de Contato - ('. $Nome .')';

      $mail->msgHTML($Vai);

      //send the message, check for errors
      if (!$mail->send()) {
          echo '<script> confirm("Erro ao enviar mensagem!"); </script>';
      } else {
          echo '<script> confirm("Mensagem enviada!"); </script>';
      }


      $subject = 'Formulario de Contato - ('. $Nome .')';
      $message = $Vai;

      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      mail($to, $subject, $message, $headers);
   }
   echo '<meta http-equiv="refresh" content="0;url=index.html" />';
?>
