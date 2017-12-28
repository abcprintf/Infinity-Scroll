<?php
	include ('connect.php');

	$myArry = array();
	$myRow = array();

	if(empty($_POST['iload'])){
		$vlimit = 1;
	}else{
		$vlimit = $_POST['iload'];
	}

	if(isset($_POST['oset'])){
		$oset = $_POST['oset'];
	}else{
		$oset = 0;
	}

	$myArry['error'] = $_POST['oset'];
	$myArry['vlimit'] = $vlimit;
	$myArry['oset'] = $oset;

	$date = new DateTime();

	$query = "SELECT * FROM `posts` ORDER BY `id` ASC LIMIT ".$vlimit." OFFSET ".$oset."";
	$result = $link->query($query);
	while ($row = $result->fetch_array()) {
		$date->setTimestamp($row['date']);
		$myRow[] = array(
			"id" => "ID : ".$row['id'],
			"content" => $row['content'],
			"date" => $date->format('Y-m-d H:i:s')
		);
	}

	$myArry['content'] = $myRow;
	echo json_encode($myArry);
?>