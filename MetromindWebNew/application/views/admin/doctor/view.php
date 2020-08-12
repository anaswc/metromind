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
                       </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/doctor'); ?>">Doctor Details</a>
                                </li>
								<li class="breadcrumb-item"><?php echo $this->doctor_model->doctorName?>
                                </li>
                    </ol>
                  </div>
            </div>
            <div class="row"> 
                <div class="col-lg-12" >
                  <div class="card">
                    <p class="text-center m-t-md"></p>
                    <div class="card-block">
                   
                   
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                 <span class="txt-muted"> Doctor Name </div><div class="col-sm-8">: <?php echo $this->doctor_model->doctorName?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                 <span class="txt-muted"> Email </div><div class="col-sm-8">: <?php echo $this->doctor_model->doctorEmail?> </span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                 <span class="txt-muted"> Password </div><div class="col-sm-8">: <?php echo $this->encryption->decrypt($this->doctor_model->doctorPassword)?> </span>
                            </div>
                          </div>
                        </div>
						
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
  <?php $gender=$this->doctor_model->gender;
													
													?>
                                                     <span class="txt-muted"> Gender </div><div class="col-sm-8">: <?php if($gender==1) {echo "Male";}else{echo "Female";}?> </span>
                                                                                </div>
                          </div>
                        </div>
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                <span class="txt-muted"> Phone Number</div><div class="col-sm-8">: <?php echo $this->doctor_model->doctorMobile?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                <span class="txt-muted"> Age</div><div class="col-sm-8">: <?php echo $this->doctor_model->age?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                 <span class="txt-muted">Youtube Link </div><div class="col-sm-8">: <?php echo $this->doctor_model->youtubeLink?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                 <span class="txt-muted"> Speciality </div><div class="col-sm-8">: <?php
					  $str_arr = explode (",", $this->doctor_model->specialityId);  

					  for($i=0;$i<count($str_arr);$i++)
					  { if(count($specialities)) :
                   foreach ($specialities as $row1) :
					  if($row1["specialityId"]==$str_arr[$i])
						{
						$row1["specialityId"] = $row1["specialityName"].'<br>';
						 ?>
                     <?php echo $row1['specialityId']?>
					
					<?php	}

					
					endforeach;
						endif;
					  }			
						?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                <span class="txt-muted"> Qualification</div><div class="col-sm-8">: <?php echo $this->doctor_model->qualification?> </span>
                            </div>
                          </div>
                        </div>
						
                       
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Known Languages </div><div class="col-sm-8">: <?php echo $this->doctor_model->knownLanguages?> </span>
                            </div>
                          </div>
                        </div>
						
                       <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Communication Mode</div><div class="col-sm-8">: <?php $comm=explode(',',$this->doctor_model->communicationMode);//print_r($comm);exit;?>
						<td><?php	for($i=0;$i<count($comm);$i++)
							{
								if($comm[$i]==1)
								{
								echo "Video Call</br>";
								}
								
								elseif($comm[$i]==2)
								{
									echo "Audio Call </br>";}
									elseif($comm[$i]==3)
								{
									echo "Text message</br>";}
								}
							?> </span>
                            </div>
                          </div>
                        </div>
                    
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Experience</div><div class="col-sm-8">: <?php echo $this->doctor_model->experience?> </span>
                            </div>
                          </div>
                        </div>
						
                      <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Fee</div><div class="col-sm-8">: <?php echo $this->doctor_model->doctorFee?> </span>
                            </div>
                          </div>
                        </div>
						
                         
						
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Specialization</div><div class="col-sm-8">: <?php
                                                     
					  $str_arr = explode (",", $this->doctor_model->specialization);  

					  for($i=0;$i<count($str_arr);$i++)
					  { if(count($symptoms)) :
                   foreach ($symptoms as $row1) :
					  if($row1["symptomId"]==$str_arr[$i])
						{
						$row1["symptomId"] = $row1["symptomName"].'<br>';
						 ?>
                     <?php echo $row1['symptomId']?>
					
					<?php	}

					
					endforeach;
						endif;
					  }	

						?>  </span>
                            </div>
                          </div>
                        </div>
						
                     
                        <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                    <span class="txt-muted"> Address</div><div class="col-sm-8">: <?php echo nl2br($this->doctor_model->doctorAddress)?> </span>
                            </div>
                          </div>
                        </div>
						
                        
                          <div class="col-md-6 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-4">
                                                     <span class="txt-muted"> Created Date & Time </div><div class="col-sm-8">: <?php echo $this->doctor_model->createdDate?> </span>
                            </div>
                          </div>
                        </div>
						
                      
                        
                    
                       </div>
                          </div>
                        </div>
						  </div><div align="center"><strong><strong>Availability</strong></strong></div>
						  <br>
						 <div class="row"> 
               <div class="col-lg-12">
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
    <div class="col-sm-3">

     <b style="color: red"><?php echo $day1 ?></b><div><h6>&nbsp;</h6></div>
<?php 
$morning=array();
$morning=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day1,$session1);

if($morning['availableStartTime']<"12:00:00") 
                                $morning['availableStartTime']=$morning['availableStartTime']." "."AM";
                              else
                                 $morning['availableStartTime']=$morning['availableStartTime']." "."PM";

                                if($morning['availableEndTime']<"12:00:00") 
                                $morning['availableEndTime']=$morning['availableEndTime']." "."AM";
                              else
                                 $morning['availableEndTime']=$morning['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning['availableDay']==$day1 ) echo $morning['availableStartTime'] ."-" ?>
<?php if ($morning['availableDay']==$day1) echo $morning['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon=array();
$noon=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day1,$session2);

if($noon['availableStartTime']<"12:00:00") 
                                $noon['availableStartTime']=$noon['availableStartTime']." "."AM";
                              else
                                 $noon['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon['availableEndTime']<"12:00:00") 
                                $noon['availableEndTime']=$noon['availableEndTime']." "."AM";
                              else
                                 $noon['availableEndTime']=$noon['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon['availableDay']==$day1 ) echo $noon['availableStartTime'] ."-" ?>
<?php if ($noon['availableDay']==$day1) echo $noon['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening=array();
$evening=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day1,$session3);

if($evening['availableStartTime']<"12:00:00") 
                                $evening['availableStartTime']=$evening['availableStartTime']." "."AM";
                              else
                                 $evening['availableStartTime']=$evening['availableStartTime']." "."PM";

                                if($evening['availableEndTime']<"12:00:00") 
                                $evening['availableEndTime']=$evening['availableEndTime']." "."AM";
                              else
                                 $evening['availableEndTime']=$evening['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening['availableDay']==$day1 ) echo $evening['availableStartTime'] ."-" ?>
<?php if ($evening['availableDay']==$day1) echo $evening['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>

      


 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day2 ?></b><div><h6>&nbsp;</h6></div>
<?php 
$morning1=array();
$morning1=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day2,$session1);

if($morning1['availableStartTime']<"12:00:00") 
                                $morning1['availableStartTime']=$morning1['availableStartTime']." "."AM";
                              else
                                 $morning1['availableStartTime']=$morning1['availableStartTime']." "."PM";

                                if($morning1['availableEndTime']<"12:00:00") 
                                $morning1['availableEndTime']=$morning1['availableEndTime']." "."AM";
                              else
                                 $morning1['availableEndTime']=$morning1['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning1['availableDay']==$day2) echo $morning1['availableStartTime'] ."-" ?>
<?php if ($morning1['availableDay']==$day2) echo $morning1['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon1=array();
$noon1=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day2,$session2);

if($noon1['availableStartTime']<"12:00:00") 
                                $noon1['availableStartTime']=$noon1['availableStartTime']." "."AM";
                              else
                                 $noon1['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon1['availableEndTime']<"12:00:00") 
                                $noon1['availableEndTime']=$noon1['availableEndTime']." "."AM";
                              else
                                 $noon1['availableEndTime']=$noon1['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon1['availableDay']==$day2) echo $noon1['availableStartTime'] ."-" ?>
<?php if ($noon1['availableDay']==$day2) echo $noon1['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening1=array();
$evening1=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day2,$session3);

if($evening1['availableStartTime']<"12:00:00") 
                                $evening1['availableStartTime']=$evening1['availableStartTime']." "."AM";
                              else
                                 $evening1['availableStartTime']=$evening1['availableStartTime']." "."PM";

                                if($evening1['availableEndTime']<"12:00:00") 
                                $evening1['availableEndTime']=$evening1['availableEndTime']." "."AM";
                              else
                                 $evening1['availableEndTime']=$evening1['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening1['availableDay']==$day2) echo $evening1['availableStartTime'] ."-" ?>
<?php if ($evening1['availableDay']==$day2) echo $evening1['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>




 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day3 ?></b>  <div><h6>&nbsp;</h6></div>
<?php 
$morning2=array();
$morning2=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day3,$session1);

if($morning2['availableStartTime']<"12:00:00") 
                                $morning2['availableStartTime']=$morning2['availableStartTime']." "."AM";
                              else
                                 $morning2['availableStartTime']=$morning2['availableStartTime']." "."PM";

                                if($morning2['availableEndTime']<"12:00:00") 
                                $morning2['availableEndTime']=$morning2['availableEndTime']." "."AM";
                              else
                                 $morning2['availableEndTime']=$morning2['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning2['availableDay']==$day3) echo $morning2['availableStartTime'] ."-" ?>
<?php if ($morning2['availableDay']==$day3) echo $morning2['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon2=array();
$noon2=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day3,$session2);

if($noon2['availableStartTime']<"12:00:00") 
                                $noon2['availableStartTime']=$noon2['availableStartTime']." "."AM";
                              else
                                 $noon2['availableStartTime']=$noon2['availableStartTime']." "."PM";

                                if($noon2['availableEndTime']<"12:00:00") 
                                $noon2['availableEndTime']=$noon2['availableEndTime']." "."AM";
                              else
                                 $noon2['availableEndTime']=$noon2['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon2['availableDay']==$day3) echo $noon2['availableStartTime'] ."-" ?>
<?php if ($noon2['availableDay']==$day3) echo $noon2['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening2=array();
$evening2=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day3,$session3);

if($evening2['availableStartTime']<"12:00:00") 
                                $evening2['availableStartTime']=$evening2['availableStartTime']." "."AM";
                              else
                                 $evening2['availableStartTime']=$evening2['availableStartTime']." "."PM";

                                if($evening2['availableEndTime']<"12:00:00") 
                                $evening2['availableEndTime']=$evening2['availableEndTime']." "."AM";
                              else
                                 $evening2['availableEndTime']=$evening2['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening2['availableDay']==$day3) echo $evening2['availableStartTime'] ."-" ?>
<?php if ($evening2['availableDay']==$day3) echo $evening2['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>


      


 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day4 ?></b> <div><h6>&nbsp;</h6></div>
<?php 
$morning3=array();
$morning3=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day4,$session1);

if($morning3['availableStartTime']<"12:00:00") 
                                $morning3['availableStartTime']=$morning3['availableStartTime']." "."AM";
                              else
                                 $morning3['availableStartTime']=$morning3['availableStartTime']." "."PM";

                                if($morning3['availableEndTime']<"12:00:00") 
                                $morning3['availableEndTime']=$morning3['availableEndTime']." "."AM";
                              else
                                 $morning3['availableEndTime']=$morning3['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning3['availableDay']==$day4) echo $morning3['availableStartTime'] ."-" ?>
<?php if ($morning3['availableDay']==$day4) echo $morning3['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon3=array();
$noon3=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day4,$session2);

if($noon3['availableStartTime']<"12:00:00") 
                                $noon3['availableStartTime']=$noon3['availableStartTime']." "."AM";
                              else
                                 $noon3['availableStartTime']=$noon3['availableStartTime']." "."PM";

                                if($noon3['availableEndTime']<"12:00:00") 
                                $noon3['availableEndTime']=$noon3['availableEndTime']." "."AM";
                              else
                                 $noon3['availableEndTime']=$noon3['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon3['availableDay']==$day4) echo $noon3['availableStartTime'] ."-" ?>
<?php if ($noon3['availableDay']==$day4) echo $noon3['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening3=array();
$evening3=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day4,$session3);

if($evening3['availableStartTime']<"12:00:00") 
                                $evening3['availableStartTime']=$evening3['availableStartTime']." "."AM";
                              else
                                 $evening3['availableStartTime']=$evening3['availableStartTime']." "."PM";

                                if($evening3['availableEndTime']<"12:00:00") 
                                $evening3['availableEndTime']=$evening3['availableEndTime']." "."AM";
                              else
                                 $evening3['availableEndTime']=$evening3['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening3['availableDay']==$day4) echo $evening3['availableStartTime'] ."-" ?>
<?php if ($evening3['availableDay']==$day4) echo $evening3['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>
<div><h6>&nbsp;</h6></div>

      


 </div>

  <div class="col-sm-3">

     <b style="color: red"><?php echo $day5 ?></b> <div><h6>&nbsp;</h6></div>
<?php 
$morning4=array();
$morning4=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day5,$session1);

if($morning4['availableStartTime']<"12:00:00") 
                                $morning4['availableStartTime']=$morning4['availableStartTime']." "."AM";
                              else
                                 $morning4['availableStartTime']=$morning4['availableStartTime']." "."PM";

                                if($morning4['availableEndTime']<"12:00:00") 
                                $morning4['availableEndTime']=$morning4['availableEndTime']." "."AM";
                              else
                                 $morning4['availableEndTime']=$morning4['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning4['availableDay']==$day5) echo $morning4['availableStartTime'] ."-" ?>
<?php if ($morning4['availableDay']==$day5) echo $morning4['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>
  <?php 
$noon4=array();
$noon4=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day5,$session2);

if($noon4['availableStartTime']<"12:00:00") 
                                $noon4['availableStartTime']=$noon4['availableStartTime']." "."AM";
                              else
                                 $noon4['availableStartTime']=$noon['availableStartTime']." "."PM";

                                if($noon4['availableEndTime']<"12:00:00") 
                                $noon4['availableEndTime']=$noon4['availableEndTime']." "."AM";
                              else
                                 $noon4['availableEndTime']=$noon4['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon4['availableDay']==$day5) echo $noon4['availableStartTime'] ."-" ?>
<?php if ($noon4['availableDay']==$day5) echo $noon4['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening4=array();
$evening4=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day5,$session3);

if($evening4['availableStartTime']<"12:00:00") 
                                $evening4['availableStartTime']=$evening4['availableStartTime']." "."AM";
                              else
                                 $evening4['availableStartTime']=$evening4['availableStartTime']." "."PM";

                                if($evening4['availableEndTime']<"12:00:00") 
                                $evening4['availableEndTime']=$evening4['availableEndTime']." "."AM";
                              else
                                 $evening4['availableEndTime']=$evening4['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening4['availableDay']==$day5) echo $evening4['availableStartTime'] ."-" ?>
<?php if ($evening4['availableDay']==$day5) echo $evening4['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>


      


 </div>

 <div class="col-sm-3">

    <b style="color: red"> <?php echo $day6?></b> <div><h6>&nbsp;</h6></div>
<?php 
$morning5=array();
$morning5=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day6,$session1);

if($morning5['availableStartTime']<"12:00:00") 
                                $morning5['availableStartTime']=$morning5['availableStartTime']." "."AM";
                              else
                                 $morning5['availableStartTime']=$morning5['availableStartTime']." "."PM";

                                if($morning5['availableEndTime']<"12:00:00") 
                                $morning5['availableEndTime']=$morning5['availableEndTime']." "."AM";
                              else
                                 $morning5['availableEndTime']=$morning5['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning5['availableDay']==$day6) echo $morning5['availableStartTime'] ."-" ?>
<?php if ($morning5['availableDay']==$day6) echo $morning5['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon5=array();
$noon5=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day6,$session2);

if($noon5['availableStartTime']<"12:00:00") 
                                $noon5['availableStartTime']=$noon5['availableStartTime']." "."AM";
                              else
                                 $noon5['availableStartTime']=$noon5['availableStartTime']." "."PM";

                                if($noon5['availableEndTime']<"12:00:00") 
                                $noon5['availableEndTime']=$noon5['availableEndTime']." "."AM";
                              else
                                 $noon5['availableEndTime']=$noon5['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon5['availableDay']==$day6) echo $noon5['availableStartTime'] ."-" ?>
<?php if ($noon5['availableDay']==$day6) echo $noon5['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>

<?php 
$evening5=array();
$evening5=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day6,$session3);

if($evening5['availableStartTime']<"12:00:00") 
                                $evening5['availableStartTime']=$evening5['availableStartTime']." "."AM";
                              else
                                 $evening5['availableStartTime']=$evening5['availableStartTime']." "."PM";

                                if($evening5['availableEndTime']<"12:00:00") 
                                $evening5['availableEndTime']=$evening5['availableEndTime']." "."AM";
                              else
                                 $evening5['availableEndTime']=$evening5['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening5['availableDay']==$day6) echo $evening5['availableStartTime'] ."-" ?>
<?php if ($evening5['availableDay']==$day6) echo $evening5['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>


      


 </div>

 <div class="col-sm-3">

     <b style="color: red"><?php echo $day7 ?></b><div><h6>&nbsp;</h6></div>
<?php 
$morning6=array();
$morning6=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day7,$session1);

if($morning6['availableStartTime']<"12:00:00") 
                                $morning6['availableStartTime']=$morning6['availableStartTime']." "."AM";
                              else
                                 $morning6['availableStartTime']=$morning6['availableStartTime']." "."PM";

                                if($morning6['availableEndTime']<"12:00:00") 
                                $morning6['availableEndTime']=$morning6['availableEndTime']." "."AM";
                              else
                                 $morning6['availableEndTime']=$morning6['availableEndTime']." "."PM";
?>

  <b>Morning</b></br>
<span style="color: green"><?php if ($morning6['availableDay']==$day7) echo $morning6['availableStartTime'] ."-" ?>
<?php if ($morning6['availableDay']==$day7) echo $morning6['availableEndTime'] ?></span>
       <div><h6>&nbsp;</h6></div>
  <?php 
$noon6=array();
$noon6=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day7,$session2);

if($noon6['availableStartTime']<"12:00:00") 
                                $noon6['availableStartTime']=$noon6['availableStartTime']." "."AM";
                              else
                                 $noon6['availableStartTime']=$noon6['availableStartTime']." "."PM";

                                if($noon6['availableEndTime']<"12:00:00") 
                                $noon6['availableEndTime']=$noon6['availableEndTime']." "."AM";
                              else
                                 $noon6['availableEndTime']=$noon6['availableEndTime']." "."PM";
?>
      
        <b>After Noon</b></br>
<span style="color: green"><?php if ($noon6['availableDay']==$day7) echo $noon6['availableStartTime'] ."-" ?>
<?php if ($noon6['availableDay']==$day7) echo $noon6['availableEndTime'] ?></span>
        <div><h6>&nbsp;</h6></div>

<?php 
$evening6=array();
$evening6=$this->doctor_model->getItem_morning($this->doctor_model->doctorId,$day7,$session3);

if($evening6['availableStartTime']<"12:00:00") 
                                $evening6['availableStartTime']=$evening6['availableStartTime']." "."AM";
                              else
                                 $evening6['availableStartTime']=$evening6['availableStartTime']." "."PM";

                                if($evening6['availableEndTime']<"12:00:00") 
                                $evening6['availableEndTime']=$evening6['availableEndTime']." "."AM";
                              else
                                 $evening6['availableEndTime']=$evening6['availableEndTime']." "."PM";

?>   
        <b>Evening</b></br>
<span style="color: green"><?php if ($evening6['availableDay']==$day7) echo $evening6['availableStartTime'] ."-" ?>
<?php if ($evening6['availableDay']==$day7) echo $evening6['availableEndTime'] ?></span>
    <div><h6>&nbsp;</h6></div>


      


 </div>
                               

          

                          
</div>
            <div class="form-group row">
                            <div align="center">        

                            
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light" onclick="history.back();">Back</button></div>
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
