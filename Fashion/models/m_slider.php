<?php
include_once("database.php");
/**
* Slider (sliders): slider_id, slider_name, slider_img, slider_desc, slider_size, slider_modify, status
*/
class M_slider extends database
{
	public function get_all_slider(){
		$query = "SELECT * FROM sliders WHERE status = 0 ORDER BY slider_modify DESC";
		$this->setQuery($query);
		return $this->loadAllRows();
	}
}
?>