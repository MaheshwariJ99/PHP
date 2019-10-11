<!--Student id- 101790658-->
<!--Name-Juttu Maheshwari-->
<!--LOGIN PAGE-->
<html>
<body bgcolor="#FFFF99">
<H3> shipOnline system login page</H3>
<fieldset class="number"><!--give the box-->
<form method="post">
<!--HTML Code to diplay form-->
Customer Number: <input type=text name="number" >
<br/><br/>
password: <input type=password name="pass" >
<br/><br/>
	<input type="submit" name="sub" value="Login"></form>

</fieldset>

<br/><br/><a href="shiponline.php">Home</a>

</body>
</html>

<?php

//check and excutes when submit button clicked
if(isset($_POST['sub'])){
$user = "s101790658";//Db connection
$passwd = "090593";
$database = "s101790658_db";
$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", $user,$passwd,$database)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
$cnumber = $_POST['number'];//taking the variable values for furthur use
$password =$_POST['pass'];

$result = mysqli_query($DBConnect,'SELECT * FROM customer WHERE Cid="'.$cnumber.'" and password ="'.$password.'"');//chekcs cid, password in table

if(mysqli_num_rows($result)==1){
	$_SESSION['number'] = $cnumber;//checking customer number
	header('Location:request.php');//redirect to page 
}
else
echo "Account invalid";//messgae displayed 
}
?>
