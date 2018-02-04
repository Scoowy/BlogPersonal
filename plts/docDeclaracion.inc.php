<!DOCTYPE html>
<html lang="es">

    <head>
        <?php include_once 'app/config.inc.php'; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo = 'Scoowy Page - Prebuilt Layout';
        }
        echo "<title>$titulo</title>";
        ?>
        <link rel="icon" type="image/png" href="<?php echo RUTAIMG ?>favicon.png"/>

        <!-- Bootstrap -->
        <link href="<?php echo RUTACSS; ?>bootstrap.min.css" rel="stylesheet">
        <!-- Mis estilos propios -->
        <link href="<?php echo RUTACSS ?>estilos.css" rel="stylesheet">
        <!-- Tipografia iconica -->
        <link href="<?php echo RUTACSS ?>fontawesome-all.min.css" rel="stylesheet">
    </head>

    <body>