<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Add Doctor</title>
  
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2.min.css" />
  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>

  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
    
    
  
<script>
function Cancel(){
  document.location.href="<?php echo base_url('admin/doctor'); ?>";
  
  $(document).ready(function() {
    $(".js-example-basic-single").select2();
  }); 

}
</script>    <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Doctor</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Add Doctor</a></li>
                    </ol>
                  </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12" >
                  <div class="card">
                    <p class="text-center m-t-md"></p>
                    <div class="card-block">
                   <?php if ($this->session->flashdata('success')) { ?>
                    <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                    <?php echo validation_errors(); ?>
          <?php echo form_open_multipart('admin/doctor/create'); ?>
                    
                    <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Speciality</label>
                            <div class="col-sm-12">
                             <select name="specialityId" class="form-control" id="specialityId" style="width: 100% !important;" required>
                                <option value="" selected="selected">-Select Speciality-</option>
                                
                                <?php foreach($specialities as $row): ?>
                                  <option value="<?php echo $row["specialityId"]?>"><?php echo $row["specialityName"]?></option>
                <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                      </div>
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorName" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
            <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Male<input type="radio" name="gender" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                              </div>
                               <div class="col-sm-6">
                               Female<input type="radio" name="gender" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Email<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="email" name="doctorEmail" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Password<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorPassword" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Phone<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="test" name="doctorMobile" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Youtube Link<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="youtubeLink" value="" class="form-control" required>
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Known Languages<span class="mandatory">* </span> </label>
                            
                              <div class="col-sm-4">
                              Malayalam<input type="checkbox" name="knownLanguages[]" value="Malayalam" class="form-control"  style="margin-top: -17px;margin-left: 11px;">
                              </div>
                               <div class="col-sm-4">
                               English<input type="checkbox" name="knownLanguages[]" value="English" class="form-control"  style="margin-top: -17px;margin-left: 11px;">
                            </div>
                              <div class="col-sm-4">
                               Hindi<input type="checkbox" name="knownLanguages[]" value="Hindi" class="form-control"  style="margin-top: -17px;margin-left:15px;">
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Address<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <textarea name="doctorAddress" value="" class="form-control" required style="height:200px;"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">

                <div class="form-group row">

                  <label for="input-rounded" class="col-sm-12 form-control-label">Specialization</label>
                  <div class="col-sm-12">
                  <select name="symptomIds[]" class="form-control" id="symptomIds" multiple="multiple" style="height:200px !important;">
                                    <option value="" selected="selected">-select-</option>
                                    <?php foreach($symptom as $row):?>
                  
                                        <option value="<?php echo $row["symptomId"]?>"><?php echo $row["symptomName"]?></option>
                                    <?php endforeach; ?>
                                  </select>
                  </div>

                </div>

              </div>

                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Session Duration<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorSessionDuration" value="<?php echo $setting['defaultSessionDuration']?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Age<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="age" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerified" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerified" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Experience<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="experience" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Qualification<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <textarea name="qualification" value="" class="form-control" required></textarea>
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Fees<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorFee" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Communication Mode<span class="mandatory">* </span> </label>
                             <div class="col-sm-4">
                              Video Call<input type="checkbox" name="communicationMode[]" value="1" class="form-control"  style="margin-top: -17px;margin-left: 11px;">
                              </div>
                               <div class="col-sm-4">
                               Audio Call<input type="checkbox" name="communicationMode[]" value="2" class="form-control"  style="margin-top: -17px;margin-left: 11px;">
                            </div>
                              <div class="col-sm-4">
                               Text Message<input type="checkbox" name="communicationMode[]" value="3" class="form-control"  style="margin-top: -17px;margin-left:15px;">
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Chat room number<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="chatRoomNumber" value="" class="form-control" required>
                            </div>
                          </div>
                        </div> 
                       
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical registration number<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="medicalRegistrationNumber" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>  

                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Sequence order<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="sequenceOrder" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>  
                        
                    <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                            <div class="col-sm-5">
                              <input type = "file" name ="doctorImageUrl" class="form-control" required size = "20" />                                           
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical License</label>
                            <div class="col-sm-5">
                              <input type = "file" name ="medicalLicense" class="form-control" required size = "20" />                                           
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
              
                        </div>
             <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">License Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerifiedLicense" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerifiedLicense" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Counselling Certificate</label>
                            <div class="col-sm-5">
                              <input type = "file" name ="counsellingCertificate" class="form-control" required size = "20" />                                           
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                        
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Certificate Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerifiedCertificate" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerifiedCertificate" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                        </div>
                          </div>
                        </div>
              </div>


                <div class="col-md-12"></div>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div align="center"> 
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >Cancel</button>
                          </div>
                        </div>
                        </div>

</form>

           
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
   
     

  </body>

</html>
