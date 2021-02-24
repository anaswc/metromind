  <!DOCTYPE html>
  <html lang="en">

  <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Videos</title>

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

  function addVideo(){
  document.location.href= "<?php echo base_url('admin/videos/create'); ?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
  }
  function performAction(action) 
  {
  var frm       = document.frmVideoList;
  var checkFlag   = 0;
  var selectedValue = "";   
  if(frm.elements["id[]"]!=null)
  {
  selectedValue   = getCheckedItem(frm,"id[]");
  // console.log(selectedValue);
  if (frm.elements["id[]"].checked == true) 
  {   
  checkFlag = 1;
  }
  for(var i=0;i<frm.elements["id[]"].length;i++) 
  {
  if (frm.elements["id[]"][i].checked) 
  { 
  checkFlag++;    
  }   
  }   
  }
  if (checkFlag == 0) 
  {
  if (action == "DELETE") 
  {
  alert("Please select atleast one video");
  }
  else 
  {
  alert("Please select one video");
  }

  return false;
  } 
  else 
  { 
  if (action == "DELETE") 
  {
  if(confirm("You are about to  "+action.toLowerCase()+"  the selected video(s). Do you wish to continue?")) 
  {
  // print_r(selectedValue);exit;
  frm.ids.value  = selectedValue;
  frm.action.value  = action;
  frm.action      = "<?php echo base_url('admin/videos/delete')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
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
  frm.id.value = selectedValue;
  frm.action.value  = action;
  frm.action      = "<?php echo base_url()?>admin/videos/update/?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";
  frm.submit();     
  }
  }


  else if (action == "ACTIVATE") 

  {

  if(confirm("You are about to  "+action.toLowerCase()+"  the selected Video(s). Do you wish to continue?")) 

  {

  frm.ids.value  = selectedValue;

  frm.action.value    = action;

  frm.action        = "<?php echo base_url('admin/videos/activate')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";

  frm.submit();            

  }

  } else if (action == "DEACTIVATE") 

  {

  if(confirm("You are about to  "+action.toLowerCase()+"  the selected video(s). Do you wish to continue?")) 

  {

  frm.ids.value  = selectedValue;

  frm.action.value    = action;

  frm.action        = "<?php echo base_url('admin/videos/deactivate')?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>";

  frm.submit();            

  }

  }   



  }

  }




  function submitPage(){
  var frm     = document.frmVideoList;
  var pageSize  = frm.clsaxAdmin_pageSize.value;
  frm.action    = "<?php echo base_url()?>admin/adminuser"
  +"?adminName=<?php echo $this->adminuser_model->adminName?>"
  +"&adminType=<?php echo $this->adminuser_model->adminType?>"
  +"&sortDirection=<?php echo $this->adminuser_model->sortDirection?>&sortColumn=<?php echo $this->adminuser_model->sortColumn?>&pageSize="+pageSize;

  frm.submit();

  }

  function clearSearch()
  {
  var frm= document.frmvideosearch; 
  frm.firstName.value = "";
  }
  function submitSearch() 



  {



  var frm               = document.frmvideosearch;  



  var adminName           = frm.adminName.value;

  var adminType          = frm.adminType.value;



  frm.action                = "<?php echo base_url()?>admin/adminuser"



  +"?adminName="+adminName+""

  +"&adminType="+adminType+""



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
  <h4>Videos</h4>
  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
  <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="icofont icofont-home"></i></a></li>
  <li class="breadcrumb-item"><a href="#"> Videos</a></li>
  </ol>
  </div>
  </div>
  <div class="col-sm-12">
  <div class="card">
  <div class="card-block">
  <form name="frmvideosearch" method="post" action="" class="form-inline" onsubmit="return submitSearch();" > 
  <input type="hidden"  name="clsaxAdmin_submitted" value=""> 
  <div class="form-group m-r-15">
  <input type="text" class="form-control input-rounded" name="videoId" placeholder="video id"  value="<?php echo $this->videos_model->VideoId?>"></div>



  <button type="submit" class="btn btn-mini btn-primary waves-effect waves-light m-r-30">Search</button>
  <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="javascript:document.location.href='<?php echo base_url('admin/videos'); ?>';">Cancel</button>
  </form>
  </div>

  <div class="card-block">


  <!-- <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('ACTIVATE');">Activate</button>
  <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('DEACTIVATE');" >Deactivate</button> -->
  <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('EDIT');" >Edit</button>
  <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="performAction('DELETE');">Delete</button>
  <button type="button" class="btn btn-mini btn-primary waves-effect waves-light m-r-30" onclick="addVideo();">Add New</button>


  </div>
  <div class="card-block">
  <div class="table-responsive">
  <!---- Success Message ---->
  <?php if ($this->session->flashdata('success')) { ?>
  <p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
  <?php } ?>
  <form  method="post"  name="frmVideoList" action=""> 
  <input type="hidden"    name="action" value=""> 
  <input type="hidden" name="pageIndex" value="">
  <input type="hidden" name="sortColumn" value="<?php echo $this->input->post_get('sortColumn')?>">
  <input type="hidden" name="sortDirection" value="<?php echo $this->input->post_get('sortDirection')?>">
  <input type="hidden"    name="ids" value=""> 
  <input type="hidden"  name="id" value=""> 
  <input type="hidden"  name="returnUrl" value="">

  <table cellspacing="0" id="advanced-table" class="table  table-striped table-bordered nowrap">
  <thead>
  <tr>

  <th width="2%" height="24" class="nosort">
  <input type="checkbox" name="chkAll" value="checkbox" class="checkall"   onClick="selectAll(videoId, this);">         
  </th> 
  <th class="noExport">#</th>
  <th class="noExport">Action</th>
  <th>Title</th>
  <th>Vimeo Video ID </th>
  <th>Category</th>

  </tr>
  </thead>
  <tbody>

  <?php
  global $arrAdminType;
  if(count($videos)) :
  //$cnt=1; 
  foreach ($videos as $row) :
  ?>               
  <tr>
  <td  valign="top" class="rowcontent">
  <input type="checkbox" name="id[]" value="<?php echo $row["id"]?>" id="videoId" onCLick='resetChkBox(videoId, chkAll);changeCheckedColor(frmVideoList.id);' />
  </td> 
  <td><?php echo htmlentities($cnt);?></td>
  <td style="white-space: nowrap;">            
  <a href="<?php echo 'videos/update/'.$row["id"].'/' ?>?returnUrl=<?php echo urlencode(getCurrentPageURL())?>"  data-original-title="Edit" ><i class="ion-edit"></i> </a> &nbsp;&nbsp;                                        
  </td>                                
  <td ><?php echo $row['title']?></td>
  <td ><?php echo $row['videoId']?></td>
  <td ><?php echo $row['category']?></td>

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
  <select name="clsaxadminId_pageSize"   class="form-control-list"> 
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
  <script>
  document.frmvideosearch.Submit.focus();
  </script>
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
