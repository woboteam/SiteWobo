<?php
include_once("database.php");
/**
* Contact (contact_id, contact_name, contact_email, contact_phone, contact_subject, contact_content, contact_status, contact_read, contact_process, contact_create)
*/
class M_contact extends database{
	public function get_all_contact(){
		$query = "SELECT * FROM contact";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_all_contact_not_check(){
		$query = "SELECT * FROM contact WHERE contact_status=0";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_contact_id($contact_id){
		$query = "SELECT * FROM contact WHERE contact_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($contact_id));
	}
	public function delete_contact($contact_id){
		$query = "DELETE FROM contact WHERE contact_id=?";
		$this->setQuery($query);
		return $this->execute(array($contact_id));
	}
	// Đánh dấu đã đọc (1) và chưa đọc (0)
	public function set_contact_status($contact_id, $contact_status){
		$query = "UPDATE contact SET contact_status=? WHERE contact_id=?";
		$this->setQuery($query);
		return $this->execute(array($contact_status, $contact_id));
	}
	
	public function set_contact_array_status_hide($str_contact_id, $contact_status){
		$query = "UPDATE contact SET contact_status=? WHERE contact_id in (". $str_contact_id . ")";
		$this->setQuery($query);
		return $this->execute(array($contact_status));
	}
	// Lấy tin tức theo array contact_id
	public function get_contact_array_id($str_contact_id){
		$query = "SELECT * FROM contact WHERE contact_id in (" . $str_contact_id . ")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>