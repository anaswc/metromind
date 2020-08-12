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
                <div class="col-lg-8"style="margin-left: 204px;" >
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
               <div class="col-lg-8"style="margin-left: 204px;" >
                  <div class="card">
                    <p class="text-center m-t-md"></p>
                    <div class="card-block">
						
                          <div class="col-md-12 " style="margin-top:5px;" > 
                            
<?php global $arrWeekDay;?>
             
                                <div class="form-group row">           

                               <?php
                              foreach($arrWeekDay as $key=>$value)
                                      {
?>
    <div class="col-sm-3">

                               <b style="color: red"> <?php echo $value ?></b></br>
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
