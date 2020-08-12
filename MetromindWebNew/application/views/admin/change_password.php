<!DOCTYPE html>
<html lang="en">
<head>
    <title>Metro Mind</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    
    <?php echo link_tag('assets/images/favicon.png'); ?>
    <?php echo link_tag('assets/images/favicon.ico'); ?>
    <?php echo link_tag('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'); ?>
    <?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>
    <?php echo link_tag('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/plugins/charts/chartlist/css/chartlist.css'); ?>
    <?php echo link_tag('assets/css/svg-weather.css'); ?>
    <?php echo link_tag('assets/css/main.css'); ?>
    
    <?php echo link_tag('assets/css/responsive.css'); ?>
    <?php echo link_tag('assets/css/color/color-1.css'); ?>
    
    <script src="<?php echo base_url('assets/plugins/charts/echarts/js/echarts-all.js'); ?>"></script>
  
</head>
<body class="horizontal-fixed fixed">
<?php include_once(VIEWPATH."admin/includes/header.php"); ?>


<div id="wrapper">


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <!--<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('admin/Dashboard'); ?>">Admin</a>
            </li>
            <li class="breadcrumb-item active">Change Password</li>
          </ol>-->

          <!-- Page Content --><br><br>
           <div class="card">
                            <div class="card-header">
                            <h5 class="card-header-text">
                            Change Password
                            </h5>
              <div class="card-block">
         
<!---- Success Message ---->
<?php if ($this->session->flashdata('success')) { ?>
<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
</div>
<?php } ?>

<!---- Error Message ---->
<?php if ($this->session->flashdata('error')) { ?>
<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
<?php } ?> 



 <?php echo form_open('admin/Change_password');?>

     <div class="form-group">     
    <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
<?php echo form_password(['name'=>'currentpassword','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('currentpassword')]);?>
<?php echo form_label('Current Password', 'currentpassword'); ?>
<?php echo form_error('currentpassword',"<div style='color:red'>","</div>");?>
                  </div>
                </div>
              </div>
            </div>

        <div class="form-group">     
    <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
<?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password')]);?>
<?php echo form_label('New Password', 'password'); ?>
<?php echo form_error('password',"<div style='color:red'>","</div>");?>
                  </div>
                </div>
              </div>
            </div>
      <div class="form-group">         
   <div class="form-row">             
                <div class="col-md-4">
                  <div class="form-label-group">
<?php echo form_password(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('confirmpassword')]);?>
<?php echo form_label('Confirm Password', 'confirmpassword'); ?>
<?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
                  </div>
                </div>
              </div>
            </div><br><br>

     <div class="form-group">         
   <div class="form-row">             
                <div class="col-md-3">
 <?php echo form_submit(['name'=>'chnagepwd','value'=>'Change','class'=>'btn btn-primary btn-block']); ?>
 
</div>
</div>
</div>
</div></div></div>

 <?php echo form_close();?>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
   <?php /*?>  <?php include APPPATH.'views/admin/includes/footer.php';?>
<?php */?>
      </div>


	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/slimscroll/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/slimscroll/js/jquery.nicescroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/search/js/classie.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/notification/js/bootstrap-growl.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts/sparkline/js/jquery.sparkline.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/countdown/js/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/countdown/js/jquery.counterup.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/pages/dashboard.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/menu-horizontal.js'); ?>"></script>

</body>
</html>