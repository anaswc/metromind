<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> Category</title>
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
</head>

<body class="horizontal-fixed fixed">
	<?php include APPPATH . 'views/admin/includes/header.php'; ?>
	<script>
		function Cancel() {
			document.location.href = "<?php echo base_url('admin/category'); ?>";
		}
		function validateTitle(title) {
			var formData = new FormData();
			formData.append('title', title);
			$.ajax({
				url: "<?php echo base_url(); ?>admin/category/checkTitle",
				type: "POST", 
				data: {
					title: title
				}, 
				dataType: "JSON",
				success: function(data) {
					if (data == 0) {
						alert("Title already exist!");
						document.getElementById('title').value = "";
						return false;
					} else {
						return true;
					}
				}
			});
		}
	</script>
	<div id="wrapper">
		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="col-sm-12 p-0">
					<div class="main-header">
						<h4>Category </h4>
						<ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
							<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Edit Category</a></li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<p class="text-center m-t-md"></p>
							<div class="card-block">
								<?php if ($this->session->flashdata('success')) { ?>
									<div class="text-center success"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<?php if ($this->session->flashdata('error')) { ?>
									<div class='text-center error'><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php echo validation_errors(); ?>
								<?php //echo form_open_multipart('admin/adminuser/create'); 
								?>
								<form name="frmvideoCreate;" action="<?php echo base_url('admin/category/create'); ?>" method="post" accept-charset="utf-8" onSubmit="return validateTitle();">
									<div class="col-md-12 col-xs-12">
										<div class="form-group row">
											<label for="input-rounded" class="col-sm-12 form-control-label">Title<span class="mandatory">*
												</span> </label>
											<div class="col-sm-6">
												<input type="text" name="title" id="title" value="" class="form-control" required  onBlur="validateTitle(this.value)">
												<input type="hidden" name="status" id="status"  class="form-control" required  value="1">
											</div>
										</div>
									</div>
									<div class="col-md-12"></div>
									<div class="col-md-12 col-xs-12">
										<div class="form-group row">
											<div align="center">
												<button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
												<button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();">Cancel</button></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
			<!-- Sticky Footer -->
			<?php include APPPATH . 'views/admin/includes/footer.php'; ?>
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
	<script>
		$(function() {
			$("#dateExp").datepicker();
		});
	</script>
	<script>
		$(function() {
			$("#datePaid").datepicker();
		});
	</script>
	<script type="text/javascript">
		function checkSeouri(val) {
			var a = document.getElementById(val.id).value
			var seourl = a.replace(/ /g, '-');
			document.getElementById("seoUri").value = seourl
		}
	</script>
</body>
</html>