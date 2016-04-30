<?php
  
 include_once './db_functions.php';

$db = new DB_Functions();

        $name=$_POST['username'];
        $pass=$_POST['password'];
       // $name = "one";
       // $pass = "one";
        
        $arr  = array();
        $fin = array();


        $rs= $db->login($name,$pass,1);
       // echo $name.$pass;

        $r = $db->showclass($name);
        



if($r){
 $row = mysql_fetch_array($r);
  $cs1 = $row["class1"];
  $cs2 = $row["class2"];
 }
 else {
  $cs1 = "failed";
  $cs2 = "failed";
 }




        if(($name == "admin")&&($pass=="admin")){

        	session_start();
        	$_SESSION['name'] = $name;
        	//$_SESSION['pass'] = $_POST['pass'];
        	$arr['result'] = '1';
        	
        }elseif ($rs) {
        	session_start();
        	$_SESSION['name'] = $name;
        	//$_SESSION['pass'] = $_POST['pass'];
        	//echo "1";
              // echo json_encode('1');
                $arr['result'] = "1";
                $arr['cls1'] = $cs1;
                $arr['cls2']  = $cs2;
                array_push($fin, $arr);
        	
        	
        }
        else {
        	//echo "0";
               // echo json_encode('0');
                $arr['result'] = "0";
                array_push($fin, $arr);
        }
        echo json_encode($fin);
?>