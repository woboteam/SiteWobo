 <section id="mainContent">
    <div class="content_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="latest_slider">
            <div class="slick_slider">
              <?php
              include_once("v_slider.php")
               ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm6">
          <?php
              include_once("v_content_top_right.php")
          ?>
        </div>
      </div>
    </div>
    <div class="content_middle">
      <div class="col-lg-3 col-md-3 col-sm-3">
       <?php
              include_once("v_cate_id_1.php")
        ?>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="content_middle_middle">
          <div class="slick_slider2">
           <?php 
              foreach ($list_pro_random as $val_pro_random) {
            ?>
            <div class="single_featured_slide"> <a href="<?php echo $pathweb;?>views/<?php echo $val_pro_random->pro_slug.'-'.$val_pro_random->pro_id;?>.html"><img src="<?php echo $pathweb;?>public/products/<?php echo $val_pro_random->pro_img;?>"alt=""></a>
              <h2><a href="<?php echo $pathweb;?>views/<?php echo $val_pro_random->pro_slug.'-'.$val_pro_random->pro_id;?>.html"><?php echo $val_pro_random->pro_name; ?></a></h2>
              <div class="media-desc-main"><?php echo $val_pro_random->pro_desc; ?></div>
            </div>
           <?php 
              }
            ?>             
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <?php
              include_once("v_cate_id_2.php")
        ?>
      </div>
    </div>
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <?php
                include_once("v_cate_id_3.php")
          ?>
          <div class="games_fashion_area">
            <?php
              include_once("v_cate_id_4.php")
            ?>
            <?php
              include_once("v_cate_id_5.php")
            ?> 
          </div>
          <div class="technology_catrarea">
            <?php
              include_once("v_cate_id_6.php")
            ?> 
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
           <?php
              include_once("v_RecentPost.php")
            ?>                    
            <?php
              include_once("v_MostPopular_RecentComment.php")
            ?>           
          <!-- <div class="single_bottom_rightbar">
            <h2>Blog Archive</h2>
            <div class="blog_archive wow fadeInDown">
              <form action="#">
                <select>
                  <option value="">Blog Archive</option>
                  <option value="">October(20)</option>
                </select>
              </form>
            </div>
          </div>
          <div class="single_bottom_rightbar wow fadeInDown">
            <h2>Popular Lnks</h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Blog Home</a></li>
              <li><a href="#">Error Page</a></li>
              <li><a href="#">Social link</a></li>
              <li><a href="#">Login</a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
  </section>