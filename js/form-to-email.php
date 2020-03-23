<?php


$Nome = $_POST['nome'];
$Email = $_POST['email'];
$Fone = $_POST['telefone'];
$Duvida = $_POST['duvida'];

$email_body = "Recebemos uma mesagem do usuario $Nome.\n email: $Email \n telefone: $Fone\n>Aqui esta a mensagem: \n\n $Duvida";

$to = 'ejec.empresa@gmail.com';


if(mail($to, "Nova Mensagem no Site", $email_body)){
    echo 'Mensagem Enviada!';
?> 

    <meta http-equiv="refresh" content=1;url="https://hamiltonmengo.000webhostapp.com">

<?php
}
else{
  echo 'Mensagem nao enviada';
}
?> 
