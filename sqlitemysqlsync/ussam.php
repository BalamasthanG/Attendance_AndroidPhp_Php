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
  <title>User View</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="stylesheet" href="style8.css" />
  <link rel="stylesheet" href="style1.css" />



  </head>

  <body>
 
    <div class="wrapper">
      <div class="container">
      <div class="title"><h2>View Student Detail of <?php echo $name." ".$sss?></h2></div>

     <form method="POST" class="form" action="Usrvw.php">
<h2>Report Details</h2>
<hr/><br>

 Choose class:
<select name='cls'>
  <option value='<?php echo $cs1;?>'><?php echo $cs1;?></option>
  <option value='<?php echo $cs2;?>'><?php echo  $cs2;?></option>
</select>

<br><br>

Choose Date: <input type="date" name='frm'/>

To Date :  <input type="date" name='to'/>


<!-- Choose month:
<select>
  <option>Jan</option>
  <option>Feb</option>
  <option>Mar</option>
  <option>Apr</option>
  <option>May</option>
  <op tion>Jun</option>
  <option>Jul</option>
  <option>Aug</option>
  <option>Sep</option>
  <option>Oct</option>
  <option>Nov</option>
  <option>Dec</option>
</select>
<br><br> -->
<button class = "submit" type="submit" name="submit" />View Detail</button>

 <button type ='submit' name = 'logout' >logout</button><br>
 <a href = "http://localhost/sqlitemysqlsync/Login.php"><br>Back</a>



</form>
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

        <script src="js/index.js"></script>


   

<?php

if(isset($_POST['logout'])){
  header('location:logout.php');
}
  


if(isset($_POST['submit'])){

    $cs = $_POST['cls'];
    $frm = $_POST['frm'];
    $to = $_POST['to'];
    $frrm = str_replace("-", "", $frm);
    $too = str_replace("-", "", $to);
    $dif = date_diff($to.$frm);
    $sss = $frrm.$too.$cs."  this is under working ";

    date_default_timezone_set("Asia/Calcutta");

    //$res = $db->UsrClas($cs);
  $r = date('Ymd');
    $k = date('d-m-Y');
   // $l = "m20160319";
    $res =$db->ViewStu1($name.$cs);

    if($res){

    $rw = mysql_fetch_array($res);
    echo "success";
  }
  else{
    echo "Error";
  }

   echo "<center>";
 echo "<table border=1>";
  echo  "<tr><th>Id</th><th>Roll</th><th>Name</th><th>".$k."</th></tr>";
     while($rw){
        echo "<tr><td>".$rw['Id']."</td><td>".$rw['roll']."</td><td>".$rw['Name']."</td><td>".$rw['m'.$frrm]."</td></tr>";
        $rw = mysql_fetch_array($res);

   }
    
  "</table>";

  //echo "<center>";
 /*echo "<table border=1 align=left>";
  echo  "<tr><th>Id</th><th>Roll</th><th>Name</th></tr>";
     while($rw){
        echo "<tr><td>".$rw['Id']."</td><td>".$rw['roll']."</td><td>".$rw['Name']."</td><td>";
        $rw = mysql_fetch_array($res);

   }
    
  "</table>";*/

   /*echo "<table border=1 align=left>";



  for($i=0;$i<$diff;$i++){
    $res = $db->ViewStu($name.$cs,"m".$frrm);
    if($res){
      $rw = mysql_fetch_array($res);
      $frrm = new DateTime($frrm);
       echo  "<tr><th>".$frrm->date_format("d-m-Y")."</th></tr>";
     while($rw){
        echo "<tr><td>".$rw['m'.$frrm]."</td><td>";
        $rw = mysql_fetch_array($res);

        $frrm->date_modify("+1 day");


   }

    }
    else {
      echo "errrror";
    }
  }

  "</table>";*/

 }

  

  ?> 
   </div> 
</div>
 


    
  </body>
</html>