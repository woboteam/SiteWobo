<?php
include_once("database.php");
/**
* Pages (pages_id, pages_name, pages_slug, pages_content, pages_create, pages_modify, pages_status)
*/
class M_pages extends database{
	public function insert_pages($pages_name, $pages_slug, $pages_content, $pages_status){
		$query = "INSERT INTO pages(pages_id, pages_name, pages_slug, pages_content, pages_create, pages_modify, pages_status) VALUES(NULL,?,?,?,NOW(),NOW(),?)";
		$this->setQuery($query);
		return $this->execute(array($pages_name, $pages_slug, $pages_content, $pages_status));
	}
	public function update_pages($pages_id, $pages_name, $pages_slug, $pages_content){
		$query = "UPDATE pages SET pages_name=?, pages_slug=?,  pages_content=?, pages_modify=NOW() WHERE pages_id=?";
		$this->setQuery($query);
		return $this->execute(array($pages_name, $pages_slug, $pages_content, $pages_id));
	}
	public function check_insert($pages_name, $pages_slug){
		$query = "SELECT * FROM pages WHERE pages_name=? OR pages_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($pages_name, $pages_slug));
	}
	public function get_all_pages(){
		$query = "SELECT * FROM pages";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_page_id($pages_id){
		$query = "SELECT * FROM pages WHERE pages_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($pages_id));
	}
	public function delete_pages($pages_id){
		$query = "DELETE FROM pages WHERE pages_id=?";
		$this->setQuery($query);
		return $this->execute(array($pages_id));
	}
	// Đánh dấu show/hide tin tức
	public function set_pages_status($pages_id, $pages_status){
		$query = "UPDATE pages SET pages_status=? WHERE pages_id=?";
		$this->setQuery($query);
		return $this->execute(array($pages_status, $pages_id));
	}
	// Đánh dấu show/hide tin tức đã chọn
	public function set_pages_array_status_hide($str_page_id, $pages_status){
		$query = "UPDATE pages SET pages_status=? WHERE pages_id in (". $str_page_id . ")";
		$this->setQuery($query);
		return $this->execute(array($pages_status));
	}
	// Lấy tin tức theo array pages_id
	public function get_pages_array_id($str_page_id){
		$query = "SELECT * FROM pages WHERE pages_id in (" . $str_page_id . ")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>