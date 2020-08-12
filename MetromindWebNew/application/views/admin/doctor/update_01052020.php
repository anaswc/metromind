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

          
					<?php echo form_open_multipart('admin/doctor/update/'.$doctor_item['doctorId']); ?>

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
                              <input type="email" name="doctorEmail" value="<?php echo $doctor_item['doctorEmail'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  style="clear:left">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Password<span class="mandatory">* </span> </label>
                            <div class="col-sm-12">
                              <input type="doctorPassword" name="doctorPassword" value="<?php echo $doctor_item['doctorPassword'] ?>" class="form-control" required>
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
                              <input type="text" name="chatRoomNumber" value="<?php echo $doctor_item['chatRoomNumber'] ?>" class="form-control" required>
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
                              Verified<input type="radio" name="isVerified" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerified'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerified" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerified'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                  
                        
                        
                    <div class="col-md-6 col-xs-12" style="clear: left;">
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Image</label>
                            <div class="col-sm-5">
                            	<input type = "file" name ="doctorImageUrl" class="form-control" size = "20" />    
                                 <?php
                                    if($doctor_item['doctorImageUrl']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$doctor_item['doctorImageUrl'])){?>
                                     <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$doctor_item['doctorImageUrl']?>" width="60" height="60" /></span>
                                 <?php }?>                                       
                            </div>
                            <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Medical License</label>
                            <div class="col-sm-5">
                            	<input type = "file" name ="medicalLicense" class="form-control" size = "20" />    
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
                              Verified<input type="radio" name="isVerifiedLicense" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerifiedLicense'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerifiedLicense" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerifiedLicense'] == 2){?> checked="checked" <?php } ?> required>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6 col-xs-12"  >
                          <div class="form-group row">
                            <label for="input-rounded" class="col-sm-12 form-control-label">Counselling Certificate</label>
                            <div class="col-sm-5">
                            	<input type = "file" name ="counsellingCertificate" class="form-control" size = "20" />    
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
                            <label for="input-rounded" class="col-sm-12 form-control-label">Certificate Verification<span class="mandatory">* </span> </label>
                            <div class="col-sm-6">
                              Verified<input type="radio" name="isVerifiedCertificate" value="1" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerifiedCertificate'] == 1){?> checked="checked" <?php } ?> required>
                              </div>
                               <div class="col-sm-6">
                               Not Verified<input type="radio" name="isVerifiedCertificate" value="2" class="form-control" required style="margin-top: -17px;margin-left: -49px;" <?php if($doctor_item['isVerifiedCertificate'] == 2){?> checked="checked" <?php } ?> required>
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
                              foreach($arrWeekDay as $key=>$value)
                                      {
?>
    <div class="col-sm-3">

                                <?php echo $value ?>- <a href="#!" data-toggle="modal" data-target="#large-Modal<?php echo $value ?>"   data-original-title="manage">Manage </a></br>
              <?php                

                                foreach ($available_item as $row) { 
                        
                        if($row['availableStartTime']<"12:00") 
                                $row['availableStartTime']=$row['availableStartTime']." "."AM";
                              else
                                 $row['availableStartTime']=$row['availableStartTime']." "."PM";

                                if($row['availableEndTime']<"12:00") 
                                $row['availableEndTime']=$row['availableEndTime']." "."AM";
                              else
                                 $row['availableEndTime']=$row['availableEndTime']." "."PM";



                                   ?>
  <b><?php if ($row['availableDay']==$value) echo $row['availableSession'] ?></b>
<span style="color: green"><?php if ($row['availableDay']==$value ) echo $row['availableStartTime'] ."-" ?>
<?php if ($row['availableDay']==$value) echo $row['availableEndTime'] ?></span>
        <div></div>
      
<?php } 


?>

 </div>

   <?php } ?>
                               
                                </div>

          

                          
</div>

                         
                       
                       
          
                    </div>
                  </div>
                </div>
  </div>


        </div>


<?php 
//print_r($available_item);e

foreach($arrWeekDay as $key=>$value)
                                      { 
         


                                        ?>
<div class="modal fade" id="large-Modal<?php echo $value ?>" tabindex="-1" role="dialog" align="center">


            <div style="width:55%;  margin-top:93px; margin-bottom:30px;" role="document">
                <div class="modal-content" align="left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        
                        <h4 class="modal-title">Set availability -<?php echo $value ?></h4>
                    <div>
                    <div class="modal-body">
                       
        
        
                       
            
                     <div class="col-md-12">      
            
                            
           <?php //echo form_open_multipart('admin/doctor/updateAvailability/'.$doctor_item['doctorId'].'/'.$value,$attributes); ?>

     <form name="frmoavailability" action="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item['doctorId'].'/'.$value);?>"  method="post" accept-charset="utf-8" onSubmit="return validateTime();">          

                        
                    <input type="hidden" name="availableDay" value="<?php echo $value ?>">        
            
            <input type="hidden" name="doctorId" value="<?php echo $doctor_item['doctorId'] ?>">

                            
                         
                          <div class="col-md-4" style="margin-top:50px;">
              <div class="form-group row ">
        <div class="col-md-8">
               

                                                 <label for="checkbox5"> Morning  
                                                  </label>        
                                    </div>

                                    </div>

                                            </div>


<?php 
$morning=array();
$morning=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"Morning");

?>

                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Morning_Start" id="Morning_Start" class="form-control" onchange="validateTime();"> 
                                        
                                       <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($morning['availableDay']==$value && $morning['availableSession']=="Morning" && $morning['availableStartTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>
                                        </select>
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> End  Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Morning_End" id="Morning_End" class="form-control" onchange="validateTime();"

                                        >
                                         <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($morning['availableDay']==$value && $morning['availableSession']=="Morning" && $morning['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>

                                        </select>
                                    </div>
            
                                </div>
            
                            </div>
                            
                             






                          <div class="col-md-4" style="margin-top:50px;">
              <div class="form-group row ">
        <div class="col-md-8">
               

                                                 <label for="checkbox5"> After Noon  
                                                  </label>        
                                    </div>

                                    </div>

                                            </div>


<?php 
$noon=array();
$noon=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"After Noon");

?>

                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="AfterNoon_Start" id="AfterNoon_Start" class="form-control" onchange="validateTime();">
                                          <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>"
                                         <?php  if($noon['availableDay']==$value && $noon['availableSession']=="After Noon" && $noon['availableStartTime']==$value1 ){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>
                                        </select>
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" id class="col-sm-12 form-control-label"> End  Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="AfterNoon_End" id="AfterNoon_End" class="form-control" onchange="validateTime();">
                                          <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($noon['availableDay']==$value && $noon['availableSession']=="After Noon" && $noon['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>

                                        </select>
                                    </div>
            
                                </div>
            
                            </div>








                          <div class="col-md-4" style="margin-top:50px;">
              <div class="form-group row ">
        <div class="col-md-8">
                

                                                 <label for="checkbox5"> Evening  
                                                  </label>        
                                    </div>

                                    </div>

                                            </div>

<?php 
$evening=array();
$evening=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"Evening");

?>


                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Evening_Start" id="Evening_Start" class="form-control" onchange="validateTime();">
                                        <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($evening['availableDay']==$value && $evening['availableSession']=="Evening" && $evening['availableStartTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>

                                        </select>
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> End  Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Evening_End" id="Evening_End" class="form-control" onchange="validateTime();">
                                         <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($evening['availableDay']==$value && $evening['availableSession']=="Evening" && $evening['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>

                                        </select>
                                    </div>
            
                                </div>
            
                            </div>







                          <div class="col-md-4" style="margin-top:50px;">
              <div class="form-group row ">
        <div class="col-md-8">
               
                                                 <label for="checkbox5"> Night  
                                                  </label>        
                                    </div>

                                    </div>

                                            </div>


<?php 
$night=array();
$night=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"Night");

?>

                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Night_Start" id="Night_Start" class="form-control" onchange="validateTime();">
                                        <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>"<?php  if($night['availableDay']==$value && $night['availableSession']=="Night" && $night['availableStartTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>

                                        </select>
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> End  Time </label>
            
                                    <div class="col-sm-10">         
            
                                        <select name="Night_End" id="Night_End" class="form-control" onchange="validateTime();">
                                          <?php foreach ($arrTime as $key1 => $value1) {?>
                                        
                                       
                                         <option value="<?php echo $value1 ?>" <?php  if($night['availableDay']==$value && $night['availableSession']=="Night" && $night['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?>
                                           

                                         </option>
<?php } ?>
                                        </select>
                                    </div>
            
                                </div>
            
                            </div>



                             <div class="col-md-12" style="margin-top:20px;"> 
            
                                <div class="form-group row">
            
                                    <div class="col-sm-4">
            
                                    </div>        
            
                                    <div class="col-sm-6">
            
                                      <button type="Submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" >Save</button> 
            
                                     
            
                                    </div>
            
                                </div>                                        
                            </div>    
                        </form>                                      
                            </div>    
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " id="closeButton" data-dismiss="modal">Close</button>
                       <!-- <button type="button" class="btn btn-primary waves-effect waves-light" onClick="createNewMmg();">Save changes</button>-->
                    </div>
                </div>
                
                  
            </div>
        </div>
        
        </div>      
              
      </div>
      

<?php } ?>







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

<script type="text/javascript">
  
function validateTime()
{

var frm=document.frmoavailability;

  var morningStart=document.getElementById("Morning_Start").value;
  var morningEnd=document.getElementById("Morning_End").value;
  var noonStart=document.getElementById("AfterNoon_Start").value;
  var noonEnd=document.getElementById("AfterNoon_End").value;
  var evngStart=document.getElementById("Evening_Start").value;
  var evngEnd=document.getElementById("Evening_End").value;
  var nightStart=document.getElementById("Night_Start").value;
  var nightEnd=document.getElementById("Night_End").value;



alert(frm.Morning_Start.value);
alert(frm.Morning_End.value);
alert(frm.AfterNoon_Start.value);
alert(frm.AfterNoon_End.value);
alert(frm.Evening_Start.value);
alert(frm.Evening_End.value);
alert(frm.Night_Start.value);
alert(frm.Night_End.value);

if(morningStart=="00:00" || morningStart>=morningEnd)
{
  alert("Start Time should be less than end time ");
   frm.Morning_End.focus();
    return false;
}

if(noonStart>=noonEnd)
{
  alert("Start Time should be less than end time ");
    frm.noonEnd.focus();
    return false;
}

if(evngStart>=evngEnd)
{
  alert("Start Time should be less than end time ");
   returnToPreviousPage();
    return false;
}

if(nightStart>=nightEnd)
{
  alert("Start Time should be less than end time ");
   returnToPreviousPage();
    return false;
}

if(morningEnd>noonStart)
{
  alert("Morning Time should be less than After noon time ");
   returnToPreviousPage();
    return false;
}

if(noonEnd>evngStart)
{
  alert("Morning Time should be less than After noon time ");
    returnToPreviousPage();
    return false;
}
if(evngEnd>nightStart)
{
  alert("Morning Time should be less than After noon time ");
    returnToPreviousPage();
    return false;
}

return true;
}



</script>

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
