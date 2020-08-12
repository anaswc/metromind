<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prescription</title>

<?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>
<?php echo link_tag('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>
<?php echo link_tag('assets/icon/ion-icon/css/ionicons.min.css'); ?>
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




<script language="javascript">



function submitPage(){
	var frm 		= document.frmPrescriptionList;
	var	pageSize	= frm.clsaxSpeciality_pageSize.value;
	frm.action		= "<?php echo base_url()?>admin/prescription"
					+"&doctorName=<?php echo $this->prescription_model->doctorName?>"
					+"&firstName=<?php echo $this->prescription_model->firstName?>"
					+"&status=<?php echo $this->prescription_model->status?>"
					
						+"&sortDirection=<?php echo $this->prescription_model->sortDirection?>&sortColumn=<?php echo $this->prescription_model->sortColumn?>&pageSize="+pageSize;

	frm.submit();

}

function clearSearch()
{
	var frm= document.frmPrescriptionSearch;	
	zfrm.doctorName.value	= "";
	frm.firstName.value	= "";
}
function submitSearch() 



	{



		var frm									= document.frmPrescriptionSearch;	



		var doctorName						= frm.doctorName.value;
		
		var firstName							= frm.firstName.value;
		
		var status							= frm.status.value;



		frm.action								= "<?php echo base_url()?>admin/prescription"



													+"?doctorName="+doctorName+""
													
													+"&firstName="+firstName+""

													+"&status="+status+""

													+"&pageSize=<?php echo $this->pageSize?>";



		frm.submit();	



	}
</script>


  </head>
  <body  class="horizontal-fixed fixed">
    <?php include APPPATH.'views/admin/includes/header.php';?>

    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid">
            <div class="col-sm-12 p-0">
              <div class="main-header">
                    <h4>Prescription</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Prescription</a></li>
                    </ol>
                  </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-block">
                        <form name="frmPrescriptionSearch" method="post" action="" class="form-inline" onsubmit="return submitSearch();" > 
                        <input type="hidden"  name="clsaxSpeciality_submitted" value=""> 
                         	<div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="doctorName" placeholder="Doctor Name"  value="<?php echo $this->prescription_model->doctorName?>"></div>
                        <div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="firstName" placeholder="Patient Name"  value="<?php echo $this->prescription_model->firstName?>"></div>
      					<div class="form-group m-r-15"> 
					   	<select name="status" id="status" class="form-control input-rounded">
					   		<option value="" <?php  if($this->prescription_model->status==""){ echo "selected"; }?>>--select status--</option>
                           	<option value="1" <?php  if($this->prescription_model->status=="1"){ echo "selected"; }?>>Patient requested for medicine</option>
                            <option value="2" <?php  if($this->prescription_model->status=="2"){ echo "selected"; }?>>Admin added price</option>
                            <option value="3" <?php  if($this->prescription_model->status=="3"){ echo "selected"; }?>>Patient completed the payment</option>
                            <option value="4" <?php  if($this->prescription_model->status=="4"){ echo "selected"; }?>>Packed</option>
                            <option value="5" <?php  if($this->prescription_model->status=="5"){ echo "selected"; }?>>Shipped</option>
                            <option value="6" <?php  if($this->prescription_model->status=="6"){ echo "selected"; }?>>Delivered</option>
                         </select>
                         </div>
      
<!--                        <div class="form-group m-r-15"> 
					   <select name="status" class="form-control input-rounded">
					   <option value="" <?php  if($this->prescription_model->status==""){ echo "selected"; }?>>--select--</option>
                           <option value="Morning" <?php  if($this->prescription_model->status=="1"){ echo "selected"; }?>>Morning</option>
                            <option value="After Noon" <?php  if($this->prescription_model->status=="After Noon"){ echo "selected"; }?>>After Noon</option>
                           
                             
                            </select></div>
							<div class="form-group m-r-15">
      <input type="date" class="form-control input-rounded" name="appointmentDate" placeholder="Appointment Date"  value="<?php echo $this->prescription_model->appointmentSession?>"></div>
                        -->
                         
                         
                            
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Search</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/prescription'); ?>';">Cancel</button>
                        </form>
       	 			</div>
              
              	
                <div class="card-block">
              <div class="table-responsive">
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } ?>
                <form  method="post"	name="frmPrescriptionList" action=""> 
                <input type="hidden"  	name="action" value=""> 
                <input type="hidden"  	name="prescriptionIds" value=""> 
                <input type="hidden" 	name="prescriptionId" value=""> 
                <input type="hidden" 	name="returnUrl" value="">
              
           
                <table cellspacing="0" id="advanced-table" class="table  table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                		
                      <th width="2%" height="24" class="nosort">
                      	<input type="checkbox" name="chkAll" value="checkbox" class="checkall"   onClick="selectAll(prescriptionId, this);"> 			  
                      </th> 
                      <th class="noExport">#</th>
                      
                       
					   <!--<th>Appointment Id</th>-->
					   <th>Patient name</th>
                       <th>Doctor name</th>
                       <th>Prescription Notes</th>
                         
						<th>Insert Date</th>
						 <th>Total Amount</th>
					  <!--<th>payment Id</th>-->
                      <th>Status</th>
                     
                      
                   
                     
                    </tr>
                  </thead>
                  <tbody>

					<?php
                    if(count($prescription)) :
                    //$cnt=1; 
                    foreach ($prescription as $row) :
						if($row["status"]==0)
						{
							$row["status"]="New";
						}else if($row["status"]==1)
						{
							$row["status"]="Patient requested for medicine";
						}else if($row["status"]==2)
						{
							$row["status"]="Admin added price";
						}else if($row["status"]==3)
						{
							$row["status"]="Paid";
						}
						else if($row["status"]==4)
						{
							$row["status"]="Packed";
						}
						else if($row["status"]==5)
						{
							$row["status"]="Shipped";
						}
						else if($row["status"]==6)
						{
							$row["status"]="Delivered";
						}
						

                    ?>               
                    <tr>
                      <td  valign="top" class="rowcontent">
						<input type="checkbox" name="prescriptionId[]" value="<?php echo $row["prescriptionId"]?>" id="prescriptionId" onCLick='resetChkBox(prescriptionId, chkAll);changeCheckedColor(frmPrescriptionList.prescriptionId);' />
					  </td>	
                      <td> <a href="<?php echo 'prescription/view/'.$row["prescriptionId"].''  ?>" data-original-title="View" ><i class="ion-eye"></i> </a>
                        &nbsp;
                         <a href="#!"  data-original-title="Edit" data-toggle="modal" data-target="#large-Modal-Modify<?php echo $row["prescriptionId"]?>" ><i class="icofont icofont-edit"></i> </a> 
                      
                        </td>
                     
                      <!--<td><?php echo $row['appointmentId']?></td>-->
                       <td ><?php echo $row['firstName']." ".$row['lastName']?> </td> 
					   <td><?php echo $row['doctorName']?></td>
                      <td ><?php echo nl2br($row['prescriptionNotes']);?></td>
                  <td ><?php echo date('h:i:s a d/m/Y', strtotime($row['insDate'])); ?></td>
                 <td ><?php echo $row['totalAmount']?></td>
				 <!--<td ><?php echo $row['paymentId']?></td>-->
                  <td ><?php echo $row['status']?></td>
                                  
                    </tr>
					 <?php 
                    $cnt++;
                    endforeach; 
                    else : ?>
                    
                    <tr>
                    <td colspan="6">No Record found</td>
                    </tr>
                    <?php
                    endif;
                    ?>                
            
                  </tbody>
                </table>
               <div class="card-block">
                   
                    <select name="clsaxSpeciality_pageSize"   class="form-control-list"> 
                        <?php echo $pageRange?> 
                    </select> 
                    <button class="btn btn-mini btn-primary waves-effect waves-light m-r-30"  onClick="submitPage();"><span>Go</span></button>
                </div>
                <div class="card-block">
                    <div class="dataTables_paginate paging_simple_numbers">
                        <?php echo $links; ?>
                    </div>
                </div>
                </form>
              </div>
            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
    <?php include APPPATH.'views/admin/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->
	</div>
    <!-- /#wrapper -->
	</div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


<?php
   if(count($prescription)>0){     

  foreach ($prescription as $rows) { 

?>

<?php
                  
      global $arrprescriptionStatus;  
      
      $modifyEntryHourListN = "";
      
 
      $modifystatusList =   HTMLOptionKeyValArray($arrprescriptionStatus,$rows['status']);
      
  
?>


<div class="modal fade" id="large-Modal-Modify<?php echo $rows['prescriptionId']; ?>" tabindex="-1" role="dialog" align="center">
            <div style="width:50%; margin-top:75px; margin-bottom:30px;" role="document">
                <div class="modal-content" align="left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Update Prescription</h4>
                    <div>
                    <div class="modal-body">
                       
                       
            
                     <div class="col-md-12">      
            
                            
            <?php echo form_open_multipart('admin/prescription/update/'.$rows['prescriptionId']); ?>
                       
                             <input name="prescriptionId" value="<?php echo $rows['prescriptionId']; ?>" type="hidden">
                             
              
              

              <div class="col-md-6 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
            
                                       <label for="input-rounded" class="col-sm-6 form-control-label">   Patient:</label><?php echo $rows['firstName']." ".$rows['lastName'] ?> 
            
            
                                </div>
            
                            </div>    

                            <div class="col-md-6 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                  
                                      <label for="input-rounded" class="col-sm-6 form-control-label">   Patient Code:</label> <?php echo $rows['patientCode'] ?> </label>
            
                                  
            
                                </div>
            
                            </div>                              
                         
                            
                      
                      <div class="col-md-6 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
            
                                       <label for="input-rounded" class="col-sm-6 form-control-label">   Doctor name:</label><?php echo $rows['doctorName'] ?> 
            
            
                                </div>
            
                            </div>    

                            <div class="col-md-6 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                  
                                      <label for="input-rounded" class="col-sm-6 form-control-label">   Doctor Code:</label> <?php echo $rows['doctorCode'] ?> </label>
            
                                  
            
                                </div>
            
                            </div>    



                             <div class="col-md-6 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                  
                                      <label for="input-rounded" class="col-sm-6 form-control-label">   Time & Date:</label> <?php echo $rows['insDate'] ?> </label>
            
                                  
            
                                </div>
            
                            </div> 

                            <div class="col-md-12 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                  
                                      <label for="input-rounded" class="col-sm-12 form-control-label">   Prescription:</label> <?php echo $rows['prescriptionNotes'] ?> </label>
            
                                  
            
                                </div>
            
                            </div>                              
                         
                            <div class="col-md-12 " style="margin-top:20px;" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Amount </label>
            
                                    <div class="col-sm-12">         
            
                                        <input class="form-control" placeholder=" " name="totalAmount"  value="<?php echo $rows['totalAmount']; ?>" aria-required="true" type="text" >
            
                                    </div>
            
                                </div>
            
                            </div>
                              

                          
     <div class="col-sm-12">  
                   
                   <div class="form-group row">

             <label for="input-rounded" class="col-sm-12 form-control-label"> Status </label>

             <div class="col-sm-12">         

            <select name="status" class="form-control" id="status" >    
                                        <option value="">-- Selezionare--</option>                                
                      <?php echo $modifystatusList;?>                                    
                                        </select>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " id="closeButton" data-dismiss="modal">Close</button>
                     
                    </div>
                </div>
                
                  </form>
            </div>
        </div>
        
        </div>      
              
      </div>
      
      
      <?php
  }
  
   }
             
    ?>



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
    <!--<script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.buttons.min.js'); ?>"></script>-->
    <script src="<?php echo base_url('assets/plugins/data-table/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/data-table/js/responsive.bootstrap4.min.js'); ?>"></script>
    <!--<script src="<?php echo base_url('assets/pages/data-table.js'); ?>"></script>-->
    
    
    
    <script src="<?php echo base_url('assets/plugins/data-table/js/jquery-ui-1.12.0/jquery-1.10.2.js'); ?>"></script>
     <script src="<?php echo base_url('assets/plugins/data-table/js/jquery-ui-1.12.0/jquery-ui.js'); ?>"></script>
     
     
     
     
       <script>
  $( function() {
    $( "#dateStart" ).datepicker();
  } );
  </script>
   <script>
  $( function() {
    $( "#dateExp" ).datepicker();
  } );
  </script>
    
     <script>
$(document).ready(function() {
     
 var advance = $('#advanced-table').DataTable( {
	  "searching": false,
		 "paging":   false,
		 "ordering": true,
		 "info":     false,
		  "export":     false,
      dom: 'Bfrtip',
	 
   
 buttons: [{
       		extend: 'excel',
			 title: 'Speciality List',
			 exportOptions: {
           	 	columns: "thead th:not(.noExport)"
       		 },
			
	  },
	 
	  ],
	  
	  
	  "order": [ 1, 'asc' ],
	   "columnDefs": [ {
            "className": 'control',
            "orderable": false,
            "targets":   0
        } ],
		
    } );
	
	
	
	
} );
</script>
    
    
   

    
  </body>

</html>
