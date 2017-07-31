<?php
include_once("models/m_kind.php");
$m_kind = new M_kind();
?>
<option data-display="Tất cả các dòng xe" value="0">-- Chọn dòng xe --</option>
<?php 
if (isset($_POST["pro_brand"])){
	$brand_id = $_POST["pro_brand"];
	$list_kind_by_brand = $m_kind->get_kind_by_brand($brand_id);
	if ($list_kind_by_brand!=false){
		foreach ($list_kind_by_brand as $val_kind) {
 ?>
<option value="<?php echo $val_kind->kind_id;?>"><?php echo $val_kind->kind_name;?></option>
<?php 	} 
	}
}?>