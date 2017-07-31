<?php
include_once("database.php");
/**
* infor (infor_id, infor_name, infor_content, infor_create, infor_modify, infor_status)
*/
class M_info extends database{
	public function insert_infor($infor_name, $infor_detail){
		$query = "INSERT INTO infor(infor_id, infor_name, infor_detail) VALUES(NULL,$infor_name, $infor_detail)";
		$this->setQuery($query);
		return $this->execute(array($infor_name, $infor_detail));
	}
	public function update_infor($infor_id, $infor_name, $infor_detail){
		$query = "UPDATE infor SET infor_name=?, infor_detail=? WHERE infor_id=?";
		$this->setQuery($query);
		return $this->execute(array($infor_name, $infor_detail, $infor_id));
	}
	public function get_info_id($infor_id){
		$query = "SELECT * FROM infor WHERE infor_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($infor_id));
	}
	// Đánh dấu show/hide tin tức
	public function set_infor_status($infor_id, $infor_status){
		$query = "UPDATE infor SET infor_status=? WHERE infor_id=?";
		$this->setQuery($query);
		return $this->execute(array($infor_status, $infor_id));
	}
	public function get_all_infor(){
		$query = "SELECT * FROM infor WHERE infor_id<>6";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>