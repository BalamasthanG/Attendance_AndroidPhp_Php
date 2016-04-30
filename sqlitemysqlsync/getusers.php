<?php
    include_once 'db_functions.php';
    $db = new DB_Functions();
   // $users = $db->getUnSyncRowCount();
      $name = $_POST["class"];
      $flag = $_POST['flag'];
   // $name = "12IVCSA";
    $getstu = $db->getstudent($name);
	$a = array();
	$b = array();
	
    if ($getstu!= false){
       // $no_of_users = mysql_num_rows($users);
		while ($row = mysql_fetch_array($getstu)) {		
			$b["userId"] = $row["roll"];
			$b["userName"] = $row["Name"];
			array_push($a,$b);
		}
		echo json_encode($a);
	}

    /*else{
        $no_of_users = 0;
		$b["count"] = $no_of_users;
		echo json_encode($b);
	}*/


?>