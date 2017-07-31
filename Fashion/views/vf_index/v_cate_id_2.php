<div class="content_middle_rightbar">
          <div class="single_category wow fadeInDown">
          <?php
             $cate_id_2=$m_cate->get_cate_id(2);    
          ?> 
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="#" class="title_text"><?php  echo $cate_id_2->cate_name;?></a> </h2>
            <ul class="catg1_nav">
             <?php
              $cate_dulich=$m_cate->get_cate_parent(2);
              $arr_cate = array();
              $list_cate = array();
              foreach ($cate_dulich as $val_cate_dulich) {               
                array_push($arr_cate, $val_cate_dulich->cate_id);
                $list_cate = implode(",", $arr_cate); 
              }               
              $list_product = $m_product->get_all_product_by_list_cate_id(0,2,$list_cate);
              if ($list_product != false) {
                foreach ($list_product as $val_product) { 
                    $cate_slug = $val_cate_dulich->cate_slug;
             ?>
              <li>
                <div class="catgimg_container"> <a href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html" class="catg1_img">
                <img alt="" src="public/products/<?php echo $val_product->pro_img; ?>"></a></div>
                <h3 class="post_titile"><a href="<?php echo $pathweb ?>views/<?php echo $val_product->pro_slug . '-' . $val_product->pro_id; ?>.html"><?php echo $val_product->pro_name; ?></a></h3>
              </li>
              <?php  }  } 
              ?>
            </ul>
          </div>
        </div>