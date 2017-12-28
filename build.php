<?php
	include ('connect.php');

	for ($i=0; $i < 10; $i++) {
		$file = file_get_contents('https://loripsum.net/api/10/short/',true);
		$uTime = time();
		$query = "INSERT INTO `bposts` (`content`, `date`) VALUES ('".$file."', '".$uTime."');";
		$result = mysqli_query($link,$query);
	}
?>