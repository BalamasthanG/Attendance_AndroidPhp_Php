<?php
include_once('./db_functions.php');
$rs = "";
$cs1 ="";
$cs2 = "";
$cs = "";

if(isset($_POST['logout'])){
  header('location:logout.php');
}

 $name = " this name";
	
	//if(isset($_POST['submit']))

   // $cs = $_POST['cls'];
 $db = new DB_Functions();
	session_start();
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

  if(isset($_POST['submit'])){ 
    $db = new DB_Functions();
    $cs = $_POST['cls'];
    $rss = $db->getName($name.$cs);

    if($rss){
    	$rs = mysql_fetch_array($rss);
    }
    else{
    	echo "error";
    }
}

if(!(isset($_SESSION['name']))){
	header("location:logout.php");
}

?>

<html>
<head>
<title>Student wise</title>
<link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="style8.css" /> 
   <link rel = "stylesheet" href="style1.css" />
</head>
<body>	

	<div class = "wrapper">
	<div class = "container">
    <h2><b><i>View Student Wise Report</i></b></h2>
    <hr>
	<form action = "studentwise.php" method="post" >

	Choose class:
<select name='cls'>
  <option value='<?php echo $cs1;?>'><?php echo $cs1;?></option>
  <option value='<?php echo $cs2;?>'><?php echo  $cs2;?></option>
</select>
<button type = "submit" name = "submit" >View</button>
<br>
<br>
<?php
 if(isset($_POST['submit'])){
	echo "Choose Name: 	<select name = 'name'>";
		 while ($rs) {

  	echo "<option value=".$rs['Name'].">".$rs['Name']."</option>";
  	$rs = mysql_fetch_array($rss);
  	
  }    
	echo '</select>';
  echo "<br><br>";

 echo " Choose FROM Date: <input type='date' name='frm' required=''/>
  Choose TO date: <input type='date' name='to' required=''/>
 <button type = 'submit' name = 'submit1' >show</button>
 <br>";
}
  ?>
	


    </form>
    <form method='post' action='studentwise.php'>
     <button type ='submit' name = 'back'>Back</button>
 <button type = 'submit' name = "logout" >Logout</button></form>

   <?php 

   if(isset($_POST['back'])){
    header('location:Usrvw.php');
   }

   if(isset($_POST['submit1'])){
	$db = new DB_Functions();
	$nme = $_POST['name'];

	$cs = $_POST['cls'];
	 $frm = $_POST['frm'];
    $too = $_POST['to'];

    $frrm = str_replace("-", "", $frm);
    //$too = str_replace("-", "", $to);
    //$dif = $db->datediff($to,$frm);
   // $dif = date_diff($frm,$to)->format('d');

	$res = $db->ViewStu1($name.$cs);

  $to = $db->datdif($too,$frm);

	if($res){
		$rw = mysql_fetch_array($res);
   // echo "succes".$nme.$name.$cs.$to;
	}else{
		//echo "error".$nme.$name.$cs.$to;
	}
//$d = new DateTime($frrm);

  $perc = 0;
  $prs = 0;
	
 echo "<table border=1 align='left'>";
  echo  "<tr><th>Id</th><th>Roll</th><th>Name</th>";
     
       // echo "<tr><td>".$rw[0]."</td><td>".$rw[1]."</td><td>".$rw[2]."</td><td>".$rw[3]."</td>";


      
    for($j=0;$j<=$to;$j++){
      $date = new DateTime($frm);
      
 
      $d = $date->format('d-m-Y');
      echo "<th>".$d." ".(date('l',strtotime($d)))."</th>";
      $date->modify('+1 day');
      $frm = $date->format('d-m-Y');
    }

     
      echo "</tr><tr>";
        for($i=0;$i<3;$i++){

         echo  "<td>".$rw[$i]."</td>";

        }

        for($l=$i;$l<=$to+3;$l++){
          $date = new DateTime($frrm);
          $rs = $db->ViewStu($name.$cs,$nme,"m".$frrm);
            if($rs=='1'){
              echo "<td>".$rs."</td>";
              $date->modify('+1 day');
      $frrm = $date->format('Ymd');
          $prs++;
                // if($rs==""){$perc--;}elseif($rs==0){$perc++;}else{$prs--;}
            }elseif ($rs=='0') {
              $perc++;
                    echo "<td>".$rs."</td>";
              $date->modify('+1 day');
      $frrm = $date->format('Ymd');
            }
            else{
              echo "<td> -- </td>";
              $date->modify('+1 day');
      $frrm = $date->format('Ymd');
            }

        }
        "</tr>";
       // $rw = mysql_fetch_array($res);

   
    
  "</table>";

     $tot = ($prs/($perc+$prs))*100;
     echo "Number of days Present  ".$prs."<br>";
     echo "Number of days Absent   ".$perc."<br>";

   echo "Percentage   ".$tot."%";
} 

?>


    </div>
    </div>

</body>


</html>