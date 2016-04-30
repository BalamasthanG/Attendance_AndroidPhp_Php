<?php

class DB_Functions {

    private $db;

   
    function __construct() {
        include_once './db_connect.php';
        
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    
    function __destruct() {
        
    }

    
    /*public function storeUser($User) {
       
		include_once './db_connect.php';
		$sqli="INSERT INTO user(Name) VALUES('$User')";
        $result = mysql_query($sqli);
		
        if ($result) {
			return true;
        } else {			
			
				return false;
		}
    }*/

    public function Regduser($User,$Pass,$cs1,$cs2){
        include_once './db_connect.php';
        $sql = "INSERT INTO faculty(Name,pass,class1,class2) VALUES('$User',password('$Pass'),'$cs1','$cs2')";
        $res = mysql_query($sql);
        if($res){
            return true;
        }else{
            return false;
        }



    }

    /* public function store($id,$user){
      include_once './db_connect.php';
      $sql = "INSERT INTO summathan(Id,Name) VALUES('$id','$user')";
      $result = mysql_query($sql);
    
        if ($result) {
      return true;
        } else {      
      
        return false;
    }

     }*/

   
    

    public function login($user, $pass,$tag){

        include_once './db_connect.php';
        
        $cmm= mysql_query("SELECT password('$pass')");
        $ft1=mysql_fetch_array($cmm);
        
        $rs = mysql_query("SELECT pass FROM faculty WHERE Name = '$user' and rgd = 1");
        $ft = mysql_fetch_array($rs);

                
       
       if(strcmp($ft1[0],$ft[0])=='0'){

        $sq = mysql_query("UPDATE faculty SET tag = $tag WHERE name = '$user'");
        
        return true;
       }
       else
       {

        return false;
       }

    }

    public function checkAvail($table,$roll,$name){
      include_once './db_connect.php';

      $rs = mysql_query("SELECT roll FROM $table WHERE roll = '$roll' AND Name= '$name'");
      $ft = mysql_fetch_array($rs);

      if(strcmp($ft[0],$roll)=='0'){
        return true;
      }
      else{
        return false;
      }


    }

    public function UpdTab($tab){
      include_once './db_connect.php';
      date_default_timezone_set("Asia/Calcutta");

      $r = date('Ymd');
      $k ='m';
      $s  = $k.$r;
      $rs = mysql_query("ALTER TABLE $tab ADD $s int not null default 0 ");

      if($rs){
        return true;
      }
      else{
        return false;
  
      }


    }

   public function UpdStudentP($tab,$roll){
    include_once './db_connect.php';
    date_default_timezone_set("Asia/Calcutta");
    $r = date('Ymd');
      $k ='m';
      $s  = $k.$r;

      $rs = mysql_query("UPDATE $tab SET $s = 1 WHERE roll = '$roll'");

      if($rs){
        return true;
      }
      else{
        return false;
      }


   }

   public function UpdStudentA($tab){
    include_once './db_connect.php';
    date_default_timezone_set("Asia/Calcutta");
    $r = date('Ymd');
      $k ='m';
      $s  = $k.$r;

      $rs = mysql_query("UPDATE $tab SET $s = 0");

      if($rs){
        return true;
      }
      else{
        return false;
      }


   }

  

  public function ChkAlrdy($tab){
    include_once './db_connect.php';
    date_default_timezone_set("Asia/Calcutta");
    $r = date('Ymd');
      $k ='m';
      $s  = $k.$r;
    $rs = mysql_query("SELECT $s FROM $tab ");

    if($rs){
      return true;
    }else{
      false;
    }

  }

  public function ViewStu1($tab){
    include_once './db_connect.php';
    $rs = mysql_query("SELECT * FROM $tab order by roll");
    if($rs){
      return $rs;
    }else{
      return false;
    }
  }

 

  public function getName($name){
    include_once './db_connect.php';

    $rs = mysql_query("SELECT Name FROM $name");

    if($rs){
      return $rs;

    }
    else{
      return false;
    }
  }

   public function ViewStu($tab, $name,$d){
    include_once './db_connect.php';
    $rs = mysql_query("SELECT $d FROM $tab WHERE Name = '$name'");
    $r = mysql_fetch_array($rs);
    if($rs){
      return $r[0];
    }else{
      return 2;
    }
  }

  public function datdif($to,$frm){
    include_once './db_connect.php';
    $rs = mysql_query("SELECT datediff('$to','$frm')");
    $r = mysql_fetch_array($rs);
    if ($rs) {
       return $r[0];
    }
    else{
      false;
    }
  }

    public function logout($user,$tag){
      include_once './db_connect.php';

      $rs = mysql_query("UPDATE faculty SET tag = $tag WHERE name = '$user'");

      if($rs){
         return true;
      }
      else{
        return false;
      }

    }

    public function student($name,$bat,$yr,$dept,$sec,$id,$roll){

      include_once './db_connect.php';

      $sql = "INSERT INTO students(Name,Batch,Year,Dept,Sec,Id,roll) VALUES('$name',$bat,'$yr','$dept','$sec','$id','$roll')";
      $rs = mysql_query($sql);

      if($rs){
        return true;
      }else{
        false;
      }

    }

    public function showclass($uname){

        include_once './db_connect.php';
        $sql = mysql_query("SELECT class1,class2 FROM faculty WHERE Name='$uname'");

            if($sql){
        return $sql;
    }
      else{
        return false;
      }
    }


    
    public function getstudent($clas){
      include_once './db_connect.php';
      $rs = mysql_query("SELECT Name,roll FROM students WHERE Id = '$clas' order by roll");

      if($rs){
        return $rs;
      }
      else{
        return false;
      }

    }

    public function reject($name){

      include_once './db_connect.php';

      $rss = mysql_query("DELETE FROM faculty WHERE Name = '$name'");

      if($rss){
        return true;
      }
      else {
        return false;
      }

    }

    public function crtAll($name,$id){
      include_once './db_connect.php';

      $rs = mysql_query("CREATE TABLE $name  AS SELECT Id,roll,Name FROM students WHERE Id = '$id'");

      if($rs){
        return true;
      }else{
        return false;
      }




    }
  
   public function RgdAll(){
    include_once '/.db_connect.php';

    $rss = mysql_query("SELECT Name,class1,class2 FROM faculty WHERE rgd = 1");

    if($rss){
      return $rss;
    }
    else{
      return false;
    }
   }

	 
    public function getAllUsers() {
        $result = mysql_query("select * FROM user");
        return $result;
    }
	
    public function permit($name){
      include_once './db_connect.php';
      $rslt = mysql_query("UPDATE faculty SET rgd = 1 WHERE Name = '$name'");

      if($rslt){
        return true;
      }
      else{
        return false;
      }
    }
    public function getRgdCount() {
		    include_once './db_connect.php';
        $result = mysql_query("SELECT Name,class1,class2,rgd FROM faculty WHERE rgd = 0");
        return $result;
    }
	
	
}

?>