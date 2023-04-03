<?php

$databaseHost = '127.0.0.1';//or localhost
$databaseName = 'dbstudent'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by default empty for localhost
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
<head>

</head>
<body>
<!-- HTML and CSS used for creating the front end -->
<style type="text/css">input[type=text] {
}

/* Imports Fonts */
@font-face {
   font-family: myFirstFont;
   src: url(Poppins-Bold.ttf);
}
 
/* Set header color and font */
h2 {
   font-family: myFirstFont;
   color: darkgreen;
   text-align: center;
}

/* General Formatting */
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: myFirstFont;
}

body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; 
  background: #ECECEC;
}

section{
  position: absolute;
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;  
}
/* Container For Block and Adds shadow */
section .signin{
  position: absolute;
  width: 400px;
  background: #FFF7F3;
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.5);
}
section .signin .content{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 40px;
}
/* Color and Size of "Signin" header */
section .signin .content h2{
  padding-top: 2em;
  font-size: 2em;
  color: black;
}
/* Login Form */
section .signin .content .form{
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 25px;
}
section .signin .content .form .inputBx{
  position: relative;
  width: 100%;
}
section .signin .content .form .inputBx input{
  position: relative;
  width: 100%;
  background:#D3D3D3;
  border: none;
  outline: none;
  padding: 25px 10px 7.5px;
  border-radius: 13px;
  color: white;
  font-weight: 500;
  font-size: 1em;
}
section .signin .content .form .inputBx1 input{
  position: relative;
  width: 100%;
  background:#ECECEC;
  border: none;
  outline: none;
  padding: 25px 10px 7.5px;
  border-radius: 13px;
  color: white;
  font-weight: 500;
  font-size: 1em;
}
section .signin .content .form .inputBx i{
  position: absolute;
  left: 0;
  padding: 15px 10px;
  font-style: normal;
  color: white;
  transition: 0.5s;
  pointer-events: none;
}
/* Adds Animation for User Inputs */
section .signin .content .form .inputBx input:focus ~i,
section .signin .content .form .inputBx input:valid ~i
{
  transform: translateY(-7.5px);
  font-size: 0.8em;
  color: #fff;
}
section .signin .content .form .inputBx1 input[type="submit"]{
  padding: 10px;
  background: #F54D42;
  color: white;
  font-weight: 600;
  font-size: 1.25em;
  letter-spacing: 0.03em;
}
section .signin .content .form .inputBx1 input[type="submit"]:hover{
  cursor: pointer;
  background-color: #fbb8b3;
}
section .signin .content .form .inputBx1{
  padding-bottom: 5em;
}
img{
  width:60%;
  height: auto;
  padding-bottom: 2em;
}
</style>
  <section>
    <div class = "signin">
      <div class = "content">
        <h2>Welcome To<br/>Longhorn Tracker</h2>
        <img src="updatedCoralLogo.png" alt="Paris">
        <form action="" method="POST" class="form"> 
          <div class = "inputBx"> 
            <input class = "box" type="text" name="uname" required="">   
            <i>Username</i>         
          </div>
          <div class = "inputBx">
            <input class = "box" type="password" name="upassword" required="">
            <i>Password</i> 
          </div>
          <div class = "inputBx1">
            <input type="submit" id = "submit" name="sub" value="Login">
          </div>
        </form>
      </div>
    </div>
  </section>



</body>
</html>