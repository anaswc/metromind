<!DOCTYPE html>

<html lang="en">

  <head>

    <title>Admin Login</title>



<?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>

<?php echo link_tag('assets/css/bootstrap.min.css'); ?>

<?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?>

<?php echo link_tag('assets/css/main.css'); ?>

<?php echo link_tag('assets/css/responsive.css'); ?>

<?php echo link_tag('assets/css/color/color-1.css'); ?>



  </head>



<section class="login common-img-bg">

		<div class="container-fluid">

		<div class="row">

			<div class="col-sm-12">

				<div class="login-card card-block">

                <h3 class="text-center txt-primary">Admin Login</h3>

<?php if ($this->session->flashdata('error')) { ?>

<p style="color:red; font-size:18px;" align="center"><?php echo $this->session->flashdata('error');?></p>



<?php } ?>  

        <div class="card-body">

			<?php echo form_open('admin/login/loginuser');?>

            <div class="form-group">

              <div class="form-label-group">

				<?php echo form_input(['name'=>'userName','id'=>'userName','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('userName'),'required'=>'true']);?>

                <?php echo form_label('Enter Username', 'userName'); ?>

                <?php echo form_error('userName',"<div style='color:red'>","</div>");?>

              </div>

            </div>

			

            <div class="form-group">

              <div class="form-label-group">

				<?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password'),'required'=>'true']);?>

                <?php echo form_label('Password', 'password'); ?>

                <?php echo form_error('password',"<div style='color:red'>","</div>");?>

              </div>

            </div>

			 <div class="form-group">

              <div class="form-label-group text-center">

				<img class="center__block"  src="<?php echo base_url()?>Captcha/CaptchaSecurityImages?width=100&height=40&characters=5"/>

              </div>

            </div>

			 <div class="form-group">

              <div class="form-label-group">

				<?php echo form_password(['name'=>'security_code','id'=>'security_code','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('security_code'),'required'=>'true']);?>

                <?php echo form_label('Enter Security Code', 'security_code'); ?>

                <?php echo form_error('security_code',"<div style='color:red'>","</div>");?>

              </div>

            </div>

		 	<?php echo form_submit(['name'=>'login','value'=>'Login','class'=>'btn btn-primary btn-block']); ?>

        	<?php echo form_close(); ?> 

        </div>

      </div>

    </div>



   	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>

   	<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    

    <script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/common-pages.js'); ?>"></script>

    <script src="<?php echo base_url('scripts/axCommon.js'); ?>"></script>



  </body>



</html>