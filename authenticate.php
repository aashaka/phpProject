<?php
session_start();
    // connecting to database
	$username=$_POST['username'];
  $password = $_POST['password'];
  include 'config.php';
  $link = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
  if($link->connect_errno) 
    {
      die ("Connection attempt unsuccessful!");
    }
  else
   {
      $query = "SELECT * FROM verification WHERE username = '{$username}' AND password = '{$password}'";
      $result = $link->query($query);
      if ($row = mysqli_fetch_assoc($result))
        {
          //echo $query;
          //$valid=1;
          $_SESSION['username'] = $_POST['username'];
          header ('Location: index.php');
        }
      else
        {
          echo "Enter valid username and password..<a href='login.html'>Login</a> again or <a href='register.php'>register</a> if you haven't already";
        }
    }
  mysqli_close($link);
?>