<!DOCTYPE html>
<html lang="en">

  <head>

<title>Admin - Dashboard</title>

<?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?> <?php echo link_tag('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?> 
<?php echo link_tag('assets/icon/ion-icon/css/ionicons.min.css'); ?> <?php echo link_tag('assets/css/bootstrap.min.css'); ?> 
<?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?> <?php echo link_tag('assets/css/main.css'); ?> 
<?php echo link_tag('assets/css/responsive.css'); ?> <?php echo link_tag('assets/css/color/color-1.css'); ?> 
<!-- Data Table Css -->
<?php echo link_tag('assets/plugins/data-table/css/dataTables.bootstrap4.min.css'); ?> 
<?php echo link_tag('assets/plugins/data-table/css/buttons.dataTables.min.css'); ?> 
<?php echo link_tag('assets/plugins/data-table/css/responsive.bootstrap4.min.css'); ?> 

  </head>

  <body class="horizontal-fixed fixed">
       <?php include APPPATH.'views/admin/includes/header.php';?>


    
   <div class="content-wrapper"> 
    <div class="container-fluid">

      <div class="row">
        <div class="main-header">
          <h4>Dashboard</h4>
        </div>
      </div>
      
    <!--  <div class="row m-b-30 dashboard-header"> 
	<a href="<?php echo base_url('admin/settings')?>">
      <div class="col-lg-3"> 
        <div class="bg-primary dashboard-primary"> 
          <div class="sales-primary"> <i class="icofont icofont-settings-alt"></i>
            <div class="f-right"> 
              <h2 class="counter"></h2>
              <span>Settings</span> </div>
          </div>
          <div class="customchart-primary">
		  <canvas width="474" height="75" style="display: inline-block; width: 474.725px; height: 75px; vertical-align: top; margin-bottom: -2px; margin-left: -2px;"></canvas>
</div>
        </div>
      </div>
	  </a>-->
	  <a href="<?php echo base_url('admin/specialities')?>">
      <div class="col-lg-3"> 
        <div class="bg-primary dashboard-success"> 
          <div class="sales-success"> <i class="icofont icofont-stethoscope"></i>
            <div class="f-right"> 
              <h2 class="counter"></h2>
              <span>Speciality</span> </div>
          </div>
          <div class="customchart-success">
		  <canvas width="50" height="20" style="display: inline-block; width: 50px; height: 20px; vertical-align: top; margin-bottom: -2px; margin-left: -2px;"></canvas>
		  </div>
        </div>
      </div>
	   </a>
       <a href="<?php echo base_url('admin/symptom')?>">
      <div class="col-lg-3"> 
        <div class="bg-primary dashboard-success"> 
          <div class="sales-success"> <i class="icofont icofont-pulse"></i>
            <div class="f-right"> 
              <h2 class="counter"></h2>
              <span>Symptoms</span> </div>
          </div>
          <div class="customchart-success">
		  <canvas width="50" height="15" style="display: inline-block; width: 50px; height: 15px; vertical-align: top; margin-bottom: -2px; margin-left: -2px;"></canvas>
		  </div>
        </div>
      </div>
	   </a>
	    <a href="<?php echo base_url('admin/doctor')?>">
      <div class="col-lg-3"> 
        <div class="bg-primary dashboard-success"> 
          <div class="sales-success"> <i class="icofont icofont-doctor"></i>
            <div class="f-right"> 
              <h2 class="counter"></h2>
              <span>Doctor</span> </div>
          </div>
          <div class="customchart-success">
		  <canvas width="50" height="15" style="display: inline-block; width: 50px; height: 15px; vertical-align: top; margin-bottom: -2px; margin-left: -2px;"></canvas>
		  </div>
        </div>
      </div>
	   </a>
	    <a href="<?php echo base_url('admin/patients')?>">
      <div class="col-lg-3"> 
        <div class="bg-primary dashboard-success"> 
          <div class="sales-success"> <i class="icofont icofont-bed"></i>
            <div class="f-right"> 
              <h2 class="counter"></h2>
              <span>Patients</span> </div>
          </div>
          <div class="customchart-success">
		  <canvas width="50" height="15" style="display: inline-block; width: 50px; height: 15px; vertical-align: top; margin-bottom: -2px; margin-left: -2px;"></canvas>
		  </div>
        </div>
      </div>
	   </a>
	    
    </div>
  </div>
  </div>
</div>

    
   	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>
<script src="<?php echo base_url('scripts/axCommon.js'); ?>"></script>


<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/dashboard2.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/dashboard3.js'); ?>"></script>
<script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/menu-horizontal.js'); ?>"></script>
  </body>

</html>
