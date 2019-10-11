<!--Student id- 101790658-->
<!--Name-Juttu Maheshwari-->
<!--request PAGE-->
<html>
<body bgcolor="#FFFF99">
<?php
//defining varialble to empty
$DesErr = $wtErr = $AddErr = $subErr = $pdErr = $RnameErr= $RaddErr= $RsubErr = $stateErr ="";
$Des = $Wt = $Add = $Sub =$hours=$min= $month =$year =$day= $pd= $Rname = $RId =$Radd =$Rsub = $cost ="";
$state= array();
	//input checking to each and every field of information
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["description"])) //checks filed leave empty 
		{
               $DesErr = "Misssing";
            }else {
               $Des = $_POST["description"];
            }
	 if (empty($_POST["quantity"])) {
               $wtErr = "you must seelect one";
            }else {
               $Wt = $_POST["quantity"];
            }
	 if (empty($_POST["adress"])) {
               $AddErr = "Misssing";
            }else {
               $Add = $_POST["adress"];
            }
	 if (empty($_POST["suburb"])) {
               $subErr = "Misssing";
            }else {
               $Sub = $_POST["suburb"];
            }
	 if (empty($_POST["reciver"])) {
               $RnameErr = "Misssing";
            }else {
               $Rname = $_POST["reciver"];
            }
	 if (empty($_POST["raddress"])) {
               $RaddErr = "Misssing";
            }else {
               $Rdd = $_POST["raddress"];
            }
	 if (empty($_POST["rsuburb"])) {
               $RsubErr = "Misssing";
            }else {
               $Rsub = $_POST["rsuburb"];
            }
	 if (empty($_POST["state"])) {
               $stateErr = "must select 1";
            }else {
               $state = $_POST["state"];
            }
	}
	function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

?>
<!--HTML Code-->
	<H3>Item Information:</H3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset class="desc"> 

<fieldset class="Description"> 

Description: 
	<input type="text" name="description">
	<span class="error"><?php echo $DesErr;?></span></br></br>
weight: 
	<input type="number" name="quantity" min="2" max="20">
	<span class="error"><?php echo $wtErr;?></span>
</fieldset>
<H3>Pick-up Information:</h3>
<fieldset class="Address"> 
Address: 
	<input type="text" name="adress">
	<span class="error"><?php echo $AddErr;?></span></br><br/>
Suburb: 
	<input type="text" name="suburb">
	<span class="error"><?php echo $subErr;?></span></br><br/>
<!--date format drop down-->
Preferred date: <select id="day_start" 
          name="day" /> 
    <option selected="selected" value="">Day</option>
    <option>1</option>       
    <option>2</option>       
    <option>3</option>       
    <option>4</option>       
    <option>5</option>       
    <option>6</option>       
    <option>7</option>       
    <option>8</option>       
    <option>9</option>       
    <option>10</option>       
    <option>11</option>       
    <option>12</option>       
    <option>13</option>       
    <option>14</option>       
    <option>15</option>       
    <option>16</option>       
    <option>17</option>       
    <option>18</option>       
    <option>19</option>       
    <option>20</option>       
    <option>21</option>       
    <option>22</option>       
    <option>23</option>       
    <option>24</option>       
    <option>25</option>       
    <option>26</option>       
    <option>27</option>       
    <option>28</option>       
    <option>29</option>       
    <option>30</option>       
    <option>31</option>       
  </select>
  <select id="month_start" 
          name="month" />
    <option selected="selected" value="">Month</option>
    <option>January</option>       
    <option>February</option>       
    <option>March</option>       
    <option>April</option>       
    <option>May</option>       
    <option>June</option>       
    <option>July</option>       
    <option>August</option>       
    <option>September</option>       
    <option>October</option>       
    <option>November</option>       
    <option>December</option>       
  </select> 
  <select id="year_start" 
         name="year" /> 
    <option selected="selected" value="">Year</option>
    <option>2018</option>       
    <option>2019</option>       
    <option>2020</option>       
    <option>2021</option>       
    <option>2022</option>              
  </select> <br/><br/>
preffered time: <select id="hour" name="hours"/>
        <option selected="selected" value="">Hours</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12</option>
	<option>13</option>
	<option>14</option>
	<option>15</option>
	<option>16</option>
	<option>17</option>
	<option>18</option>
	<option>19</option>
	<option>20</option>
	<option>21</option>
	<option>22</option>
	<option>23</option>
	<option>0</option>
</select>

Minutes: <input type="number" name="minu" min="0" max="60">

<br/></fieldset>

<br/><H3>Delivery Information:</H3>
<fieldset class="reciver"> 

Reciever Name:
	<input type=text name="reciver">
	<span class="error"><?php echo $RnameErr;?></span><br/><br/>
Address:
	<input type=text name="raddress">
	<span class="error"><?php echo $RaddErr;?></span><br/><br/>
Suburb:
	<input type=text name="rsuburb">
	<span class="error"><?php echo $RsubErr;?></span><br/><br/>
State:
	<Select name ="state[]" size="1" multiple=""></form>
<?php
//display pass value of state drop down
$options = array("Victoria", "NSW", "Queensland", "SouthAustralia","Western Australia","Tasmania","ACT");
foreach ($options as $option){
echo '<option value ="' . $option .'"';
if(in_array($option, $state)){
echo "selected";
}
echo ">" .ucfirst($option)."</option>";
}

?>
</select><br/><br/>
</fieldset>
	<input type="submit" name= "sub" value="Request" />

</fieldset>
</body>
</html>

<?php
$errors=0;
if(isset($_POST['sub'])){ 
date_default_timezone_set('Australia/Melbourne');
$Rdate = date('y-m-d H:i:s');
$month= $_POST['month'];
$year= $_POST['year'];
$day=$_POST['day'];
$hours =$_POST['hours'];
$min =$_POST['minu'];
$pd = "$year-$month-$day $hours-$min";
//conncting database 
$user = "s101790658";
$passwd = "090593";
$database = "s101790658_db";
$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", $user,$passwd,$database)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
$TableName = "request";
//inserting info into request table
$SQLstring = "INSERT INTO $TableName(RDate,Itemdescr, Weight, pickupA, suburb,pickupdatetime,reciever,deliveryadd,dsuburb,state)
VALUES('$Rdate','$Des', '$Wt', '$Add', '$Sub', '$pd', '$Rname', '$Radd', '$Rsub', '$state')";
$queryResult = @mysqli_query($DBConnect, $SQLstring)
Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
if ($queryResult === FALSE) 
{
 echo "<p>Unable to save your registration information. Error code " . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
++$errors;
}
else{	
$RId= mysqli_insert_id($DBConnect);
}
  mysqli_close($DBConnect);
}
//displaying message 
if($errors==0){
echo "<p>Thank you, your request number is, $RId.";
echo "The cost is $cost. we will pickup the item at $pd.</p>\n";
}
//sending mail 
if($errors==0){
$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", $user,$passwd,$database)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email']));
$sql="SELECT * FROM customer"; 
$result = mysql_query($sql);

$to = "$email";
$subject ="shipping with shiponline";
$message = "Dear .$name , Thank you for using ShipOnline Your request number is $RId . The cost is .$cost. We will pick-up the item at .$pd.";
$from= "-r 101790658@student.swin.edu.au";
 $headers ="from:".$from;
mail($to, $subject, $message, $headers);
}
//caliculating cost based on weight
if($errors==0){
if($Wt >2){
$cost = 2.8;
}
elseif ($Wt <20){
$cost = 2.8+(0.00076*($Wt-2));
}
else{
$cost ="to heavy";
}
echo $cost;
}

?>
