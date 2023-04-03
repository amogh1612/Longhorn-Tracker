<?php

$databaseHost = '127.0.0.1';//or localhost
$databaseName = 'dbstudent'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(isset($_POST['sub']))
{
$uname = $_POST['uname'];
$upassword = $_POST['upassword'];

$res = mysqli_query($mysqli,"select* from tbllogin where userid='$uname'and password='$upassword'");
$numRows = mysqli_num_rows($res);
if($numRows  == 1){
echo "You have logged in successfully ";
header("location:index.php");   // create my-account.php page for redirection 	
}
else
{
	echo "failed ";
}
}
?>



<html>
<body><center>
<!-- Comment -->
<style type="text/css">input[type=text] {
  width: 25%;
  padding: 10px 20px;
  margin: 5px 0;
 border: 2px solid black; 
}
input[type=submit] {
  width: 10%;
  padding: 12px 20px;
  border: 1px solid #555;
  background-color: green;
  color:white;
    
}
]</style>
  <div class = "box">
    <div class = "container" >

      <div class = "top-header">
        <span>Have an account?</span>
        <header>Login</header>
      </div>

      <form action="" method="POST">

        <div class = "input-field">
          <b>Username:- </b><input type="text" name="uname" required="" placeholder = "Username"><br><br>
        </div>

        <div class = "input-field">
          <b>Password:- </b><input type="text" name="upassword" required="" placeholder = "Password"><br><br>
        </div>
        
        <div class = "input-field">
          <input type="submit" class = "submit" name="sub" value="Login">
        </div>

      <form>
      <div class = "bottom">
        
      </div>
    </div>
  </div>


</body></center>
</html>