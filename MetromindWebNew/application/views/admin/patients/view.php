<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-View patient</title>
	
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
        document.location.href="<?php echo base_url('admin/patients'); ?>";
    }
    </script> 
    
	<div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <!-- Main content starts -->
            <div>
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="main-header">
                            <h4><?php echo $this->patients_model->firstName?></h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/patients'); ?>">Patient Details</a>
                                </li>
                                <li class="breadcrumb-item"><?php echo $this->patients_model->firstName?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
                <div class="row"> 
                    <div class="col-lg-8"style="margin-left: 204px;" >
                        <div class="card">
                            <div class="card-block">
                              
                                <div class="row">
                                    <div class="col-lg-5 col-xs-12">
                                        <div class="port_details_all_img row">
                                            <div class="col-lg-12">
                                                <div id="big_banner">
                                                	<?php if($this->patients_model->profileImgUrl<>"" &&  file_exists(AXUPLOADPATIENTSPATH.$this->patients_model->profileImgUrl)){?>
                                                    <div class="port_big_img">
                                                    <a href="<?php echo $this->patients_model->profileImgUrl;?>"></a>
                                                        <img class="img img-fluid" src="<?php echo HTTP.AXUPLOADPATIENTSPATH.$this->patients_model->profileImgUrl?>" alt="Big_ Details"></a>
                                                    </div>
                                                    <?php } ?>
                                                   
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                                        <div class="row">
                                            <div>
                                            <div class="col-lg-12">
											<table>
											<tr>
											<td>
                                                 <span class="txt-muted"> Patient Name  </td><td>:<?php echo $this->patients_model->firstName." ".$this->patients_model->lastName?> </span>
                                                  </td>
												  </tr>
                                                </div>
                                               
                                               <div class="col-lg-12">
                                                 <tr>
											<td>  
                                                 <span class="txt-muted"> Id </td><td>: <?php echo $this->patients_model->uniqueId?> </span>
                                                   </td>
												  </tr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <tr>
											<td>
                                                 <span class="txt-muted"> Email </td><td>: <?php echo $this->patients_model->patientEmail?> </span>
                                                   </td>
												  </tr>
                                                </div>

                                                 <div class="col-lg-12">
                                                    <tr>
                                            <td>
                                                 <span class="txt-muted"> Password </td><td>: <?php echo $this->encryption->decrypt($this->patients_model->patientPassword)?> </span>
                                                   </td>
                                                  </tr>
                                                </div>
                                                <div class="col-lg-12">
                                                    <tr>
											<td>
                                                 <span class="txt-muted"> Address </td><td>: <?php echo $this->patients_model->patientAddress?> </span>
                                                   </td>
												  </tr>
                                                </div>
                                                 <!--<div class="col-lg-12">
                                                 <span class="txt-muted"> Password </td><td>: <?php echo $this->patients_model->patientPassword?> </span>
                                                  
                                                </div>-->
                                                <div class="col-lg-12">
                                                    <tr>
											<td>
                                                <span class="txt-muted"> Phone Number</td><td>: <?php echo $this->patients_model->patientMobile?> </span>
                                                    </td>
												  </tr>
                                                </div>
                                                <div class="col-lg-12">
                                                <tr>
											<td>
                                                    <span class="txt-muted"> Age </td><td>: <?php echo $this->patients_model->birthDate?> </span>
                                                     </td>
												  </tr>
                                                </div>
                                                 <div class="col-lg-12">
                                                <tr>
											<td>
                                                    <?php $gender=$this->patients_model->gender;
													
													?>
                                                     <span class="txt-muted"> Gender </td><td>: <?php if($gender==1) {echo "Male";}else{echo "Female";}?> </span>
                                                      </td>
												  </tr>
                                                     
                                                </div>
                                         <div class="col-lg-12">
                                                
                                                <tr>
											<td>    
                                                     <span class="txt-muted"> Created Date & Time </td><td>: <?php echo $this->patients_model->createdDate?> </span>
                                            
                                                </div>
                                                 
                                                </td>
                                                </tr></table>
                                                
                                               
                                                
                                                <div align="right"> 
                            
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >back</button></div>
                          </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nav tabs -->
                        
                        
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid ends -->
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
