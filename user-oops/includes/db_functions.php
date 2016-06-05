<?php

class Db_functions{

	private $db;

	function __construct(){
        
		include_once 'db_connect.php';
		$this->db = new Db_connect();
		$query=$this->db->connect();
	}


public function select($table,$cols='*',$where=NULL,$value=NULL)
{
	if ($cols!='*') {
		$cols=implode(',', $cols);
	}
	$query='SELECT ' .$cols.' from ' . $table . ' ';
	$query .= $where . $value;
	//echo $query;
	$query=mysql_query($query);
	if ($cols!='*') {
		$result=mysql_fetch_assoc($query);
		return $result;
	}
	while($result=mysql_fetch_array($query))
	 {
       $id=$result['id'];
			echo '<tr><td>'.$result['username'] . '</td><td><a href="admin.php?action=edit&id='.$id.'">Edit</a></td><td><a href="admin.php?action=delete&id='.$id.'">Delete</a></td></tr>';
	 }
	 
}


public function insert($table,$data)
{
	$keys=array_keys($data);
	$fields=implode('`,`',$keys);	
	$data=implode("','", $data);
	$query="INSERT INTO " .$table . "(`".$fields."`) VALUES ('".$data."')";
	$query=mysql_query($query);
}


public function delete($table,$col,$where=NULL)
{
	if ($where == NULL) {
		
	$query='DELETE  FROM ' . $table;
}
else
{
	$query='DELETE  FROM ' . $table . ' where ' .$col . ' = '."'$where'";
}
$query=mysql_query($query);

}


public function update($table,$data,$where='NULL',$row=NULL)
{
	$query='UPDATE ' . $table . ' SET ';
	$sets=array();
	foreach ($data as $col => $value) {
		$sets[]= "`".$col."` = '".$value."'";
	}
	$query .=implode(',',$sets);
	$query .=$where . $row;
	echo $query;
     $query=mysql_query($query);

}
}

$func= new Db_functions();