<?php
include_once("database.php");
class M_photo extends database{
	// photo_key, photo_id, photo_name, photo_create, photo_size

	public function insert_img($photo_id, $photo_name, $photo_size){
		$query = "INSERT INTO photo(photo_key, photo_id, photo_name, photo_create, photo_size) VALUES (NULL,?,?,NOW(),?)";
		$this->setQuery($query);
		return $this->execute(array($photo_id, $photo_name, $photo_size));
	}
	public function update_img($photo_key,$photo_name,$photo_create,$photo_size){
		$query = "UPDATE photo SET photo_name=?, photo_create=?, photo_size=? WHERE photo_key=?";
		$this->setQuery($query);
		return $this->execute(array($photo_name,$photo_create,$photo_size,$photo_key));
	}
	public function delete_img($str_photo_key){
		$query = "DELETE FROM photo WHERE photo_key in (" . $str_photo_key . ")";
		$this->setQuery($query);
		return $this->execute();
	}
	public function delete_photo($photo_id){
		$query = "DELETE FROM photo WHERE photo_id = ?";
		$this->setQuery($query);
		return $this->execute(array($photo_id));
	}
	public function list_photo_by_key($str_photo_key){
		$query = "SELECT * FROM photo WHERE photo_key in (". $str_photo_key .")";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function list_photo($photo_id){
		$query = "SELECT * FROM photo WHERE photo_id = ?";
		$this->setQuery($query);
		return $this->loadAllRows(array($photo_id));
	}
}