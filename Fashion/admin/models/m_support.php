<?php
include_once("database.php");
/**
* support_id, support_name, support_img, support_phone, support_fb, support_status
*/
class M_support extends database{
	public function insert_support($support_name, $support_img, $support_phone, $support_fb){
		$query = "INSERT INTO support(support_id, support_name, support_img, support_phone, support_fb) VALUES(NULL,?,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($support_name, $support_img, $support_phone, $support_fb));
	}
	public function update_support($support_id, $support_name, $support_img, $support_phone, $support_fb){
		$query = "UPDATE support SET support_name=?, support_img=?, support_phone=?, support_fb=? WHERE support_id=?";
		$this->setQuery($query);
		return $this->execute(array($support_name, $support_img, $support_phone, $support_fb, $support_id));
	}
	public function get_support_id($support_id){
		$query = "SELECT * FROM support WHERE support_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($support_id));
	}
	// Đánh dấu show/hide tin tức
	public function set_support_status($support_id, $support_status){
		$query = "UPDATE support SET support_status=? WHERE support_id=?";
		$this->setQuery($query);
		return $this->execute(array($support_status, $support_id));
	}
	public function get_all_support(){
		$query = "SELECT * FROM support";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>