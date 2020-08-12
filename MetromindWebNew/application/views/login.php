<!DOCTYPE html>

<html lang="en">

<head>

	<title>Health Care </title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<meta name="description" content="">

	<meta name="keywords" content="">

	<meta name="author" content="">

    

    <?php echo link_tag('assets/images/favicon.png'); ?>

    <?php echo link_tag('assets/images/favicon.ico'); ?>

    <?php echo link_tag('assets/css/font-awesome.min.css'); ?>

    <?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>

    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>

    <?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?>

    <?php echo link_tag('assets/css/main.css'); ?>

    <?php echo link_tag('assets/css/responsive.css'); ?>

    <?php echo link_tag('assets/css/color/color-1.css'); ?>

   <script src="<?php echo base_url('scripts/axCommon.js'); ?>"></script>

  	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script> 

</head>

<body>





<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

	<div class="container-fluid">

		<div class="row">



			<div class="col-sm-12">

				<div class="login-card card-block">

                     <form name="frmOperator" id="wizardForm" class="md-float-material" method="post" enctype="multipart/form-data"  action="login/userlogin" onSubmit="return validateData()">

                      <input type="hidden" name="clsaxLogin_submitted" value="">

                      <input type="hidden" name="clsaxLogin_returnUrl" value="">

						<div class="text-center">

							<img src="<?php echo base_url()?>assets/images/logo-blue.png">

						</div>

						<h3 class="text-center txt-primary">

							Sign In to your account

						</h3>

                        

                        <?php if ($this->session->flashdata('error')) { ?>

                        <p class="text-center text-md mandatory"><?php echo $this->session->flashdata('error');?></p>

                        <?php } ?>

                        <div class="text-center mandatory"><?php //echo displayMessage()?></div>

						<div class="md-input-wrapper">

							<input type="text" class="md-form-control" name="userName" id="userName" value="<?php echo set_value('userName'); ?>" required placeholder="User name"/>

							<!--<label>loginEmail</label>-->

						</div>

						<div class="md-input-wrapper">

							<input type="password" class="md-form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" required placeholder="Password"/>

							<!--<label>Password</label>-->

						</div>
                        
                        <div class="md-input-wrapper">
                            <p id="image_captcha" style="text-align:center"><?php echo $captchaImg; ?></p>
                            <input placeholder="Enter Security Code" type="text"  id="security_code" name="security_code" value="" autocomplete="off"   class="md-form-control" required=""/>
						</div>
						<div class="row">

							<div class="col-sm-6 col-xs-12">

							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">

		  					</div>

								</div>

							<div class="col-sm-6 col-xs-12 forgot-phone text-right">

								<a href="<?php echo base_url('newforgotpass'); ?>" class="text-right f-w-600"> Forget Password?</a>

								</div>

						</div>

						<div class="row">

							<div class="col-xs-10 offset-xs-1">

								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>

							</div>

						</div>

						<div class="col-sm-12 col-xs-12 text-center"> 

						

						</div>



					</form>

				</div>

			</div>

		</div>

	</div>

</section>

<script>
   $(document).ready(function(){
	   $('.captcha-refresh').on('click', function(){
		   $.get('<?php echo base_url().'login/refresh'; ?>', function(data){
			   $('#image_captcha').html(data);
		   });
	   });
   });
</script>







<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>

<script src="<?php echo base_url('assets/ajax/libs/underscore.js/1.8.3/underscore-min.js'); ?>"></script>

<script src="<?php echo base_url('assets/ajax/libs/moment.js/2.10.6/moment.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>

<script src="<?php echo base_url('js/form-wizard.js'); ?>"></script>



</body>



</html>