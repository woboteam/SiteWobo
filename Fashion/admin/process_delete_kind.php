<?php
if (isset($_POST["id"])){
	include_once("models/m_kind.php");
	$m_kind = new M_kind();
	$kind_id = $_POST["id"];
	$kind_current = $m_kind->get_kind_id($kind_id);
	if ($kind_current!=false){
		$delete_kind = $m_kind->delete_kind($kind_id);
		if ($delete_kind){
			echo "success";
		}
	}
}
?>