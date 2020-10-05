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



function insert()
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



mysqli_select_db($conn, "airplane_db");
if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}
$in = "UPDATE Ticket SET city='{$_POST['arct']}',dest='{$_POST['destn']}',flight_time='{$_POST['fltm']}',arrival_date='{$_POST['ardt']}',
seatpref='{$_POST['seat']}',foodpref='{$_POST['food']}',category='{$_POST['select']}' where ticket_id='{$_SESSION['ticket']}'";

if ($conn->query($in) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $in . "<br>" . $conn->error;
}
}

if(isset($_POST['Update'])) {

 insert();
header("location: booking.php");

}

?>
<form action=" " method="post">
         <b><span style="color:greenyellow">Flight Date</span></b>  <span>&emsp;&emsp;&emsp;&nbsp;&nbsp;</span>: <input type="date" name="ardt"  required><br><br>
         <b><span style="color:greenyellow">Flight Time</span></b>  <span>&emsp;&emsp;&emsp;&nbsp;&nbsp;</span>: <input type="time" name="fltm" required><br><br>
         <b><span style="color:greenyellow">Destination</span></b>  <span>&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</span>: <input type="text" name="destn" required><br><br>
         <b><span style="color:greenyellow">Departure City</span></b>  <span>&emsp;&emsp;&nbsp;</span>: <input type="text" name="arct" required><br><br>
         <p><b><span style="color:greenyellow">Category</span></b>  <span>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>:
	<select name="select">
	<option value="Economy" selected>Economy Class </option>
	<option value="First">First Class</option>
	<option value="Business">Business Class</option>
	</select>
        </p>
        
         <b><span style="color:greenyellow">Food Preference</span></b>  <span>&emsp;&nbsp;</span>: <input type="text" name="food" ><br><br><br>
         <b><span style="color:greenyellow">Seat Preference</span></b>  <span>&emsp;&nbsp;</span>: <input type="text" name="seat" ><br><br><br>
        <span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
        <input type="submit" value="Update" class="button2" name="Update">

    </form>

</body>
</html>

