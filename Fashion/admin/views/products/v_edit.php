<?php include_once("views/index/v_header.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cập nhật sản phẩm
            <small>Dashboard</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="listproduct.php">Sảm phẩm</a></li>
            <li class="active">Cập nhật</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                
                <div class="box-body pad">
                  <form id="form_add_product" enctype="multipart/form-data">
                    <div id="pro_name_valid" class="form-group">
                      <input type="hidden" id="pro_id" name="pro_id" class="form-control" value="<?php echo $current_product->pro_id; ?>">
                      <label>Tên xe</label>
                      <input type="text" id="pro_name" name="pro_name" class="form-control" placeholder="Ví dụ: Ford Focus 1.6L Trend 5 Cửa" onblur="isempty('#pro_name_valid',this);" value="<?php echo $current_product->pro_name; ?>">
                    </div>
                    <div id="pro_slug_valid" class="form-group">
                      <label>Tên đường dẫn</label>
                      <input type="hidden" id="pro_slug_src" name="pro_slug_src" class="form-control" value="<?php echo $current_product->pro_slug;?>">
                      <input type="text" id="pro_slug" name="pro_slug" class="form-control" placeholder="Ví dụ: Ford Focus 1.6L Trend 5 Cửa" onblur="isempty('#pro_slug_valid',this);" value="<?php echo $current_product->pro_slug; ?>">
                    </div>
                    <div id="cate_id_valid" class="form-group">
                      <label>Chuyên mục</label>
                      <select id="cate_id" name="cate_id" class="form-control select2" style="width: 100%;">
                        <option value="0">-- Chọn chuyên mục --</option>
                        <?php if ($list_cate_0!=false){
                          foreach ($list_cate_0 as $cate_1) {
                            $list_cate_1 = $m_cate->get_cate_parent($cate_1->cate_id);
                            if ($list_cate_1!=false){
                        ?>
                        <optgroup label="Chuyên mục <?php echo $cate_1->cate_name;?>">
                          <?php foreach ($list_cate_1 as $cate_2) {?>
                          <option <?php if ($cate_2->cate_id==$current_product->cate_id){ echo 'selected="selected"';} ?> value="<?php echo $cate_2->cate_id;?>"> <span style="text-transform: capitalize;"><?php echo $cate_2->cate_name;?></span></option>
                          <?php } ?>
                        </optgroup>
                        <?php } 
                          }
                        } ?>
                      </select>
                    </div>
                    <div id="pro_brand_valid" class="form-group">
                      <label>Hiệu xe</label>
                      <select id="pro_brand" name="pro_brand" onchange="load_data_kind();" class="form-control select2" style="width: 100%;">
                        <option value="0">-- Chọn hiệu xe --</option>
                        <?php if ($list_brand!=false){
                        foreach ($list_brand as $val_brand) {?>
                        <option <?php if ($val_brand->brand_id==$brand_id){ echo 'selected="selected"';}?> value="<?php echo $val_brand->brand_id;?>"><?php echo $val_brand->brand_name;?></option>
                        <?php } 
                        }?>
                      </select>
                    </div>
                    <div id="pro_kind_valid" class="form-group">
                      <label>Dòng xe</label>
                      <select id="pro_kind" name="pro_kind" class="form-control select2" style="width: 100%;">
                        <option value="0">-- Chọn dòng xe --</option>
                        <?php if ($list_kind!=false){
                        foreach ($list_kind as $val_kind) {?>
                        <option <?php if ($val_kind->kind_id==$current_product->pro_kind){ echo 'selected="selected"';}?> value="<?php echo $val_kind->kind_id;?>"><?php echo $val_kind->kind_name;?></option>
                        <?php } 
                        }?>
                      </select>
                    </div>
                    <div id="pro_year_valid" class="form-group">
                      <label>Đời xe</label>
                      <input type="text" id="pro_year" name="pro_year" class="form-control" placeholder="Ví dụ: 2012-2013" onblur="isempty('#pro_year_valid',this);" value="<?php echo $current_product->pro_year; ?>">
                    </div>
                    <div id="pro_color_valid" class="form-group">
                      <label>Màu xe</label>
                      <select id="pro_color" name="pro_color" class="form-control select2" style="width: 100%;">
                        <option value="0">-- Chọn màu xe --</option>
                        <?php if ($list_color!=false){
                        foreach ($list_color as $val_color) {?>
                        <option <?php if($current_product->pro_color==$val_color->color_name){ echo 'selected="selected"';}?> value="<?php echo $val_color->color_name; ?>"><?php echo $val_color->color_name; ?></option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                    <div id="pro_price_valid" class="form-group">
                      <label>Giá xe</label>
                      <input type="text" id="pro_price" name="pro_price" class="form-control" placeholder="Ví dụ: Thương lượng, 789.000.000 VNĐ" onblur="isempty('#pro_price_valid',this);" value="<?php echo $current_product->pro_price; ?>">
                    </div>
                    <div id="pro_year_valid" class="form-group">
                      <label>Loại hình thuê</label>
                      <input type="text" id="pro_typerend" name="pro_typerend" class="form-control" placeholder="Ví dụ: Cho thuê theo giờ" value="<?php echo $current_product->pro_typerend; ?>" onblur="isempty('#pro_typerend_valid',this);">
                    </div>
                    <div id="pro_img_valid" class="form-group">
                      <label>Hình ảnh đại diện sản phẩm</label>
                      <input type="hidden" id="temp_pro_img" class="form-control" value="<?php echo $current_product->pro_img;?>">
                      <div class="load-images-pro margin-img-photo">
                        <img width="100px" height="100px" src="../public/_thumbs/Images/products/<?php echo $current_product->pro_img;?>" alt="<?php echo $current_product->pro_img;?>" class="img-src-pro">
                        <div class="btn-file">
                          <div class="btn-file-new">
                            <a><i class="fa fa-edit" aria-hidden="true"></i></a>
                          </div>
                          <div class="btn-file-enject">
                            <a href="javascript:void(0)" onclick="enject_pro_img('<?php echo $current_product->pro_img;?>');" title="Phục hồi ảnh cũ"><i class="fa fa-eject" aria-hidden="true"></i></a>
                          </div>
                          <input type="file" id="pro_img" name="pro_img" class="input-image" onchange="ValidateSingleInput_edit(this,1);">
                        </div>
                      </div>
                    </div>
                    <div id="photo_valid" class="form-group">
                      <label>Hình ảnh chi tiết sản phẩm</label><span class="label label-primary pull-right btn-add-input" onclick="add_button_file();">+</span><br/>
                      <input type="hidden" id="photo_id" name="photo_id" class="form-control" value="<?php echo $current_product->photo_id;?>">
                      <input type="hidden" id="photo_key" name="photo_key" class="form-control" value="">
                      <?php foreach ($list_photo as $val_photo) { ?>
                      <div class="load-images-pro float-left margin-img-photo photo-key-<?php echo $val_photo->photo_key;?>">
                        <input type="hidden" id="temp_photo_key_<?php echo $val_photo->photo_key;?>" class="form-control" value="<?php echo $val_photo->photo_name;?>">
                        <img width="100px" height="100px" src="../public/_thumbs/Images/products/<?php echo $val_photo->photo_name;?>" alt="<?php echo $val_photo->photo_name;?>" class="img-src-photo-<?php echo $val_photo->photo_key;?>">
                        <div class="btn-file">
                          <div class="btn-file-new">
                            <a href="javascript:void(0)"><i class="fa fa-edit" aria-hidden="true"></i></a>
                          </div>
                          <div class="btn-file-enject">
                            <a href="javascript:void(0)" onclick="delete_img_photo('<?php echo $val_photo->photo_key;?>');" title=""><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </div>
                          <div class="btn-file-delete">
                            <a href="javascript:void(0)" onclick="enject_img_photo('<?php echo $val_photo->photo_name;?>',<?php echo $val_photo->photo_key;?>);" title=""><i class="fa fa-eject" aria-hidden="true"></i></a>
                          </div>
                          <input type="file" class="photo_id input-photo input-image input-photo-key-<?php echo $val_photo->photo_key;?>" name="photo_key[]" onchange="ValidateSingleInput_edit(this,<?php echo $val_photo->photo_key;?>);">
                        </div>
                      </div>
                      <?php } ?>
                      <div class="clear"></div>
                      <div class="form-group-input">
                        <input type="file" class="photo_id add-photo" name="photo_key[]" onchange="ValidateSingleInput(this);">
                        <div class="flag_input"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Mô tả</label>
                      <textarea id="pro_desc" name="pro_desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?php echo $current_product->pro_desc;?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label>Bài viết chi tiết</label>
                      <textarea id="editor1" name="pro_detail" rows="10" cols="80">
                        <?php echo $current_product->pro_detail;?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label>Thông số kỹ thuật</label>
                      <textarea id="editor2" name="pro_spec" rows="10" cols="80">
                        <?php echo $current_product->pro_spec;?>
                      </textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-xs-4">
                        <button type="button" onclick="submit_add_product();" class="btn btn-block btn-success btn-flat">Cập nhật</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-warning btn-flat" onclick="reset_form_product();">Hủy</button>
                      </div>
                      <div class="col-md-4 col-xs-4">
                        <button type="button" class="btn btn-block btn-default btn-flat" onclick="location.href='listproduct.php'">Xem List</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
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
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="plugins/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Bootbox hiển thị hộp thoại alert, promt, confirm bằng thư viện bootstrap -->
    <script src="dist/js/bootbox.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
      function delete_img_photo(photo_key){
        var del_div = '.photo-key-'+photo_key;
        $("#photo_key").val(photo_key+'|'+$("#photo_key").val());
        $(del_div).remove();
      }
      function enject_pro_img(pro_img){
        $(".img-src-pro").attr("src","../public/_thumbs/Images/products/"+pro_img);
        $("#pro_img").val("");
      }
      function enject_img_photo(photo_name, photo_key){
        var img_photo_src = ".img-src-photo-"+photo_key;
        var input_photo = ".input-photo-key-"+photo_key;
        var temp_photo_key = "#temp_photo_key_"+photo_key;
        $(img_photo_src).attr("src","../public/_thumbs/Images/products/"+photo_name);
        $(input_photo).val("");
      }
      function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
      }
      $("#cate_id").change(function(){
        if($("#cate_id").val()!=0){
           $("#cate_id_valid").removeClass('has-error').addClass('has-success');
        }
      });
      $("form#form_add_product").submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        CKupdate();
        $(".loader").fadeIn("slow");
        //bootbox.alert("Test");
        $.ajax({
            type: 'POST',
            url: 'process_edit_products.php',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
              $(".loader").fadeOut("slow");
              // alert(response);
              if(response==="success"){
                  bootbox.alert("Cập nhật sản phẩm thành công");
                 // $('#form_add_product')[0].reset();
                  setTimeout(function(){window.location.reload(1);}, 1500);
              } else if (response==="duplicate") {
                  bootbox.alert("Tên sản phẩm hoặc đường dẫn đã bị trùng. Vui lòng thay đổi tên hoặc đường dẫn khác");
                  $("#pro_slug_valid").addClass('has-error');
              } else if (response==="valid") {
                  bootbox.alert("Chưa nhập đủ thông tin");
              } else {
                  bootbox.alert("Error: Liên hệ hổ trợ");
              }
            },
            error: function(error){
              $(".loader").addClass("hide"); 
              bootbox.alert("Error: " + eval(error));
            }
        });
        return false;
      });
      function submit_add_product(){
        if (isvalid()){
          $("form#form_add_product").submit();
        } else {
          bootbox.alert("Chưa nhập đủ thông tin");
        }
      }
      function load_data_kind(){
        var pro_brand = $("#pro_brand").val();
        if(pro_brand!=0){
          $("#pro_brand_valid").removeClass('has-error').addClass('has-success');
        } else {
          $("#pro_brand_valid").removeClass('has-success').addClass('has-error');
        }
        $.ajax({
            type: "POST",
            url: "load_data_kind.php",
            data: {pro_brand: pro_brand},
            dataType: "html",
            success: function(msg){
                $("#pro_kind").html(msg);
                $('select').niceSelect("update");
            }
        });
      }
      function reset_form_product(){
        bootbox.confirm({
            message: "Bạn muốn hủy bỏ nội dung trang hiện tại?",
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
            callback: function (result) {
                if (result==true){
                  window.location.reload()
                }
            }
        });
      }
      function isvalid(){
        flag = true;
        if($("#pro_name").val().trim()===""){
          $("#pro_name_valid").addClass('has-error');
          flag = false;
        } 
        if ($("#pro_slug").val().trim()===""){
          $("#pro_slug_valid").addClass('has-error');
          flag = false;
        }
        if ($("#cate_id").val()==0){
          $("#cate_id_valid").addClass('has-error');
          flag = false;
        }
        if ($("#pro_price").val().trim()===""){
          $("#pro_price_valid").addClass('has-error');
          flag = false;
        }
        if (not_exist_photo()){
          if (valid_photo()){
            $("#photo_valid").removeClass('has-success').addClass('has-error');
            flag = false;
          }
        }
        CKupdate();
        return flag;
      }
      function isempty(id,obj){
        if($(obj).val().trim()===""){
          $(id).removeClass('has-success').addClass('has-error');
        } else {
          $(id).removeClass('has-error').addClass('has-success');
          if(id==="#pro_name_valid"){
            $("#pro_slug").val(slug($(obj).val().trim()));
          }
        }
      }
      function valid_photo(){
        var flag = true;
        $(".add-photo").each(function() {
          if ($(this).val()!=''){
            flag = false;
            return false;
          }
        });
        return flag;
      }
      function not_exist_photo(){
        var flag = true;
        if($(".input-photo").length>0){
          flag = false;
        }
        return flag;
      }
      function slug(str){
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáạảäâấầẩẫậăắằẳẵặẽèéẻẹëêềếểễệđìíịỉĩïîõòỏóọöốôồổỗộơớờợởỡùúụủũüûưứừửữựñç·/_,:;";
        var to   = "aaaaaaaaaaaaaaaaaaeeeeeeeeeeeediiiiiiioooooooooooooooooouuuuuuuuuuuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes

        return str;
      }
      function add_button_file(){
        $(".flag_input").before('<input type="file" class="photo_id add-photo" name="photo_key[]" onchange="ValidateSingleInput(this);">');
      }
      $(document).on('change','.input-image',function(){
          var button = $(this);
          var preview = $(this).parent().parent().find("img");
          var file = this.files[0];
          if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
              var reader = new FileReader();
              reader.addEventListener("load", function () {
                  preview.attr('src',this.result);
              }, false);
              reader.readAsDataURL(file);
          }
      });
      var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
      function ValidateSingleInput_edit(oInput,photo_key) {
          if (oInput.type == "file") {
              var temp = oInput;
              var sFileName = oInput.value;
              var temp_photo_img = "#temp_photo_key_"+photo_key;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                      }
                  }
                  if (!blnValid) {
                    oInput.value="";
                    if (oInput.name==="pro_img"){
                      enject_pro_img($("#temp_pro_img").val());
                    }
                    if ($(temp).hasClass("photo_id")){
                      enject_img_photo($(temp_photo_img).val(), photo_key);
                    }
                    bootbox.alert("Xin lỗi, " + sFileName + " đã sai, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                    return false;
                  }
              }
          }
          return true;
      }
      function ValidateSingleInput(oInput) {
          if (oInput.type == "file") {
              var sFileName = oInput.value;
              if (sFileName.length > 0) {
                  var blnValid = false;
                  if (oInput.name==="pro_img"){
                      $("#pro_img_valid").removeClass('has-error').addClass('has-success');
                  }
                  if (oInput.className==="photo_id"){
                      $("#photo_valid").removeClass('has-error').addClass('has-success');
                  }
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          break;
                      }
                  }
                  if (!blnValid) {
                      oInput.value = "";
                      if (oInput.name=="pro_img"){
                          $("#pro_img_valid").removeClass('has-success').addClass('has-error');
                      }
                      if (oInput.className==="photo_id" && valid_photo() && not_exist_photo()){
                          $("#photo_valid").removeClass('has-success').addClass('has-error');
                      }
                      bootbox.alert("Xin lỗi, " + sFileName + " đã sai, chỉ cho phép các định dạng: " + _validFileExtensions.join(", "));
                      
                      return false;
                  }
              }
          }
          return true;
      }
    </script>
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
  </body>
</html>