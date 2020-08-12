<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS -View</title>
	
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
        document.location.href="<?php echo base_url('admin/cms'); ?>";
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
                            <h4><?php echo $this->cms_model->pageName?></h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/cms'); ?>">CMS Details</a>
                                </li>
                                <li class="breadcrumb-item"><?php echo $this->cms_model->pageName?>
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
                                  
                                   
                                        <div class="row" style="margin-left: 4px; >
                                            <div>
                                             <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                                                 <span class="txt-muted"> &nbsp;&nbsp; Page Name </div><div class="col-sm-10">:<?php echo $this->cms_model->pageName?> </span>
                                                  </div>
                          </div>
                        </div>
                                               
                                                 <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                                                 <span class="txt-muted"> Description </div><div class="col-sm-10">: <?php echo $this->cms_model->description?> </span>
                                                  
                                                </div>
                          </div>
                        </div>
                                                 <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div class="col-sm-2">
                                                <span class="txt-muted"> Short Description</div><div class="col-sm-10">: <?php echo $this->cms_model->shortDescription?> </span>
                                                   </div>
                          </div>
                        </div>
                                                
                                                
                                        
                                                 
                                                
                                                
                                             <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div align="center"> 
                            <br>
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
