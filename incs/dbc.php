<?php

	$conn = mysqli_connect("localhost", "root", "", "ayscms");

	if (!$conn) {
		echo "error connection. " or die(mysql_error());	}

?>