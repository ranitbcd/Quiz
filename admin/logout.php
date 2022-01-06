<?php
	session_start();
	session_destroy();
	$s=md5("true");
	header('Location:../login.php?logout='.$s);
?>