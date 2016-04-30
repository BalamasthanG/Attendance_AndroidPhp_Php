<?php

session_start();
if(!(isset($_SESSION['name']))){
  header('location:Login.php');
}

if(isset($_POST['logout'])){
  header('location:logout.php');
}

if(isset($_POST['back'])){
  header("location:admin.php");
}

?>

<html>
<head>
	<title>Track</title>
  <link rel="stylesheet" href="style8.css" />
  <link rel="stylesheet" href="style1.css" />
</head>
<body>



<?php

   $name = " this name";
	include_once('./db_functions.php');
	//if(isset($_POST['submit']))

   // $cs = $_POST['cls'];
    echo $name."  this is under working ";
    $db = new DB_Functions();
    $res = $db->getRgdCount();
    $rss = $db->getRgdCount();

    if($rss){
    	$rs = mysql_fetch_array($rss);
    }
    else{
    	echo "error";
    }

    if($res){

    $rw = mysql_fetch_array($res);
    
    echo "success";
  }
  else{
    echo "Error";
  }

  $rrs = $db->RgdAll();

  if($rrs){

    $rr = mysql_fetch_array($rrs);

    echo "success rgd";
  }
  else{
    echo "failed";
  }

  if(isset($_POST['aprove'])){
  	$name = $_POST['usr'];
  	echo $name;

  	$rq = $db->permit($name);
  	if($rq){
  		echo "Updated";
  	}
  	else{
  		echo "Failed";
  	}
  header("Refresh:0");

  }

  if(isset($_POST['reject'])){
    $name = $_POST['usr'];

    $rq = $db->reject($name);
    if($rq){
      echo "Deleted";

    }
    else{
      echo "failed";
    }
    header("Refresh:0");
  }

echo " <div class='wrapper'>";
  
  echo "<center>";


 echo "<form action='trackdetail.php' method='post' class='form'>";
  echo "<select name='usr'>";

  while ($rs) {

  	echo "<option value=".$rs['Name'].">".$rs['Name']."</option>";
  	$rs = mysql_fetch_array($res);
  	
  }
  echo "</select>  ";
  echo "<button type ='submit' class = 'submit' name='aprove'  id='login-button'>Approve</button>  ";
  echo "<button type = 'submit' name = 'reject' class = 'submit' >Reject</button>   ";
  echo "<button type = 'submit' name = 'back' class = 'submit' >Back</button>    ";
   echo "<button type = 'submit' name = 'logout' class = 'submit' >Logout</button>   ";

  echo "</form>";

  echo "<div class='container'>";
  

  echo "<table border=1>";
  echo "<tr><th colspan='4'>Need to approve</th></tr>";
  echo  "<tr><td>Name</td><td>Class1</td><td>Class2</td><td>Regd Status</td></tr>";
     while($rw){
        echo "<tr><td>".$rw['Name']."</td><td>".$rw['class1']."</td><td>".$rw['class2']."</td><td>".$rw['rgd']."</td></tr>";
        $rw = mysql_fetch_array($rss);

   }
    
  echo "</table>";
  

  echo "<table border=1>";
  echo "<tr><th colspan='3'>Registered faculty</th></tr>";
  echo  "<tr><td>Name</td><td>Class1</td><td>Class2</td></tr>";
     while($rr){
        echo "<tr><td>".$rr['Name']."</td><td>".$rr['class1']."</td><td>".$rr['class2']."</td></tr>";
        $rr = mysql_fetch_array($rrs);

   }

   echo "</table>";




  ?> 
  </div>
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
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
                              <li></li>
  </ul>
</div>



</body>
</html>
