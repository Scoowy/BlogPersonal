<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = 'Scoowy Page - Prebuilt Layout';

include_once 'plts/docDeclaracion.inc.php';
include_once 'plts/navBar.inc.php';
?>

<main role="main" class="container">
	<div class="jumbotron">
		<h1>
			Novedades
			<small class="text-muted">Siempre actualizado</small>
		</h1>
		<hr class="my-4">
		<p class="lead">Etiam hendrerit libero magna, non sollicitudin orci vehicula a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque maximus sollicitudin dolor eget eleifend. </p>
		<a class="btn btn-primary" href="#">Seguir leyendo &raquo;</a>
	</div>

	<div class="container">
		<div class="row">
			<div id="bannerP" class="col-md-4">
				<h1>Lorem ipsum dolor sit amet.</h1>
				<hr class="my-4">
				<p class="text-justify">Etiam hendrerit libero magna, non sollicitudin orci vehicula a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque maximus sollicitudin dolor eget eleifend. Curabitur aliquet porta sapien sed vulputate.</p>
			</div>
			<div id="bannerSep" class="col-md-1">
				<div id="separadorCol">

				</div>
			</div>
			<div id="bannerG" class="col-md-7">
				<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h1>
				<hr class="my-4">
				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue arcu et dui faucibus maximus. Morbi ullamcorper est risus, quis lacinia ligula iaculis nec. Etiam sollicitudin magna facilisis, feugiat justo ut, maximus magna. Cras finibus massa quis leo volutpat fringilla. Sed lacus diam, luctus ut velit non, viverra interdum neque. Donec suscipit massa a pretium congue. Integer in tortor auctor, tristique tellus vitae, mollis purus. Donec nec augue non elit egestas euismod sed quis libero. Morbi vitae mi quis lorem posuere vulputate quis id est. Nunc finibus lacus quam, venenatis porttitor lacus faucibus eget. Maecenas vehicula porta odio quis suscipit. Praesent porta vulputate tortor, porttitor placerat dolor posuere vel. Quisque ut vestibulum urna, et tempor dolor. Etiam sagittis magna vitae pellentesque feugiat. Fusce facilisis ac odio vel posuere. Cras facilisis dapibus cursus. Integer elementum felis quis est mollis vestibulum. Maecenas nibh leo, maximus nec vestibulum vel, gravida mattis dui. Curabitur in scelerisque nibh. Suspendisse vestibulum vestibulum facilisis. Pellentesque accumsan sagittis vestibulum. Praesent sodales, elit eu ultricies rutrum, arcu ligula volutpat nunc, eu pulvinar quam risus nec erat. Vivamus iaculis nibh in molestie dictum. </p>
			</div>
		</div>
	</div>
	<br>
	<hr class="my-4">
	<div class="container">
		<h1>Ultimos articulos</h1>
	</div>

	<!-- Tarjetas giratorias -->
	<div class="contenedor">
		<div class="contenedor_tarjeta" id="tarjetaPy">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_Py.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>

		<div class="contenedor_tarjeta" id="tarjetaHTML">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_HTML.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>

		<div class="contenedor_tarjeta" id="tarjetaPHP">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_PHP.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>
		<div class="contenedor_tarjeta" id="tarjetaPy">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_Py.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>

		<div class="contenedor_tarjeta" id="tarjetaHTML">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_HTML.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>

		<div class="contenedor_tarjeta" id="tarjetaPHP">
			<a href="#">
				<figure id="tarjeta">
					<img src="img/Ext_PHP.jpg" class="frontal" alt="">
					<figcaption class="trasera">
						<h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
					</figcaption>
				</figure>
			</a>
		</div>
	</div>
	<!-- Fin Tarjetas giratorias -->
</main>

<?php
include_once 'plts/docCierre.inc.php';
?>

<script>
    $(function() {$('#linkInicio').addClass("active");});
</script>