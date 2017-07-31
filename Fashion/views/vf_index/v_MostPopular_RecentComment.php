 <div class="single_bottom_rightbar">
    <ul role="tablist" class="nav nav-tabs custom-tabs">
      <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Phổ biến nhất</a></li>
      <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Bình luận gần nhất</a></li>
    </ul>
    <div class="tab-content">
      <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
        <ul class="small_catg popular_catg wow fadeInDown">
        <?php
        $get_popularProduct = $m_product->get_all_product_order_view(0,3);
        foreach ($get_popularProduct as $val_popularProduct) {               
        ?>
          <li>
            <div class="media wow fadeInDown"> <a class="media-left" href="<?php echo $pathweb ?>views/<?php echo $val_popularProduct->pro_slug . '-' . $val_popularProduct->pro_id; ?>.html"><img src="<?php echo $pathweb?>public/products/<?php echo $val_popularProduct->pro_img; ?>" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading"><a href="<?php echo $pathweb ?>views/<?php echo $val_popularProduct->pro_slug . '-' . $val_popularProduct->pro_id; ?>.html"><?php echo $val_popularProduct->pro_name; ?></a></h4>
                <div class="media-desc"><?php echo $val_popularProduct->pro_desc; ?></div>
              </div>
            </div>
          </li>
          <?php  }?>     
        </ul>
      </div>
      <div id="recentComent" class="tab-pane fade" role="tabpanel">
        <ul class="small_catg popular_catg">
         <!--  <li>
            <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
              </div>
            </div>
          </li>
          <li>
            <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
              </div>
            </div>
          </li>
          <li>
            <div class="media wow fadeInDown"> <a class="media-left" href="#"><img src="images/112x112.jpg" alt=""></a>
              <div class="media-body">
                <h4 class="media-heading"><a href="#">Duis condimentum nunc pretium lobortis </a></h4>
                <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra </p>
              </div>
            </div>
          </li> -->
        </ul>
      </div>
    </div>
  </div>