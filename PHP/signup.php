<html>

<style>

.content {
  max-width: 500px;
  margin: auto;
}

.button {
	background-color: #4CAF50; /* Blue */
	border: none;
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	margin: 4px 2px;
	cursor: pointer;
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
	padding: 12px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	margin: 4px 2px;
	cursor: pointer;
}


.tab2 { 
            tab-size: 4; 
        } 
</style>

<body style="background-image: url('clouds-3526558.jpg');">
<br>
<h1 style="color:Coral;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Air Travel Management System</h1> 

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

// Create database
$db = "CREATE DATABASE IF NOT EXISTS airplane_db";
if ($conn->query($db) === TRUE) {
  echo "Database created successfully";

} else {
  echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn, "airplane_db");
/*if ($result = mysqli_query($conn, "SELECT DATABASE()")) {
  $row = mysqli_fetch_row($result);
  echo "Default database is " . $row[0];
  mysqli_free_result($result);
}*/

$sql = "CREATE TABLE if not exists User (
user_id INT(6) UNSIGNED AUTO_INCREMENT,
username VARCHAR(30),
password VARCHAR(30) NOT NULL,
coupon VARCHAR(30) DEFAULT 'null',
PRIMARY KEY(user_id,username)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table User created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$in = "INSERT INTO User (username,password)
VALUES ('{$_POST['user']}','{$_POST['pass']}')";

if ($conn->query($in) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $in . "<br>" . $conn->error;
}


}
 

if(isset($_POST['singup'])) {

 insert();
 header("location: login.php");

}

if(isset($_POST['login'])) {

 header("location: login.php");

}

?>
<div  align="center">
<form action="" method="post">
<br>
<br><br><br>
<br>
          <b><span style="color:Aqua">Username</span></b> <span>&emsp;&emsp;&emsp;&emsp;&nbsp;</span>: <input type="text" name="user"><br><br><br><br>
        <b><span style="color:Aqua">Password</span></b> <span>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span>: <input type="password" name="pass" ><br><br> 
        <span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
        <input type="submit" class="button2" value="Sign Up" name="singup"><br><br><br><br><br>
        <span style="color:Aqua">ALREADY A MEMEBER</span> <span>&emsp;&emsp;&emsp;</span> <input type="submit" class="button" value="login" name="login">
    </form>
</div>
</body>
</html>


