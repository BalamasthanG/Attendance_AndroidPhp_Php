<?php
include_once './db_functions.php';

//Create Object for DB_Functions clas
/*session_start();

$name =$_SESSION['name'];*/


if(isset($_POST['submit'])){
  echo "show";

  if(empty($_POST['name'])){
     $chkname= "Enter name !!";
  }elseif (empty($_POST['roll'])) {
    $rchk = "Enter roll";
  }
  else{

    $name = $_POST['name'];
    $bat = $_POST['bat'];
    $yr = $_POST['yr'];
    $dpt = $_POST['dept'];
    $sec = $_POST['sec'];
    $roll = $_POST['roll'];

    $id = $bat.$yr.$dpt.$sec;
    $db = new DB_Functions();
    echo $name.$id;
    
    $rs = $db->student($name,$bat,$yr,$dpt,$sec,$id,$roll);
    $rs = $db->storeUser($name);
  
  
  
    if($rs){

        $chk = "Successfully Saved";

    } else{
      $chk = "Failed";
    }
  }


}



/*if(isset($_POST["username"]) && !empty($_POST["username"])){
$db = new DB_Functions(); 
//Store User into MySQL DB
$uname = $_POST["username"];
$res = $db->storeUser($uname);
  //Based on inserttion, create JSON response
  if($res){ 
    " <div class='title'>Insertion successful</div>";
 }else{ 
     "<div class='title'>Insertion failed</div>";
   }
}*/

    ?>




<html>
<head>
  <title>Database</title>
 <!--  <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
<div class="maindiv">
<div class="form_div">
<div class="title">
Welcome <?php
echo $_SESSION['name'];?>
</div>


<form method="POST" action="insertuser.php">


<h2>Enter student Details</h2>
<hr/><br>

Batch:<br>
        <select name="bat">
          <option value="12">2012-2016</option>
          <option value="13">2013-2017</option>
          <option value="14">2014-2018</option>
          <option value="15">2015-2019</option>
        </select>
        <br><br>
        Year:<br>
        <select name="yr">
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
        </select>
        <br><br>
        Department:<br>
        <select name="dept">
          <option value="CS">CSE</option>
          <option value="EC">ECE</option>
          <option value="IT">IT</option>
          <option value="Civ">CIVL</option>
          <option value="Mec">Mech</option>

        </select>
        <br><br>
        Section:<br>
        <select name="sec">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        <br>

 
Roll number : <input class="input" name='roll'/> * <?php echo $rchk;?></span><br>

Name : <input class="input" name='name'/><span class="error"> * <?php echo $chkname;?></span><br>

<input class="submit" type="submit" value="Add User" name='submit'/><a href="http://localhost/sqlitemysqlsync/Login.php">Back</a>
</form>
</div>
<h2><?php echo $chk ?></h2>
</div>
<div class="title"> <center> Here<?php echo $chk;?></center></div>
</body>
</html>