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
				   document.getElementById('doctorEmail').value="";
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
                                	<option value="<?php echo $row["specialityId"]?>" <?php if($row["specialityId"]==$doctor_item['doctorName'])?>selected="selected"><?php echo $row["specialityName"]?></option>
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
                              <input type="doctorPassword" name="doctorPassword" value="<?php echo $this->encryption->decrypt($doctor_item['doctorPassword']) ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Phone<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="text" name="doctorMobile" value="<?php echo $doctor_item['doctorMobile'] ?>" class="form-control" required>
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
                            
                              <div class="col-sm-4">
                              Malayalam<input type="checkbox" name="knownLanguages[]" value="Malayalam" class="form-control"  style="margin-top: -17px;margin-left: 11px;" <?php if($doctor_item['knownLanguages'] == 'Malayalam')echo "checked required" ?>>
                              </div>
                               <div class="col-sm-4">
                               English<input type="checkbox" name="knownLanguages[]" value="English" class="form-control"  style="margin-top: -17px;margin-left: 11px;" <?php if($doctor_item['knownLanguages'] == 'English')echo "checked required" ?>>
                            </div>
                              <div class="col-sm-4">
                               Hindi<input type="checkbox" name="knownLanguages[]" value="Hindi" class="form-control"  style="margin-top: -17px;margin-left:15px;" <?php if($doctor_item['knownLanguages'] == 'Hindi')echo "checked required" ?>>
                            </div>
                          </div>
                        </div><div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Doctor Address<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <textarea  name="doctorAddress" rows="5"  class="form-control"><?php echo $doctor_item['doctorAddress'] ?></textarea>
                            </div>
                          </div>
                        </div> <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Specialization<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                     
                    	<select name="symptomIds[]" class="form-control" id="symptomIds" multiple="multiple"  style="height:200px;">
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
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 278*181 px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical License <span class="mandatory">* </span></label>
                            <div class="col-sm-5">
                            	<input type = "file" name ="medicalLicense" class="form-control" required size = "20" />    
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
                            	<input type = "file" name ="counsellingCertificate" required class="form-control" size = "20" />    
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


                               $session1="Morning";
                               $session2="After Noon";
                                $session3="Evening";
                               


                             ?>
    <div class="col-sm-3">

     <b style="color: red"><?php echo $day1 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day1)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$morning=array();
$morning=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day1,$session1);

/*if($morning['availableStartTime']<"12:00:00") 
                                $morning['availableStartTime']=$morning['availableStartTime']." "."AM";
                              else
                                 $morning['availableStartTime']=$morning['availableStartTime']." "."PM";

                                if($morning['availableEndTime']<"12:00:00") 
                                $morning['availableEndTime']=$morning['availableEndTime']." "."AM";
                              else
                                 $morning['availableEndTime']=$morning['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning['availableDay']==$day1 ) echo date('h:i:s a',strtotime($morning['availableStartTime']))."-" ?>
<?php if ($morning['availableDay']==$day1) echo date('h:i:s a',strtotime($morning['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon=array();
$noon=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day1,$session2);

/*if($noon['availableStartTime']<"12:00:00") 
                                $noon['availableStartTime']=$noon['availableStartTime']." "."AM";
                              else
                                 $noon['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon['availableEndTime']<"12:00:00") 
                                $noon['availableEndTime']=$noon['availableEndTime']." "."AM";
                              else
                                 $noon['availableEndTime']=$noon['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon['availableDay']==$day1 ) echo date('h:i:s a',strtotime($noon['availableStartTime'])) ."-" ?>
<?php if ($noon['availableDay']==$day1) echo date('h:i:s a',strtotime($noon['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening=array();
$evening=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day1,$session3);

/*if($evening['availableStartTime']<"12:00:00") 
                                $evening['availableStartTime']=$evening['availableStartTime']." "."AM";
                              else
                                 $evening['availableStartTime']=$evening['availableStartTime']." "."PM";

                                if($evening['availableEndTime']<"12:00:00") 
                                $evening['availableEndTime']=$evening['availableEndTime']." "."AM";
                              else
                                 $evening['availableEndTime']=$evening['availableEndTime']." "."PM";
*/
?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening['availableDay']==$day1 ) echo date('h:i:s a',strtotime($evening['availableStartTime'])) ."-" ?>
<?php if ($evening['availableDay']==$day1) echo date('h:i:s a',strtotime($evening['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>
 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day2 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day2)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$morning1=array();
$morning1=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day2,$session1);

/*if($morning1['availableStartTime']<"12:00:00") 
                                $morning1['availableStartTime']=$morning1['availableStartTime']." "."AM";
                              else
                                 $morning1['availableStartTime']=$morning1['availableStartTime']." "."PM";

                                if($morning1['availableEndTime']<"12:00:00") 
                                $morning1['availableEndTime']=$morning1['availableEndTime']." "."AM";
                              else
                                 $morning1['availableEndTime']=$morning1['availableEndTime']." "."PM";
*/?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning1['availableDay']==$day2) echo date('h:i:s a',strtotime($morning1['availableStartTime'])) ."-" ?>
<?php if ($morning1['availableDay']==$day2) echo date('h:i:s a',strtotime($morning1['availableEndTime'])) ?></span>
      <div><h6>&nbsp;</h6></div>
  <?php 
$noon1=array();
$noon1=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day2,$session2);

/*if($noon1['availableStartTime']<"12:00:00") 
                                $noon1['availableStartTime']=$noon1['availableStartTime']." "."AM";
                              else
                                 $noon1['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon1['availableEndTime']<"12:00:00") 
                                $noon1['availableEndTime']=$noon1['availableEndTime']." "."AM";
                              else
                                 $noon1['availableEndTime']=$noon1['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon1['availableDay']==$day2) echo date('h:i:s a',strtotime($noon1['availableStartTime'])) ."-" ?>
<?php if ($noon1['availableDay']==$day2)  echo date('h:i:s a',strtotime($noon1['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening1=array();
$evening1=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day2,$session3);

/*if($evening1['availableStartTime']<"12:00:00") 
                                $evening1['availableStartTime']=$evening1['availableStartTime']." "."AM";
                              else
                                 $evening1['availableStartTime']=$evening1['availableStartTime']." "."PM";

                                if($evening1['availableEndTime']<"12:00:00") 
                                $evening1['availableEndTime']=$evening1['availableEndTime']." "."AM";
                              else
                                 $evening1['availableEndTime']=$evening1['availableEndTime']." "."PM";*/

?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening1['availableDay']==$day2) echo date('h:i:s a',strtotime($evening1['availableStartTime'])) ."-" ?>
<?php if ($evening1['availableDay']==$day2) echo date('h:i:s a',strtotime($evening1['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>

 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day3 ?>-</b>  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day3)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$morning2=array();
$morning2=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day3,$session1);

/*if($morning2['availableStartTime']<"12:00:00") 
                                $morning2['availableStartTime']=$morning2['availableStartTime']." "."AM";
                              else
                                 $morning2['availableStartTime']=$morning2['availableStartTime']." "."PM";

                                if($morning2['availableEndTime']<"12:00:00") 
                                $morning2['availableEndTime']=$morning2['availableEndTime']." "."AM";
                              else
                                 $morning2['availableEndTime']=$morning2['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning2['availableDay']==$day3) echo date('h:i:s a',strtotime($morning2['availableStartTime'])) ."-" ?>
<?php if ($morning2['availableDay']==$day3) echo date('h:i:s a',strtotime($morning2['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon2=array();
$noon2=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day3,$session2);

/*if($noon2['availableStartTime']<"12:00:00") 
                                $noon2['availableStartTime']=$noon2['availableStartTime']." "."AM";
                              else
                                 $noon2['availableStartTime']=$noon2['availableStartTime']." "."PM";

                                if($noon2['availableEndTime']<"12:00:00") 
                                $noon2['availableEndTime']=$noon2['availableEndTime']." "."AM";
                              else
                                 $noon2['availableEndTime']=$noon2['availableEndTime']." "."PM";
*/?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon2['availableDay']==$day3) echo date('h:i:s a',strtotime($noon2['availableStartTime'])) ."-" ?>
<?php if ($noon2['availableDay']==$day3) echo date('h:i:s a',strtotime($noon2['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening2=array();
$evening2=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day3,$session3);

/*if($evening2['availableStartTime']<"12:00:00") 
                                $evening2['availableStartTime']=$evening2['availableStartTime']." "."AM";
                              else
                                 $evening2['availableStartTime']=$evening2['availableStartTime']." "."PM";

                                if($evening2['availableEndTime']<"12:00:00") 
                                $evening2['availableEndTime']=$evening2['availableEndTime']." "."AM";
                              else
                                 $evening2['availableEndTime']=$evening2['availableEndTime']." "."PM";
*/
?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening2['availableDay']==$day3) echo date('h:i:s a',strtotime($evening2['availableStartTime'])) ."-" ?>
<?php if ($evening2['availableDay']==$day3) echo date('h:i:s a',strtotime($evening2['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>

 </div>
 <div class="col-sm-3">

     <b style="color: red"><?php echo $day4 ?>- </b> <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day4)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a><div><h6>&nbsp;</h6></div>
<?php 
$morning3=array();
$morning3=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day4,$session1);

/*if($morning3['availableStartTime']<"12:00:00") 
                                $morning3['availableStartTime']=$morning3['availableStartTime']." "."AM";
                              else
                                 $morning3['availableStartTime']=$morning3['availableStartTime']." "."PM";

                                if($morning3['availableEndTime']<"12:00:00") 
                                $morning3['availableEndTime']=$morning3['availableEndTime']." "."AM";
                              else
                                 $morning3['availableEndTime']=$morning3['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning3['availableDay']==$day4) echo date('h:i:s a',strtotime($morning3['availableStartTime'])) ."-" ?>
<?php if ($morning3['availableDay']==$day4) echo date('h:i:s a',strtotime($morning3['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon3=array();
$noon3=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day4,$session2);

/*if($noon3['availableStartTime']<"12:00:00") 
                                $noon3['availableStartTime']=$noon3['availableStartTime']." "."AM";
                              else
                                 $noon3['availableStartTime']=$noon3['availableStartTime']." "."PM";

                                if($noon3['availableEndTime']<"12:00:00") 
                                $noon3['availableEndTime']=$noon3['availableEndTime']." "."AM";
                              else
                                 $noon3['availableEndTime']=$noon3['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon3['availableDay']==$day4) echo date('h:i:s a',strtotime($noon3['availableStartTime'])) ."-" ?>
<?php if ($noon3['availableDay']==$day4) echo date('h:i:s a',strtotime($noon3['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening3=array();
$evening3=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day4,$session3);

/*if($evening3['availableStartTime']<"12:00:00") 
                                $evening3['availableStartTime']=$evening3['availableStartTime']." "."AM";
                              else
                                 $evening3['availableStartTime']=$evening3['availableStartTime']." "."PM";

                                if($evening3['availableEndTime']<"12:00:00") 
                                $evening3['availableEndTime']=$evening3['availableEndTime']." "."AM";
                              else
                                 $evening3['availableEndTime']=$evening3['availableEndTime']." "."PM";*/

?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening3['availableDay']==$day4) echo date('h:i:s a',strtotime($evening3['availableStartTime'])) ."-" ?>
<?php if ($evening3['availableDay']==$day4) echo date('h:i:s a',strtotime($evening3['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>




 </div>
<div><h6>&nbsp;</h6></div>

  <div class="col-sm-3">

     <b style="color: red"><?php echo $day5 ?>- </b> <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day5)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$morning4=array();
$morning4=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day5,$session1);

/*if($morning4['availableStartTime']<"12:00:00") 
                                $morning4['availableStartTime']=$morning4['availableStartTime']." "."AM";
                              else
                                 $morning4['availableStartTime']=$morning4['availableStartTime']." "."PM";

                                if($morning4['availableEndTime']<"12:00:00") 
                                $morning4['availableEndTime']=$morning4['availableEndTime']." "."AM";
                              else
                                 $morning4['availableEndTime']=$morning4['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning4['availableDay']==$day5) echo date('h:i:s a',strtotime($morning4['availableStartTime'])) ."-" ?>
<?php if ($morning4['availableDay']==$day5) echo date('h:i:s a',strtotime($morning4['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon4=array();
$noon4=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day5,$session2);

/*if($noon4['availableStartTime']<"12:00:00") 
                                $noon4['availableStartTime']=$noon4['availableStartTime']." "."AM";
                              else
                                 $noon4['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon4['availableEndTime']<"12:00:00") 
                                $noon4['availableEndTime']=$noon4['availableEndTime']." "."AM";
                              else
                                 $noon4['availableEndTime']=$noon4['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon4['availableDay']==$day5) echo date('h:i:s a',strtotime($noon4['availableStartTime'])) ."-" ?>
<?php if ($noon4['availableDay']==$day5) echo date('h:i:s a',strtotime($noon4['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening4=array();
$evening4=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day5,$session3);

/*if($evening4['availableStartTime']<"12:00:00") 
                                $evening4['availableStartTime']=$evening4['availableStartTime']." "."AM";
                              else
                                 $evening4['availableStartTime']=$evening4['availableStartTime']." "."PM";

                                if($evening4['availableEndTime']<"12:00:00") 
                                $evening4['availableEndTime']=$evening4['availableEndTime']." "."AM";
                              else
                                 $evening4['availableEndTime']=$evening4['availableEndTime']." "."PM";
*/
?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening4['availableDay']==$day5) echo date('h:i:s a',strtotime($evening4['availableStartTime'])) ."-" ?>
<?php if ($evening4['availableDay']==$day5) echo date('h:i:s a',strtotime($evening4['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

 </div>

 <div class="col-sm-3">

    <b style="color: red"> <?php echo $day6?>-</b>  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day6)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a><div><h6>&nbsp;</h6></div>
<?php 
$morning5=array();
$morning5=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day6,$session1);

/*if($morning5['availableStartTime']<"12:00:00") 
                                $morning5['availableStartTime']=$morning5['availableStartTime']." "."AM";
                              else
                                 $morning5['availableStartTime']=$morning5['availableStartTime']." "."PM";

                                if($morning5['availableEndTime']<"12:00:00") 
                                $morning5['availableEndTime']=$morning5['availableEndTime']." "."AM";
                              else
                                 $morning5['availableEndTime']=$morning5['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning5['availableDay']==$day6) echo date('h:i:s a',strtotime($morning5['availableStartTime'])) ."-" ?>
<?php if ($morning5['availableDay']==$day6) echo date('h:i:s a',strtotime($morning5['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon5=array();
$noon5=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day6,$session2);

/*if($noon5['availableStartTime']<"12:00:00") 
                                $noon5['availableStartTime']=$noon5['availableStartTime']." "."AM";
                              else
                                 $noon5['availableStartTime']=$noon5['availableStartTime']." "."PM";

                                if($noon5['availableEndTime']<"12:00:00") 
                                $noon5['availableEndTime']=$noon5['availableEndTime']." "."AM";
                              else
                                 $noon5['availableEndTime']=$noon5['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon5['availableDay']==$day6) echo date('h:i:s a',strtotime($noon5['availableStartTime'])) ."-" ?>
<?php if ($noon5['availableDay']==$day6) echo date('h:i:s a',strtotime($noon5['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening5=array();
$evening5=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day6,$session3);

/*if($evening5['availableStartTime']<"12:00:00") 
                                $evening5['availableStartTime']=$evening5['availableStartTime']." "."AM";
                              else
                                 $evening5['availableStartTime']=$evening5['availableStartTime']." "."PM";

                                if($evening5['availableEndTime']<"12:00:00") 
                                $evening5['availableEndTime']=$evening5['availableEndTime']." "."AM";
                              else
                                 $evening5['availableEndTime']=$evening5['availableEndTime']." "."PM";*/

?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening5['availableDay']==$day6) echo date('h:i:s a',strtotime($evening5['availableStartTime'])) ."-" ?>
<?php if ($evening5['availableDay']==$day6) echo date('h:i:s a',strtotime($evening5['availableEndTime'])) ?></span>
        <div><h6>&nbsp;</h6></div>

 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day7 ?></b>-  <a href="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item["doctorId"].'/'.$day7)?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" >Manage </a> <div><h6>&nbsp;</h6></div>
<?php 
$morning6=array();
$morning6=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day7,$session1);

/*if($morning6['availableStartTime']<"12:00:00") 
                                $morning6['availableStartTime']=$morning6['availableStartTime']." "."AM";
                              else
                                 $morning6['availableStartTime']=$morning6['availableStartTime']." "."PM";

                                if($morning6['availableEndTime']<"12:00:00") 
                                $morning6['availableEndTime']=$morning6['availableEndTime']." "."AM";
                              else
                                 $morning6['availableEndTime']=$morning6['availableEndTime']." "."PM";*/
?>

  <b>Morning</b><br>
<span style="color: green"><?php if ($morning6['availableDay']==$day7) echo date('h:i:s a',strtotime($morning6['availableStartTime'])) ."-" ?>
<?php if ($morning6['availableDay']==$day7) echo date('h:i:s a',strtotime($morning6['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon6=array();
$noon6=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day7,$session2);

/*if($noon6['availableStartTime']<"12:00:00") 
                                $noon6['availableStartTime']=$noon6['availableStartTime']." "."AM";
                              else
                                 $noon6['availableStartTime']=$noon6['availableStartTime']." "."PM";

                                if($noon6['availableEndTime']<"12:00:00") 
                                $noon6['availableEndTime']=$noon6['availableEndTime']." "."AM";
                              else
                                 $noon6['availableEndTime']=$noon6['availableEndTime']." "."PM";*/
?>
      
        <b>After Noon</b><br>
<span style="color: green"><?php if ($noon6['availableDay']==$day7) echo date('h:i:s a',strtotime($noon6['availableStartTime'])) ."-" ?>
<?php if ($noon6['availableDay']==$day7) echo date('h:i:s a',strtotime($noon6['availableEndTime'])) ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening6=array();
$evening6=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$day7,$session3);

/*if($evening6['availableStartTime']<"12:00:00") 
                                $evening6['availableStartTime']=$evening6['availableStartTime']." "."AM";
                              else
                                 $evening6['availableStartTime']=$evening6['availableStartTime']." "."PM";

                                if($evening6['availableEndTime']<"12:00:00") 
                                $evening6['availableEndTime']=$evening6['availableEndTime']." "."AM";
                              else
                                 $evening6['availableEndTime']=$evening6['availableEndTime']." "."PM";
*/
?>   
        <b>Evening</b><br>
<span style="color: green"><?php if ($evening6['availableDay']==$day7) echo date('h:i:s a',strtotime($evening6['availableStartTime'])) ."-" ?>
<?php if ($evening6['availableDay']==$day7) echo date('h:i:s a',strtotime($evening6['availableEndTime'])) ?></span>
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
