<?php
include_once("database.php");
/**
* 
*/
class M_province extends database
{
	public function get_all_province(){
		$query = "SELECT * FROM province ORDER by province_name";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_province_id($province_id){
		$query = "SELECT * FROM province WHERE province_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($province_id));
	}
}