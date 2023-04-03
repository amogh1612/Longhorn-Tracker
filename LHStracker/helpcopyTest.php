<!DOCTYPE html>
<html>
  <!-- The Help Page is coded in HTML and CSS -->
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>
</head>
<style>

/* This is the CSS code to style the Help Page */
body {
  font-family: 'Quicksand', sans-serif;
  margin: 0;

}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  /* Using various techniques to style such as box-shadow */
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
  background-color: #f0f9fc;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
  
}

.container {
  padding: 0 16px;
  background-color: #f0f9fc;
}
.subtitle{
  font-family: 'title', sans-serif;

}

/** */
.title {
  color: black;
  font-family: 'Quicksand', sans-serif;
}

.header {
  color: #A41720;
  font-family: 'Quicksand', sans-serif; 

}


.button {
  /* Using Hex Color */
  background-color: #A41720; 
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}



@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
   
  }
}
</style>
<body>
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

    /* main body css (background color) */
    body{
        background-color: #FAFAFA;
    }
    

    /* Imported the fonts from files*/
    @font-face {
    font-family: 'title';
    src: url(Poppins-Bold.ttf);
    }
    @font-face {
    font-family: 'sub';
    src: url(Poppins-Medium.ttf);
    }
    @font-face {
    font-family: 'text';
    src: url(Poppins-Regular.ttf);
    }

    *{
      font-family: text;
    }

    .expl{
      background-color: #ddd;
      width: 50%;
      min-width: 500px;
      float: left;
      padding: 10px 40px 50px;
      margin: 25px;
      border-radius: 12px;
      
      box-shadow: 2px 2px 12px rgba(0,0,0,0.5);
    }

    .expl2{
      background-color: #ddd;
      width: 100%;
      min-width: 500px;
      height: auto;
      float: left;
      padding: 40px;
      margin: 25px;
      border-radius: 12px;
      box-shadow: 2px 2px 12px rgba(0,0,0,0.5);
    }
    

    .tables{
      width: 50%;
      float: right;
    }


    /* Styling for the table */
    table{
      border-collapse: collapse;
      width: 100%;
      height: 200px;
      box-shadow: 2px 2px 12px rgba(0,0,0,0.5);
      margin: 25px auto;
      border-radius: 12px;
      overflow: hidden;
      background-color: #ddd;
    }


    th, td{
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }

    td{
        font-family: text;
    }

    .header{
      background-color: #F54D42;
      color: white;
    }

    section{
      display: flex;
      justify-content:space-between;
      align-items: center;
      min-height: 400px;
      padding: 70px 20vw;
    }

    .content-table td{
      padding: 12px 15px;
    }

    .content-table tbody tr{
      padding: 12px 15px;
    }

    .info{
      background-color: #ECECEC;
    }

    .info2{
      background-color: #FAFAFA;
    }

    .info2 .expl2 center{
      font-family: 'title';
    }

    .info2 .expl2 i{
      font-family: 'text';
    }

    .info2 .expl2 .form-center{
      text-align:center;
    }


    .info2 .expl2 input{
      position: relative;
      width: 50%;
      background:#ECECEC;
      border: none;
      outline: none;
      padding: 15px 10px 7.5px;
      border-radius: 13px;
      color: black;
      font-weight: 400;
      font-size: 1em;
    }

    .info2 .expl2 .finish input{
      position: relative;
      width: 25%;
      background:#ECECEC;
      border: none;
      outline: none;
      padding: 10px 10px 10px;
      margin: 10px 0;
      border-radius: 13px;
      color: black;
      font-weight: 400;
      font-size: 1em;
    }

    .info2 .expl2 i{
      left: 0;
      padding: 15px 10px;
      font-style: normal;
      transition: 0.5s;
      pointer-events: none;
    }

    p{
        font-family: text;
    }
    .title{
      font-family: sub;
    }

    h2{
      line-height: 3;
    }
    form{
      width: 100%;
    }

    .form-center{
      display: flex;
      justify-content: center;
    }

  </style>
<body>

<!-- Used Bootstrap to style the Navigation Bar -->
<nav class="navbar navbar-default bg-dark" style="margin-bottom: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class = "navbar-brand" href="index.php"><b>Home </b></a>
      <a class="navbar-brand" href="#"><b> Information and Help</b></a>
    </div>
  </div>
</nav>


<section class = "awards">

  <div class = "expl">

    <header>
      <h2  class="subtitle">Awards</h2>
    </header>

    <main> <!-- Explains the prizes for the leaders in points -->
      <p class="title">1st Place</p> 
      <p>The first place winner wins a school reward, in which they receive a $150 shopping spree at the Lambert High School Store.</p>
      <p class="title">Total Points Greater than 200</p>
      <p>Students who have greater than 200 points will win beanies as school spirit items.</p>
      <p class="title">Total Points Less than 200</p>
      <p>Students who have less than 200 points will win a school reward of one free lunch pass.</p>
      <p class="title">Random Quarterly Winner</p>
      <p>The student who wins the random quarter selection wins a pizza party. The pizza party takes place during lunch for one hour, and the student can invite 5 of their friends to join them.</p>
    </main>
      
  </div>
  
  <!-- For the non sporting and sporting events table -->
  <div class = "tables">
    
    <table class="sporting-event"> <!-- lists all the sporting events -->

      <tr class = "header">
        <th>Sporting Events</th>
        <th>Points</th>
      </tr>

      <tbody>
        <tr class = "stuff">
          <td>Football Game</td>
          <td>20</td>
        </tr>

        <tr class = "stuff">
          <td>BasketBall Game</td>
          <td>15</td>
        </tr>

        <tr class = "stuff">
          <td>Soccer Game</td>
          <td>10</td>
        </tr>

        <tr class = "stuff">
          <td>Baseball/Softball Games</td>
          <td>10</td>
        </tr>

        <tr class = "stuff">
          <td>Other Sporting Events</td>
          <td>5</td>
        </tr>
      </tbody>

    </table>
  
    
    <table class="non-sporting-event"> <!-- This lists all of the non-sporting events in our application -->

      <tr class = "header">
        <th>Non-Sporting Events</th>
        <th>Points</th>
      </tr>

      <tbody>
        <tr class = "stuff">
          <td>Community/School Service Events</td>
          <td>30</td>
        </tr>

        <tr class = "stuff">
          <td>Academic Competitions</td>
          <td>20</td>
        </tr>

        <tr class = "stuff">
          <td>Club Competitions</td>
          <td>20</td>
        </tr>

        <tr class = "stuff">
          <td>Theater/Drama Performance</td>
          <td>10</td>
        </tr>

        <tr class = "stuff">
          <td>Musical Performance</td>
          <td>5</td>
        </tr>
      </tbody>

    </table>
  </div>
</section>
<!-- These are the various sections -->
<section class="info">
    <div class="expl2">
        <header>
          <h2  class="subtitle">Inserting, Updating, and Deleting Student Information</h2>
        </header>
        <main>
            <p class="title">Inputting Student Information</p>
            <p>To input data, the user needs to enter the full name of the student (including middle names or suffixes if necessary), the grade of the student, and the points the student has (see the section above to see event values). After this, the user needs to click the "Insert" button. </p>
            <p class="title">Updating Student Information</p>
            <p>To update student information, the user needs to enter both the exact name of the student (as it is in the system), the exact grade of the student, and the updated amount of points. For example, if a student currently has 10 points and has gained 5 points, the user needs to input 15 into the points section of the form. Once this is complete, the user needs to click the "Update" button. </p>
            <p class="title">Deleting Student Information</p>
            <p>To delete a student's information, the user needs to input the exact name and exact grade of the student into the respective regions. After this, the user simply needs to click the "Delete" button, and the student's information is deleted from the table.</p>
        </main>
        
    </div>
</section> 

<section class="info2">
  <div class="expl2">
    <!-- This codes the contact us form --->
    <h2><center>Contact Us via Email</center></h2>
    <div class="form-center">
      <!-- Emails to one of us -->
      <form action="mailto:amoghk333@gmail.com" method="post" enctype="text/plain">
        <i>Name<br></i>
        <input type="text" name="name"><br>
        <i>E-mail<br></i>
        <input type="text" name="mail"><br>
        <i>Comment<br></i>
        <input type="text" name="comment"><br><br>
        <div class="finish">
          <input type="submit" value="Send">
          <input type="reset" value="Reset">
        </div>
      </form> 
    </div>
  </div>

</section>

</body>
</html>





