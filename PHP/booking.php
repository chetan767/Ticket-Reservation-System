<style>

.content {
  max-width: 500px;
  margin: auto;
}

.button {
	background-color: #4CAF50; /* Blue */
	border: none;
	color: white;
	padding: 8px 10px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	margin: 4px 2px;
	cursor: pointer;
}
.topright {
  position: absolute;
  top: 28px;
  right: 200px;
  font-size: 20px;
}

div.absolute {
  position: absolute;
  bottom: 10px;
  width: 50%;
  border: 3px solid #8AC007;
}
.button2 {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 10px 26px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	margin: 4px 2px;
	cursor: pointer;
}


.tab2 { 
            tab-size: 4; 
        } 
</style>

<body style="background-image: url('aircraft-547105_1920.jpg');">
<h2 style="color:Coral;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Air Travel Management System</h2> 


<?php

   include('session.php');
?>
<body>
<h3> <font color=Coral>Welcome <?php echo " ".$login_session ?></font> </h3>

 </body>


<?php

$servername = "localhost";
$username = "user";
$password = "admin";

// Create connection
global $conn; 
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, "airplane_db");
/*if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}*/

$q = "SELECT coupon FROM  User where username ='{$_SESSION['login_user']}'";

$result = $conn->query($q);
$c="null";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       $c = $row["coupon"];
       
  }
}

if($c!="null")
{
echo "<b>"."<p> <font color=GreenYellow>Congratulations you have a coupon : $c </font> </p>"."</b>";
echo "<br>";
}
$tick = "CREATE TABLE if not exists Ticket (
ticket_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
city VARCHAR(30) NOT NULL,
dest VARCHAR(30) NOT NULL,
flight_time TIME,
arrival_date DATE,
seatpref VARCHAR(50),
foodpref VARCHAR(50),
category VARCHAR(50)
)";

if ($conn->query($tick) === TRUE) {
 // echo "Table User created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


$d=date('Y-m-d');
$q = "SELECT * FROM  Ticket where username='{$_SESSION['login_user']}' AND arrival_date>='$d' ORDER by arrival_date";




$result = $conn->query($q);

if ($result->num_rows > 0) {
echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial" font color="greenyellow">TICKET ID</font> </td> 
          <td> <font face="Arial" font color="greenyellow" >USERNAME</font> </td> 
          <td> <font face="Arial" font color="greenyellow">FROM</font> </td> 
          <td> <font face="Arial" font color="greenyellow">TO</font> </td> 
          <td> <font face="Arial" font color="greenyellow">Category</font> </td> 
          <td> <font face="Arial" font color="greenyellow">Seat Prefernce</font> </td> 
          <td> <font face="Arial" font color="greenyellow">arrival_date</font> </td> 
      </tr>';
  // output data of each row
  while($row = $result->fetch_assoc()) {
        $field1name = $row["ticket_id"];
        $field2name = $row["username"];
        $field3name = $row["city"];
        $field4name = $row["dest"];
        $field5name = $row["category"];
        $field6name = $row["seatpref"];
        $field7name = $row["arrival_date"];
        echo '<tr> 
                  <td>'."<font color=greenyellow>".$field1name.'</td> 
                  <td>'."<font color=greenyellow>".$field2name.'</td> 
                  <td>'."<font color=greenyellow>".$field3name.'</td> 
                  <td>'."<font color=greenyellow>".$field4name.'</td> 
                  <td>'."<font color=greenyellow>".$field5name.'</td> 
                  <td>'."<font color=greenyellow>".$field6name.'</td> 
                  <td>'."<font color=greenyellow>".$field7name.'</td> 
              </tr>';
  }
} else {

echo "<b>"."<p> <font color=red>NO BOOKINGS YET</font> </p>"."</b>";
}

if(isset($_POST['update']))
{
$_SESSION['ticket']=$_POST['ticket_id'];
header("location: update.php");
}
else if(isset($_POST['cancel']))
{
$_SESSION['ticket']=$_POST['ticket_id'];
header("location: cancel.php");
}

else if(isset($_POST['NewTicket']))
{
$_SESSION['ticket']=$_POST['ticket_id'];
header("location: newTicket.php");
}

else if(isset($_POST['History']))
{
header("location: history.php");
}

$conn->close();


?>

 
    <form action=" " method="post">
        <br><br>
   <b><span style="color:orange">ENTER YOUR Ticket ID :</span></b> <span>&emsp;&emsp;&emsp;&emsp;&nbsp;</span><input type="text" name="ticket_id" ><br><br>
              
 <span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
       <input type="submit" class="button2" value="Modify" name="update">

              <span>&emsp;&emsp;</span>
       <input type="submit" value="Cancel" class="button2" name="cancel">
<br><br><br><br><br>
        <b><span style="color:greenyellow">BOOK NEW TICKET :</span></b></span> <input type="submit" class="button" value="New Ticket" name="NewTicket">
<br><br><br>
        <b><span style="color:greenyellow">Check your Travel History :</span></b></span> <input type="submit" class="button" value="History" name="History">
<br><br>
    </form>
   </body>
<div class="topright">
      <h3><a href = "logout.php">Sign Out</a></h2>
</div>
   </body>

</html>


