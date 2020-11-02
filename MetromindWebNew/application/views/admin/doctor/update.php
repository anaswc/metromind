<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Doctor Update</title>

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

function checkDoctorEmail(doctorEmail) {
  

    var doctorEmail=document.getElementById('doctorEmail').value;
  
   
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/doctor/checkEmail", 
            type: "POST",             // Type of request to be send, called as method
            data : {doctorEmail:doctorEmail}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
                if(data == 0)
                {
                   alert("Email already exist !!");
         //  document.getElementById('doctorEmail').value="";
                }
             
            }
            
        }
    );
  
  
} 

function checkDoctorMobile(doctorMobile) {
  
    var doctorMobile=document.getElementById('doctorMobile').value;
  
   

    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/doctor/checkMobile", 
            type: "POST",             // Type of request to be send, called as method
            data : {doctorMobile:doctorMobile}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
                if(data == 0)
                {
                   alert("Mobile number already exist !!");
           document.getElementById('doctorMobile').value="";
                }
             
            }
            
        }
    );
  
  
} 

 function validateEmail() 
{  

var x=document.getElementById('doctorEmail').value;
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address");  
  return false;  
  }  
}  
</script>


  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
    
<script>
function Cancel(){
  document.location.href="<?php echo base_url('admin/doctor'); ?>";
}
</script>    

    <div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Doctor</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Edit Doctor</a></li>
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
                     <?php //echo validation_errors();
          
          $speciality_array = array();
          if(count($specialities)){
            foreach($specialities as $row){
              $speciality_array[$row['specialityId']] = $row['specialityName'];
            }
            }
          ?>

          
          
                    
                    <form action="<?php echo base_url('admin/doctor/update/'.$doctor_item['doctorId']);?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" onSubmit="return validateEmail()">


          <input type="hidden" name="returnUrl" value="<?php echo $this->input->get('returnUrl')?>">
 <input type="hidden" name="doctorId" value="<?php echo $doctor_item['doctorId'] ?>">
                    
                    <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Speciality<span class="mandatory">* </span> </label>
                             <div class="col-sm-12">
 <select name="specialityId" class="form-control" id="specialityId" style="width: 100% !important;" required>
                                <option value="" selected="selected">-Select Speciality-</option>
                                
                                <?php foreach($specialities as $row): ?>
                                <option value="<?php echo $row["specialityId"]?>" <?php if($row["specialityId"]==$doctor_item['specialityId'])echo "selected='selected'";?>><?php echo $row["specialityName"]?></option>
                <?php endforeach; ?>
                              </select>                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Name<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorName" value="<?php echo $doctor_item['doctorName'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
            <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Gender<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Male<input type="radio" name="gender" value="1" <?php if($doctor_item['gender'] == 1){?> checked="checked" <?php } ?> required class="form-control" style="margin-top: -17px;margin-left: -49px;" >
                              </div>
                               <div class="col-sm-6">
                               Female<input type="radio" name="gender" value="2" <?php if($doctor_item['gender'] == 2){?> checked="checked" <?php } ?> required class="form-control" style="margin-top: -17px;margin-left: -49px;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Email<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="email" name="doctorEmail" id="doctorEmail" value="<?php echo $doctor_item['doctorEmail'] ?>" class="form-control" required onBlur="checkDoctorEmail(this.value)">
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Password<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorPassword" value="<?php echo $this->encryption->decrypt($doctor_item['doctorPassword']) ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Phone<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorMobile" id="doctorMobile" value="<?php echo $doctor_item['doctorMobile'] ?>" class="form-control" required onBlur="checkDoctorMobile(this.value)">
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Youtube Link<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="youtubeLink" value="<?php echo $doctor_item['youtubeLink'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Known Languages<span class="mandatory">* </span> </label>
                            <?php
              $lang=explode(',',$doctor_item['knownLanguages']) ;
              
              ?>
                              <div class="col-sm-4">
                              Malayalam<input type="checkbox" name="knownLanguages[]" value="Malayalam" class="form-control"  style="margin-top: -17px;margin-left: 11px;" <?php if(in_array('Malayalam',$lang)){ ?> checked <?php } ?>>
                              </div>
                               <div class="col-sm-4">
                               English<input type="checkbox" name="knownLanguages[]" value="English" class="form-control"  style="margin-top: -17px;margin-left: 11px;" <?php if(in_array('English',$lang)){ ?> checked <?php } ?>>
                            </div>
                              <div class="col-sm-4">
                               Hindi<input type="checkbox" name="knownLanguages[]" value="Hindi" class="form-control"  style="margin-top: -17px;margin-left:15px;" <?php if(in_array('Hindi',$lang)){ ?> checked <?php } ?>>
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Address<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <textarea  name="doctorAddress" style="height:200px;"  class="form-control"><?php echo $doctor_item['doctorAddress'] ?></textarea>
                            </div>
                          </div>
                        </div> <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Specialization<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                     
                      <select name="symptomIds[]" class="form-control" id="symptomIds" multiple="multiple"  style="height:200px !important; overflow-y: scroll !important;">
                          <option value="" >-Select-</option>
       <?php $vendorcat = explode(',',$data['doctor_item']['specialityId']);?>
    <?php echo $specialitiesList?>
      
          
      </select>
            </div>
                          </div>
                        </div>
                        
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Session Duration<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorSessionDuration" value="<?php echo $doctor_item['doctorSessionDuration'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Age<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="age" value="<?php echo $doctor_item['age'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         
                        <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Experience<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="experience" value="<?php echo $doctor_item['experience'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Qualification<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="qualification" value="<?php echo $doctor_item['qualification'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Fees<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorFee" value="<?php echo $doctor_item['doctorFee'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Communication Mode<span class="mandatory">* </span> </label>
                             <?php  $array_of_values = explode(",", $doctor_item['communicationMode']); 
                           //  print_r($array_of_values[0]);
?>
                               
                               <?php
                              if(count($arrLanguage)>0){
                foreach($arrLanguage as $key=> $value){ ?>
                 <div class="col-sm-4">
                             <?php echo $value?>  <input type="checkbox" name="communicationMode[]" value="<?php echo $key?>"  style="margin-top: -17px;margin-left: 11px;" <?php if(in_array($key, $array_of_values)) { ?> checked="checked" <?php } ?> >
 </div>
                             <?php
                }
                              }
                              
                              ?>
                          </div>
                        </div>
                        
                     <div class="col-md-6 col-xs-12" style="clear: left;">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Chat room number<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="chatRoomNumber" value="<?php echo $doctor_item['chatRoomNumber'] ?>" class="form-control" readonly>
                            </div>
                          </div>
                        </div> 
                       
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical registration number<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="medicalRegistrationNumber" value="<?php echo $doctor_item['medicalRegistrationNumber'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>  

                         <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Sequence order<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="sequenceOrder" value="<?php echo $doctor_item['sequenceOrder'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>  
     


                        <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerified" value="1" class="" required  <?php if($doctor_item['isVerified'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified  &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerified" value="2" class="" required  <?php if($doctor_item['isVerified'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                  
                        
                        
                    <div class="col-md-6 col-xs-12" style="clear: left;">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Image <span class="mandatory">* </span></label>
                            <div class="col-sm-5">
                              <input type = "file" name ="doctorImageUrl" id="doctorImageUrl" class="form-control"  <?php  if($doctor_item['doctorImageUrl'] == ''){ ?>  required <?php } ?> size = "20" />    
                                 <?php
                                    if($doctor_item['doctorImageUrl']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$doctor_item['doctorImageUrl'])){?>
                                     <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$doctor_item['doctorImageUrl']?>" width="60" height="60" /></span>
                                 <?php }?>                                       
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 278*181px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical License <span class="mandatory">* </span></label>
                            <div class="col-sm-5">
                              <input type = "file" name ="medicalLicense" class="form-control" <?php  if($doctor_item['medicalLicense'] == ''){ ?>  required <?php } ?>  size = "20" />    
                                 <?php
                                    if($doctor_item['medicalLicense']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$doctor_item['medicalLicense'])){?>
                                     <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$doctor_item['medicalLicense']?>" width="60" height="60" /></span>
                                 <?php }?>                                       
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
            <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">License Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerifiedLicense" value="1" class="" required  <?php if($doctor_item['isVerifiedLicense'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerifiedLicense" value="2" class="" required  <?php if($doctor_item['isVerifiedLicense'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Counselling Certificate <span class="mandatory">* </span></label>
                            <div class="col-sm-5">
                              <input type = "file" name ="counsellingCertificate"  <?php  if($doctor_item['counsellingCertificate'] == ''){ ?>  required <?php } ?> class="form-control" size = "20" />    
                                 <?php
                                    if($doctor_item['counsellingCertificate']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$doctor_item['counsellingCertificate'])){?>
                                     <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$doctor_item['counsellingCertificate']?>" width="60" height="60" /></span>
                                 <?php }?>                                       
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Certificate Verification <span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerifiedCertificate" value="1" class="" required  <?php if($doctor_item['isVerifiedCertificate'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified &nbsp;&nbsp;&nbsp;<input type="radio" name="isVerifiedCertificate" value="2" class="" required  <?php if($doctor_item['isVerifiedCertificate'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                         </div>
                          </div>
                        </div>
              </div>



   
   
   
   
                        <div class="col-md-12"></div>
                        <div class="col-md-12 col-xs-12">
                          <div class="form-group">
                            <div align="center"> 
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >Cancel</button>
                          </div></div>
                        </div>
                      </form>

<div align="left"><strong><strong>Add Availability</strong></strong></div>
              <br>
             <div class="row">
                 <div class="col-lg-12" >
                  <div class="card">
                    <p class="text-center m-t-md"></p>
                    <div class="card-block">

<?php 
global $arrWeekDay,$arrSessions,$arrTime;

?>
                      
                         

                           <div class="col-md-12 " style="margin-top:5px;" > 
                            

             
                                <div class="form-group row">           

                               <?php

                               $day1="Sunday";
                               $day2="Monday";
                               $day3="Tuesday";
                               $day4="Wednesday";
                               $day5="Thursday";
                               $day6="Friday";
                               $day7="Saturday";


                               $session1="Morning (IST)";
                               $session2="After Noon (IST)";
                                $session3="Evening (IST)";
                               


                             ?>
                             
                             <div class="col-md-12">
                             <h6>IST – India Standard Time</h6>
                             </div>
    <div class="col-sm-3">

     <b style="color: red"><?php echo $day1 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day1)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$availtimsun=array();
$availtimsun=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day1);
?>



<span style="color: green">
  <?php foreach ($availtimsun as $value) {
    if ($value['availableDay']==$day1 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
<div><h6>&nbsp;</h6></div>
 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day2 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day2)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$availtimeday2=array();
$availtimeday2=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day2);
?>
<span style="color: green">
  <?php foreach ($availtimeday2 as $value) {
    if ($value['availableDay']==$day2 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
      <div><h6>&nbsp;</h6></div>
 
   

 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day3 ?>-</b>  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day3)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$availtimeday3=array();
$availtimeday3=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day3);
?>
<span style="color: green">
  <?php foreach ($availtimeday3 as $value) {
    if ($value['availableDay']==$day3 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
       <div><h6>&nbsp;</h6></div>

 </div>
 <div class="col-sm-3">

     <b style="color: red"><?php echo $day4 ?>- </b> <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day4)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a><div><h6>&nbsp;</h6></div>

<?php 
$availtimeday4=array();
$availtimeday4=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day4);
?>
<span style="color: green">
  <?php foreach ($availtimeday4 as $value) {
    if ($value['availableDay']==$day4 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
        <div><h6>&nbsp;</h6></div>




 </div>
<div><h6>&nbsp;</h6></div>
<div><h6>&nbsp;</h6></div>
<div><h6>&nbsp;</h6></div>

  <div class="col-sm-3">

     <b style="color: red"><?php echo $day5 ?>- </b> <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day5)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$availtimeday5=array();
$availtimeday5=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day5);
?>
<span style="color: green">
  <?php foreach ($availtimeday5 as $value) {
    if ($value['availableDay']==$day5 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>

        <div><h6>&nbsp;</h6></div>

 </div>

 <div class="col-sm-3">

    <b style="color: red"> <?php echo $day6?>-</b>  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day6)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a><div><h6>&nbsp;</h6></div>
<?php 
$availtimeday6=array();
$availtimeday6=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day6);
?>
<span style="color: green">
  <?php foreach ($availtimeday6 as $value) {
    if ($value['availableDay']==$day6 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
        <div><h6>&nbsp;</h6></div>

 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day7 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day7)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$availtimeday7=array();
$availtimeday7=$this->doctor_model->getItem_day($doctor_item['doctorId'],$day7);
?>
<span style="color: green">
  <?php foreach ($availtimeday7 as $value) {
    if ($value['availableDay']==$day7 )
    {
       echo date('h:i:s a',strtotime($value['availableStartTime']))."-".date('h:i:s a',strtotime($value['availableEndTime']))."<br>";
    }  
  }
  ?></span>
       <div><h6>&nbsp;</h6></div>

 </div>
                               
      </div>

</div>
 </div>
  </div>
 </div>
  </div>
 </div>
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
    
     
       
      
<script>
$(document).ready(function(){

 var _URL = window.URL || window.webkitURL;

 $('#doctorImageUrl').change(function () {
  var file = $(this)[0].files[0];

  img = new Image();
  var imgwidth = 0;
  var imgheight = 0;
  var maxwidth = 278;
  var maxheight = 181;

  img.src = _URL.createObjectURL(file);
  img.onload = function() {
   imgwidth = this.width;
   imgheight = this.height;
   
   if(imgwidth != maxwidth || imgheight != maxheight){
    alert("Image size must be "+maxwidth+"X"+maxheight);
    $('#doctorImageUrl').val('');
    }
 };
 img.onerror = function() {
  alert("not a valid file: " + file.type);
 }

 });
});
</script>
     


  </body>

</html>
