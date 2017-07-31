<?php
include_once("database.php");
class M_sliders extends database{
	// slider_id, slider_name, slider_desc, slider_size, slider_modify
	public function get_all_slider(){
		$query = "SELECT * FROM sliders";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_slider_id($slider_id){
		$query = "SELECT * FROM sliders WHERE slider_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($slider_id));
	}
	public function insert_slider($slider_name, $slider_img, $slider_desc, $slider_size){
		$query = "INSERT INTO sliders(slider_id, slider_name, slider_img, slider_desc, slider_size, slider_modify) VALUES (NULL,?,?,?,?,NOW())";
		$this->setQuery($query);
		return $this->execute(array($slider_name, $slider_img, $slider_desc, $slider_size));
	}
	public function update_slider($slider_id, $slider_name, $slider_img, $slider_desc, $slider_size){
		$query = "UPDATE sliders SET slider_name=?, slider_img=?, slider_desc=?,slider_size=?,slider_modify=NOW() WHERE slider_id=?";
		$this->setQuery($query);
		return $this->execute(array($slider_name, $slider_img, $slider_desc, $slider_size, $slider_id));
	}
	public function delete_slider($slider_id){
		$query = "DELETE FROM sliders WHERE slider_id=?";
		$this->setQuery($query);
		return $this->execute(array($slider_id));
	}
	public function set_news_status($slider_id, $status){
		$query = "UPDATE sliders SET status=? WHERE slider_id=?";
		$this->setQuery($query);
		return $this->execute(array($status, $slider_id));
	}
}