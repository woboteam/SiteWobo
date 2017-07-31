<?php
if (isset($_GET["id"])){
include_once("models/m_support.php");
$m_support = new M_support();
$support_id = $_GET["id"];
$support_current = $m_support->get_support_id($support_id);
if ($support_current){
?>
<div class="row">
	<div class="col-lg-3">
		<img src="../public/support/<?php echo $support_current->support_img;?>">
	</div>
	<div class="col-lg-11">
		<label>Support: </label> <?php echo $support_current->support_name;?>
	</div>

	<div class="col-lg-6">
		<label>Phone: </label> <?php echo $support_current->support_phone;?>
	</div>
	<div class="col-lg-6">
		<label>Facebook: </label> <span class="text-danger"><?php echo $support_current->support_fb;?></span>
	</div>
	
</div>
<?php
	} else {
		?>
		<div class="row">Không có dữ liệu</div>
		<?php
	}
}
?>