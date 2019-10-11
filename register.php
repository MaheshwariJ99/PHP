<!--Student id- 101790658-->
<!--Name-Juttu Maheshwari-->
<!--customer registration PAGE-->
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body bgcolor="#FFFF99">
<?php
//defining varialbes and set to empty values
$nameErr = $pwdErr = $cpwdErr = $emailErr = $phnoErr = "";
$name = $password = $password2 = $email = $phno =$Cid= "";
//input check to all fileds    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = $_POST["name"];
            }
	if (empty($_POST["password"])) {
               $pwdErr= "password is required";
            }else {
               $password =$_POST["password"];
            }
	if (empty($_POST["password2"])) {
               $cpwdErr = "must enter confirm password";
            }else {
               $password2 = $_POST["password2"];
            }
            
        if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = $_POST["email"];
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["phno"])) {
               $phnoErr = "phone number is required";
            }else {
               $phno = $_POST["phno"];
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>
<!--HTML code UI-->
<!--display error messgae to mandatory field-->

<H3>Shiponline System Registration page</H3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<fieldset class="name">

	Name: <input type=text name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br/><br/>
	password: <input type=text name="password">
<span class="error">* <?php echo $pwdErr;?></span>
<br/><br/>
	Confirm password: <input type=password name="password2">
<span class="error">* <?php echo $cpwdErr;?></span>
<br/><br/>
	Email Address: <input type=text name="email">
  <span class="error">* <?php echo $emailErr;?></span>
<br/><br/>
	phone number: <input type=text name="phno">
  <span class="error">* <?php echo $phnoErr;?></span>
<br/><br/><input type="submit" name= "sub" value="Register" />
</fieldset>
<br/><br/><a href="shiponline.php">Home</a></form>

<?php
$errors=0;//intializing error variable to 0 
if(!empty($_POST)){
	//checks given password and confirm password is same or not 
	if($password == $password2)
	{
//connecting database mysqli
$user = "s101790658";
$passwd = "090593";
$database = "s101790658_db";
$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", $user,$passwd,$database)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
$TableName = "customer";//table name
$SQLstring = "INSERT INTO $TableName(Name, password, email, phoNo) VALUES( '$name', '$password', '$email', '$phno')";//insert data into table
$queryResult = @mysqli_query($DBConnect, $SQLstring)
Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
if ($queryResult === FALSE) 
{
 echo "<p>Unable to save your registration " . " information. Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
++$errors;// 
}
else{
$Cid = mysqli_insert_id($DBConnect);//generate customer number
}
  mysqli_close($DBConnect);//connection close	
}
else {
echo "<p>password do not match </p>";
}
if($errors==0)
{
//if display the message
echo "<p>Dear, $name.";
echo "you are successfully registered into ShipOnline, and your customer Number is  $Cid </p>\n";
}
}

?>
</body>
</html>
