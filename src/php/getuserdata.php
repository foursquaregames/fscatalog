<?php
require_once 'connect_to_mysql.php';

if (isset($_POST['action']) && $_POST['action'] == "getuserdata") {
	if (isset($_POST['getdata'])) {
		session_name('fscatalog');
		session_start();
		$link = connect_to_mysql();
		if ($link) {
			$sql = "SELECT ".$_POST['getdata']." FROM users WHERE user_name='".$_SESSION["user_name"]."'";
			$result = $link->query($sql) or die($link->error);
			$returnedcol = $result->fetch_assoc();
			$colvalue = $returnedcol[$_POST['getdata']];
			echo $colvalue;
		}
	}
}
?>