<?php
   if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['duvida'])) {

      $Nome   = $_POST['nome']; // Pega o valor do campo Nome
      $Fone   = $_POST['telefone']; // Pega o valor do campo Telefone
      $Email  = $_POST['email'];  // Pega o valor do campo Email
      $Duvida = $_POST['duvida']; // Pega os valores do campo Dúvida

      $Vai    = "Nome: $Nome<br>E-mail: $Email<br>Telefone: $Fone<br>Comentários: $Duvida<br>";

      require 'phpmailer/PHPMailerAutoload.php';

      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->SMTPDebug = 2;
      $mail->Debugoutput = 'html';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPAuth = true;
      $mail->Username = "ejec.empresa@gmail.com";
      $mail->Password = "2k18ejecac";
      $mail->setFrom($Email, 'Contato');
      $mail->addAddress('ejec.empresa@gmail.com');
      $mail->Subject = 'Nova Mensagem no Site';
      $mail->Body = nl2br($Vai);
      //$mail->msgHTML($Vai);
      if (!$mail->send()) {
          echo '<script> confirm("Erro ao enviar mensagem!"); </script>';
      } else {
          echo '<script> confirm("Mensagem enviada!"); </script>';
      }
   }
   echo '<meta http-equiv="refresh" content="0;url=index.html" />';
?>
