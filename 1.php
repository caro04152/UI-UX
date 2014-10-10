<?php
//error_reporting(0);
ini_set("error_reporting","E_ALL & ~E_NOTICE");
//date_default_timezone_set('PRC'); 

class db
{
   var $dbhost = "localhost";
   var $dbuser = "mstu5006sp13";
   var $dbpw   = "database";
   var $dbname = "qgou";
   var $conn;
   //mysql_query("SET NAMES 'utf8'");
   function db_link ()
     {
	    $this->conn=mysql_connect ($this->dbhost, $this->dbuser, $this->dbpw);
		mysql_query("SET NAMES utf8");
	    mysql_select_db($this->dbname);
	 }
	
    function close() 
	{
		return mysql_close($this->conn);
	} 
	
	function query($query)
	 {
	   $sql=$query;
	   $query=mysql_query($query);
	   return $query ? $query : die(mysql_error()."<br><br>".$sql);
     }
	
	function get($query)
	{
         return mysql_fetch_array($query);    
	}
//查询有没有
function getfirst($sql){
return @mysql_fetch_array($this->query($sql));

}

//查询分类名称

function getclass($aa,$bb,$cc)
{
$class_id_sql=$this->query("select * from `{$aa}` where `id`={$cc}");
$class_id_name=$this->get($class_id_sql);
if($class_id_name[$bb]<>""){
return $class_id_name[$bb]; }
else {
return "";
}
}

//反查分类id

function getid($aa,$bb,$cc)
{
$class_id_sql=$this->query("select * from `{$aa}` where `name`='{$cc}' order by sort asc");
$class_id_name=$this->get($class_id_sql);
if($class_id_name[$bb]<>""){
return $class_id_name[$bb]; }
else {
return "";
}
}
	
    function row($query)
	{
         return mysql_num_rows($query);    
	}
	
	function free($query) 
	{
		 return mysql_free_result($query);
	}
	

   function msg($msgdb)
   {
        die($msgdb);
   }
   
   function alert($msg)
   {
       echo "<script language=javascript>";
	   echo "history.back();";
	   echo " alert(\"".$msg."\");";
	   echo "</script>";
	   //return $text;
   }
   
    function location($msg,$url)
    {
        echo "<script language=javascript>";
	    echo " alert(\"".$msg."\");";
	    echo "location.href=\"".$url."\"";
	    echo "</script>";
	    // return $text;
    }
}
class page
{
   function get_num($sql)//获得总共有多少条记录
   {
      global $result, $rs;
      $db_page=new db();
      $result=$db_page->query($sql);
      $rs=$db_page->get($result);
      $num=$rs[0];
	  $db_page->free($result);
	  return $num;
   }
   function get_page($pagesize,$num,$rpage)//在知道总共有多少条记录的情况下，给出有多少页
   {
      ceil($num/$pagesize);
	  if(empty($rpage))
	  {
	  	  $page=0;
	  }
	  else
	  {
	  	  $page=$rpage;
	  	  if($page<0)$page=0;
	  	  if($page>=ceil($num/$pagesize))$page=ceil($num/$pagesize)-1;
	  }
	  return $page;
   }
   function get_page1($pagesize,$sql,$rpage)//在不知道总共有多少条记录的情况下，给出有多少页，一步到位
   {
      global $result, $rs;
      $db_page=new db();
      $result=$db_page->query($sql);
      $rs=$db_page->get($result);
      $num=$rs[0];
	  $db_page->free($result);
	  ceil($num/$pagesize);
	  if(empty($rpage))
	  {
	  	  $page=0;
	  }
	  else
	  {
	  	  $page=$rpage;
	  	  if($page<0)$page=0;
	  	  if($page>=ceil($num/$pagesize))$page=ceil($num/$pagesize)-1;
	  }
	  return $page;
   }
   
   function get_fy($page,$pagezg,$pre,$next,$url)
   {
				for($i=($page-$pre);$i <= min($pagezg,$page+$next);$i++)
				{
				  if($i<1) continue;//如果$page-$pre<0,不操作
				   if ($page==($i-1))
				   {
				   $pageye.="<font color=\"#FF0000\">[".($i)."]</font>"."&nbsp;";
				   }
				   else
				   {
				   $pageye.="<a href=".$url."&page=".($i-1)."  style='color:#b6b6b6;'>[".($i)."]</a>"."&nbsp;";
				   }
				}
				$pageye="<a href=".$url."&page=0 style='color:#b6b6b6;'><FONT  face=Webdings>9</FONT></a>&nbsp;".$pageye."<a href=".$url."&page=".$pagezg." style='color:#b6b6b6;'><FONT face=Webdings>:</FONT></a>";
				return $pageye;
   }
}
$db=new db();
$db->db_link();
?>
