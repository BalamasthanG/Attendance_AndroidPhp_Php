<?php
date_default_timezone_set("Asia/Calcutta");
 /*$r = date('2015-02-28');
 $k ='m';
 $date = new DateTime($r);
$date->modify('+1 day');
 //date_add($r,date_interval_create_from_date_string("40 days"));
echo $date->format('Y-m-d');
 echo  	$r;*/
 //print_r(getdate());
 $diff = date('l',strtotime('2016-04-04'));
 echo $diff;
?>