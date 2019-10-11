<!--Student id- 101790658-->
<!--Name-Juttu Maheshwari-->
<!--ADMIN PAGE-->
<html>
<body bgcolor="#FFFF99">
<?php
//variables defined empty values
$date = $dateErr =$itemErr =$item ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {//checks input fields mandatory
            if (empty($_POST["date"])) {
               $dateErr = "please choose date";
            }else {
               $date = $_POST["date"];
            }
            if (empty($_POST["info"])) {
               $itemErr = "must select one";
            }else {
               $item = $_POST["info"];
            }
 }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

?>
<!--HTML code-->
<H3>ShipOnline System Administration Page</h3>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<fieldset class="date">
<!--date drop down-->
Date of Retrieve:<select id="day_start" 
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
      </select>
<span class="error">* <?php echo $dateErr;?></span>

<br/><br/>
<!--radio button-->
Select Date Item for Retrieve: <input type="radio" name="info" value="request">Request Date
			       <input type="radio" name="info" value="pickup">Pickup time
<span class="error">* <?php echo $itemErr;?></span>


<br/><br/>

	<input type="submit" name='sub' value="show" />
</fieldset>

<br/><a href="shiponline.php">Home</a></form>
<?php

$errors=0;
//submit 
if(!empty($_POST)){
if(!empty($_POST["date"]) || !empty($_POST['info'])){
//database
$user = "s101790658";
$passwd = "090593";
$database = "s101790658_db";
$DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au", $user,$passwd,$database)
Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
if(isset($_GET['info']) =="request"){
$SQLstring = "select c.Cid,r.RId,r.Itemdescr,r.weight,r.suburb,r.pickupdatetime,r.dsuburb,r.state FROM customer c,request r where c.Cid=r.RId and r.RId='".$_POST['date']."'" ;
$queryResult = @mysqli_query($DBConnect, $SQLstring)
Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
echo "<table width='100%' border='1'>";

echo "<th>Cid</th><th>Rid</th><th>Itemdecr</th><th>weight</th><th>suburb</th><th>pickuptimedate</th><th>suburb</th><th>state</th>";
	//fecthing rows from table
$row = mysqli_fetch_row($queryResult);
	
	
while ($row) {
		
echo "<tr><td>{$row[0]}</td>";
	
	echo "<td>{$row[1]}</td>";
	
	echo "<td>{$row[2]}</td>";
	
	echo "<td>{$row[3]}</td></tr>";
	echo "<td>{$row[4]}</td></tr>";
	echo "<td>{$row[5]}</td></tr>";
	echo "<td>{$row[6]}</td></tr>";
	echo "<td>{$row[7]}</td></tr>";
	echo "<td>{$row[8]}</td></tr>";
		
$row = mysqli_fetch_row($queryResult);
	}
	
echo "</table>";
}
else{//reamining option selected.
//if(isset($_GET['info']) =="pickup"){
$SQLstring = "select c.Cid,c.Name,c.phoNo,r.RId,r.Itemdescr,r.weight,r.suburb,r.pickupdatetime,r.dsuburb,r.state FROM customer c,request r where c.Cid=r.RId and r.pickupdatetime='".$_POST['date']."'";
$queryResult = @mysqli_query($DBConnect, $SQLstring)
Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
echo "<table width='100%' border='1'>";

echo "<th>Cid</th><th>name</th><th>phoNo</th><th>Rid</th><th>Itemdecr</th><th>weight</th><th>suburb</th><th>pickuptimedate</th><th>dsuburb</th><th>state</th>";
	
$row = mysqli_fetch_row($queryResult);
	
	
while ($row) {
		
echo "<tr><td>{$row[0]}</td>";
	
	echo "<td>{$row[1]}</td>";
	
	echo "<td>{$row[2]}</td>";
	
	echo "<td>{$row[3]}</td></tr>";
	echo "<td>{$row[4]}</td></tr>";
	echo "<td>{$row[5]}</td></tr>";
	echo "<td>{$row[6]}</td></tr>";
	echo "<td>{$row[7]}</td></tr>";
	echo "<td>{$row[8]}</td></tr>";
	echo "<td>{$row[9]}</td></tr>";
	echo "<td>{$row[10]}</td></tr>";
		
$row = mysqli_fetch_row($queryResult);
	}
	
echo "</table>";
mysqli_close($DBConnect);
}
}
}
?>
</body>
</html> 