 <div class="single_category wow fadeInDown">
  <?php
     $cate_id_3=$m_cate->get_cate_id(3);    
  ?> 
  <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#"><?php  echo $cate_id_3->cate_name;?></a> </h2>
  <?php 
    $cate_pr_3=$m_cate->get_cate_parent(3);
    $arr_cate = array();
    $list_cate = array();
    foreach ($cate_pr_3 as $val_cate_pr_3) {               
      array_push($arr_cate, $val_cate_pr_3->cate_id);
      $list_cate = implode(",", $arr_cate); 
    }                
   
  ?>
  <div class="business_category_left wow fadeInDown">
    <ul class="fashion_catgnav">
   <!-- sản phẩm lượt xem nhiều nhất theo id -->
      <li>
      <?php               
      $list_product = $m_product->get_all_product_by_list_cate_id_order_view(0,1,$list_cate);
      if ($list_product != false) {
       foreach ($list_product as $val_product) { 
      ?>
        <div class="catgimg2_container"> <a href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html"><img alt="" src="public/products/<?php echo $val_product->pro_img; ?>"></a>
        </div>
        <h2 class="catg_titile"><a href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html"><?php echo $val_product->pro_name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?></a></h2>
        <div class="comments_box"> <span class="meta_date"><?php echo date("d/m/Y",strtotime($val_product->pro_create));?></span> <span class="meta_comment"><a href="#">Comments (<?php echo $val_product->pro_view; ?>)</a></span> 
        <span class="meta_more"><a  href="#">Xem thêm...</a></span> </div>
        <div class="media-desc-main"><?php echo $val_product->pro_desc; ?></div>
        <?php } }?>
      </li>
    </ul>
  </div>
<!-- 3 sản phẩm mới nhất theo id -->
  <div class="business_category_right wow fadeInDown">
    <ul class="small_catg">
    <?php 
      $list_product = $m_product->get_all_product_by_list_cate_id_order_date(0,3,$list_cate);
      if ($list_product != false) {
       foreach ($list_product as $val_product) { 
    ?>
      <li>
        <div class="media wow fadeInDown"> <a class="media-left" href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html"><img src="public/products/<?php echo $val_product->pro_img; ?>" alt=""></a>
          <div class="media-body">
            <h4 class="media-heading"><a href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html"><?php echo $val_product->pro_name; ?> </a></h4>
            <div class="comments_box"> <span class="meta_date"><?php echo date("d/m/Y",strtotime($val_product->pro_create));?></span> <span class="meta_comment"><la href="#">Comments (<?php echo $val_product->pro_view; ?>)</a></span> </div>
          </div>
        </div>
      </li>
    <?php } }?>   
    </ul>
  </div>
</div>