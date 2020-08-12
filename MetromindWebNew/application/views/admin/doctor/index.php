<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metro Mind-Doctors</title>

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

function addDoctor(){
	document.location.href= "<?php echo base_url('admin/doctor/create'); ?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
}
function performAction(action) 
{
	var frm				= document.frmDoctorList;
	var checkFlag		= 0;
	var selectedValue	= "";		
	if(frm.elements["doctorId[]"]!=null)
	{
		selectedValue		= getCheckedItem(frm,"doctorId[]");
		if (frm.elements["doctorId[]"].checked == true) 
		{		
			checkFlag = 1;
		}
		for(var i=0;i<frm.elements["doctorId[]"].length;i++) 
		{
			if (frm.elements["doctorId[]"][i].checked) 
			{	
				checkFlag++;		
			} 	
		} 	
	}
	if (checkFlag == 0) 
	{
		if (action == "DELETE") 
		{
			alert("Please select atleast one doctor");
		}
		else 
		{
			alert("Please select one doctor");
		}

		return false;
	} 
	else 
	{ 
		if (action == "DELETE") 
		{
			if(confirm("You are about to  "+action.toLowerCase()+"  the selected doctor(s). Do you wish to continue?")) 
			{
				frm.doctorIds.value	= selectedValue;
				frm.action.value	= action;
				frm.action			= "<?php echo base_url('admin/doctor/delete')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
				frm.submit();			
			}
		}
		else if (action == "EDIT") 
		{
			if (checkFlag > 1) 
			{
				alert("Please select only one item to "+action.toLowerCase()+"");
				return false;
			} 
			else 
			{
				frm.doctorId.value	= selectedValue;
				frm.action.value	= action;
				frm.action			= "<?php echo base_url('admin/doctor/update')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
				frm.submit();			
			}
		}
		

		else if (action == "ACTIVATE") 

		{

			if(confirm("You are about to  "+action.toLowerCase()+"  the selected doctor(s). Do you wish to continue?")) 

			{

                frm.doctorIds.value	= selectedValue;

				frm.action.value		= action;

				frm.action				= "<?php echo base_url('admin/doctor/activate')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";

				frm.submit();            

            }

		} else if (action == "DEACTIVATE") 

		{

			if(confirm("You are about to  "+action.toLowerCase()+"  the selected doctor(s). Do you wish to continue?")) 

			{

                frm.doctorIds.value	= selectedValue;

				frm.action.value		= action;

				frm.action				= "<?php echo base_url('admin/doctor/deactivate')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";

				frm.submit();            

            }

		}   
		   				
	

	}

}




function submitPage(){
	var frm 		= document.frmDoctorList;
	var	pageSize	= frm.clsaxPatient_pageSize.value;
	frm.action		= "<?php echo base_url()?>admin/doctor"
					+"?doctorName=<?php echo $this->doctor_model->doctorName?>"
					+"&doctorEmail=<?php echo $this->doctor_model->doctorEmail?>"
	+"&sortDirection=<?php echo $this->doctor_model->sortDirection?>&sortColumn=<?php echo $this->doctor_model->sortColumn?>&pageSize="+pageSize;

	frm.submit();

}
function submitSearch() 



	{



		var frm								= document.frmDoctorSearch;	



		var doctorName						= frm.doctorName.value;
		
		var doctorEmail					= frm.doctorEmail.value;



		frm.action								= "<?php echo base_url()?>admin/doctor"



													+"?doctorName="+doctorName+""
													
													+"&doctorEmail="+doctorEmail+""



													+"&pageSize=<?php echo $this->pageSize?>";



		frm.submit();	



	}
function clearSearch()
{
	var frm= document.frmDoctorSearch;	
	frm.doctorName.value	= "";
	frm.doctorEmail.value	= "";
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
                    <h4>Doctors</h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
                      <li class="breadcrumb-item"><a href="#">Doctors</a></li>
                    </ol>
                  </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-block">
                        <form name="frmDoctorSearch" method="post" action="<?php echo base_url('admin/doctor'); ?>" class="form-inline"  > 
                        <input type="hidden"  name="clsaxPatient_submitted" value=""> 
                         	<div class="form-group m-r-15">
                                <input type="text" class="form-control input-rounded" name="doctorName" placeholder="Doctor name"  value="<?php echo $doctorName ?>"></div>
                                <div class="form-group m-r-15">
                                <input type="text" class="form-control input-rounded" name="doctorEmail" placeholder="Doctor email"  value="<?php echo $doctorEmail?>"></div>
                        
                           
                            <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Search</button>
                            <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/doctor'); ?>';">Cancel</button>
                        </form>
       	 			</div>
              
              	<div class="card-block">
                   
                    
                   		<button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('ACTIVATE');">Activate</button>
                    <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('DEACTIVATE');" >Deactivate</button>
                    <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('EDIT');" >Edit</button>
                    <!--<button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('DELETE');">Delete</button>-->
                    <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="addDoctor();">Add New</button>
                       
                    
                </div>
                <div class="card-block">
              <div class="table-responsive">
                <!---- Success Message ---->
                <?php if ($this->session->flashdata('success')) { ?>
                <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
                <?php } ?>
                <form  method="post"	name="frmDoctorList" action=""> 
                <input type="hidden"  	name="action" value=""> 
                <input type="hidden"  	name="doctorIds" value=""> 
                 <input type="hidden" name="pageIndex" value="">
                  <input type="hidden" name="sortColumn" value="<?php echo $this->input->post_get('sortColumn')?>">
                  <input type="hidden" name="sortDirection" value="<?php echo $this->input->post_get('sortDirection')?>">
                <input type="hidden" 	name="doctorId" value=""> 
                <input type="hidden" 	name="returnUrl" value="">
              
           <table cellspacing="0" id="advanced-table" class="table  table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                		
                      <th width="2%" height="24" class="nosort">
                      	<input type="checkbox" name="chkAll" value="checkbox" class="checkall"   onClick="selectAll(doctorId, this);"> 			  
                      </th> 
                      <th class="noExport">#</th>
                      <th class="noExport">Action</th>
                      <th>Photo</th> 
					  <th>Unique Id</th>
					   
                       <th>Doctor Name</th>
                       <th>Email</th>
                        <th>Doctor Mobile</th>
						<th>YouTube Link</th>
						<th>Speciality</th>
						<th>Qualification</th>
						<th>Known Languages</th>
						<th>Experience</th>
						<th>Doctor Address</th>
						<th>Specializtion</th>
                         <th>Doctor Fee</th>
                      <th>Age</th>
                      <th>Gender</th>
                       <th>Qualification</th>
					   <th> CommunicationMode</th>
                       <th>Status</th>
                        <!--<th>seoUri</th>-->
						<th> Created Date</th>
                        <th>Modified Date</th>
                        <th>Last Login</th>
                        <th>Session Duration</th>
                        <th>Verified</th>
                        <th>Medical License</th>
                        <th>Liscence Verification</th>
                        <th>Counselling Certifcate</th>
                        <th>Certificate verification</th>
                        
                      
                   
                     
                    </tr>
                  </thead>
                  <tbody>

					<?php
                    if(count($doctor)) :
                    //$cnt=1; 
                    foreach ($doctor as $row) :
						if($row["status"]==1)
						{
							$row["status"]="Active";
						}
						else if($row["status"]==0)
						{
							$row["status"]="Inactive";
						}
						
						if($row["gender"]==1)
						{
							$row["gender"]="Male";
						}
						else if($row["gender"]==2)
						{
							$row["gender"]="Female";
						}

						if($row["isVerified"]==1)
						{
							$row["isVerified"]="Verified";
						}
						else if($row["isVerified"]==2)
						{
							$row["isVerified"]="Not verified";
						}
						if($row["isVerifiedLicense"]==1)
						{
							$row["isVerifiedLicense"]="Verified";
						}
						else if($row["isVerifiedLicense"]==2)
						{
							$row["isVerifiedLicense"]="Not verified";
						}
						if($row["isVerifiedCertificate"]==1)
						{
							$row["isVerifiedCertificate"]="Verified";
						}
						else if($row["isVerifiedCertificate"]==2)
						{
							$row["isVerifiedCertificate"]="Not verified";
						}
						
                    ?>               
                    <tr>
                      <td  valign="top" class="rowcontent">
						<input type="checkbox" name="doctorId[]" value="<?php echo $row["doctorId"]?>" id="doctorId" onCLick='resetChkBox(doctorId, chkAll);changeCheckedColor(frmDoctorList.doctorId);' />
					  </td>	
                      <td><?php echo htmlentities($cnt);?></td>
                      <td style="white-space: nowrap;">
					   
                      		<a href="<?php echo base_url('admin/doctor/update/'.$row["doctorId"].'/')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" ><i class="ion-edit"></i> </a> &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo base_url('admin/doctor/view/'.$row["seoUri"].'')?>" data-original-title="View" ><i class="ion-eye"></i> </a>
                            
						
                      </td>
                      <td>
                      	<?php 
							if($row['doctorImageUrl']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$row['doctorImageUrl'])){?>
							 <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$row['doctorImageUrl']?>" width="60" height="60" /></span>
						 <?php }?>
                      </td>
                       <td ><?php echo $row['uniqueId']?></td>
					   <td ><?php echo $row['doctorName']?></td>
                     <td ><?php echo $row['doctorEmail']?></td>
					 <td ><?php echo $row['doctorMobile']?></td>
                      
                   
                     <td ><?php echo $row['youtubeLink']?></td>
					<td >
					  <?php
					  $str_arr = explode (",", $row['specialityId']);  

					  for($i=0;$i<count($str_arr);$i++)
					  { if(count($specialities)) :
                   foreach ($specialities as $row1) :
					  if($row1["specialityId"]==$str_arr[$i])
						{
						$row1["specialityId"] = $row1["specialityName"].'<br>';
						 ?>
                     <?php echo $row1['specialityId']?>
					
					<?php	}

					
					endforeach;
						endif;
					  }			
						?></td>
						<td ><?php echo $row['qualification']?></td>
						<td ><?php echo $row['knownLanguages']?></td>
						<td ><?php echo $row['experience']?></td>
						<td ><?php echo nl2br($row['doctorAddress']);?></td>
					<td >
					  <?php
					  $str_arr = explode (",", $row['specialization']);  

					  for($i=0;$i<count($str_arr);$i++)
					  { if(count($symptom)) :
                   foreach ($symptom as $row1) :
					  if($row1["symptomId"]==$str_arr[$i])
						{
						$row1["symptomId"] = $row1["symptomName"].'<br>';
						 ?>
                     <?php echo $row1['symptomId']?>
					
					<?php	}

					
					endforeach;
						endif;
					  }			
						?></td>
                         <td ><?php echo $row['doctorFee']?></td>
                      <td ><?php echo $row['age']?></td>
                     <td ><?php echo $row['gender']?></td>
                      <td ><?php echo $row['qualification']?></td>
					   <?php $comm=explode(',',$row['communicationMode']);//print_r($comm);exit;?>
						<td><?php	for($i=0;$i<count($comm);$i++)
							{
								if($comm[$i]==1)
								{
								echo "Video Call</br>";
								}
								
								elseif($comm[$i]==2)
								{
									echo "Audio Call </br>";}
									elseif($comm[$i]==3)
								{
									echo "Text message</br>";}
								}
							?>
                       </td>
                       <td ><?php echo $row['status']?></td>
                        <!--<td ><?php echo $row['seoUri']?></td>-->
						<td ><?php echo $row['createdDate']?></td>
                        <td ><?php echo $row['modifiedDate']?></td>
                       <td><?php echo $row['lastLogin']?></td>
                     <td ><?php echo $row['doctorSessionDuration']?></td>
                     <td ><?php echo $row['isVerified']?></td>
                       
						<td>
                      	<?php
							if($row['medicalLicense']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$row['medicalLicense'])){?>
							 <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$row['medicalLicense']?>" width="60" height="60" /></span>
						 <?php }?>
                      </td>
                        <td ><?php echo $row['isVerifiedLicense']?></td>
					   <td>
                      	<?php
							if($row['counsellingCertificate']<>"" &&  file_exists(AXUPLOADDOCTORSPATH.$row['counsellingCertificate'])){?>
							 <span><img src="<?php echo HTTP.AXUPLOADDOCTORSPATH.$row['counsellingCertificate']?>" width="60" height="60" /></span>
						 <?php }?>
                      </td>
                       <td ><?php echo $row['isVerifiedCertificate']?></td>
                        
                      
                            
                     
                      
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
                   <select name="actionAll" id="actionAll" class="form-control-list" aria-expanded="false" data-toggle="dropdown">
                            <option value="">Actions</option>									
                            <option value="DELETE">Delete</option>
                        </select>
                    <button class="btn btn-mini btn-primary waves-effect waves-light m-r-30"  onclick="return performAction(document.getElementById('actionAll').value);"><span>Apply to selected</span></button>
                    &nbsp;&nbsp;
                    <select name="clsaxPatient_pageSize"   class="form-control-list"> 
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
      dom: 'Bfrtip',
	 
   
    buttons: [{
       		extend: 'excel',
			 title: 'Client Report',
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
