<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Metro Mind-Doctor Update</title>
<?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?><?php echo link_tag('assets/css/bootstrap.min.css'); ?><?php echo link_tag('assets/plugins/waves/css/waves.min.css'); ?><?php echo link_tag('assets/css/main.css'); ?><?php echo link_tag('assets/css/responsive.css'); ?><?php echo link_tag('assets/css/color/color-1.css'); ?>

<!-- Data Table Css -->

<?php echo link_tag('assets/plugins/data-table/css/dataTables.bootstrap4.min.css'); ?><?php echo link_tag('assets/plugins/data-table/css/buttons.dataTables.min.css'); ?><?php echo link_tag('assets/plugins/data-table/css/responsive.bootstrap4.min.css'); ?><?php echo link_tag('assets/plugins/data-table/css/jquery-ui-1.12.0/jquery-ui.css'); ?>
</head>

<body  class="horizontal-fixed fixed">
<?php include APPPATH.'views/admin/includes/header.php';?>
<script>

function Cancel(){

	document.location.href="<?php echo base_url('admin/doctor'); ?>";

}

</script>
<div id="wrapper">
<div id="content-wrapper">
  <div class="container-fluid">
    <div class="col-sm-12 p-0">
      <div class="main-header" style="margin-left: 275px">
        <h4>Doctor</h4>
        <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Edit Doctor</a></li>
        </ol>
      </div>
    </div>
    <div class="row" style="margin-left: 275px;margin-right: 275px;">
      <div class="col-lg-12" >
        <div class="card">
          <p class="text-center m-t-md"></p>
          <div class="card-block">
            <?php if ($this->session->flashdata('success')) { ?>
            <div class="text-center success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
            <div class='text-center error'><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
            <div align="left"><strong><strong>Add Availability</strong></strong></div>
            <br>
            <div class="row">
              <div class="col-lg-12" >
                <div class="card" >
                  <p class="text-center m-t-md"></p>
                  <div class="card-block">
                    <?php 
					global $arrWeekDay,$arrSessions,$arrTime;
					$value=$day;
					?>
                    <form name="frmoavailability" action="<?php echo base_url('admin/doctor/updateAvailability/'.$doctor_item['doctorId'].'/'.$value);?>"  method="post" accept-charset="utf-8" onSubmit="return validateTime();">
                      <input type="hidden" name="availableDay" value="<?php echo $value ?>">
                      <input type="hidden" name="doctorId" value="<?php echo $doctor_item['doctorId'] ?>">
                      <div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group row ">
                          <div class="col-md-8">
                            <label for="checkbox5"><strong>Morning </strong></label>
                          </div>
                        </div>
                      </div>
                      	<?php 
						$morning=array();
						$morning=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"Morning");
						?>
                      <div class="col-md-6 "  >
                        <div class="form-group row">
                          <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
                          <div class="col-sm-10">
                            <select name="Morning_Start" id="Morning_Start" class="form-control" >
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <
                              <option value="<?php echo $value1 ?>" <?php  if($morning['availableDay']==$value && $morning['availableSession']=="Morning" && $morning['availableStartTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 " >
                        <div class="form-group row">
                          <label for="input-rounded" class="col-sm-12 form-control-label"> End  Time </label>
                          <div class="col-sm-10">
                            <select name="Morning_End" id="Morning_End" class="form-control" >
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <option value="<?php echo $value1 ?>" <?php  if($morning['availableDay']==$value && $morning['availableSession']=="Morning" && $morning['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group row ">
                          <div class="col-md-8">
                            <label for="checkbox5"> <strong>After Noon </strong></label>
                          </div>
                        </div>
                      </div>
                      	<?php 
						$noon=array();
						$noon=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"After Noon");
						?>
                      <div class="col-md-6 " >
                        <div class="form-group row">
                          <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
                          <div class="col-sm-10">
                            <select name="AfterNoon_Start" id="AfterNoon_Start" class="form-control" >
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <option value="<?php echo $value1 ?>"

                                         <?php  if($noon['availableDay']==$value && $noon['availableSession']=="After Noon" && $noon['availableStartTime']==$value1 ){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="input-rounded" id class="col-sm-12 form-control-label"> End  Time </label>
                          <div class="col-sm-10">
                            <select name="AfterNoon_End" id="AfterNoon_End" class="form-control" >
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <option value="<?php echo $value1 ?>" <?php  if($noon['availableDay']==$value && $noon['availableSession']=="After Noon" && $noon['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12" style="margin-top:10px;">
                        <div class="form-group row ">
                          <div class="col-md-8">
                            <label for="checkbox5"><strong> Evening</strong> </label>
                          </div>
                        </div>
                      </div>
                      <?php 
						$evening=array();
						$evening=$this->doctor_model->getItem_morning($doctor_item['doctorId'],$value,"Evening");
					  ?>
                      <div class="col-md-6 " >
                        <div class="form-group row">
                          <label for="input-rounded" class="col-sm-12 form-control-label"> Start Time </label>
                          <div class="col-sm-10">
                            <select name="Evening_Start" id="Evening_Start" class="form-control">
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <option value="<?php echo $value1 ?>" <?php  if($evening['availableDay']==$value && $evening['availableSession']=="Evening" && $evening['availableStartTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group row">
                          <label for="input-rounded" class="col-sm-12 form-control-label"> End  Time </label>
                          <div class="col-sm-10">
                            <select name="Evening_End" id="Evening_End" class="form-control" >
                              <option value="">--Select--</option>
                              <?php foreach ($arrTime as $key1 => $value1) {?>
                              <option value="<?php echo $value1 ?>" <?php  if($evening['availableDay']==$value && $evening['availableSession']=="Evening" && $evening['availableEndTime']==$value1){?> selected='selected' <?php } ?>><?php echo $value1 ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>  
                      <div class="col-md-12" style="margin-top:20px;">
                      <div class="form-group row">
                        <div align="center">
                          <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                          <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onClick="Cancel();" >Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Sticky Footer -->
    
    <?php include APPPATH.'views/admin/includes/footer.php';?>
  </div>
  
  <!-- /.content-wrapper --> 
  
</div>

<!-- /#wrapper --> 

<!-- Scroll to Top Button--> 

<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a> 
<script type="text/javascript">

  

function validateTime()

{



var frm=document.frmoavailability;



  var morningStart=document.getElementById("Morning_Start").value;

  var morningEnd=document.getElementById("Morning_End").value;

  var noonStart=document.getElementById("AfterNoon_Start").value;

  var noonEnd=document.getElementById("AfterNoon_End").value;

  var evngStart=document.getElementById("Evening_Start").value;

  var evngEnd=document.getElementById("Evening_End").value;

  var nightStart=document.getElementById("Night_Start").value;

  var nightEnd=document.getElementById("Night_End").value;





if(morningStart=='' && morningEnd=='' && noonStart=='' && noonEnd=='' &&  evngStart=='' && evngEnd=='' && nightStart=='' && nightEnd=='')

{

  alert("Please select atleast one session!");

frm.Morning_End.focus();

  return false;

}





if(morningStart!='' && morningEnd!='' && morningStart>=morningEnd)

{

  alert("Morning Start Time should be less than Morning end time ");

   frm.Morning_End.focus();

    return false;

}



if(morningStart=='' && morningEnd!='')

{

  alert("Plase select  Morning Start time");

  frm.Morning_End.focus();

  return false;

}

if(morningEnd=='' && morningStart!='')

{

  alert("Plase select  Morning End time");

  frm.Morning_End.focus();

  return false;

}



///morning section end/////////////

if(noonStart!='' && noonEnd!='' && noonStart>=noonEnd)

{

  alert(" After noon Start Time should be less than end time ");

    frm.AfterNoon_End.focus();

    return false;

}



if(noonStart=='' && noonEnd!='')

{

  alert("Plase select  Noon Start time");

  frm.AfterNoon_Start.focus();

  return false;

}

if(noonEnd=='' && noonStart!='')

{

  alert("Plase select  Noon End time");

  frm.AfterNoon_End.focus();

  return false;

}



////noon end//////////////

if(evngStart!='' && evngEnd!='' && evngStart>=evngEnd)

{

  alert("Evening Start Time should be less than end time ");

   frm.Evening_End.focus();

    return false;

}



if(evngStart=='' && evngEnd!='')

{

  alert("Plase select  Evening Start time");

  frm.Evening_Start.focus();

  return false;

}

if(evngEnd=='' && evngStart!='')

{

  alert("Plase select  Evening End time");

  frm.Evening_End.focus();

  return false;

}



/////Evening end//////////////



if(nightStart!='' && nightEnd!='' && nightStart>=nightEnd)

{

  alert("Start Time should be less than end time ");

   frm.Night_End.focus();

    return false;

}



if(nightStart=='' && nightEnd!='')

{

  alert("Plase select  Night Start time");

  frm.Night_Start.focus();

  return false;

}

if(nightEnd=='' && nightStart!='')

{

  alert("Plase select  Night End time");

  frm.Night_End.focus();

  return false;

}

/////Night End////////









if(noonEnd>evngStart && noonEnd!='' && evngStart!='')

{

  alert("Noon end should be less than Evening start time ");

    frm.Evening_Start.focus();

    return false;

}

if(evngEnd>nightStart && evngEnd!='' && nightStart!='')

{

  alert("Evening end Time should be less than Night start time ");

    frm.Night_Start.focus();

    return false;

}

if(morningEnd>noonStart && morningEnd!='' && noonStart!='')

{

  alert("Morning Time should be less than After noon endtime ");

   frm.AfterNoon_Start.focus();

    return false;

}

if(morningEnd>evngStart && morningEnd!='' && evngStart!='')

{

  alert("Morning end should be less than evening start");

  frm.Evening_Start.focus();

  return false;

}

if(morningEnd>nightStart && morningEnd!='' && nightStart!='')

{

  alert("Morning end should be less than night start");

  frm.AfterNoon_Start.focus();

  return false;

}

if(noonEnd>evngStart && noonEnd!='' && evngStart!='')

{

  alert("Noon end should be less than Evening start");

  frm.Evening_Start.focus();

  return false;

}

if(noonEnd>nightStart && noonEnd!='' && nightStart!='')

{

  alert("Noon end should be less than night start");

  frm.AfterNoon_Start.focus();

  return false;

}

if(evngEnd>nightStart && evngEnd!='' && nightStart!='')

{

  alert("Evening end should be less than night start");

  frm.Night_Start.focus();

  return false;

}



return true;

}







</script> 
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/pages/elements.js'); ?>"></script> 

<!-- <script src="<?php echo base_url('assets/js/common-pages.js'); ?>"></script>--> 

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
</body>
</html>
