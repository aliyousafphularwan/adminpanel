<?php

		session_destroy();
    $_SESSION["admin"] = "";
 	header('Location: index.php');
?>