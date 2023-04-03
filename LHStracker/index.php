
 <?php
// connects the php and PHP mySQL Database on Xampp 
include_once("connection.php");
//var_dump(ini_get('allow_url_fopen'));
function getalldetails($table,$coloumn,$condition)

 {

	   

	  $query ="SELECT  ".$coloumn." from ".$table." where ".$condition.""; // generalized select query with 3 parameters table, colomn, condition
					
	  $result=mysqli_query($GLOBALS['link'],$query); // Reading $link from connection.php

  

	 	  	    if($result) // if the query works (result is true), it will read the data row by row

				  {

		             $output=array();

		             while($row=mysqli_fetch_assoc($result)) // fetching the data here row by row until all are fetched and put into the array output

      					 {

      						 $output[]=$row; 
      					

      					 }

    					  $s['records']=$output; 

                          $s['q']=$query;

    					  $s['result']="4"; // success, then return the records as a result output and pass in s


					  return json_encode($s); // returning the s array in the form of a json file



				  }

				  else

				  { 

                      $s['q']=$query;

					  $s['result']="5"; // if fails, then return blank file

					  return json_encode($s);

				  }

}
function  insert_table($table,$column,$formvalues)
{

  
  // This is using SQL to insert into the table (INSERT SQL statement) passing the parameters (table name, column name, and values to be inserted in the columns from the user input form)

  $query="INSERT INTO ".$table." (".$column.") select ".$formvalues."";

  $result=mysqli_query($GLOBALS['link'],$query);


  // if the query is successful then we convert it into a JSON file and return the data (converting from array to JSON)
  if($result)

  {

    $data['result']="1";

    $data['q']=$query;

    return json_encode($data);

  }  

}

// This is using SQL code to update values in the database
function  update_table($table,$column,$formvalues,$condition)
	{
    // This is SQL code
		 $query="update ".$table." set ";
	     $str="";
         $k=0;  
         // Building the Query to execute 
            foreach (array_combine(explode(",",$column), explode("`",$formvalues)) as $col => $val) {

                 $str.= $col."=".$val;
                 if($k<count(explode(",",$column))-1)
                   $str.=",";
                 $k++; 
            }
        // Building more of the query off of the for each loop
         $query .= $str." where ".$condition;
         $result=mysqli_query($GLOBALS['link'],$query);

         // returning a JSON code
          if($result)
          {
             $data['result']="2";
             $data['q']=$query;
             return json_encode($data);
          }  
          else
          { 

              $data['result']="5";
              $data['q']=$query;
              return json_encode($data);
          }
    }

    function delete_table($table,$condition)
    {
  
      //$accid=$_SESSION[GetLoginSessionVar()];
  
      // using SQL to delete from (using the condition as a parameter)
      $query="delete from ".$table." where ".$condition;
      // executing the query through mysqli using link connecting to dbstudent database
      $result=mysqli_query($GLOBALS['link'],$query);

      if($result)
      {
        $data['result']="3";
        $data['q']=$query;
        return json_encode($data);
      }  
      else
      { 
        $data['result']="5";
        $data['q']=$query;
        return json_encode($data);
      }
   }    


//Insert if Insert button is clicked

if(isset($_POST['action'])&&$_POST['action']=='submit')
{
  
  insert_table("tblstudents","`sName`, `grade`, `points`","'".$_POST['name']."',".$_POST['grade'].",".$_POST['points']."");
  
   ?>
    <script>
     alert("Successfully inserted")

    </script>
   <?php
 
}

//Update if Update button is clicked

if(isset($_POST['action'])&&$_POST['action']=='update')
{
  
  update_table("tblstudents","`points`","".$_POST['points']."","sName='".$_POST['name']."' and grade=".$_POST['grade']."");
  
   ?>
    <script>
     alert("Successfully Updated")

    </script>
   <?php
 
}

//Update if delete button is clicked

if(isset($_POST['action'])&&$_POST['action']=='delete')
{
  
  delete_table("tblstudents","sName='".$_POST['name']."' and grade=".$_POST['grade']."");
  
   ?>
    <script>
     alert("Successfully Deleted")

    </script>
   <?php
 
}


// calling the function (getalldetails) to fetch all the data from the sql database
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","1 order by points desc");

if(isset($_GET['list'])&&$_GET['list']=='gnine'){
// calling the getalldetails with the paramaters (database, columns, and then the condition) The condition in this case is "grade = 9 order by points desc" This is  a SQL command being implemented in PHP
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 9 order by points desc");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
} else if(isset($_GET['list'])&&$_GET['list']=='gten'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 10 order by points desc");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
} else if(isset($_GET['list'])&&$_GET['list']=='geleven'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 11 order by points desc");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
} else if(isset($_GET['list'])&&$_GET['list']=='gtwelve'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 12 order by points desc");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}else if(isset($_GET['list'])&&$_GET['list']=='random9'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 9 order by RAND() limit 1");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}else if(isset($_GET['list'])&&$_GET['list']=='random10'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 10 order by RAND() limit 1");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}else if(isset($_GET['list'])&&$_GET['list']=='random11'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 11 order by RAND() limit 1");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}else if(isset($_GET['list'])&&$_GET['list']=='random12'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 12 order by RAND() limit 1");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}else {
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","1 order by points desc");
//file_put_contents("Student.json", $results) or print_r(error_get_last());
}

// used to test
//echo $results;
// converting the json string ($result) , the variable records ,  back into json object ($rec) 
$rec=json_decode($results)->records;


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://kit.fontawesome.com/d3042ef09d.css" crossorigin="anonymous">
<script language="javascript"> 
function printdiv(printpage) 
{ var headstr = "<html><head><title></title></head><body>"; var footstr = "</body>"; var newstr = document.all.item(printpage).innerHTML; var oldstr = document.body.innerHTML; document.body.innerHTML = headstr + newstr + footstr; window.print(); document.body.innerHTML = oldstr; return false; } </script>
  <title>LHS Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>
  <style>

    @font-face {
    font-family: 'title';
    src: url(Poppins-Bold.ttf);
    }

    @font-face {
    font-family: 'text';
    src: url(Poppins-Regular.ttf);
    }

    *{
    font-family: 'text';
    }

    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

    div .container a{
    color: black;
}

  </style>
</head>
<body>
<!-- navigation bar html code -->
<nav class="navbar navbar-default" style="margin-bottom: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><b>Home</b></a>
      <a class = "navbar-brand" href="helpcopyTest.php?list=help"><b>Information and Help</b></a>
    </div>
   
  </div>
</nav>
<div class="container" style="width: 100%;">
  
<!-- This is the html code for the form in which the user enters information -->
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4 style="margin-left: 5%">Enter Student Information:</h4>
      <form style="width: 80%; margin: auto;" method="POST">
        <div class="form-group">
          <div class="row">
            <div class="col">
              <h5>Enter Your Name</h5>
              <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
          </div>
          <div class="row">
            <div class="col">
            <h5>Enter Your Grade</h5>
              <input type="number" class="form-control" placeholder="Enter Your Grade" name="grade">
            </div>
          </div>
          <div class="row">
            <div class="col">
            <h5>Enter Points</h5>
              <input type="number" class="form-control" placeholder="Enter Points" name="points">
            </div>
          </div>
        </div>
        <div style="margin-top: 5%;">
        <button type="submit" class="btn btn-danger" name="action" value="submit">Insert</button>
	      <button type="update" class="btn btn-danger" name="action" value="update">Update</button>
        <button type="delete" class="btn btn-danger" name="action" value="delete">Delete</button>
        </div>
      </form>
    </div>


    <div class="col-sm-9">
<div class="container">
  <h3>Generate Reports/View Information</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a href="index.php">All Ordered</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#" class="text-warning">Order By Points<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="index.php?list=gnine">Grade 9</a></li>
        <li><a href="index.php?list=gten">Grade 10</a></li>
        <li><a href="index.php?list=geleven">Grade 11</a></li>
	      <li><a href="index.php?list=gtwelve">Grade 12</a></li>                        
      </ul>
    </li>
    <li><a href="index.php?list=random9">Random Selection Grade 9</a></li>
    <li><a href="index.php?list=random10">Random Selection Grade 10</a></li>
    <li><a href="index.php?list=random11">Random Selection Grade 11</a></li>
    <li><a href="index.php?list=random12">Random Selection Grade 12</a></li>
    <li><a href="#"onClick="printdiv('div_print');">Print Report</a></li>
  </ul>
</div>
      <h4 style="margin-left: 5%">Student Mass Records</h4>
      <!-- Printing ability -->
      <div id="div_print">
      <table class="table table-striped" style="width: 90%; margin: auto; ">
  <thead style="text-align: center; font-size: 15px">
    <tr>
      <th style="width: 1%">No.</th>
      <th style="width: 12%">Name</th>
      <th style="width: 5%; padding-left: 2%">Grade</th>
      <th style="width: 3%">Points</th>
      
    </tr>
  </thead>
  <tbody>


    <?php

// iterating through the records and adding it on to the table
  foreach ($rec as $key => $value) {
  ?>

    <tr>
      <th style="text-align: center"><?php echo $key+1; ?></th>
      <td ><?php echo  $value->sName; ?></td>
      <td style="padding-left: 3%"><?php echo  $value->grade; ?></td>
      <td style="padding-left: 3%"><?php echo  $value->points; ?></td>
     
    </tr>
   <?php
  }
   ?>

  </tbody>
  </table>
</div>

</div>
</body>
</html>
  