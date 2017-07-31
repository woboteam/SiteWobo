<?php
include_once("database.php");
/**
* 
*/
class M_infor extends database
{
	public function get_all_infor_id($infor_id){
		$query = "SELECT * FROM infor WHERE infor_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($infor_id));
	}
}
?>