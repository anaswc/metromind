<!-- iconfont -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/icofont/css/icofont.css">

<!-- simple line icon -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/icon/simple-line-icons/css/simple-line-icons.css">
<div class="wrapper">

<!--  <div class="loader-bg">

    <div class="loader-bar"> </div>

  </div>-->

<header class="main-header-top hidden-print">
  <nav class="navbar navbar-static-top"> <a href="#!" data-toggle="offcanvas" class="sidebar-toggle hidden-md-up"></a>
    <div class="navbar-custom-menu">
      <ul class="top-nav">
        <?php 
global $arrAdminType;
          ?>
        <li class="dropdown"> <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image"> <span><img class="img-circle " src="<?php echo base_url('assets/images/avatar-1.png')?>" style="width:40px;" alt="User Image"></span> <span><?php echo $this->session->userdata('adminName'); ?><i class=" icofont icofont-simple-down"></i></span> </a>
          <ul class="dropdown-menu settings-menu">
            <li><a href="<?php echo base_url('admin/Change_Password')?>"><i class="icon-settings"></i> Change password</a></li>
            <li><a href="<?php echo base_url('admin/Login/logout')?>"><i class="icon-logout"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php if($this->session->userdata('adminType')==0){ ?>
<aside class="main-sidebar hidden-print ">
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image"><img src="<?php echo base_url('assets/images/avatar-1.png')?>" alt="User Image" class="img-circle"> </div>
      <div class="f-left info">
        <p></p>
        </p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-level">Navigation</li>
      <li class="treeview"><a href="<?php echo base_url('admin/dashboard')?>"><i class="icon-speedometer"></i><span> Dashboard </span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/specialities')?>"><span>Specialities</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/symptom')?>"><span>Symptoms</span></a></li>
       <li class="treeview">
      <a href="#"><span> Patients </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/patients')?>"><span>Patients</span></a></li>
        
        <li class="treeview"><a href="<?php echo base_url('admin/prescription')?>"><span>Prescription</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/subscription')?>"><span>Subscriptions</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/requestsession')?>"><span>Request sessions</span></a></li>
      </ul>
      </li>
       <li class="treeview">
      <a href="#"><span> Appointments </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        
        <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><span>Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><span>New Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><span>Todays Appointments</span></a></li>
      </ul>
      </li>
      <li class="treeview">
      <a href="#"><span> Doctors </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/doctor')?>"><span>Doctor</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/package')?>"><span>Packages</span></a></li>
        <!--<li class="treeview"><a href="<?php echo base_url('admin/rating')?>"><span>Rating</span></a></li>-->
      </ul>
      </li>
      
      <!-- <li class="treeview"><a href="<?php echo base_url('admin/settings')?>"><span>Settings</span></a></li>-->
      <!--<li class="treeview"><a href="<?php echo base_url('admin/cms')?>"><span>CMS Settings</span></a></li>-->
      <li class="treeview"><a href="<?php echo base_url('admin/adminuser')?>"><span>Admin user</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/patientcredits')?>"><span>Patient Credits</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/payments')?>"><span>Payments</span></a></li>
    </ul>
  </section>
</aside>
<?php } ?>
<?php if($this->session->userdata('adminType')==1){ ?>
<aside class="main-sidebar hidden-print ">
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image"><img src="<?php echo base_url('assets/images/avatar-1.png')?>" alt="User Image" class="img-circle"> </div>
      <div class="f-left info">
        <p></p>
        </p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-level">Navigation</li>
      <li class="treeview"><a href="<?php echo base_url('admin/dashboard')?>"><i class="icon-speedometer"></i><span> Dashboard </span></a></li>
      <!--<li class="treeview"><a href="<?php echo base_url('admin/specialities')?>"><span>Specialities</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/symptom')?>"><span>Symptoms</span></a></li>-->
      <li class="treeview">
      <a href="#"><span> Patients </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/patients')?>"><span>Patients</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><span>Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/prescription')?>"><span>Prescription</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/subscription')?>"><span>Subscriptions</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/requestsession')?>"><span>Request sessions</span></a></li>
      </ul>
      </li>
      <li class="treeview">
      <a href="#"><span> Helpful Tips </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        
        <li class="treeview"><a href="<?php echo base_url('admin/videos')?>"><span>Videos</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/blogs')?>"><span>Blogs</span></a></li>
        </ul>
      </li>
      
      <li class="treeview">
      <a href="#"><span> Appointments </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        
        <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><span>Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><span>New Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><span>Todays Appointments</span></a></li>
      </ul>
      </li>
      <li class="treeview">
      <a href="#"><span> Doctors </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/doctor')?>"><span>Doctor</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/package')?>"><span>Packages</span></a></li>
        <!--<li class="treeview"><a href="<?php echo base_url('admin/rating')?>"><span>Rating</span></a></li>-->
      </ul>
      </li>
     <li class="treeview"><a href="<?php echo base_url('admin/adminuser')?>"><span>Admin users</span></a></li>
     <li class="treeview"><a href="<?php echo base_url('admin/patientcredits')?>"><span>Patient Credits</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/payments')?>"><span>Payments</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/cms')?>"><span>Settings</span></a></li>
    </ul>
  </section>
</aside>
<?php } ?>
<?php if($this->session->userdata('adminType')==2){ ?>
<aside class="main-sidebar hidden-print ">
  <section class="sidebar" id="sidebar-scroll">
    <div class="user-panel">
      <div class="f-left image"><img src="<?php echo base_url('assets/images/avatar-1.png')?>" alt="User Image" class="img-circle"> </div>
      <div class="f-left info">
        <p></p>
        </p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-level">Navigation</li>
      <li class="treeview"><a href="<?php echo base_url('admin/dashboard')?>"><i class="icon-speedometer"></i><span> Dashboard </span></a></li>
<!--      <li class="treeview"><a href="<?php echo base_url('admin/specialities')?>"><span>Specialities</span></a></li>
-->      <!--<li class="treeview"><a href="<?php echo base_url('admin/symptom')?>"><span>Symptoms</span></a></li>-->
      <li class="treeview">
      <a href="#"><span> Patients </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/patients')?>"><span>Patients</span></a></li>
         <li class="treeview"><a href="<?php echo base_url('admin/prescription')?>"><span>Prescription</span></a></li>
        <!--<li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><span>Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/prescription')?>"><span>Prescription</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/subscription')?>"><span>Subscriptions</span></a></li>-->
      </ul>
      </li>
     <!-- <li class="treeview">
      <a href="#"><span> Doctors </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        <li class="treeview"><a href="<?php echo base_url('admin/doctor')?>"><span>Doctor</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/package')?>"><span>Packages</span></a></li>
       <li class="treeview"><a href="<?php echo base_url('admin/rating')?>"><span>Rating</span></a></li>
      </ul>
      </li>-->
      
      <li class="treeview">
      <a href="#"><span> Appointments </span><i class="icon-arrow-down"></i></a>
      <ul class="treeview-menu">
        
        <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><span>Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><span>New Appointments</span></a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><span>Todays Appointments</span></a></li>
      </ul>
      </li>
     
      
      <!-- <li class="treeview"><a href="<?php echo base_url('admin/settings')?>"><span>Settings</span></a></li>-->
     <!-- <li class="treeview"><a href="<?php echo base_url('admin/cms')?>"><span>CMS Settings</span></a></li>-->
          <li class="treeview"><a href="<?php echo base_url('admin/adminuser')?>"><span>Admin users</span></a></li>
          <li class="treeview"><a href="<?php echo base_url('admin/patientcredits')?>"><span>Patient Credits</span></a></li>
      <li class="treeview"><a href="<?php echo base_url('admin/payments')?>"><span>Payments</span></a></li>

    </ul>
  </section>
</aside>
<?php } ?>
