<?php
// Initialize variables to null.
$nameError ="";
$passError ="";
$repassError ="";
$count = 1;
session_start();
$name=$_SESSION['name'];

//On submitting form below function will execute
include_once('./db_functions.php');
if(isset($_POST['submit'])){
   if (empty($_POST["name"])) {
     $nameError = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameError = "Only letters and white space allowed"; 
     }
   }
    if(empty($_POST['pass'])){
    $passError="Password is required";
   }elseif(empty($_POST['repass'])){
      $repassError="Re type the password";

     }elseif($_POST['pass']!=$_POST['repass']){
        $repassError="Password doesnot match";
     }
     
     else{

        $db = new DB_Functions();

        $name=$_POST['name'];
        $pass=$_POST['pass'];



     $bat=$_POST['bat'];
  $yr = $_POST['yr'];
  $dep = $_POST['dept'];
  $sec= $_POST['sec'];
  $cs1= $bat.$yr.$dep.$sec;

    $bat1=$_POST['bat1'];
  $yr1 = $_POST['yr1'];
  $dep1 = $_POST['dept1'];
  $sec1= $_POST['sec1'];
  $cs2= $bat1.$yr1.$dep1.$sec1;
        

       $res= $db->Regduser($name,$pass,$cs1,$cs2);

       $rs = $db->crtAll($name,$cs1);

       if($rs){

        $rk = "Create success";

       }else{
        $rk = "create failed";
       }

        if($res){
          $rss = "Register Success fully";

        }
        else{
          $rss = "Failed";
        }

     }

     






}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}






//php code ends here 
?>

<!--html starts here-->
<!DOCTYPE HTML> 
<html>
  <head>
  <title>Registration</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
 
    <div class="maindiv">
      <div class="form_div">
      <div class="title"><h2>Register Your Detail.</h2></div>

      <form method="post" action="regd.php"> 
        <h2>Form</h2>
        <span class="error">* required field.</span>

        <br>
        <hr/>
        <br>
        Name:<br><input class="input" type="text" name="name" value="">
        <span class="error">* <?php echo $nameError;?></span>
        <br>
     
        Password:<br><input class="input" type="password" name="pass" />
        <span class="error">* <?php echo $passError;?></span>
        <br>
        Re-password:<br><input class="input" type="password" name="repass"/>
        <span class="error">* <?php echo $repassError;?></span>
        <br>

        <hr/>
        <br>

        Class: Choose class 1<br>
        
          

        
        <br><br>
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
        <br>
        <hr/>
        <br><br>
        Choose Class 2
        Batch:<br>
        <select name="bat1">
          <option value="12">2012-2016</option>
          <option value="13">2013-2017</option>
          <option value="14">2014-2018</option>
          <option value="15">2015-2019</option>
        </select>
        <br><br>
        Year:<br>
        <select name="yr1">
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
        </select>
        <br><br>
        Department:<br>
        <select name="dept1">
          <option value="CS">CSE</option>
          <option value="EC">ECE</option>
          <option value="IT">IT</option>
          <option value="Civ">CIVL</option>
          <option value="Mec">Mech</option>

        </select>
        <br><br>
        Section:<br>
        <select name="sec1">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        <br>
        <br>
       

    
      <input class="submit" type="submit" name="submit" value="Submit"> 
        <input class="submit" type="reset" name="reset" value="Clear"/>
        <a href="http://localhost/sqlitemysqlsync/Login.php">Back</a><br>
        
      </form> 
      </div>
    </div>
    <br>
    <br>
  <div class="title"> <center> <?php echo $rss.$rk;?></center></div>
   <br>

    


    
  </body>
</html>
<!--html ends here-->