<?php 

require_once 'usuario.php';

if (isset($_POST['login'])) {
	$usuario = new Usuario();
	$usuario->setEmail($_POST['email']);
	if($usuario->countEmail()){
		$usuario = $usuario->selectByEmail();
		if($usuario->senha == $_POST['senha']){
			session_start();
			$_SESSION['id'] = $usuario->idusuario;
			header("Location: ../diario.php");
		} else {
			echo "Senha incorreta.";
		}
	}
	else{
		echo "E-mail inexistente.";
	}
}



?>