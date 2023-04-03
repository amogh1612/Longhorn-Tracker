
 <?php
  
include_once("connection.php");
function getalldetails($table,$coloumn,$condition)

 {

	   

	  $query ="SELECT  ".$coloumn." from ".$table." where ".$condition.""; // generalized select query with 3 parameters table, colomn, condition
					
	  $result=mysqli_query($GLOBALS['link'],$query); // Reading $link from connection.php

    // print_r($query);

	 	  	    if($result) // if the query works (result is true), it will read the data row by row

				  {

		             $output=array();

		             while($row=mysqli_fetch_assoc($result)) // fetching the data here row by row until all are fetched and put into the array output

      					 {

      						 $output[]=$row; 
      					//	 echo $row['sName'].";".$row['sDescription'];

      					 }

    					  $s['records']=$output; 

                          $s['q']=$query;

    					  $s['result']="4"; // success, then return the records as a result output and pass in s

                       //  print($s['records']);

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

  $query="INSERT INTO ".$table." (".$column.") select ".$formvalues."";

  $result=mysqli_query($GLOBALS['link'],$query);

  if($result)

  {

    $data['result']="1";

    $data['q']=$query;

    return json_encode($data);

  }  

}

function  update_table($table,$column,$formvalues,$condition)
	{
		 $query="update ".$table." set ";
	     $str="";
         $k=0;  
            foreach (array_combine(explode(",",$column), explode("`",$formvalues)) as $col => $val) {

                 $str.= $col."=".$val;
                 if($k<count(explode(",",$column))-1)
                   $str.=",";
                 $k++; 
            }
        
         $query .= $str." where ".$condition;
         $result=mysqli_query($GLOBALS['link'],$query);

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
  
      $query="delete from ".$table." where ".$condition;
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
     alert("succeffuly inserted")

    </script>
   <?php
 
}

//Update if Update button is clicked

if(isset($_POST['action'])&&$_POST['action']=='update')
{
  
  update_table("tblstudents","`points`","".$_POST['points']."","sName='".$_POST['name']."' and grade=".$_POST['grade']."");
  
   ?>
    <script>
     alert("succesfuly Updated")

    </script>
   <?php
 
}

//Update if delete button is clicked

if(isset($_POST['action'])&&$_POST['action']=='delete')
{
  
  delete_table("tblstudents","sName='".$_POST['name']."' and grade=".$_POST['grade']."");
  
   ?>
    <script>
     alert("succesfuly Deleted")

    </script>
   <?php
 
}


// calling the function (getalldetails) to fetch all the data from the sql database
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","1 order by points desc");


if(isset($_GET['list'])&&$_GET['list']=='gnine'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 9 order by points desc");
} else if(isset($_GET['list'])&&$_GET['list']=='gten'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 10 order by points desc");
} else if(isset($_GET['list'])&&$_GET['list']=='geleven'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 11 order by points desc");
} else if(isset($_GET['list'])&&$_GET['list']=='gtwelve'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","grade = 12 order by points desc");
}else if(isset($_GET['list'])&&$_GET['list']=='random'){
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","1 order by RAND() limit 1");
}else {
$results=getalldetails("tblstudents","`sName`, `grade`, `points`","1 order by points desc");
}

//echo $results;

// converting the json string ($result) , the variable records ,  back into json object ($rec) 
$rec=json_decode($results)->records;
//echo json_encode($rec)
// closed php below
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
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
  </style>
</head>
<body>

<nav class="navbar navbar-default" style="margin-bottom: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><b>Student Enrollment</b></a>
    </div>
   
  </div>
</nav>
<div class="container" style="width: 100%;">
  
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4 style="margin-left: 5%">Student Registration</h4>
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
        <button type="submit" class="btn btn-primary mb-2" name="action" value="submit">Insert</button>
	      <button type="update" class="btn btn-primary mb-2" name="action" value="update">Update</button>
        <button type="delete" class="btn btn-primary mb-2" name="action" value="delete">Delete</button>
        </div>
      </form>
    </div>


    <div class="col-sm-9">
<div class="container">
  <h3>Tabs With Dropdown Menu</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a href="index.php">All Ordered</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Order By Grade<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="index.php?list=gnine">Grade 9</a></li>
        <li><a href="index.php?list=gten">Grade 10</a></li>
        <li><a href="index.php?list=geleven">Grade 11</a></li>
	<li><a href="index.php?list=gtwelve">Grade 12</a></li>                        
      </ul>
    </li>
    <li><a href="index.php?list=random">Random Selection</a></li>
    <li><a href="#">Menu 3</a></li>
  </ul>
</div>
      <h4 style="margin-left: 5%">Student Mass Records</h4>
      <table class="table table-striped" style="width: 90%; margin: auto; ">
  <thead style="text-align: center; font-size: 15px">
    <tr>
      <th style="width: 1%">Sr.No</th>
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
</body>
</html>
  