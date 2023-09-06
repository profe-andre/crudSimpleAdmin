<?php
session_start();
?>

	<?php
	if (isset($_SESSION["Admin"])){?>
		<li><a href="Admin/Logout.php" class="bi ">Salir</a></li>
	<?php
	}
	else{?>
	<li><a href="Admin/Logear.php" class="bi ">Ingresar</a></li>
	<?php
	}?>
