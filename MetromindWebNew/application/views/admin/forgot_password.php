<!DOCTYPE html>

<html lang="en">

  <head>

    <title>Metro Mind</title>



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

                <h3 class="text-center txt-primary">Forgot password</h3>

<?php if ($this->session->flashdata('email_sent')) { ?>

<p style="color:red; font-size:18px;" align="center"><?php echo $this->session->flashdata('email_sent');?></p>



<?php } ?>  

        <div class="card-body">

			<?php echo form_open('admin/forgot_password/ForgotPassword'); ?>

            <div class="form-group">

              <div class="form-label-group">

				<?php echo form_input(['name'=>'email','id'=>'email','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('email'),'required'=>'true']);?>

                <?php echo form_label('Enter Your Email', 'emailId'); ?>

              

              </div>

            <div class="form-group">

            </div>

		 	<?php echo form_submit(['name'=>'submit','value'=>'submit','class'=>'btn btn-primary btn-block']); ?>
            
            <div class="row">
                <div class="col-xs-12 text-right m-t-25">

                    <a href="<?php echo base_url('admin'); ?>" class="f-w-600 p-l-5"> Login</a>

                </div>
            </div>

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

    <script src="<?php //echo base_url('assets/js/common-pages.js'); ?>"></script>

    <script src="<?php echo base_url('scripts/axCommon.js'); ?>"></script>



  </body>



</html>

