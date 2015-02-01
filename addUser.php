<?php
	include 'config.php';
	$link = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
	$user=$_POST['newUser'];
	$pass=$_POST['newPass'];
	//$pass = $_POST['password'];
	$sql = 'INSERT INTO verification
	VALUES ("'.$user.'","'.$pass.'")';
	if ($link->query($sql) === TRUE) {
    echo 'Registration successful!';
	}
	else {
    echo "Ooops! Try again";
    //sleep(5);
	}
	header('Location: index.php');
	mysqli_close($link);
	?>