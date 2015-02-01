<?php 
    include 'config.php';
    $link = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
		$linkPosted=$_POST['newLink'];
		$sql = "INSERT INTO links (descrip)
		VALUES ('".$linkPosted."')";
		//echo $sql;
		if ($link->query($sql) === TRUE)
		{
			$query="SELECT * FROM links ORDER by time desc";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) 
   {
       while($row = mysqli_fetch_assoc($result)) 
       {
       echo '<div style="background-color:#dddddd;border:2px;color:red;width:300px;margin:2px;">'.$row['descrip'].'<br />'.$row['username'].'</span><&nbsp>'.$row['time'].'</div>';
    	}
  	}
    else
     {
     	echo "No links added";
     }
     mysqli_close($link); 
    		//echo "New record created successfully.";
    		//sleep(5);
		}
		else 
		{
    		echo "Ooops! Try again";
		}
?>