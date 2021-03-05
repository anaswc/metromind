<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Blogs </title>

  <?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>
  <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
  <?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?>
  <?php echo link_tag('assets/css/main.css'); ?>
  <?php echo link_tag('assets/css/responsive.css'); ?>
  <?php echo link_tag('assets/css/color/color-1.css'); ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

  <!-- Data Table Css -->
  <?php echo link_tag('assets/plugins/data-table/css/dataTables.bootstrap4.min.css'); ?>
  <?php echo link_tag('assets/plugins/data-table/css/buttons.dataTables.min.css'); ?>
  <?php echo link_tag('assets/plugins/data-table/css/responsive.bootstrap4.min.css'); ?>
  <?php echo link_tag('assets/plugins/data-table/css/jquery-ui-1.12.0/jquery-ui.css'); ?>

</head>

<body class="horizontal-fixed fixed">
  <?php include APPPATH . 'views/admin/includes/header.php'; ?>

  <script>
    function Cancel() {
      document.location.href = "<?php echo base_url('admin/videos'); ?>";
    }
<script type="text/javascript">
function validateFile() {
  
    //Get reference of FileUpload.
    var fileUpload = document.getElementById('profileImgUrl');

    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.jpeg|.JPEG|.JPG|.PNG)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height > 800 || width > 1300) {
                        alert("Invalid Image resolution !!");
            document.getElementById('profileImgUrl').value="";
                        return false;
                    }
                    
                    return true;
                };
 
            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    } else {
        alert("Please select a valid Image file.");
    document.getElementById('profileImgUrl').value="";
        return false;
    }
}



</script>

    function validateVideoId(videoid) {

      var formData = new FormData();
      formData.append('videoid', videoid);
      //var frm=document.frmOperatorCreate;

      $.ajax({
        url: "<?php echo base_url(); ?>admin/videos/checkVideoId",
        type: "POST", // Type of request to be send, called as method
        data: {
          videoId: videoid
        }, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        dataType: "JSON",
        success: function(data) {
          if (data == 0) {
            alert("Video id already exist!");
            document.getElementById('videoId').value = "";

            return false;
          } else {
            return true;
          }



        }

      });
    }
  </script>
<script type="text/javascript">
function validateFile() {
  
    //Get reference of FileUpload.
    var fileUpload = document.getElementById('blogImgUrl');

    //Check whether the file is valid Image.
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.jpeg|.JPEG|.JPG|.PNG)$");
    if (regex.test(fileUpload.value.toLowerCase())) {
 
        //Check whether HTML5 is supported.
        if (typeof (fileUpload.files) != "undefined") {
            //Initiate the FileReader object.
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(fileUpload.files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();
 
                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                       
                //Validate the File Height and Width.
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if (height > 800 || width > 1300) {
                        alert("Invalid Image resolution !!");
            document.getElementById('blogImgUrl').value="";
                        return false;
                    }
                    
                    return true;
                };

            }
        } else {
            alert("This browser does not support HTML5.");
            return false;
        }
    } else {
        alert("Please select a valid Image file.");
    document.getElementById('profileImgUrl').value="";
        return false;
    }
}



</script>
  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="col-sm-12 p-0">
          <div class="main-header">
            <h4>Blogs </h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Create Blogs</a></li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <p class="text-center m-t-md"></p>
              <div class="card-block">
                <?php if ($this->session->flashdata('success')) { ?>
                  <div class="text-center success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                  <div class='text-center error'><?php echo $this->session->flashdata('error'); ?></div>
                <?php } ?>


                <?php echo validation_errors(); ?>
                <?php //echo form_open_multipart('admin/adminuser/create'); 
                ?>
                <form name="frmvideoCreate;" action="<?php echo base_url('admin/blogs/update/'.$blogs_item['blogId']); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" onSubmit="return validateVideoId();">


                <input type="hidden" name="blogId" id="blogId" value="<?php echo $blogs_item['blogId'] ?>">
            <input type="hidden" name="returnUrl" value="<?php echo $this->input->get('returnUrl')?>">

                  <div class="col-md-12 col-xs-12">
                    <div class="form-group row">
                      <label for="input-rounded" class="col-sm-12 form-control-label">Title<span class="mandatory">* </span> </label>
                      <div class="col-sm-6">
                        <input type="text" name="title" id="title" value="<?php echo  $blogs_item['title'] ?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group row">
                      <label for="input-rounded" class="col-sm-12 form-control-label">Description&nbsp; </label>
                      <div class="col-sm-6">
                        <textarea class="input-xlarge ckeditor" name="description" id="description" style="width:50% !important; height:200px;"><?php echo  $blogs_item['description'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12">
                    <div class="form-group row">
                      <label for="input-rounded" class="col-sm-12 form-control-label"> Category<span class="mandatory">* </span> </label>
                      <div class="col-sm-12">
                        <select name="category" id="category" class="form-control" required>
                          <option value="">--Select--</option>
                          <?php
                          if (count($categories) > 0) {
                            foreach ($categories as $row) {
                              ?>
                              <option value="<?php echo $row['catId'] ?>" <?php if ($row['catId'] == $blogs_item['category']) { ?> selected <?php } ?>><?php echo $row['title'] ?></option>
                        <?php }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group row">
                      <label for="input-rounded" class="col-sm-12 form-control-label">Author<span class="mandatory">* </span> </label>
                      <div class="col-sm-6">
                        <input type="text" name="author" id="author" value="<?php echo  $blogs_item['author'] ?>" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12" style="clear:left">
                    <div class="form-group row">
                      <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                      <div class="col-sm-5">
                        <input type="file" name="blogImgUrl" id="blogImgUrl" class="form-control"  />
                        <?php
                                    if($blogs_item['blogImgUrl']<>"" &&  file_exists(AXUPLOADBLOGPATH.$blogs_item['blogImgUrl'])){?>
 <span><a href="<?php echo base_url().$blogs_item['blogImgUrl']?>"  target="_blank"><img src="<?php echo base_url().AXUPLOADBLOGPATH.$blogs_item['blogImgUrl']?>" width="60" height="60" /></a></span>
                                 <?php }?>  
                      </div>
                      <span class="note" style="color: #F00; "> Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg , jpeg , png .</span>
                    </div>
                  </div>


                  <div class="col-md-12"></div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group row">
                      <div align="center">
                        <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                        <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();">Cancel</button></div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include APPPATH . 'views/admin/includes/footer.php'; ?>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>
  <!--<script src="<?php echo base_url('assets/js/common-pages.js'); ?>"></script>-->
  <script src="<?php echo base_url('scripts/axCommon.js'); ?>"></script>

  <!-- data-table js -->
  <script src="<?php echo base_url('assets/plugins/data-table/js/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.buttons.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/jszip.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/pdfmake.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/vfs_fonts.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/buttons.print.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/buttons.html5.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.responsive.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/responsive.bootstrap4.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/data-table/js/jquery-ui-1.12.0/jquery-1.10.2.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/data-table/js/jquery-ui-1.12.0/jquery-ui.js'); ?>"></script>
  <script>
    $(function() {
      $("#dateExp").datepicker();
    });
  </script>

  <script>
    $(function() {
      $("#datePaid").datepicker();
    });
  </script>

  <script type="text/javascript">
    function checkSeouri(val) {
      var a = document.getElementById(val.id).value
      var seourl = a.replace(/ /g, '-');
      document.getElementById("seoUri").value = seourl
    }
  </script>





</body>

</html>