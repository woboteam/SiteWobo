<?php
  include_once("views/index/v_header.php");
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tất cả chuyên mục
            <small>Dashboard</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Chuyên mục</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Table -->
          <div class="row">
           	<div class="col-xs-12">
           		<div class="box box-info">
      					<div class="box-header">
      					  <div class="row">
                    <div class="col-sm-6">
                      <div class="dataTables_length">
                        <div class="append_button"><label class="m-t-2"><a class="btn btn-social-icon btn-success m-r-1" href="addcates.php" title="Thêm chuyên mục mới"><i class="fa fa-plus"></i></a></label></div>
                      </div>
                    </div>
                  </div>
      					</div><!-- /.box-header -->
      					<div class="box-body">
      					  <div class="sidebar-nav categories">
                    <ul class="nav">
                        <?php
                        foreach ($list_cates_1 as $val_cate_1) {
                        ?>
                        <li class="dt-<?php echo $val_cate_1->cate_id;?>">
                            <a class="ct-left" href="#"><?php echo $val_cate_1->cate_name;?></a>
                            <div class="ct-right" ><a href="edit_cates.php?id=<?php echo $val_cate_1->cate_id;?>"> Sửa </a> <?php if($val_cate_1->cate_id!=11 && $val_cate_1->cate_id!=1 && $val_cate_1->cate_id!=2 && $val_cate_1->cate_id!=3 && $val_cate_1->cate_id!=12 && $val_cate_1->cate_id!=13 && $val_cate_1->cate_id!=15  ){ echo '| <a href="javascript:void(0);" onclick="process_delete('.$val_cate_1->cate_id.')"> Xóa</a>';}?></div>
                            <?php
                            $m_cate_in = $m_cates->get_cate_parent($val_cate_1->cate_id);
                            if ($m_cate_in){
                            ?>
                            <ul class="nav nav-second-level">
                                <?php
                                }
                                foreach ($m_cate_in as $val_cate_in) {
                                ?>
                                <li class="dt-<?php echo $val_cate_in->cate_id;?>">
                                    <a class="ct-left" href="#"><?php echo $val_cate_in->cate_name;?></a>
                                    <div class="ct-right" ><a href="edit_cates.php?id=<?php echo $val_cate_in->cate_id;?>"> Sửa</a> | <a onclick="process_delete(<?php echo $val_cate_in->cate_id;?>)" href="javascript:void(0);"> Xóa</a></div>
                                </li>
                            <?php 
                                }
                            if ($m_cate_in){
                            ?>
                            </ul>
                            <?php
                            }
                            ?>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                  </div>
      					</div><!-- /.box-body -->
      				</div><!-- /.box -->
           	</div>
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include_once("views/index/v_footer.php");?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- div loading -->
    <div class="loader"></div>
    <!-- Modal detail 1 order -->
    <div class="modal fade" id="model_news_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-primary" id="myModalLabel">Chi tiết tin tức</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
            </div>
          </div>
      </div>
    </div>


    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="plugins/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Bootbox hiển thị hộp thoại alert, promt, confirm bằng thư viện bootstrap -->
    <script src="dist/js/bootbox.js"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(document).ready(function (){
        $(".view_count_pro").load("view_count_pro.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_pro").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_count_news").load("view_count_news.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_news").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_count_timer").load("view_count_event.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_count_timer").html(msg + req.status + " " + req.statusText)
          }
        });
        $(".view_contact_new").load("view_count_contact.php",{limit: 25},function(responsive, textStatus, req){
          if (textStatus=="error"){
            var msg = "Sorry but there was an error: ";
            $(".view_contact_new").html(msg + req.status + " " + req.statusText)
          }
        });
      });
    </script>
    <script type="text/javascript">
      function process_delete(id){
        var li_delete = $('.dt-'+id);
        bootbox.confirm({ 
            message: "Bạn chắc chắn muốn xóa chuyên mục này?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-success'
                }
            },
            callback: function(result){
                $(".loader").fadeIn("slow");
                if (result){
                    $.ajax({
                        type: "POST",
                        url: "process_delete_categories.php",
                        data: {id: id},
                        success: function(response){
                            $(".loader").fadeOut("slow");
                            if (response==="success"){
                                li_delete.hide();
                            } else if(response==="exist") {
                                bootbox.alert("Chuyên mục đã được sử dụng nên không thể xóa");
                            } else {
                                bootbox.alert("Error data: Không thực thi được. Liên hệ với admin");
                            }
                        },
                        error: function(){
                            $(".loader").fadeOut("slow");
                            bootbox.alert("Error: Không thực thi được. Liên hệ với admin");
                        }
                    });
                } else {
                  $(".loader").fadeOut("slow");
                }
            }
        });  
        $(".loader").fadeOut("slow");
      }  
    </script>
  </body>
</html>