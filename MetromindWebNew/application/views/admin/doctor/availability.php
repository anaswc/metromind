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


<script src="https://cdnjs.cloudflare.com/ajax/libs/fecha/2.3.1/fecha.min.js"></script>
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
                      <input type="hidden" name="doctorSessionDuration" value="<?php echo $doctor_item['doctorSessionDuration'] ?>">

                     <!--   <div class="col-md-12">
                             <h6>IST – India Standard Time</h6>
                             </div>
                       -->
                      

<!--######################################################################  -->
 <div class="col-md-12 ">
                        <div class="form-group row">
<div class="">
    <table id="myTable" class=" table order-list">
  
    <tbody>
        <tr>
            <td class="col-md-8">
<div class="form-group row">
   
   <div class="col-md-6">
    <label for="input-rounded" class="col-sm-12 form-control-label"> Select Time </label>
      <?php
         $selectedTime = "9:00";
         
         $time = strtotime($selectedTime);
         


        
         
         ?>
         <input type="time" name="availabletime[]" id="1"  class="form-control" value="09:00:00" required onBlur="checktime(this.id)">
         <!-- <input type="time" name="availabletime[]" id="1" min="08:59:00" max="20:59:00" class="form-control" value="09:00:00" required onBlur="checktime(this.id)"> -->
  
   </div>

   <div class="col-md-6">
    <label for="input-rounded" class="col-sm-12 form-control-label"> End Time </label>
     
         <input type="text" disabled class="form-control" id="endtime1" value="<?php echo date("H:i A", strtotime('+'.$doctor_item['doctorSessionDuration'].' minutes', $time));?>" >
  
   </div>
</div>
            </td>
         
           
            <td class="col-md-2"><a class="deleteRow"></a>

            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add new Time" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
</table>
</div>
</div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $(document).ready(function () {
    var counter = 2;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><div class="form-group row"><div class="col-md-6"><label for="input-rounded" class="col-sm-12 form-control-label">Select Time</label><input type="time" name="availabletime[]" id="'+counter+'" class="form-control" value="09:00:00" required onBlur="checktime(this.id)"></div><div class="col-md-6"><label for="input-rounded" class="col-sm-12 form-control-label"> End Time </label><input type="text" disabled class="form-control" id="endtime'+counter+'" ></div></div></td>';
       
       
        cols += '<td><label for="input-rounded" class="col-sm-12 form-control-label">Action</label><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});
function checktime(id)
{
  //alert($("#"+id).val())
  // $("#endtime"+id).val($("#"+id).val());
  var timeString=($("#"+id).val());

  var upt=GetEndDate(timeString)


  const timeString12hr = new Date('1970-01-01T' + upt + 'Z')
  .toLocaleTimeString({},
    {timeZone:'UTC',hour12:true,hour:'numeric',minute:'numeric'}
  );


  

  $("#endtime"+id).val(timeString12hr);

}

function GetEndDate(start_date){ // start_date = "05-25-2017 05:00"
    var duration = <?php echo $doctor_item['doctorSessionDuration'];?>;
    var d = fecha.parse(start_date, 'HH:mm');

    d.setMinutes(d.getMinutes() + duration);
    return fecha.format(d, 'HH:mm');;
}






// ===========================
function validateTime()
{
 var timelist = document.forms[0].elements["availabletime[]"];
 if(timelist.length==undefined)
 {
  return true;
 }
 else{
 
  for (var i = 0, len = timelist.length; i < len; i++) {
    var j=0
    while(j<i)
    {

    if(timelist[i].value<GetEndDate(timelist[j].value))
    {
      alert("Can't add time in another session slot")
      return false;
    }




      if(timelist[i].value==timelist[j].value)
    {
      alert("Duplicate time found")
      return false;
    }

      j=j+1;
    }
    
}


 }
 


}


</script>










<!--##################################################################  -->

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
