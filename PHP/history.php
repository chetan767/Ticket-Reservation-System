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
<h2 style="color:Coral;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspHISTORY : Air Travel Management System</h2> 
<?php
include('session.php');
?>

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

$categ=" ";

mysqli_select_db($conn, "airplane_db");
/*if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}*/

$d=date('Y-m-d');

//$q = "SELECT * FROM  Ticket where username='{$_SESSION['login_user']}' AND arrival_date<'$d' ORDER by arrival_date";

 $q = "SELECT * FROM  Ticket where username='{$_SESSION['login_user']}'  ORDER by arrival_date";


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
 <br><br><br> <br><br><br>
    </form>

</body>
</html>
