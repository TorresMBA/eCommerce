<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}

		function nuevo(){
                location.href="../Vista/ingresarUsuAdmin.php";
        }
	</script>
	<!-- //custom-theme -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style7.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui1.css">
	<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<link rel="stylesheet" type="text/css" href="../css/checkout.css">
	<link rel="stylesheet" href="../css/shop.css" type="text/css" media="screen" property="" />
	<link rel="stylesheet" href="../css/about.css" type="text/css" media="screen" property="" />
	<link href="../css/font-awesome.css" rel="stylesheet">
	<script type="text/javascript" src="../js/carrito.js"></script>
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">
			<div class="header_agileits">
				<div class="logo inner_page_log">
					<h1><a class="navbar-brand" href="../index.php"><span>Downy</span> <i>Shoes</i></a></h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>
					<nav>
						<ul>
							<li><a href="../index.php" class="active">Inicio</a></li>
							<li><a href="../Vista/nosotros.php">Nostros</a></li>
							<li><a href="../Vista/404.php">Team</a></li>
							<li><a href="../Controlador/controlador_sneakers.php?op=1">Comprar Ahora</a></li>
							<li><a href="../Vista/contacto.php">Contacto</a></li>	
							<?php 
								if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {									
									echo '<li><a href="../Controlador/controlador_usuario.php?op=1">Listar Usuarios</a></li>';
									echo '<li><a href="../Vista/ingresarUsuAdmin.php">Ingresar Usuarios</a></li>';
									echo '<li><a href="../Controlador/controlador_producto.php?op=1">Listar Productos</a></li>';
									echo '<li><a href="../Vista/ingresarProducto.php ">Ingresar Productos</a></li>';
									echo '<li><a href="../Controlador/controlador_usuario.php?op=3&id='.$_SESSION['id'].'">'.$_SESSION['usuario'].'</a></li>';
									echo '<li><a href="../Controlador/controlador_sesion.php?op=2">Cerrar Sesion</a></li>';
								}else{	
									if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 2) {
										echo '<li><a href="../Controlador/controlador_usuario.php?op=3&id='.$_SESSION['id'].'">'.$_SESSION['usuario'].'</a></li>';
										echo '<li><a href="../Controlador/controlador_sesion.php?op=2">Cerrar Sesion</a></li>';
									}else{	
							?>
										<li><a href="../Vista/login.php">Login</a></li>
										<li><a href="../Vista/registrar.php">Registrarse</a></li>
							<?php 
									}
								}
							?>
						</ul>
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- //cart details -->
		<!-- search -->
		<div class="search_w3ls_agileinfo">
			<div class="cd-main-header">
				<ul class="cd-header-buttons">
					<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
				</ul>
			</div>
			<div id="cd-search" class="cd-search">
				<form action="#" method="post">
					<input name="Search" type="search" placeholder="Haga clic en Enter después de escribir ...">
				</form>
			</div>
		</div>
		<!-- //search -->
		<div class="clearfix"></div>
		<!-- /banner_inner -->
		<div class="services-breadcrumb_w3ls_agileinfo">
			<div class="inner_breadcrumb_agileits_w3">
				<ul class="short">
					<li><a href="../index.php">Inicio</a><i>|</i></li>
					<!--<li>Shop</li>-->
				</ul>
			</div>
		</div>
	</div>