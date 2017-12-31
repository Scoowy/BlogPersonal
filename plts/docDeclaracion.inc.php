<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
	if (!isset($titulo) || empty($titulo)) {
		$titulo = 'Scoowy Page - Prebuilt Layout';
	}
	echo "<title>$titulo</title>";
	?>
	<link rel="icon" type="image/png" href="img/favicon.png"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Mis estilos propios -->
	<link href="css/estilos.css" rel="stylesheet">
	<!-- Tipografia iconica -->
	<link href="css/fontawesome-all.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- ondragstart="return false" onselectstart="return false" oncontextmenu="return false" clases para evitar mover, remarcado y menu de opciones -->