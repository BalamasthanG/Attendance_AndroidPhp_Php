<?php
include_once './db_functions.php';

$db = new DB_Functions(); 
$tab = $_POST['class'];
$json = $_POST["usersJSON"];

//$tab = "masthan";
//Remove Slashes
if (get_magic_quotes_gpc()){
$json = stripslashes($json);
}

$data = json_decode($json);

$a=array();
$b=array();

$rq = $db->ChkAlrdy($tab);
$db ->UpdStudentA($tab);

if(!$rq){
    echo "scucces 1";

    $rr = $db->UpdTab($tab);
    if($rr){
        echo "success 2";
    }else{
        echo "failedd";
    }
        $db ->UpdStudentA($tab);
    for($i=0;i<count($data); $i++){
     
    $rs = $db->checkAvail($tab,$data[$i]->stuId,$data[$i]->stuName);

    if($rs){

        $rss = $db->UpdStudentP($tab,$data[$i]->stuId);
        if($rss){
            echo "success";

        }else{
            echo "fail";
        }
    }else{
        echo "failed";
    }

}

}else{
    for($i=0;i<count($data); $i++){

    $rs = $db->checkAvail($tab,$data[$i]->stuId,$data[$i]->stuName);

    if($rs){

        $rss = $db->UpdStudentP($tab,$data[$i]->stuId);
        if($rss){
            echo "success";

        }else{
            echo "fail";
        }
    }else{
        echo "failed";
    }

}
    echo "outt";

}




for($i=0; $i<count($data) ; $i++)
{

$res = $db->store($data[$i]->stuId,$data[$i]->stuName);
    
    if($res){
        $b["id"] = $data[$i]->userId;
        $b["status"] = 'yes';
        array_push($a,$b);
    }else{
        $b["id"] = $data[$i]->userId;
        $b["status"] = 'no';
        array_push($a,$b);
    }
}

echo json_encode($a);
?>