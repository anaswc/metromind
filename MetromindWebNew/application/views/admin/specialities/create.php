<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Speciality</title>

<?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>
<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
<?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?>
<?php echo link_tag('assets/css/main.css'); ?>
<?php echo link_tag('assets/css/responsive.css'); ?>
<?php echo link_tag('assets/css/color/color-1.css'); ?>
<!-- Data Table Css -->
<?php echo link_tag('assets/plugins/data-table/css/dataTables.bootstrap4.min.css'); ?>
<?php echo link_tag('assets/plugins/data-table/css/buttons.dataTables.min.css'); ?>
<?php echo link_tag('assets/plugins/data-table/css/responsive.bootstrap4.min.css'); ?>
<?php echo link_tag('assets/plugins/data-table/css/jquery-ui-1.12.0/jquery-ui.css'); ?>

  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
    
    
  
<script>
function Cancel(){
	document.location.href="<?php echo base_url('admin/specialities'); ?>";
}
</script>    <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Specialities</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Add Speciality</a></li>
                    </ol>
                  </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12" >
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
					<?php echo form_open_multipart('admin/specialities/create'); ?>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Speciality Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              <input type="text" name="specialityName" id="specialityName" value="<?php echo $this->specialities_model->specialityName ?>" class="form-control" onkeyup="checkSeouri(this)" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">SeoUrl</label>
                            <div class="col-sm-6">
                              <input type="text" name="seoUri" id="seoUri" class="form-control" value="<?php echo $this->specialities_model->seoUri ?>">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Description<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                             <textarea name="description" rows="4" id="description" class="form-control"><?php echo $this->specialities_model->description ?></textarea>
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                            <div class="col-sm-3">
                            	<input type = "file" name ="specialityImageUrl" class="form-control" required size = "20" />                                           
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
						<div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Allotted Time<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                             <select name="allotedTime" class="form-control" id="allotedTime" >
                                    <option value="" selected="selected">-select-</option>
                                    <?php foreach($arrAllottedTime as $key => $value):?>
									
                                        <option value="<?php echo $key?>"><?php echo $value?></option>
                                    <?php endforeach; ?>
                                  </select>
                             
                            </div>
                          </div>
                        </div>
                        
                    
                        <div class="col-md-12"></div>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div align="center"> 
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >Cancel</button></div>
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
    <?php include APPPATH.'views/admin/includes/footer.php';?>

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
 <!--   <script src="<?php echo base_url('assets/js/common-pages.js'); ?>"></script>-->
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
   
     <script type="text/javascript">
       
       function checkSeouri(val)
       {
         var a = document.getElementById(val.id).value
         var seourl=a.replace(/ /g,'-');
         document.getElementById("seoUri").value=seourl
       }
     </script>

  </body>

</html>
