<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-View Appointment</title>
	
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">

    <!-- Rating css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/rating/css/rating.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/ion-icon/css/ionicons.min.css">

    <!-- slick.css-->
    <link href="<?php echo base_url()?>assets/css/slick.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/slick-theme.css" rel="stylesheet">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/responsive.css">    <!--color css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/color/color-1.css" id="color"/>
  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
    
	<script>
    function Cancel(){
        document.location.href="<?php echo base_url('admin/newrequest'); ?>";
    }
    </script> 
    
	<div class="content-wrapper">
    <div class="container-fluid">
      	<div class="row">
        	<div class="col-sm-12 p-0">
          		<div class="main-header">
            		<h4>					
 Appointment					</h4>
				<ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                 <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard"><i class="icofont icofont-home"></i></a></li>
                   	<li class="breadcrumb-item"><a href="<?php echo base_url('admin/newrequest'); ?>"> Appointment List
                  		<li class="breadcrumb-item">
                 			<a href="#">
						Appointment	
                          </li></a>
                  	
                </ol>
     		</div>
    	</div>
  	</div>
  	<div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card faq-left">
                        <div class="social-profile">
                        <?php if($appointment_item['doctorImageUrl']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$appointment_item['doctorImageUrl'])){ ?>
<img class="img-fluid" src="<?php echo $includePath.AXUPLOADDOCTORSPATH.$appointment_item['doctorImageUrl']?>" alt="" style="width:100%; height:auto">
                            <?php }
							
							else{?>
								
								<img class="img-fluid" src="<?php echo base_url();?>assets/images/avatar-1.png" alt="" style="width:100%; height:auto">
								<?php }
							 ?>
                           <!-- <div class="profile-hvr m-t-15">
                                <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                                <i class="icofont icofont-ui-delete c-pointer"></i>
                            </div>-->
                        </div>
                        <div class="card-block">
                            <h4 class="f-18 f-normal m-b-10 txt-primary"><?php echo $appointment_item['doctorName']; ?></h4>
                            <h5 class="f-14"><?php echo $arrHealthStaffType[$staff_item['staffType']];?>
                            
                            </h5>
                           
                            <ul>
                            
                            	 
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-telephone"></i>
                                   <?php echo $appointment_item['doctorMobile']; ?>
                                </li>
                               
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-email"></i>
                                    <?php echo $appointment_item['doctorEmail']; ?>
                                </li>
                            </ul>
                            
                            <div class="faq-profile-btn">
                                <button type="button" class="btn  btn-mini btn-primary waves-effect waves-light" onclick="Cancel();" >Cancel </button>
                            </div>                   

                        </div>
                    </div>
                    <!-- end of card-block -->
                    
                    <!-- end of card -->
                </div>
                <!-- end of col-lg-3 -->

                <!-- start col-lg-9 -->
                <div class="col-xl-9 col-lg-8">
                    <!-- Nav tabs -->
                    
                    <!-- end of tab-header -->

                  
                            <div class="card">
                                <div class="card-header"><h5 class="card-header-text">View Details</h5>
                                    
                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                 <tr>
                                                                    <th scope="row">Doctor name</th>
                                                                    <td><?php echo $appointment_item['doctorName']; ?></td>
                                                                </tr>
                                                               
                                                                <tr>
                                                                    <th scope="row">Requested date</th>
                                                                    <td><?php echo changeDateFormat($appointment_item['requestDate']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Appointment date</th>
                                                                    <td><?php echo changeDateFormat($appointment_item['appointmentDate']); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Start Time</th>
                               <td><?php echo date('h:i:s a',strtotime($appointment_item['appointmentStartTime']));?></td>
                                                                </tr>
                                                                 <tr>
                                                                    <th scope="row">Created date</th>
                                                                    <td><?php echo date('h:i:s a d/m/Y', strtotime($appointment_item['insDate'])); ?></td>
                                                                </tr>
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->

                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table">
                                                                <tbody>
                                                             
                                                             
                                                                 <tr>
                                                                    <th scope="row">Patient</th>
                                                                    <td><?php echo $appointment_item['firstName']. ' '.$appointment_item['lastName']; ?></td>
                                                                </tr>
                                                                
                                                                 <tr>
                                                                    <th scope="row">Requested session</th>
                                                                    <td><?php echo $appointment_item['requestSession']; ?></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th scope="row">Appointment session</th>
                                                                    <td><?php echo $appointment_item['appointmentSession']; ?></td>
                                                                </tr>
                                                                
                                                                 <tr>
                                                                    <th scope="row">End Time </th>
                          <td><?php echo date('h:i:s a',strtotime($appointment_item['appointmentEndTime'])); ?></td>
                                                                </tr>
                                                                
                                                                
                                                               
                                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        
                                    <!-- end of view-info -->

                                    
                                    <!-- end of view-info -->
                                </div>
                                <!-- end of card-block -->
                            </div>
                            <!-- end of card-->

                            
                            <!-- end of row of education and experience  -->

                            
                            <!-- end of row -->
                        </div>
                       

                    </div>
                    <!-- end of main tab content -->
                </div>
            </div>
 	</div>
</div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

   	<!-- Required Jqurey -->
	<script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/tether.min.js"></script>
    
    <!-- Required Fremwork -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    
    <!-- waves effects.js -->
    <script src="<?php echo base_url()?>assets/plugins/waves/js/waves.min.js"></script>
    
    <!-- Scrollbar JS-->
    <script src="<?php echo base_url()?>assets/plugins/slimscroll/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/slimscroll/js/jquery.nicescroll.min.js"></script>
    
    <!--classic JS-->
    <script src="<?php echo base_url()?>assets/plugins/search/js/classie.js"></script>
    
    <!-- notification -->
    <script src="<?php echo base_url()?>assets/plugins/notification/js/bootstrap-growl.min.js"></script>
    
    <!--Rating js -->
    <script src="<?php echo base_url()?>assets/plugins/rating/js/jquery.barrating.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/rating/js/rating.js"></script>
    
    <!-- Quality Code slick Slider -->
    <script src="<?php echo base_url()?>assets/js/slick.min.js"></script>
    
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/pages/product-detail.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/pages/elements.js"></script>
    <script src="<?php echo base_url()?>assets/js/menu-horizontal.js"></script>


  </body>

</html>
