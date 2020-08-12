<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Request sessions</title>

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
function performAction(action) 

{
	
	var frm				= document.frmAppointmentList;
	var checkFlag		= 0;
	var selectedValue	= "";	
	
	
	
	if(frm.elements["requestSessionId[]"]!=null)
	{
		selectedValue		= getCheckedItem(frm,"requestSessionId[]");
		if (frm.elements["requestSessionId[]"].checked == true) 
		{		
			checkFlag = 1;
		}
		for(var i=0;i<frm.elements["requestSessionId[]"].length;i++) 
		{
			if (frm.elements["requestSessionId[]"][i].checked) 
			{	
				checkFlag++;		
			} 	
		} 	
	}
	
	 
	if (checkFlag == 0) 
	{
		if (action == "DELETE") 
		{
			alert("Please select atleast one content");
		}
		else 
		{
			alert("Please select one content");
		}

		return false;
	} 
	else 
	{ 
		
		
		 if (action == "APPROVE") 
		{
			if (checkFlag > 1) 
			{
				alert("Please select only one item to "+action.toLowerCase()+"");
				return false;
			} 
			else 
			{
				frm.requestSessionId.value	= selectedValue;
				$('#default-Modal'+selectedValue).modal('show');
				/*frm.action.value	= action;
				frm.action			= "<?php echo base_url('admin/quote/makeOrder');?>/"+selectedValue;
				frm.submit();	*/		
			}
		}
		


	}


	
	
	}

function submitPage(){
	var frm 		= document.frmAppointmentList;
	var	pageSize	= frm.clsaxSpeciality_pageSize.value;
	frm.action		= "<?php echo base_url()?>admin/requestsession"
					+"?symptomName=<?php echo $this->patients_model->doctorName?>"
					
					
						+"&sortDirection=<?php echo $this->patients_model->sortDirection?>&sortColumn=<?php echo $this->patients_model->sortColumn?>&pageSize="+pageSize;

	frm.submit();

}

function submitSearch() 



	{



		var frm									= document.frmSymptomSearch;	



		var doctorName						= frm.doctorName.value;
		
		var firstName							= frm.firstName.value;
		
		frm.action								= "<?php echo base_url()?>admin/requestsession"



													+"?doctorName="+doctorName+""
													
													+"&firstName="+firstName+""
													
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
                    <h4>Request sessions</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Request sessions</a></li>
                    </ol>
                  </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-block">
                        <form name="frmSymptomSearch" method="post" action="" class="form-inline" onsubmit="return submitSearch();"> 
                        <input type="hidden"  name="clsaxSpeciality_submitted" value=""> 
                         	<div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="doctorName" placeholder="Doctor Name"  value="<?php echo $this->patients_model->doctorName?>"></div>
                        <div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="firstName" placeholder="Patient Name"  value="<?php echo $this->patients_model->firstName?>"></div>
                       
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Search</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/requestsession'); ?>';">Cancel</button>
                        </form>
       	 			</div>
              
              	<div class="card-block">
 <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('APPROVE');">APPROVE</button>                </div>
                <div class="card-block">
              <div class="table-responsive">
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } ?>
                <form  method="post"	name="frmAppointmentList" action=""> 
                <input type="hidden"  	name="action" value=""> 
                <input type="hidden"  	name="requestSessionIds" value=""> 
                <input type="hidden" 	name="requestSessionId" value=""> 
                <input type="hidden" 	name="returnUrl" value="">
              
           
                <table cellspacing="0" id="advanced-table" class="table  table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                		
                      <th width="2%" height="24" class="nosort">
                      	<input type="checkbox" name="chkAll" value="checkbox" class="checkall"   onClick="selectAll(requestSessionId, this);"> 			  
                      </th> 
                      <th>No</th>
                    
					   <th>Patient name</th>
                       <th>Doctor name</th>
                       <th>Session duration</th>
                         <th>Date</th>
						<th>Note</th>
						
					  <th>Status</th>
                     
                    </tr>
                  </thead>
                  <tbody>

					<?php
                    if(count($requests)) :
                    $cnt=1; 
                    foreach ($requests as $row) :
					
					
						if($row["status"]==1)
						{
							$row["status"]="Approved";
						}
						else if($row["status"]==0)
						{
							$row["status"]="Requested";
						}
						
						
                    ?>               
                    <tr>
                      <td  valign="top" class="rowcontent">
						<input type="checkbox" name="requestSessionId[]" value="<?php echo $row["requestSessionId"]?>" id="requestSessionId" onCLick='resetChkBox(requestSessionId, chkAll);changeCheckedColor(frmAppointmentList.requestSessionId);' />
					  </td>
                      
                      <td ><?php echo $cnt?></td>
                     
					  <td ><?php echo $row['firstName']." ".$row['lastName']?></td>
					   <td ><?php echo $row['doctorName']?></td>
                      <td ><?php echo $row['sessionDuration']?></td>
                  
                  <td ><?php echo date('h:i:s a d/m/Y', strtotime($row['insDate']));?></td>
                 
                 
                     <td ><?php echo $row['note']?></td>
                     
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
        
        
        <?php
								if(count($requests)>0){
									
									foreach($requests as $req){
		?>
        <div class="modal fade modal-flex" id="default-Modal<?php echo $req['requestSessionId'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Approve Request</h4>
                                        </div>
                                        <form name="frmapproveRequest" id="frmapproveRequest" method="post" action="<?php echo base_url('admin/requestsession/update/'.$req['requestSessionId']) ?>">
                                        <div class="modal-body">
                                        
 
                                <input type="hidden" name="returnUrl" value="<?php echo $this->input->get('returnUrl')?>">  
                                  <input type="hidden" name="requestSessionId"  value="<?php echo $req['requestSessionId']?>" >    
                                        <div class="col-md-6" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Patient name</label>
            
                                    <div class="col-sm-12">  
                                  <?php echo $req['firstName']." ".$req['lastName'] ?> 
            
                                    </div>
            
                                </div>
            
                            </div>
                                
                                 
                                        
                                
                                 <div class="col-md-6" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Doctor name</label>
            
                                    <div class="col-sm-12">  
                                    <?php echo $req['doctorName']?>      
            
                                     
            
                                    </div>
            
                                </div>
            
                            </div>
                                
                                 
                                
                               <div class="col-md-12" >  
            
                                <div class="form-group row">
            
                                    <label for="input-rounded" class="col-sm-12 form-control-label"> Note</label>
            
                                    <div class="col-sm-12">  
                                    <textarea name="note" class="form-control" rows="3"><?php echo $req['note']?></textarea>       
            
                                     
            
                                    </div>
            
                                </div>
            
                            </div>
                                        
                                           </div>
                                        <div class="modal-footer" style="margin-top:177px">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


									<?php
									}
								}
								?>
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
