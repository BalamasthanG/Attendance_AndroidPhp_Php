<?php
include_once './db_functions.php';

$db = new DB_Functions(); 

$json = $_POST["syncsts"];

if (get_magic_quotes_gpc()){
$json = stripslashes($json);
}

$data = json_decode($json);

$a=array();
$b=array();

for($i=0; $i<count($data) ; $i++)
{

$res = $db->updateSyncSts($data[$i]->Id,$data[$i]->status);
	
	if($res){
		$b["id"] = $data[$i]->Id;
		$b["status"] = 'yes';
		array_push($a,$b);
	}else{
		$b["id"] = $data[$i]->Id;
		$b["status"] = 'no';
		array_push($a,$b);
	}
}

echo json_encode($a);
?>