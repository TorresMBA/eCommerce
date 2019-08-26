<?php 
	include_once 'header.php';

	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	
<?php 
	}else{
		include_once '404.php';
	}
	include_once 'footer.php';
?>