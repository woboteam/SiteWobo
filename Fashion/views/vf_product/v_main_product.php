<section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown">
            <div class="archive_style_1">
              <div style="margin-top:15px;">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Technology</a></li>
                  <li class="active">Duis quis erat non nunc fringilla </li>
                </ol>
              </div>
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Cập nhật mới nhất</span> </h2>
              <?php 
                if ($list_product!=false){
                    foreach ($list_product as $val_product) { 
              ?>
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> 
                      <a href="<?php echo $pathweb;?>views/<?php echo $val_product->pro_slug.'-'.$val_product->pro_id;?>.html">
                        <img alt="" src="<?php echo $pathweb;?>public/products/<?php echo $val_product->pro_img;?>">
                      </a> 
                    </div>
                    <h2 class="catg_titile">
                      <a href="<?php echo $pathweb;?>views/<?php echo $val_product->pro_slug.'-'.$val_product->pro_id;?>.html">
                        <?php echo $val_product->pro_name;?>
                      </a>
                    </h2>
                    <div class="comments_box"> 
                      <span class="meta_date"><?php echo date("d/m/Y",strtotime($val_product->pro_create));?></span> 
                      <span class="meta_comment"><a href="#">Comments (<?php echo $val_product->pro_view; ?>)</a></span> 
                      <span class="meta_more"><a  href="#">Xem thêm...</a></span> 
                    </div>
                    <div class="media-desc-main"> 
                      <?php echo $val_product->pro_desc; ?>
                    </div>
                  </li>
                </ul>
              </div>
              <?php } }?>
            </div>
          </div>
        </div>
        <div class="pagination_area">
          <nav>
            <ul class="pagination">
              <li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
              <!-- <li><a href="#">Xem tất cả</a></li> -->
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <?php
            include_once("views/vf_index/v_RecentPost.php");
          ?>
          <?php
            include_once("views/vf_index/v_MostPopular_RecentComment.php");
          ?>
        </div>
      </div>
    </div>
</section>