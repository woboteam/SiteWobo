<?php
include_once("database.php");
/**
* News (new_id, new_title, new_slug, new_desc, new_detail, new_img, cate_id, new_create, new_modify, new_status)
*/
class M_news extends database{
	public function insert_news($new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id, $new_status){
		$query = "INSERT INTO news(new_id, new_title, new_slug, new_desc, new_detail, new_img, cate_id, new_create, new_modify, new_status) VALUES(NULL,?,?,?,?,?,?,NOW(),NOW(),?)";
		$this->setQuery($query);
		return $this->execute(array($new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id, $new_status));
	}
	public function update_news($new_id, $new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id){
		$query = "UPDATE news SET new_title=?, new_slug=?, new_desc=?, new_detail=?, new_img=?, cate_id=?, new_modify=NOW() WHERE new_id=?";
		$this->setQuery($query);
		return $this->execute(array($new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id, $new_id));
	}
	public function check_insert($new_title, $new_slug){
		$query = "SELECT * FROM news WHERE new_title=? OR new_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($new_title, $new_slug));
	}
	public function get_all_news(){
		$query = "SELECT * FROM news";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_new_id($new_id){
		$query = "SELECT * FROM news WHERE new_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($new_id));
	}
	public function delete_news($new_id){
		$query = "DELETE FROM news WHERE new_id=?";
		$this->setQuery($query);
		return $this->execute(array($new_id));
	}
	// Đánh dấu show/hide tin tức
	public function set_news_status($new_id, $new_status){
		$query = "UPDATE news SET new_status=? WHERE new_id=?";
		$this->setQuery($query);
		return $this->execute(array($new_status, $new_id));
	}
	// Đánh dấu show/hide tin tức đã chọn
	public function set_news_array_status_hide($str_new_id, $new_status){
		$query = "UPDATE news SET new_status=? WHERE new_id in (". $str_new_id . ")";
		$this->setQuery($query);
		return $this->execute(array($new_status));
	}
	// Lấy tin tức theo array news_id
	public function get_news_array_id($str_new_id){
		$query = "SELECT * FROM news WHERE new_id in (" . $str_new_id . ")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>