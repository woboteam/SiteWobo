<?php
if (isset($_GET["id"])){
include_once("models/m_ordercar.php");
include_once("models/m_brand.php");
include_once("models/m_kind.php");
include_once("models/m_province.php");
$m_order = new M_ordercar();
$m_province = new M_province();
$order_id = $_GET["id"];
$order_detail = $m_order->get_order_id($order_id);
if ($order_detail){
?>
<div class="row">
	<div class="col-lg-6">
		<label>Mã đơn hàng:</label> <?php echo $order_detail->order_id;?>
	</div>
	<div class="col-lg-6">
		<label>Ngày đặt xe:</label> <?php echo date("H:i:s d-m-Y",strtotime($order_detail->order_date));?>
	</div>
	<div class="col-lg-6">
		<label>Tên khách hàng:</label> <span class="text-danger"><?php echo $order_detail->customer;?></span>
	</div>
	<div class="col-lg-6">
		<!-- <label>Ngày sửa:</label> <?php echo date("H:i:s d-m-Y", strtotime($order_detail->pro_modify));?> -->
	</div>
	<div class="col-lg-6">
		<label>Phone:</label> <?php echo $order_detail->phone;?>
	</div>
	<div class="col-lg-12">
		<label>Các xe đã đặt</label>
		<div class="row">
		<?php
		$detail = $m_order->get_order_detail($order_id);
		foreach ($detail as $val_order) {
			$data_noidi = $m_province->get_province_id($val_order->placego);
			$data_noiden = $m_province->get_province_id($val_order->placeoff);
			if ($data_noidi!=false){
				$noidi = $data_noidi->province_name;
			} else {
				$noidi = "Chưa xác định";
			}
			if ($data_noidi!=false){
				$noiden = $data_noiden->province_name;
			} else {
				$noiden = "Chưa xác định";
			}
		?>
		<div class="col-lg-12">
			<span style="color:red;">Xe:</span> [<?php echo $val_order->pro_id; ?>] <?php echo $val_order->pro_name; ?> _ <span style="color:red;">Ngày đi:</span> <?php echo $val_order->datego; ?> _ <span style="color:red;">Nơi đi:</span> <?php echo $noidi; ?>_ <span style="color:red;">Nơi đến:</span> <?php echo $noiden; ?>
		</div>
		<?php
		}
		?>
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