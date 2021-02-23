<!DOCTYPE html>

<html lang="en">

<head>

    <title>Metro Mind</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    

    <?php echo link_tag('assets/images/favicon.png'); ?>

    <?php echo link_tag('assets/images/favicon.ico'); ?>

    <?php echo link_tag('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'); ?>

    <?php echo link_tag('assets/icon/icofont/css/icofont.css'); ?>

    <?php echo link_tag('assets/icon/simple-line-icons/css/simple-line-icons.css'); ?>

    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>

    <?php echo link_tag('assets/plugins/charts/chartlist/css/chartlist.css'); ?>

    <?php echo link_tag('assets/css/svg-weather.css'); ?>

    <?php echo link_tag('assets/css/main.css'); ?>

    

    <?php echo link_tag('assets/css/responsive.css'); ?>

    <?php echo link_tag('assets/css/color/color-1.css'); ?>

    

    <script src="<?php echo base_url('assets/plugins/charts/echarts/js/echarts-all.js'); ?>"></script>

    

     <style>

  .media-middle{

    /*margin-bottom:12px;*/

    

  }

  .counter{

    color: black;

  }

  </style>

    

</head>

<body class="sidebar-mini fixed">

<div class="wrapper">

     <div class="loader-bg">

    <div class="loader-bar">

    </div>

  </div>

    <!-- Navbar-->
    <?php 

global $arrAdminType;
    ?>

<header class="main-header-top hidden-print">

  

  <nav class="navbar navbar-static-top">

    <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle hidden-md-up"></a>

    <!-- Navbar Right Menu-->

    <div class="navbar-custom-menu">

      <ul class="top-nav">

        <!--Notification Menu-->



          <li class="dropdown">

            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">

              <span><img class="img-circle " src="<?php echo base_url('assets/images/avatar-1.png');?>" style="width:40px;" alt="User Image"></span>

              <span> <?php echo $this->session->userdata('adminName'); ?> <i class=" icofont icofont-simple-down"></i></span>



            </a>

            <ul class="dropdown-menu settings-menu">

            

              <li><a href="<?php echo base_url('admin/Change_password')?>"><i class="icon-note"></i> Change Password</a></li>

              <li><a href="<?php echo base_url('admin/Login/logout')?>"><i class="icon-logout"></i> Logout</a></li>



            </ul>

          </li>

        </ul>



       

</div>

</nav>

</header>



    <aside class="main-sidebar hidden-print " >

      <section class="sidebar" id="sidebar-scroll">

        <div class="user-panel">

          <div class="f-left image"><img src="<?php echo base_url('assets/images/avatar-1.png');?>" alt="User Image" class="img-circle"></div>

          <div class="f-left info">

            <p><?php echo $this->session->userdata('adminName'); ?></p>

            <p class="designation"><?php echo $arrAdminType[$this->session->userdata('adminType')]; ?> <i class="icofont icofont-caret-down m-l-5"></i></p>

          </div>

        </div>

        <!-- sidebar profile Menu-->

        <ul class="nav sidebar-menu extra-profile-list">

          <li> <a class="waves-effect waves-dark" href="<?php echo base_url('admin/Change_password')?>"> <i class="icon-settings"></i> <span class="menu-text">Change Password</span> <span class="selected"></span> </a> </li>

          <li> <a class="waves-effect waves-dark" href="<?php echo base_url('login/logout')?>"> <i class="icon-logout"></i> <span class="menu-text">Logout</span> <span class="selected"></span> </a> </li>

        </ul>

        <!-- Sidebar Menu for Super admin-->
        <?php if($this->session->userdata('adminType')==0) {?>

        <ul class="sidebar-menu" id="sidebar-sticky-full">

         

                 

           <li class="treeview active"><a class="waves-effect waves-dark" href=""><i class="icon-grid"></i><span>Dashboard</span><i class="icon-arrow-down"></i>  </a>

                    <ul class="treeview-menu">

                        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/specialities"><i class="icon-arrow-right"></i>Specialities</a></li>

                         <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/symptom"><i class="icon-arrow-right"></i>Symptoms</a></li>



  <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Patients </span><i class="icon-arrow-down"></i></a>

        <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>admin/patients"><i class="icon-arrow-right"></i> Patients </a> </li>

         <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/prescription"><i class="icon-arrow-right"></i>Prescription</a></li>

<!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscription"><i class="icon-arrow-right"></i>Subscriptions</a></li> -->
   <li class="treeview"><a href="<?php echo base_url('admin/requestsession')?>"><i class="icon-arrow-right"></i>Request sessions</a></li>

          

        </ul>

      </li>
                          
 <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Appointments </span><i class="icon-arrow-down"></i></a>

   
      
      <ul class="treeview-menu">
      
       <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><i class="icon-arrow-right"></i>Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><i class="icon-arrow-right"></i>New Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><i class="icon-arrow-right"></i>Todays Appointments</a></li>
      </ul>
      </li>
                            <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/doctor"><i class="icon-arrow-right"></i>Doctor</a></li>
        
                           <li><a href="<?php echo base_url();?>admin/package"> <i class="icon-arrow-right"></i><span> Packages</span></i> </a> </li>
 
                        <!--<li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/settings"><i class="icon-arrow-right"></i>Settings</a></li>-->
                        <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/adminuser"><i class="icon-arrow-right"></i>Admin user</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/cms"><i class="icon-arrow-right"></i>CMS Settings</a></li>
                          <!--<li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/rating"><i class="icon-arrow-right"></i>Rating</a></li>-->
                           

            <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/patientcredits"><i class="icon-arrow-right"></i>Patient credits</a></li>
              <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payments"><i class="icon-arrow-right"></i>Payments</a></li>   


 </ul>
 </li>
 </ul>
 <?php 
} ?>


 <!-- Sidebar Menu for  admin-->
        <?php if($this->session->userdata('adminType')==1) {?>

        <ul class="sidebar-menu" id="sidebar-sticky-full">

         

                 

           <li class="treeview active"><a class="waves-effect waves-dark" href=""><i class="icon-grid"></i><span>Dashboard</span><i class="icon-arrow-down"></i>  </a>

                    <ul class="treeview-menu">

                        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/specialities"><i class="icon-arrow-right"></i>Specialities</a></li> -->

                         <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/symptom"><i class="icon-arrow-right"></i>Symptoms</a></li> -->

                          <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Patients </span><i class="icon-arrow-down"></i></a>

        <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>admin/patients"><i class="icon-arrow-right"></i> Patients </a> </li>

         <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/prescription"><i class="icon-arrow-right"></i>Prescription</a></li>

<!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscription"><i class="icon-arrow-right"></i>Subscriptions</a></li> -->
   <li class="treeview"><a href="<?php echo base_url('admin/requestsession')?>"><i class="icon-arrow-right"></i>Request sessions</a></li>

          

        </ul>

      </li>

                           <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Appointments </span><i class="icon-arrow-down"></i></a>

   
      
      <ul class="treeview-menu">
      
       <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><i class="icon-arrow-right"></i>Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><i class="icon-arrow-right"></i>New Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><i class="icon-arrow-right"></i>Todays Appointments</a></li>
      </ul>
      </li>

        <!--  -->
        <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Helpful Tips </span><i class="icon-arrow-down"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url();?>admin/videos"><i class="icon-arrow-right"></i> Videos </a> </li>
                <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/blogs"><i class="icon-arrow-right"></i>Blogs</a></li>
            </ul>
        </li>
        <!--  -->


                            <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/doctor"><i class="icon-arrow-right"></i>Doctor</a></li>
        
                           <li><a href="<?php echo base_url();?>admin/package"> <i class="icon-arrow-right"></i><span> Packages</span></i> </a> </li>
 
                        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/settings"><i class="icon-arrow-right"></i>Settings</a></li> -->
                        <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/adminuser"><i class="icon-arrow-right"></i>Admin user</a></li> -->
                         
                          <!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/rating"><i class="icon-arrow-right"></i>Rating</a></li> -->
                           <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/prescription"><i class="icon-arrow-right"></i>Prescription</a></li>

<!-- <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subscription"><i class="icon-arrow-right"></i>Subscriptions</a></li> -->
 

<li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/patientcredits"><i class="icon-arrow-right"></i>Patient credits</a></li>
              <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payments"><i class="icon-arrow-right"></i>Payments</a></li>   
              <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/adminuser"><i class="icon-arrow-right"></i>Admin users</a></li> 
              <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/cms"><i class="icon-arrow-right"></i>Settings</a></li>  
    </ul>

                </li>

 </ul>
 <?php 
} ?>

 <!-- Sidebar Menu for Super staff-->
        <?php if($this->session->userdata('adminType')==2) {?>

        <ul class="sidebar-menu" id="sidebar-sticky-full">

         

                 

           <li class="treeview active"><a class="waves-effect waves-dark" href=""><i class="icon-grid"></i><span>Dashboard</span><i class="icon-arrow-down"></i>  </a>

                    <ul class="treeview-menu">

                        <li class="treeview"><a href="#"><i class="icon-menu"></i><span> Patients </span><i class="icon-arrow-down"></i></a>

        <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>admin/patients"><i class="icon-arrow-right"></i> Patients </a> </li>

         <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/prescription"><i class="icon-arrow-right"></i>Prescription</a></li>
         


   
    </ul>
<li class="treeview"><a href="#"><i class="icon-menu"></i><span> Appointments </span><i class="icon-arrow-down"></i></a>

   
      
      <ul class="treeview-menu">
      
       <li class="treeview"><a href="<?php echo base_url('admin/appointment')?>"><i class="icon-arrow-right"></i>Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/newrequest')?>"><i class="icon-arrow-right"></i>New Appointments</a></li>
        <li class="treeview"><a href="<?php echo base_url('admin/todaysrequest')?>"><i class="icon-arrow-right"></i>Todays Appointments</a></li>
      </ul>
      </li>
       <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/adminuser"><i class="icon-arrow-right"></i>Admin users</a></li>

           <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/patientcredits"><i class="icon-arrow-right"></i>Patient credits</a></li>
              <li><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payments"><i class="icon-arrow-right"></i>Payments</a></li>           </li>

 </ul>
 <?php 
} ?>

      </section>

    </aside>


    <div class="content-wrapper"> 

      <!-- Container-fluid starts -->

      <div class="container-fluid">

       <div class="row">

                        <div class="col-sm-12 p-0">

                            <div class="main-header">

                               <!-- <h4></h4>-->

                            </div>

                        </div>

                    </div>

        <div class="row"> 
          <?php if($this->session->userdata('adminType')==0) {?>

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/dashboard">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/dashboard.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Home</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>

          
          
             
    <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/specialities">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Specialities</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>
          

          

          

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patients">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/patients.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Patients</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/symptom">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/services.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Symptoms</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/doctor">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Doctors</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/package">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/access.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Packages</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>


           <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/appoinment.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Appoinments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
         <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/newrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newrequest.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Requests</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment/create">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newappointment.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/todaysrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/today.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Todays appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>

          <!-- <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/subscription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/subscription.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Subscriptions</span>

                              </span>

                           

                          </div> 

                      </div>

                  </div>

                 </a>

              </div>

          </div>  -->
          


          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/prescription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/tax.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Prescriptions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> 


          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/adminuser">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/staff.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Admin Users</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> 
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/requestsession">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/Request.png" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Request sessions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patientcredits">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/Request.png" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Patient credits</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/payments">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/access.jpg" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Payments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
         <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/settings">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/editProfile.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Settings</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->
<?php }
?>
     <?php if($this->session->userdata('adminType')==1) {?>

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/dashboard">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/dashboard.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Home</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>

          
          
             
    <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/specialities">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Specialities</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>-->
          

          

          

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patients">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/patients.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Patients</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>
          
          <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/symptom">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/services.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Symptoms</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/doctor">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Doctors</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/package">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/access.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Packages</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>


           <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/appoinment.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Appoinments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
         
         
         <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/newrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newrequest.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Requests</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment/create">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newappointment.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/todaysrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/today.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Todays appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>

          <!-- <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/subscription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/subscription.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Subscriptions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>  -->
          


          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/prescription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/tax.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Prescriptions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> 


          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/adminuser">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/staff.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Admin Users</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> 
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patientcredits">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/Request.png" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Patient credits</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/payments">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/access.jpg" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Payments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
          
         <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/cms">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/editProfile.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Settings</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
<?php }
?>
          
           <?php if($this->session->userdata('adminType')==2) {?>

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/dashboard">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/dashboard.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Home</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>

          
          
             
    <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/specialities">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Specialities</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>-->
          

          

          

          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patients">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                    <img src="<?php echo base_url();?>dashboard_images/patients.jpg" >

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Patients</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  

                 </a>

              </div>

          </div>
          
          <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/symptom">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/services.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Symptoms</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->

          <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/doctor">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/mmg.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Doctors</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->
          
          
          
          <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/package">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/access.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Packages</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->


           <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/appoinment.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Appoinments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
         
 <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/newrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newrequest.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Requests</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/appointment/create">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/newappointment.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">New Appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>
          
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/todaysrequest">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/today.png" style="width: 95px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Todays appointments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>

          <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/subscription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/subscription.png" style="width: 75px;height: 100px" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Subscriptions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>--> 
          


          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/prescription">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/tax.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Prescriptions</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> 
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/patientcredits">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/Request.png" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Patient credits</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          
          <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                <a href="<?php echo base_url();?>admin/payments">

                    <div class="card-block">

                        <div class="media ">

                            <div class=" media-middle" align="center">

                                <div class="new-orders">

                                    <!--<i class="icofont icofont-home"></i>-->

                                    <img src="<?php echo base_url();?>dashboard_images/access.jpg" style="width:90px; height:100px"> 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class=" f-w-600 f-20">

                                  <span class="counter ">Payments</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                  </a>

              </div>

          </div>
          


         <!-- <div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/adminuser">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/staff.jpg"  > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Admin Users</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div> -->
          
         <!--<div class="col-lg-3">

                <div class="card dashboard-card-sm">

                 <a href="<?php echo base_url();?>admin/settings">

                    <div class="card-block">

                        <div class="media">

                            <div class="media-middle" align="center">

                                <div class="new-orders">

                                   <img src="<?php echo base_url();?>dashboard_images/editProfile.jpg" > 

                                </div>

                            </div>

                            <div class="media-body" align="center">

                                <span class="f-w-600 f-20">

                                  <span class="counter ">Settings</span>

                              </span>

                           

                          </div>

                      </div>

                  </div>

                 </a>

              </div>

          </div>-->
<?php }
?>  
          

          

        

        </div>

      </div>

    </div>





  <script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/tether.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/waves/js/waves.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/slimscroll/js/jquery.slimscroll.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/slimscroll/js/jquery.nicescroll.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/search/js/classie.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/notification/js/bootstrap-growl.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/charts/sparkline/js/jquery.sparkline.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/countdown/js/waypoints.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/countdown/js/jquery.counterup.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/pages/dashboard.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/pages/elements.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/menu.js'); ?>"></script>



</body>

</html>