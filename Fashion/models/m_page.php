<?php
include_once("database.php");
/**
* 
*/
class M_pages extends database
{
	
	public function get_all_pages($vt=-1,$limit=-1,$cate_id=-1){
		$query = "SELECT * FROM pages WHERE pages_status=0";
		if ($cate_id!=-1){
			$query .= " AND cate_id=".$cate_id;
		}
		$query .= " ORDER BY pages_id";
		if ($vt!=-1){
			$query .= " LIMIT $vt,$limit";
		}
		$this->setQuery($query);
		return $this->loadAllRows();
	}
	public function get_pages_by_slug($pages_slug){
		$query = "SELECT * FROM pages WHERE pages_slug=?";
		$this->setQuery($query);
		return $this->loadRow(array($pages_slug));
	}
	public function get_pages_by_id($pages_id){
		$query = "SELECT * FROM pages WHERE pages_id=?";
		$this->setQuery($query);
		return $this->loadRow(array($pages_id));
	}
	public function get_active(){
		$query = "SELECT * FROM pages WHERE pages_status=0 AND pages_id<>1";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>