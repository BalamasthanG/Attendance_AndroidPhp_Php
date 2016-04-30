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

       $rs = $db->crtAll($name.$cs1,$cs1);
       $rq = $db->crtAll($name.$cs2,$cs2);

       if(($rs)&&($rq)){

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

if(isset($_POST['Back'])){
  header('location:Login.php');
}





//php code ends here 
?>

<!--html starts here-->

<html>
  <head>
  <title>Registration</title>
  <meta name="robots" content="noindex, nofollow" />
  <link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="style8.css" /> 
   <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
 
    <div class="wrapper">
      <div class="container">
      <div class="clr"><h2><b><i>Register Your Detail.</i></b></h2></div>

      <form method="post" action="regd.php" class="form"> 
        


        <br>
        <hr/>
        <br>
       <b> Name:<br><input class="input" type="text" name="name" id="username" required="" />
        
        
     
        Password:<br><input class="input" type="password" name="pass" required="" />
        
        
        Re-password:<br><input class="input" type="password" name="repass"  id="repassword"  required=""/>
      
        

        <hr/>
        <br>
      

        Class: Choose class 1<br>
        
    <center>  
<table>
                      <tr><th>Batch:</th><td>
        <select name="bat">
          <option value="12">2012-2016</option>
          <option value="13">2013-2017</option>
          <option value="14">2014-2018</option>
          <option value="15">2015-2019</option>
        </select></td>
    
        </tr>
        <tr><th> 
        Year:</th><td>
        <select  name="yr">
          <option value="IV">IV</option>
          <option value="III">III</option>
          <option value="II">II</option>
          <option value="I">I</option>
        </select>
        </td></tr>
       <tr><th> Department:</th><td>
        <select  name="dept">
          <option value="CS">CSE</option>
          <option value="EC">ECE</option>
          <option value="IT">IT</option>
          <option value="Civ">CIVL</option>
          <option value="Mec">Mech</option>

        </select></td></tr>
        
        <tr><th>Section:</th><td>
        <select  name="sec">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select></td></tr>
      </table>
      <br>
        <hr/>
        <br>
        Choose Class 2<br>
        <table>
       <tr><th> Batch:</th><td>
        <select  name="bat1">
          <option value="12">2012-2016</option>
          <option value="13">2013-2017</option>
          <option value="14">2014-2018</option>
          <option value="15">2015-2019</option>
        </select></td>
        
        </tr>
        
       <tr><th> Year:</th><td>
        <select  name="yr1">
          <option value="IV">IV</option>
          <option value="III">III</option>
          <option value="II">II</option>
          <option value="I">I</option>
        </select></td></tr>
        
       <tr><th> Department:</th><td>
        <select  name="dept1">
          <option value="CS">CSE</option>
          <option value="EC">ECE</option>
          <option value="IT">IT</option>
          <option value="Civ">CIVL</option>
          <option value="Mec">Mech</option>

        </select></td></tr>
        
        <tr><th>Section:</th><td>
        <select   name="sec1">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select></td></tr>
        </table>
        <br>
       

    
      <button type="submit" name="submit" id="submit"  >Save</button> 
      </form> 
      <form action='regd.php' method="post"><button type="submit" name="Back" id="submit"  >Back</button></form>
      <h2><?php echo $rss ?></h2>
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
    <li></li>
    <li></li>
    <li></li>
  </ul>

    </div>
    <br>
    <br>
  
   <br>

    


    
  </body>
</html>
<!--html ends here-->