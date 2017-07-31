<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="header_top">
            <div class="header_top_left">
              <?php
                include_once("v_header_menu_top.php")
              ?>
            </div>
            <div class="header_top_right">
              <form action="#" class="search_form">
                <input type="text" placeholder="Text to Search">
                <input type="submit" value="">
              </form>
            </div>
          </div>

          <div class="header_bottom">
            <div class="header_bottom_left"><a class="logo" href="<?php echo $pathweb;?>index.php">fashion<strong>Express</strong> <span>A Pro Fashion Page</span></a></div>
            <div class="header_bottom_right"><a href="#"><img src="<?php echo $pathweb;?>public/images/addbanner_728x90_V1.jpg" alt=""></a></div>
          </div>
        </div>
      </div>
    </header>
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
              include_once("v_header_menu_cate.php")
          ?>
        </div>
      </div>
    </nav>
  </div>