<div class="single_bottom_rightbar">
  <h2>Mới nhất</h2>
  <ul class="small_catg popular_catg wow fadeInDown">
  <?php
    $get_newProduct = $m_product->get_all_product_order_date(0,3);
    foreach ($get_newProduct as $val_newProduct) {               
  ?>
    <li>
      <div class="media wow fadeInDown"> <a href="<?php echo $pathweb ?>views/<?php echo $val_newProduct->pro_slug . '-' . $val_newProduct->pro_id; ?>.html" class="media-left"><img alt="" src="<?php echo $pathweb?>public/products/<?php echo $val_newProduct->pro_img; ?>"> </a>
        <div class="media-body">
          <h4 class="media-heading"><a href="<?php echo $pathweb ?>views/<?php echo $val_newProduct->pro_slug . '-' . $val_newProduct->pro_id; ?>.html"><?php echo $val_newProduct->pro_name; ?></a></h4>
          <div class="media-desc"><?php echo $val_newProduct->pro_desc; ?></div>
        </div>
      </div>
    </li>
    <?php  }?>     
  </ul>
</div>

