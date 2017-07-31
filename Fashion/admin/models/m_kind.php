<?php
include_once("database.php");
/**
* 
*/
class M_kind extends database{
	public function get_all_kind(){
		$query = "SELECT * FROM kind";
		$this->setQuery($query);
		return $this->loadRow();
	}
	public function get_kind_id($kind_id){
		$query = "SELECT * FROM kind WHERE kind_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($kind_id));
	}
	public function get_kind_by_brand($brand_id){
		$query = "SELECT * FROM kind WHERE brand_id=? ORDER by kind_name";
		$this->setQuery($query);
		return $this->loadAllRows(array($brand_id));
	}

	public function check_insert($kind_name, $kind_slug){
		$query = "SELECT * FROM kind WHERE kind_name=? OR kind_slug=?";
		$this->setQuery($query);
		return $this->loadAllRows(array($kind_name, $kind_slug));
	}
	public function insert_kind($kind_name, $kind_slug, $brand_id){
		$query = "INSERT INTO kind(kind_id, kind_name, kind_slug, brand_id) VALUES(NULL,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array($kind_name, $kind_slug, $brand_id));
	}
	public function update_kind($kind_id, $kind_name, $kind_slug, $brand_id){
		$query = "UPDATE kind SET kind_name=?, kind_slug=?, brand_id=? WHERE kind_id=?";
		$this->setQuery($query);
		return $this->execute(array($kind_name, $kind_slug, $brand_id, $kind_id));
	}
	public function delete_kind($kind_id){
		$query = "DELETE FROM kind WHERE kind_id=?";
		$this->setQuery($query);
		return $this->execute(array($kind_id));
	}
}
?>