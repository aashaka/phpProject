<html>
<head>
<title>
Link Sharing
</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
	$.ajax({url:"dbShow.php",success:function(result)
			{
    			$("#linkBox").html(result);
  			}
  		});
	$("#submit2").on('click',function()					//only click functionality
		{

			var newLink1 = $("#newLink").val();
			$.ajax({
  				type: "POST",
  				url: "dbAdd.php",
  				data: {newLink:newLink1}
				})
  			.done(function( result ) {
    		$("#linkBox").html(result);
  			});
  			$("#newLink").val("");	
		});
	$("#newLink").bind("enterKey",function(e)			//Enter functionality added
  		{
			var newLink1 = $("#newLink").val();
			$.ajax({
  				type: "POST",
  				url: "dbAdd.php",
  				data: {newLink:newLink1}
				})
  			.done(function( result ) {
    		$("#linkBox").html(result);
  			});
  			$("#newLink").val("");						//Making value of textbox null
		});
	$("#newLink").keyup(function(e){
	if(e.keyCode == 13)
	{
	  $(this).trigger("enterKey");
	}
	});
});

</script>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['username']))
{
	echo 'Welcome, '.$_SESSION['username'].'! Feel free to post comments!<span style="float:right"><a href="logout.php">Logout</a></span><br />';
	echo '
			Post your links:
          <input type="text" id="newLink" style="height:100px; width:300px;">
          <input type="submit" value="Submit" id="submit2">'
          ;
	
}
else
{
	echo '<a href="login.php">Login</a> or <a href="register.php">Register</a> to post comments.<br />';
}
?>
<div id="linkBox"></div>
</body>
</html>