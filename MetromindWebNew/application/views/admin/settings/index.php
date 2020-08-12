<?php $includePath = base_url(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Metro mind</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="BSTC">
	<meta name="description" content="BSTC"> 
	<meta name="keywords" content="BSTC">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/icon/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/icon/ion-icon/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/charts/chartlist/css/chartlist.css" type="text/css" media="all">
    <link href="<?php echo base_url();?>assets/css/svg-weather.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/color/color-1.css" id="color"/>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datepicker/css/bootstrap-material-datetimepicker.css" /> 

	<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/tether.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/waves/js/waves.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/search/js/classie.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/notification/js/bootstrap-growl.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/charts/sparkline/js/jquery.sparkline.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/countdown/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/countdown/js/jquery.counterup.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/pages/elements.js"></script>
    <script src="<?php echo base_url();?>assets/js/menu-horizontal.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datepicker/js/moment-with-locales.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/form-wizard.js"></script>
    <script language="javascript" src="<?php echo base_url();?>scripts/axCommon.js"></script>
 
</head>
<body class="horizontal-fixed fixed">
	<?php   include APPPATH.'views/admin/includes/header.php';?>
     
  <!--   <script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>-->


<div class="content-wrapper">
    <div class="container-fluid">
      	<div class="row">
        	<div class="col-sm-12 p-0">
          		<div class="main-header">
            		<h4>					
Edit Setting	 
					</h4>
				<ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                 <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard"><i class="icofont icofont-home"></i></a></li>
                   	
                  		<li class="breadcrumb-item">
                 			<a href="#">
						  Edit Setting
                          </a>
                  	</li>
                </ol>
     		</div>
    	</div>
  	</div>
  	<div class="row"> 
    		<div class="col-lg-12" >
      			<div class="card">
        			<p class="text-center m-t-md"></p>
        			<div class="card-block">
        				  <?php if ($this->session->flashdata('success')) { ?>
                    <p style="color:green; font-size:18px; text-align:center"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
					<?php echo validation_errors(); ?>
					<?php echo form_open_multipart(base_url('admin/settings/index/'.$setting_item['settingId'])); ?>
                       
            
                            <input name="clsaxBanner_returnUrl" value="<?php //echo $clsaxBanner->returnUrl?>" type="hidden">
            
                            <input name="clsaxBanner_action" value="" type="hidden">
            
                            <input name="clsaxBanner_bannerId" value="<?php //echo $clsaxBanner->bannerId?>" type="hidden">                                
            				
            
                           
            
                            
            
                            <div class="col-md-4 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Admin Email</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control"  name="adminEmail"  value="<?php echo $setting_item['adminEmail']; ?>" aria-required="true" type="text" required>
            
                                    </div>
            
                                </div>
            
                            </div>
            
                                
            
                            <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Hospital name</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control"  name="hospitalName"  aria-required="true" value="<?php echo $setting_item['hospitalName']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>
                            
                            
                             <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Hospital Adderss</label>
            
                                   <div class="col-sm-10">					
            
                                       <textarea class="form-control" rows="4"  name="hospitalAddress"  aria-required="true"  type="text" ><?php echo $setting_item['hospitalAddress']; ?></textarea>
           
                                    </div>
            
                                </div>
            
                            </div>
                            
                            <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Website</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control" name="hospitalWebsite"  aria-required="true" value="<?php echo $setting_item['hospitalWebsite']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Phone number</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control" name="hospitalPhone"  aria-required="true" value="<?php echo $setting_item['hospitalPhone']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>
                            
                            <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Email</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control" name="hospitalEmail"  aria-required="true" value="<?php echo $setting_item['hospitalEmail']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>
                            
                             <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Default session duration</label>
            
                                   <div class="col-sm-10">					
            
                                       <input class="form-control" name="defaultSessionDuration"  aria-required="true" value="<?php echo $setting_item['defaultSessionDuration']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>

                            <div class="col-md-4 " style="margin-top:20px;" > 
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label">Trail duration</label>
            
                                   <div class="col-sm-10">          
            
                                       <input class="form-control" name="traillDuration"  aria-required="true" value="<?php echo $setting_item['traillDuration']; ?>" type="text" required>
           
                                    </div>
            
                                </div>
            
                            </div>
                            <div class="col-md-4 " style="margin-top:20px;" > 
                            <div class="form-group row ">           
                                <label for="input-rounded" class="col-sm-12 form-control-label">Image </label>
                                <div class="col-sm-12">
                                <input  name="hospitalLogo" class="form-control" value="" <?php if($setting_item['hospitalLogo'] == ""){ ?> required <?php } ?> type="file">                                    
                 <?php
                                    if($setting_item['hospitalLogo']<>"" &&  file_exists(AXUPLOADSETTINGPATH.$setting_item['hospitalLogo'])){?>
                                     <span><img src="<?php echo HTTP.AXUPLOADSETTINGPATH.$setting_item['hospitalLogo']?>" width="100px" height="auto"  /></span>
                                 <?php }?>
                                    <span class="note" style="color: #F00; " > Image resolution should be lessthan or equal to 1300*800px. The Valid Extensions are jpg  , jpeg , png .</span>
                                </div>
                            </div>
                          </div>
            
                             <div class="col-md-12" style="margin-top:20px;"> 
            
                                <div class="form-group row">
            
                                    <div class="col-sm-4">
            
                                    </div>        
            
                                    <div class="col-sm-6">
            
                                      <button type="Submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button> 
            
                                       
            
                                    </div>
            
                                </div>                                        
                            </div>  	
                        </form>
					</div>
				</div>
			</div>
     	</div>
 	</div>
</div>    
</body>
</html>