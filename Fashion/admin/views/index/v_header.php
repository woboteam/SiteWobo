<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Thuê xe | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- icon -->
    <link type="image/x-icon" href="../public/images/images/favicon.ico" rel="shortcut icon"/>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css" media="screen">
      .form-group.has-error .form-group-input{
        border-color: #a94442;
      }
      .form-group.has-success .form-group-input{
        border-color: #3c763d;
      }
      .form-group-input{
        border: 1px solid #d2d6de;
      } 
      .form-group-input input{
        padding: 5px 10px;
      }
      .btn-add-input{
        cursor:pointer;
      }
      .loader {
        display: none;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('../public/images/images/page-loader.gif') 50% 50% no-repeat rgba(249,249,249,0.5);
      }
      .loader.hide{
        display: none;
      }
      .load-images-pro{
        position: relative;
        width: 106px;
        height: 106px;
      }
      .btn-file-new{
        text-align: center;
        position: absolute;
        cursor: pointer;
        top:  0.5rem;
        right: 0.5rem;
        width: 2rem;
        height: 2rem;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(0,0,0,.23);
      }
      .btn-file-enject{
        text-align: center;
        position: absolute;
        cursor: pointer;
        top:  3.2rem;
        right: 0.5rem;
        width: 2rem;
        height: 2rem;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(0,0,0,.23);
      }
      .btn-file-delete{
        text-align: center;
        position: absolute;
        cursor: pointer;
        top:  6rem;
        right: 0.5rem;
        width: 2rem;
        height: 2rem;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0,0,0,.16), 0 3px 6px rgba(0,0,0,.23);
      }
      .input-image{
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        opacity: 0;
        width: 2rem;
        height: 2rem;
        overflow: hidden;
        cursor: pointer;
      }
      #model_news_detail .modal-body img, #model_products_detail .modal-body img, #model_timer_detail .modal-body img{width: 100%}
      .float-left{
        float: left;
      }
      .clear{
        clear: both;
      }
      .margin-img-photo{
        border: 3px solid #999;
        margin-bottom: 1rem;
      }
      .margin-img-photo::after{ margin: 0; }
      .categories ul.nav ul{
          padding-left: 20px;
      }
      .categories ul.nav li{
          position: relative;
      }
      .ct-right{
          float: left;
      }
      .ct-right{
          position: absolute;
          top:10px;
          right: 20px;
      }
      .ct-right a{
          color: #9f191f!important;
      }
      .notification_orders_new a{
          color: #007bb6!important;
      }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>F</b>AL</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Dashboard</b> Thuê xe</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/_thumbs/Images/avatar/<?php echo $m_current_user->user_img; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $m_current_user->user_name;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/avatar/<?php echo $m_current_user->user_img; ?>" class="img-circle" alt="User Image">
                    <p>
                      Quản lý Thuê xe
                      <small><?php echo date("d-m-Y"); ;?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="userprofile.php" class="btn btn-default btn-flat">Đổi Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="signout.php?redirect=<?php echo base64_encode(curPageURL());?>" class="btn btn-default btn-flat">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>

        
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../public/avatar/<?php echo $m_current_user->user_img; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $m_current_user->user_name;?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa pull-right"></i>
              </a>
            </li>
            <li class="active treeview">
              <a href="order.php">
                <i class="fa fa-opencart"></i> <span style="color: #EE6F63">Danh sách khách hàng</span> <i class="fa pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Sản phẩm</span>
                <span class="label label-primary pull-right view_count_pro">0</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addproduct.php"><i class="fa fa-circle-o text-red"></i> Thêm sản phẩm</a></li>
                <li><a href="listproduct.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách sản phẩm</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Tin tức - Rao vặt</span>
                <i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right view_count_news">0</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addnews.php"><i class="fa fa-circle-o text-red"></i> Thêm bài mới</a></li>
                <li><a href="listnews.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách bài viết</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Hiệu xe</span>
                <i class="fa fa-angle-left pull-right"></i>
                <span class="label label-primary pull-right view_count_timer">0</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addbrand.php"><i class="fa fa-circle-o text-red"></i> Thêm hiệu xe</a></li>
                <li><a href="listbrand.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách các hiệu xe</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Dòng xe</span>
                <i class="fa fa-angle-left pull-right"></i>
                <!-- <span class="label label-primary pull-right ">0</span> -->
              </a>
              <ul class="treeview-menu">
                <li><a href="addkind.php"><i class="fa fa-circle-o text-red"></i> Thêm dòng xe</a></li>
                <li><a href="listkind.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách các dòng xe</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Chuyên mục</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addcates.php"><i class="fa fa-circle-o text-red"></i> Thêm chuyên mục</a></li>
                <li><a href="listcates.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách chuyên mục</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-navicon"></i> <span>Menu Footer</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addmenu.php"><i class="fa fa-circle-o text-red"></i> Thêm menu</a></li>
                <li><a href="listmenu.php"><i class="fa fa-circle-o text-aqua"></i> Danh sách menu</a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Liên hệ</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li> -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Tùy biến</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="slider.php"><i class="fa fa-file-image-o"></i> Ảnh trang chủ</a></li>
                <li><a href="about.php"><i class="fa fa-pagelines"></i> Danh sách page</a></li>
                <li><a href="info.php"><i class="fa fa-info"></i> Danh sách info</a></li>
                <li><a href="logo.php"><i class="fa fa-registered"></i> Logo</a></li>
                <li><a href="support.php"><i class="fa fa-registered"></i> Hổ trợ</a></li>
              </ul>
            </li>
            <!-- <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>