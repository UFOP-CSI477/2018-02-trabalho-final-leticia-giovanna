<?php
	
	require_once 'php/usuario.php';

	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: index.html");
	}

	if(!isset($_GET['caloriaGanha']) || !isset($_GET['caloriaGasta'])){
		header("Location: diario.php");
	}


	$caloriaGanha = $_GET['caloriaGanha'];
	$caloriaGasta = $_GET['caloriaGasta'];

	$usuario = new Usuario();
	$usuario->setIdUsuario($_SESSION['id']);
	$usuario = $usuario->selectById();

	$imc = ($usuario->peso / (($usuario->altura * $usuario->altura)/100)) * 100;
	$imc = number_format((float)$imc, 2, '.', '');

	$peso = $usuario->peso;
	$idade =  $usuario->idade;
	$sexo =  $usuario->sexo;
	$calmax = 0;

	if($sexo == "F"){
		if($idade >= 10 && $idade < 18){
			$calmax = (12.2 * $peso) + 746; 
		}
		else if($idade >= 18 && $idade < 30){
			$calmax = (14.7 * $peso) + 796;
		}
		else if($idade >= 30 && $idade < 60){
			$calmax = (8.7 * $peso) + 823;
		}
		else if($idade >= 60){
			$calmax = (10.5 * $peso) + 596;
		}
	}
	else if ($sexo == "M"){
		if($idade >= 10 && $idade < 18){
			$calmax = (17.5 * $peso) + 651;
		}
		else if($idade >= 18 && $idade < 30){
			$calmax = (15.3 * $peso) + 679;
		}
		else if($idade >= 30 && $idade < 60){
			$calmax = (8.7 * $peso) + 879;
		}
		else if($idade >= 60){
			$calmax = (13.5 * $peso) + 487;
		}
	}


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>FIT&HEALTHY</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
 	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="booking-form">
							<table class="table align-items-center table-flush">
								<div class="table-responsive">
									<h2>RELATÓRIO DIÁRIO</h2>							
									<br>
								</div>

								<thead class="thead-light">
						            <tr>
						            	<th scope="col">Nome do Usuário</th>		
						                <th scope="col">IMC</th>
						                <th scope="col">Máximo de Calorias</th>
						                <th scope="col">Calorias Ingeridas</th>
						                <th scope="col">Calorias Gastas</th>
						                <th scope="col">Calorias Totais</th>
						            </tr>
	                			</thead>
	                			<thbody class="thbody-light">
						            <tr>
						            	<td scope="col"><?php echo $usuario->nome; ?></td>		
						                <td scope="col"><?php echo $imc; ?></td>
						                <td scope="col"><?php echo $calmax . " calorias"; ?></td>
						                <td scope="col"><?php echo $caloriaGanha; ?></td>
						                <td scope="col"><?php echo $caloriaGasta; ?></td>
						                <td scope="col"><?php echo $caloriaGanha - $caloriaGasta; ?></td>
						            </tr>
	                			</thbody>
	                		</table>
	                		
                			<div class="form-btn">
								<a href="diario.php" name="fechar" class="submit-btn">Fechar</a>
							</div>
	                	</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>             
</body>

</html>