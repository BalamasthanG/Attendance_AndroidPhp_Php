<?php
include_once './db_functions.php';
$cs1="";
$cs2="";
$rw= "";
//Create Object for DB_Functions clas
session_start();
$db = new DB_Functions();
$name =$_SESSION['name'];
$rs = $db->showclass( $name);

if($rs){
 $row = mysql_fetch_array($rs);
  $cs1 = $row["class1"];
  $cs2 = $row["class2"];
 }
 else{
  $cs1 = "failed";
 }


 /*if(isset($_POST['submit'])){

    $cs = $_POST['cls'];

    $res = $db->UsrClas($cs);

    if($res){

    $rw = mysql_fetch_array($res);
  }
  else{
    echo "Error";
  }

 }*/

if(!(isset($_SESSION['name']))){
 header("location:Login.php");
 }





    ?>




<!DOCTYPE HTML> 
<html>
  <head>
  <title>Log Manager</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="stylesheet" href="style8.css" />
  <link rel="stylesheet" href="style1.css" />
<style type="text/css">
  #header {
  
    color:white;
    text-align:right;
    padding:0px;
    
}
</style>


  </head>

  <body>
 
    <div class="wrapper">
  <!--   <div id="header" ><form method="post" class="form" action='Usrvw.php'><button type ='submit' name = 'logout' >logout</button></form></div> -->
      <div class="container"><h2><b><i>Welcome <?php echo $name;   ?></i></b></h2>
      <h2><b><i>View Student Detail</i></b></h2>

     <form method="POST" class="form" action="Usrvw.php">

<hr/><br>

 Choose class:
<select name='cls'>
  <option value='<?php echo $cs1;?>'><?php echo $cs1;?></option>
  <option value='<?php echo $cs2;?>'><?php echo  $cs2;?></option>
</select>

<br><br>

Choose Date: <input type="date" name='frm' required="" />
<button class = "submit" type="submit" name="submit" />View Detail</button><br>

 </form>
 <form method='post' action='Usrvw.php'><button type ='submit' name = 'stuwise' >Student Wise</button>
 <button type ='submit' name = 'logout' >logout</button><br><br>
 </form><br><br>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
      </div>
    
    <br>
    <br>
  <div class="title"> <center> <?php echo $rss;?></center></div>
   <br> <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="index.js"></script>


   

<?php

if(isset($_POST['stuwise'])){
  header('location:studentwise.php');
}

if(isset($_POST['logout'])){
  header('location:logout.php');
}
  


if(isset($_POST['submit'])){

    $cs = $_POST['cls'];
    $frm = $_POST['frm'];
  
    $frrm = str_replace("-", "", $frm);
    
   // echo $frrm.$too.$cs."  this is under working ";

    date_default_timezone_set("Asia/Calcutta");

    //$res = $db->UsrClas($cs);
    
  
    $res =$db->ViewStu1($name.$cs);

    if($res){

    $rw = mysql_fetch_array($res);
  }
  else{
    echo "Error";
  }

   echo "<center>";
 echo "<table border=1>";
  echo  "<tr><th>Id</th><th>Roll</th><th>Name</th><th>".(date('d-m-Y',strtotime($frm)))." ".(date('l',strtotime($frm)))."</th></tr>";
     while($rw){
        echo "<tr><td>".$rw[0]."</td><td>".$rw[1]."</td><td>".$rw[2]."</td><td>".$rw['m'.$frrm]."</td></tr>";
      /*echo "<tr>";
        for($i=0;$i<4;$i++){

         echo  "<td>".$rw[$i]."</td>";

        }
        "</tr>";*/
        $rw = mysql_fetch_array($res);

   }
    
  "</table>";

 }

  ?> 
   </div> 
</div>
 


    
  </body>
</html>