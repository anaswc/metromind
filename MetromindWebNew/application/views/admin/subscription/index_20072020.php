<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Subscriptions</title>

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
	var frm 		= document.frmSubscriptionList;
	var	pageSize	= frm.clsaxSpeciality_pageSize.value;
	frm.action		= "<?php echo base_url()?>admin/subscription"
					+"&doctorName=<?php echo $this->subscription_model->doctorName?>"
					+"&firstName=<?php echo $this->subscription_model->firstName?>"
					+"&status=<?php echo $this->subscription_model->status?>"
					
						+"&sortDirection=<?php echo $this->subscription_model->sortDirection?>&sortColumn=<?php echo $this->subscription_model->sortColumn?>&pageSize="+pageSize;

	frm.submit();

}

function clearSearch()
{
	var frm= document.frmSubscriptionSearch;	
	zfrm.doctorName.value	= "";
	frm.firstName.value	= "";
}
function submitSearch() 



	{



		var frm									= document.frmSubscriptionSearch;	



		var doctorName						= frm.doctorName.value;
		
		var firstName							= frm.firstName.value;



		frm.action								= "<?php echo base_url()?>admin/website"



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
                    <h4>Subscriptions</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Subscriptions</a></li>
                    </ol>
                  </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-block">
                        <form name="frmSubscriptionSearch" method="post" action="<?php echo site_url('admin/subscription'); ?>" class="form-inline" > 
                        <input type="hidden"  name="clsaxSpeciality_submitted" value=""> 
                         	<div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="doctorName" placeholder="Doctor Name"  value="<?php echo $doctorName?>"></div>
                        <div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="firstName" placeholder="Patient Name"  value="<?php echo $firstName?>"></div>

                 <div class="form-group m-r-15">
      <input type="text" class="form-control input-rounded" name="packageName" placeholder="Package Name"  value="<?php echo $packageName?>"></div>
         
                         
                            
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Search</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/subscription'); ?>';">Cancel</button>
                        </form>
       	 			</div>
              
              	
                <div class="card-block">
              <div class="table-responsive">
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } ?>
                <form  method="post"	name="frmSubscriptionList" action=""> 
                <input type="hidden"  	name="action" value=""> 
                <input type="hidden"  	name="subscriptionIds" value=""> 
                <input type="hidden" 	name="subscriptionId" value=""> 
                <input type="hidden" 	name="returnUrl" value="">
              
           
                <table cellspacing="0" id="advanced-table" class="table  table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                		
                      <th width="2%" height="24" class="nosort">
                      	<input type="checkbox" name="chkAll" value="checkbox" class="checkall"   onClick="selectAll(subscriptionId, this);"> 			  
                      </th> 
                      <th class="noExport">#</th>
                      
                       
					   <th>Package Name</th>
					   <th>Patient name</th>
                       <th>Doctor name</th>
                       <th>Subscribed date</th>
                         
						<th>Subscription End Date</th>
						 <th>No.of session</th>
					  <th>payment Id</th>
                      <th>Status</th>
                     
                      
                   
                     
                    </tr>
                  </thead>
                  <tbody>

					<?php
                    if(count($subscription)) :
                    //$cnt=1; 
                    foreach ($subscription as $row) :
						if($row["status"]==1)
						{
							$row["status"]="Active";
						}
						else if($row["status"]==0)
						{
							$row["status"]="Inactive";
						}
						
                    ?>               
                    <tr>
                      <td  valign="top" class="rowcontent">
						<input type="checkbox" name="subscriptionId[]" value="<?php echo $row["subscriptionId"]?>" id="subscriptionId" onCLick='resetChkBox(subscriptionId, chkAll);changeCheckedColor(frmSubscriptionList.subscriptionId);' />
					  </td>	
                      <td> <a href="<?php echo 'subscription/view/'.$row["subscriptionId"].''  ?>" data-original-title="View" ><i class="ion-eye"></i> </a>
                        </td>
                     
                      <td><?php echo $row['packageName']?></td>
                       <td><?php echo $row['firstName']." ".$row['lastName']?></td>
					   <td><?php echo $row['doctorName']?></td>
                      <td ><?php echo changeDateFormat($row['subscribedDate']);?></td>
                  <td ><?php echo changeDateFormat($row['subscriptionEndDate']);?></td>
                 <td ><?php echo $row['noOfSession']?></td>
				 <td ><?php echo $row['paymentId']?></td>
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
