<?php 

require_once 'usuario.php';

if(isset($_POST['cadastra'])){

	$novo_usuario = new Usuario();

	$novo_usuario->setNome($_POST['nome']);
	$novo_usuario->setPeso($_POST['peso']);
	$novo_usuario->setSexo($_POST['sexo']);
	$novo_usuario->setEmail($_POST['email']);
	$novo_usuario->setAltura($_POST['altura']);

	$input_idade=$_POST['idade'];
	$idade=date("Y-m-d",strtotime($input_idade));
	$novo_usuario->setIdade($idade);

	$senha = $_POST['senha'];
	$senhac = $_POST['senhac'];
	
	if ($senha != $senhac) {
		echo "Senhas não correspondem.";
	}
	else
	{
		$novo_usuario->setSenha($_POST['senha']);
		if($novo_usuario->insert()){
			echo "Usuário cadastrado com sucesso!";
		} else {
			echo "Falha ao cadastrar usuário.";
		}
	}  

}


?>