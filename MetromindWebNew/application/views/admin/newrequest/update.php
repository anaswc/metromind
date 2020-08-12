<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Appointment Update</title>

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


<script type="text/javascript">

function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0].substring(0), // get only two digits
  month = datePart[1], day = datePart[2];

  return day+'/'+month+'/'+year;
}

function checkAvailability(doctorId){
	
	
  var doctorId=document.getElementById('doctorId').value;
  var appointmentDate=document.getElementById('appointmentDate').value;
  
  
    
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/appointment/get_doctorAppoinments", 
            type: "POST",             // Type of request to be send, called as method
            data : {doctorId:doctorId,appointmentDate:appointmentDate}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {   

             //alert(JSON.stringify(data));   
                var html = '';
				
					
					
					
					 html +='<div class="card" >'
                            html +='<div class="card-header">'
                               html +=' <h5 class="card-header-text"><i class="icofont icofont-ui-note"></i> Doctor Appoinments  ('+formatDate(appointmentDate)+')</h5>'
                            html +='</div>'
							if(data.length>0){
                            html +='<div class="card-block" >'
							html += '<table class="table table-borderless table-xs">'
							html += '<thead>'
                                        html += '<tr>'
                                            html += '<th>Session</th>'
                                            html += '<th>From</th>'
                                            html += '<th>To</th>'
                                           
                                        html += '</tr>'
                                        html += '</thead>'
                                    html += '<tbody>'
					for(i=0; i<data.length; i++){
						
						
				 
                                    html += '<tr>'
                                         html +='<td>'+data[i].appointmentSession+'</td>'
                                         html +='<td>'+data[i].appointmentStartTime+'</td>'
                                          html +='<td>'+data[i].appointmentEndTime+'</td>'
                                     html +='</tr>'
                                    
                                    
				}
				 html +='</tbody>'
                  html +='</table>'
				html +='</div>'
				}else{
					html +='<div class="card-block" >'
					html +='<span class="mandatory">Doctor have no appointments for this date !!</span>'
					html +='</div>'
					
					}
				html +='</div>'
				
                    
                     document.getElementById("appoinmentToday").innerHTML=html;
                        
            }
            
        }
    );
	
	
	checkPatient_availability();
	}
	
	function checkPatient_availability(){
		
		
  var patientId=document.getElementById('patientId').value;
  var appointmentDate=document.getElementById('appointmentDate').value;
  
  
    
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/appointment/get_patientsAppoinments", 
            type: "POST",             // Type of request to be send, called as method
            data : {patientId:patientId,appointmentDate:appointmentDate}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {   

            //alert(JSON.stringify(data));   
                var html = '';
				
					 html +='<div class="card" >'
                            html +='<div class="card-header">'
                               html +=' <h5 class="card-header-text"><i class="icofont icofont-ui-note"></i> Patient Appoinments  ('+formatDate(appointmentDate)+')</h5>'
                            html +='</div>'
							if(data.length>0){
                            html +='<div class="card-block" >'
							html += '<table class="table table-borderless table-xs">'
							html += '<thead>'
                                        html += '<tr>'
                                            html += '<th>Session</th>'
                                            html += '<th>From</th>'
                                            html += '<th>To</th>'
                                           
                                        html += '</tr>'
                                        html += '</thead>'
                                    html += '<tbody>'
					for(i=0; i<data.length; i++){
						
						
				 
                                    html += '<tr>'
                                         html +='<td>'+data[i].appointmentSession+'</td>'
                                         html +='<td>'+data[i].appointmentStartTime+'</td>'
                                          html +='<td>'+data[i].appointmentEndTime+'</td>'
                                     html +='</tr>'
                                    
                                    
				}
				 html +='</tbody>'
                  html +='</table>'
				html +='</div>'
				}else{
					html +='<div class="card-block" >'
					html +='<span class="mandatory">Patient have no appointments for this date !!</span>'
					html +='</div>'
					
					}
				html +='</div>'
				
                    
                     document.getElementById("patientAvailability").innerHTML=html;
                        
            }
            
        }
    );
		}
	
	function validateAppointment(){
		
		var morngfrom="09:00:00";
		var noonfrom="13:00:00";
		var evngfrom="16:00:00";
		var evngto="21:00:00";
		 var doctorId=document.getElementById('doctorId').value;
		 var appointmentDate=document.getElementById('appointmentDate').value;
 		 var appointmentSession=document.getElementById('appointmentSession').value;
		 var appointmentStartTime=document.getElementById('appointmentStartTime').value;
		 
		 
		 
		 
  if(appointmentDate == '' )
  {
	 alert("Choose a date for the appointment!!") ;
	 return false;
	}
	  
	  if(appointmentSession == '' )
  {
	 alert("Choose a session for the appointment!!") ;
	 return false;
	  }
	//alert(appointmentSession);  
	  
	    
		
	var apptdate=new Date(appointmentDate);
    var weekday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
    var apptDay=weekday[apptdate.getDay()];

   var flag;
    $.ajax(
        {   
            url: "<?php echo base_url(); ?>admin/appointment/get_doctorSessions", 
			async:false,
            type: "POST",             // Type of request to be send, called as method
            data : {doctorId:doctorId,apptDay:apptDay,appointmentSession:appointmentSession}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {    
			  
			if(data.length >0)
			{
				 flag=0;
			}
			else{
				flag=1;
				}
				
				checkappoinmentTime();
			}
			  
        }
    );
	if(flag ==1){
		
		alert("Doctor is not available for  "+apptDay +" " + appointmentSession);
		 return false ;}
		 
	
		 
		 
		if(appointmentSession =='Morning (IST)' ){
	
		if(appointmentStartTime >= morngfrom  && appointmentStartTime <= noonfrom){
			
			return true;
			}
			else{
				alert("Morning section starts from 09:00:00 AM");
				return false;
				}
		}	
		
		if(appointmentSession =='After Noon (IST)' ){
	
		if(appointmentStartTime >= noonfrom  && appointmentStartTime <= evngfrom){
			
			return true;
			}
			else{
				alert("After noon section starts from 01:00:00 PM");
				return false;
				}
			
		}	
 
		if(appointmentSession =='Evening (IST)' ){
	
		if(appointmentStartTime >= evngfrom  && appointmentStartTime <= evngto){
			
			return true;
			}
			else{
				alert("Evening section starts from 04:00:00 PM");
				return false;
				}
			
		}	
		
	}
		
		
function checkappoinmentTime(){
	var appointmentId=document.getElementById('appointmentId').value;
	var doctorId=document.getElementById('doctorId').value;
		 var appointmentDate=document.getElementById('appointmentDate').value;
 		 var appointmentSession=document.getElementById('appointmentSession').value;
		 var appointmentStartTime=document.getElementById('appointmentStartTime').value;
		 //alert(appointmentStartTime);
		  var result;
		
	$.ajax({
					
			url: "<?php echo base_url(); ?>admin/appointment/get_doctorappoinmentsforTime", 
			async:false,
            type: "POST",             // Type of request to be send, called as method
            data : {doctorId:doctorId,appointmentDate:appointmentDate,appointmentStartTime:appointmentStartTime,appointmentId:appointmentId}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
			if(data.length >0){
				result=0;
				}
				else
				{
					result=1;
					}
					checkPatientappointmnet();
						
			
			}
					
					});
					
		if(result == 0){
			
			alert("Doctor has another appointmnet for this time !!");
			
			event.preventDefault();
			
			}
			
			
						
					 
	}
	
	
	function checkPatientappointmnet(){
		
		
		var appointmentId=document.getElementById('appointmentId').value;
		var patientId=document.getElementById('patientId').value;
		 var appointmentDate=document.getElementById('appointmentDate').value;
 		 var appointmentSession=document.getElementById('appointmentSession').value;
		 var appointmentStartTime=document.getElementById('appointmentStartTime').value;
		 //alert(appointmentStartTime);
		  var res;
		
		$.ajax({
					
			url: "<?php echo base_url(); ?>admin/appointment/get_patientappoinmentsforTime", 
			async:false,
            type: "POST",             // Type of request to be send, called as method
            data : {patientId:patientId,appointmentDate:appointmentDate,appointmentStartTime:appointmentStartTime,appointmentId:appointmentId}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            dataType : "JSON",
            success:function(data)
            {  
			if(data.length >0){
				res=0;
				}
				else
				{
					res=1;
					}
					
			}
					});
					
					
					
			if(res == 0){
				
			alert("Patient has another appointmnet for this time !!");
			event.preventDefault();
			
			}	
		}
	</script>
    

  </head>

  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>
<div class="wrapper">
     
   

<!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <!-- Main content starts -->
            <div>
                <!-- Row Starts -->
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="main-header">
                            <h4>Edit Appoinment</h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-home"></i></a>
                                </li>
                               
                                <li class="breadcrumb-item"><a href="#">Appoinments</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Row end -->

                <!-- Task Details start -->
                <!-- Row start -->
                
                <div class="card">
                        
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Doctor Name</th>
                                            <th>Patient Name</th>
                                            <th>Requested date</th>
                                            <th>Requested session</th>
                                            <th>Appoinment date</th>
                                            <th>Appoinment session</th>
                                            <th>From</th>
                                            <th>To</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="table-active">
                                            <td>1</td>
                                           
                                            <td><?php echo $appoinment_item['doctorName']; ?></td>
                                            <td><?php echo $appoinment_item['firstName']." ".$appoinment_item['lastName'] ?></td>
                                            <td><?php echo changeDateFormat($appoinment_item['requestDate']) ?></td>
                                            <td><?php echo $appoinment_item['requestSession'] ?></td>
                                            <td><?php echo changeDateFormat($appoinment_item['appointmentDate']) ?></td>
                                            <td><?php echo $appoinment_item['appointmentSession'] ?></td>
                                            <td><?php echo date('h:i:s a',strtotime($appoinment_item['appointmentStartTime'])) ?></td>
                                            <td><?php echo date('h:i:s a',strtotime($appoinment_item['appointmentEndTime'])) ?></td>
                                        </tr>
                                        
                                       

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 push-lg-7 push-xl-8 push-md-6 task-detail-right" >
                       
                         <div class="card" id="appoinmentToday">
                           <div class="card-header">
                             <h5 class="card-header-text"><i class="icofont icofont-ui-note"></i> Doctor Appointments (<?php echo changeDateFormat($appoinment_item['appointmentDate']) ?>)</h5>
                          </div>
                           <?php if(count($doctor_availability)>0){?>
                           <div class="card-block" >
							<table class="table table-borderless table-xs">
						<thead>
                                      <tr>
                                         <th>Session</th>
                                         <th>From</th>
                                         <th>To</th>
                                           
                                       </tr>
                        </thead>
                                   <tbody>
                                   <?php foreach($doctor_availability as $row){?>
					<tr>
                                       <td><?php echo $row['appointmentSession'] ?></td>
                                       <td><?php echo date('h:i:s a',strtotime($row['appointmentStartTime'])) ?></td>
                                       <td><?php echo date('h:i:s a',strtotime($row['appointmentEndTime'])) ?></td>
                     </tr>
                                 <?php } ?>
				 				  </tbody>
                		 </table>
				</div>
                <?php
						}
						else{
						?>
                        <div class="card-block" >
                        <span class="mandatory">Doctor have no appointments for this date !!</span>
                        </div>
                        <?php } ?>
                </div>
                        
                        
                        
                        
<div class="card" id="patientAvailability">
                           <div class="card-header">
                             <h5 class="card-header-text"><i class="icofont icofont-ui-note"></i> Patient Appoinments  (<?php echo changeDateFormat($appoinment_item['appointmentDate']) ?>)</h5>
                          </div>
                          <?php if(count($patient_availability)>0){ ?>
                           <div class="card-block" >
							<table class="table table-borderless table-xs">
						<thead>
                                      <tr>
                                         <th>Session</th>
                                         <th>From</th>
                                         <th>To</th>
                                           
                                       </tr>
                        </thead>
                                   <tbody>
                                   <?php foreach($patient_availability as $row){?>
					<tr>
                                       <td><?php echo $row['appointmentSession'] ?></td>
                                       <td><?php echo date('h:i:s a',strtotime($row['appointmentStartTime'])) ?></td>
                                       <td><?php echo date('h:i:s a',strtotime($row['appointmentEndTime'])) ?></td>
                     </tr>
                                 <?php } ?>
				 				  </tbody>
                		 </table>
				</div>
                <?php } else {?>
                <div class="card-block" >
                        <span class="mandatory">Patient have no appointments for this date !!</span>
                        </div>
                        <?php } ?>
                </div>
                    </div>
                    <form name="frmAppoinment" id="frmAppoinment" method="post" action="<?php echo base_url('admin/appointment/update/'.$appoinment_item['appointmentId']) ?>" onSubmit="return validateAppointment(event)">
                    <input type="hidden" name="returnUrl" value="<?php echo $this->input->get('returnUrl')?>">

                    <div class="col-xl-8 col-lg-7 col-md-6 pull-lg-5 pull-xl-4 pull-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text"> <i class="icofont icofont-tasks-alt m-r-5"></i>Update appoinment</h5>

                               
                            </div>
                            <div class="card-block">
                                <div class="">
                                    
                                    
                                    
                                    <div class="m-b-20">
                                        
                                        <div class="table-responsive m-t-20">
                                            <table class="table m-b-0 f-14 b-solid requid-table">
                                                <thead>
                                                <tr class="text-uppercase">
                                                    <th class="text-center">Doctor</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Session</th>
                                                     <th class="text-center">Time</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody class="text-center text-muted">

                                                <tr>
                                                    <td>
                                                    
         <input type="hidden" name="appointmentId" id="appointmentId"  value="<?php echo $appoinment_item['appointmentId'] ?>">
                           <input type="hidden" name="patientId" id="patientId"  value="<?php echo $appoinment_item['patientId'] ?>">                        
                          <select name="doctorId" id="doctorId"  class="form-control"  onChange="checkAvailability(this.value)">
                                <option value="">--Select doctor--</option>
                                <?php
								
								 if(count($doctorList)>0){
									foreach($doctorList as $doc){
									 ?>
                                <option value="<?php echo $doc['doctorId'] ?>"<?php if($doc['doctorId']==$appoinment_item['doctorId']){  ?> selected <?php } ?>><?php echo $doc['doctorName'] ?></option>
                                <?php }
								}?>
                              </select>
                              </td>
<td><input type="date" name="appointmentDate" id="appointmentDate" class="form-control" min="<?php echo date('Y-m-d') ?>"  value="<?php echo $appoinment_item['appointmentDate']  ?>" required onChange="checkAvailability();"></td>
<td>

 <select name="appointmentSession" id="appointmentSession"  class="form-control" required>
                                <option value="">--Select session--</option>
                                <?php
								global $arrSessions;
								 if(count($arrSessions)>0){
									foreach($arrSessions as $key => $value){
										
									 ?>
                                <option value="<?php echo $value ?>"<?php if($value==$appoinment_item['appointmentSession']){  ?> selected <?php } ?>><?php echo $value ?></option>
                                <?php }
								}?>
                              </select>
 
 </td>
<td> <input type="time" name="appointmentStartTime" id="appointmentStartTime" min="08:59:00" max="20:59:00" class="form-control" value="<?php echo $appoinment_item['appointmentStartTime']  ?>" required></td>
                                                   

                                                </tr>
                                               
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   <div class="col-md-12 col-xs-12"  >

  <div class="form-group row">
         
        
    <div class="col-md-10">
                              
  <input type="checkbox"  name="isCredit" id="isCredit" value="1">

   <label for="checkbox5"> Allow patient credit?     
    </label>                                                
                            
                          </div>

                           
                       
                        </div>
                      </div> 
                                    
                                    
                                   <div class="col-md-12 col-xs-12">
                          <div class="form-group row">
                            <div align="center"> 
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Submit</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/newrequest'); ?>';" >Cancel</button>
                          </div></div>
                        </div> 
                         
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                    </div>
                    </form>

                </div>
                <!-- Row end -->
                <!-- Task Details end -->
            </div>
        </div>
        <!-- Container-fluid ends -->
    </div>
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
    <!--<script src="<?php// echo base_url('assets/js/common-pages.js'); ?>"></script>-->
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
