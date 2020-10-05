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

<body style="background-image: url('clouds-3526558.jpg');">
<br>
<h1 style="color:Coral;"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Air Travel Management System</h1> 


<?php
 $error =" ";
include("config.php");
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT user_id FROM User WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;

         header("location: booking.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<div  align="center">
<form action="" method="post">
<br>
<br><br><br>
<br>
      <b><span style="color:Aqua">Username</span></b> <span>&emsp;&emsp;&emsp;&emsp;&nbsp;</span>: <input type="text" name="user"  required><br><br>
        <b><span style="color:Aqua">Password</span></b><span>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</span>: <input type="password" name="pass" required><br><br>

        <span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
        <input type="submit" class="button2" value="Login" name="Login">
 <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
    </form>
</div>
</body>
</html>
