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

<?php



function delete()
{
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

$categ=" ";

mysqli_select_db($conn, "airplane_db");
/*if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}*/


$q = "SELECT category FROM  Ticket where ticket_id ='{$_SESSION['ticket']}'";

$result = $conn->query($q);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
       $categ = $row["category"];
       
  }
}
 $first=5000 ;
 $economy=10000;
 $business=15000;
if($categ=="Economy")
{
echo "<b>"."<p> <font color=red>CANCELLATION FEE =  $economy </font> </p>"."</b>";
}

if($categ=="Business")
{
echo "<b>"."<p> <font color=red>CANCELLATION FEE =  $business </font> </p>"."</b>";
}

if($categ=="First")
{
echo "<b>"."<p> <font color=red>CANCELLATION FEE =  $first </font> </p>"."</b>";
}

$in = "DELETE FROM Ticket where ticket_id='{$_SESSION['ticket']}'";

if ($conn->query($in) === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $in . "<br>" . $conn->error;
}
}

delete();
if(isset($_POST['Home'])) {
header("location: booking.php");

}

?>
<form action=" " method="post">
 <br><br><br>
        <span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
 <b><span style="color:OrangeRed">GO BACK TO HOME PAGE </span></b> 
        <span>&emsp;&emsp;</span>
<input type="submit" class="button2" value="Home" name="Home">


    </form>

</body>
</html>

