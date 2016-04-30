<?php


function db_faculty()
{

  
date_default_timezone_set("Asia/Calcutta");
  $con = mysql_connect("localhost", "root","")
            or die('Could not connect: ' . mysql_error());
  mysql_select_db("faculty") or die('Could not select database');
  return true;
}

?>