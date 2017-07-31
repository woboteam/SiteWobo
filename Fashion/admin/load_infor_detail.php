<?php
if (isset($_GET["id"])){
include_once("models/m_info.php");
$m_info = new M_info();
$infor_id = $_GET["id"];
$infor_detail = $m_info->get_page_id($infor_id);
if ($infor_detail){
?>
<div class="row">
	<div class="col-lg-12">
		<label>Tiêu đề:</label>[<?php echo $infor_detail->infor_id;?>] <span class="text-danger"><?php echo $infor_detail->infor_name;?></span>
	</div>
	<div class="col-lg-12">
		<label>Nội dung</label>
		<div class="detail_info_product">
			<?php echo $infor_detail->infor_detail;?>
		</div>
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