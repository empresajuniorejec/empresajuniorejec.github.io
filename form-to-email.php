<?php

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['duvida'])) {
	
	$Nome = $_POST['nome'];
	$Email = $_POST['email'];
	$Fone = $_POST['telefone'];
	$Duvida = $_POST['duvida'];

	$email_body = "Recebemos uma mesagem do usuario $Nome.\n email: $Email \n telefone: $Fone\n>Aqui esta a mensagem: \n\n $Duvida";

	$to = 'ejec.empresa@gmail.com';


	if(mail($to, "Nova Mensagem no Site", $email_body)){
    	echo '<script> confirm("Mensagem Enviada!"); </script>';
	?> 
	    <meta http-equiv="refresh" content=1;url="htttps://ejec.ufsc.br">
	<?php
	}


	else{
  		echo '<script> confirm("Mensagem não enviada!"); </script>';
	?>
 		<meta http-equiv="refresh" content=1;url="https://ejec.ufsc.br">
	<?php
	}
}
?> 
