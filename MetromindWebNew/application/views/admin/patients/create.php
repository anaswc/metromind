<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Add Patient</title>

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
<script>
function Cancel(){
  document.location.href="<?php echo base_url('admin/patients'); ?>";
}
</script> 

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

<script type="text/javascript">

function checkPatientEmail(patientEmail) {
  

    var patientEmail=document.getElementById('patientEmail').value;
  if(patientEmail.length != 0)
  {
   
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/patients/checkEmail", 
            type: "POST",             // Type of request to be send, called as method
            data : {patientEmail:patientEmail}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
                if(data == 0)
                {
                   alert("Email already exist !!");
           document.getElementById('patientEmail').value="";
                }
             
            }
            
        }
    );
  
  }
} 


function checkPatientMobile(patientMobile) {
  

    var patientMobile=document.getElementById('patientMobile').value;


    if(patientMobile.length < 10)
  {
    alert("Invalid mobile num");
  }
  if(patientMobile.length != 0)
  {
   
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/patients/checkMobile", 
            type: "POST",             // Type of request to be send, called as method
            data : {patientMobile:patientMobile}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
                if(data == 0)
                {
                   alert("Mobile number already exist !!");
           document.getElementById('patientMobile').value="";
                }
             
            }
            
        }
    );
  
  }
} 

 function validateEmail() 
{  

var x=document.getElementById('patientEmail').value;
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address");  
  return false;  
  }  

  var patientMobile=document.getElementById('patientMobile').value;


    if(patientMobile.length < 10)
  {
    alert("Invalid mobile num");
    return false;
  }
}  
</script>

  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
    
    
  
   <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Patients</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Add Patient</a></li>
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
<form action="<?php echo base_url('admin/patients/create');?>" enctype="multipart/form-data" method="post" onSubmit="return validateEmail()">
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">First Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="firstName" value="" class="form-control" required >
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Last Name<span class="mandatory">* </span></label>
                            <div class="col-sm-12">
                              <input type="text" name="lastName" value="" class="form-control" required >
                            </div>
                          </div></div>
              <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Address<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <textarea name="patientAddress" value="" rows="6" class="form-control" required></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12" >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Country<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                             <select name="countryId" id="countryId"  class="form-control" required>
                             <option value="">--Select--</option>
                             <?php 
               
               if(count($country)>0){
                 foreach($country as $row){
                 
                  ?>
                             <option value="<?php echo $row['countryId'] ?>"><?php echo $row['country'] ?></option>
                             <?php }
               }
                ?>
                             </select>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 "  > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Patient Email<span class="mandatory">*</span></label>
            
                                   <div class="col-sm-12">          
            
                                        <input class="form-control" placeholder="" name="patientEmail" id="patientEmail"   aria-required="true" type="text" required onBlur="checkPatientEmail(this.value)">
            
                                    </div>
            
                                </div>
            
                            </div>
                                
                        
                        
                        
                        
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Password<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="password" value="" class="form-control" required >
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Phone<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="patientMobile" value="" id="patientMobile" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required onBlur="checkPatientMobile(this.value)">
                            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Date of Birth<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="date" name="birthDate" max="<?php echo date('Y-m-d') ?>" value="" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender<span class="mandatory">* </span> </label>
                            <div class="col-sm-4">
                              Male<input type="radio" name="gender" id="genderMale" value="1" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()">
                              </div>
                               <div class="col-sm-4">
                               Female<input type="radio" name="gender" id="genderFemale" value="2" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()">
                            </div> 
              <div class="col-sm-4">
                               Other<input type="radio" name="gender" id="genderOther" value="3" class="form-control" required style="margin-top: -17px;margin-left: -25px;"onclick="EnableDisableTextBox()">
                            </div>
                          </div>
                        </div>
            <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender Description</label>
                            <div class="col-sm-12">
                              <input type="text" name="customGender" id="customGender" value="" class="form-control" disabled="disabled" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Patient Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerified" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerified" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                         
                        
                    <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                            <div class="col-sm-5">
                              <input type = "file" name ="profileImgUrl" id="profileImgUrl" class="form-control" onChange="validateFile();"/>                                           
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
   <!-- <script src="<?php echo base_url('assets/js/common-pages.js'); ?>"></script>-->
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
