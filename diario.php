<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: index.html");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FIT&HEALTHY</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style-cadastro.css" />

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
				<div class="row" >
					<div class="col-md-8" align="content">
						<div class="booking-form" >
							<form method="get" action="relatorio.php">
								<div class="titulo-cadastro">
									<h2>DIÁRIO DE CALORIAS</h2>
									<br>
								</div>	
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<span class="form-label">Calorias Ingeridas</span>
											<input name="caloriaGanha" min="0" step="100" class="form-control" type="number" placeholder="00" required>
										</div>
									</div>
				            	<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<span class="form-label">Calorias Gastas</span>
											<input name="caloriaGasta" min="0" step="100" class="form-control" type="number" placeholder="00" required>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button name="cadastra" type="submit" class="submit-btn">Concluído</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>