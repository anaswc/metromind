<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Patient Update</title>

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
	document.location.href="<?php echo base_url('admin/patients'); ?>";
}
</script>    
 <script type="text/javascript">
    function EnableDisableTextBox() {
        var genderOther = document.getElementById("genderOther");
        var customGender = document.getElementById("customGender");
        customGender.disabled = genderOther.checked ? false : true;
        if (!customGender.disabled) {
            customGender.focus();
        }
    }
</script>
    <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Patients</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Edit Patient</a></li>
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
                    
					<form action="<?php echo base_url('admin/patients/update/'.$patient_item['patientId']);?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

            <input type="hidden" name="returnUrl" value="<?php echo $this->input->get('returnUrl')?>">
                       <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">First Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="firstName" value="<?php echo $patient_item['firstName']?>" class="form-control" required>
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Last Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="lastName" value="<?php echo $patient_item['lastName']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Email<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="email" name="patientEmail" value="<?php echo $patient_item['patientEmail']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <!--<div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Password<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              <input type="patientPassword" name="patientPassword" value="<?php// echo $patient_item['patientPassword']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>-->
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Phone<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="patientMobile" value="<?php echo $patient_item['patientMobile']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Address<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="patientAddress" value="<?php echo $patient_item['patientAddress'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Date of Birth<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="date" name="birthDate" value="<?php echo $patient_item['birthDate']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
						<div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender<span class="mandatory">* </span> </label>
                            <div class="col-sm-4">
                              Male<input type="radio" name="gender" id="genderMale" value="1" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()" <?php if($patient_item['gender'] == 1){?> checked="checked" <?php } ?>>
                              </div>
                               <div class="col-sm-4">
                               Female<input type="radio" name="gender" id="genderFemale" value="2" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()" <?php if($patient_item['gender'] == 2){?> checked="checked" <?php } ?>>
                            </div> 
							<div class="col-sm-4">
                               Other<input type="radio" name="gender" id="genderOther" value="3" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()" <?php if($patient_item['gender'] == 3){?> checked="checked" <?php } ?>>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender Description</label>
                            <div class="col-sm-12">
                              <input type="text" name="customGender" id="customGender" value="<?php echo $patient_item['customGender']?>" class="form-control" disabled="disabled" >
                            </div>
                          </div>
                        </div>
                        
						 <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerified" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($patient_item['isVerified'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerified" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($patient_item['isVerified'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                        
                    <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                            <div class="col-sm-5">
                            	<input type = "file" name ="profileImgUrl" class="form-control" size = "20" />    
                                 <?php
                                    if($patient_item['profileImgUrl']<>"" &&  file_exists(AXUPLOADPATIENTSPATH.$patient_item['profileImgUrl'])){?>
                                     <span><a href="<?php echo HTTP.$patient_item['profileImgUrl']?>"  target="_blank"><img src="<?php echo HTTP.AXUPLOADPATIENTSPATH.$patient_item['profileImgUrl']?>" width="60" height="60" /></a></span>
                                 <?php }?>                                       
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                        
                        
                        
                        
                        
   
   
   
   
                        <div class="col-md-12"></div>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div align="center"> 
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >Cancel</button>
                          </div></div>
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
    <!--<script src="<?php// echo base_url('assets/js/common-pages.js'); ?>"></script>-->
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
    
     
       
      

     


  </body>

</html>
