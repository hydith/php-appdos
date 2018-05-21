<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    
    <?php include 'style.php';?>
    

</head>
<body>

<div class="wrapper">
   
    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	        <!-- Sidebar -->
   <div class="sidebar" data-background-color="white" data-active-color="danger">
<div class="sidebar-wrapper">
            <div class=" card-user" style="height:230px;" >
                            <div class="image" style="background-color:#424242; border-radius:0px; height:140px;">
                              <img style="width:80%; margin-top:20px; margin-left:20px;  " src="<?php echo base_url();?>assets/img/logo.png">  
                            </div>
                            <div class="content"  >
                                <div class="author">
                                  <img class="avatar border-white" style="margin-bottom:0px;" src="<?php echo base_url();?>assets/img/user-admin.png" alt="..."/>
                                
                                    <p class="title" ><small>Halo !,</small><br />Admin Kepegawaian Pusat
                                     
                                  </p>
                                </div>
                            </div>
                            
                           
    </div>

            <ul class="nav" style="margin-top:0px;">
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboardkepegpusat">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilsemuaberkaskepegpusat">
                        <i class="ti-files"></i>
                        <p>Berkas</p>
                    </a>
                </li>
                  <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasbarukepegpusat">
                        <i class="ti-file"></i>
                        <p>Berkas Baru</p>
                    </a>
                </li>
                 <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasproseskepegpusat">
                        <i class="ti-file"></i>
                        <p>Berkas Proses</p>
                    </a>
                </li>
                <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasselesaikepegpusat">
                        <i class="ti-file"></i>
                        <p>Berkas Selesai</p>
                    </a>
                </li>
                
                
                <li>
                <li>
                    <a href="<?php echo base_url();?>index.php/login/logout">
                        <i class="ti-share-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
               
            </ul>
    	</div>
</div>
<div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                    <p class="navbar-brand" >Sistem Informasi<br  /> Kenaikan Jabatan Fungsional Dosen</p>
                </div>
             
            </div>
        </nav>
        


        <div class="content">
            <div class="container-fluid">
              
                 <div class="row" style=" overflow:hidden; margin-left:0px; margin-right:0px; margin-bottom:50px;  ">
                   
       
                     <div class="col-sm-4 ">
          <div class="card  bg-primary o-hidden h-100">
            <div class="card-body text-white">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file"></i>
              </div>
                <?php
                foreach($berkasbaru as $row){
                    
                
                ?>
              <div class=" text-left">
                                    <div class="huge"><?php echo $row->Jumlah_Berkas_Baru ?></div>
                                    <div>Berkas baru!</div>
                                </div>
            </div>
              <ul class="card-footer clearfix " style="list-style-type: none; background-color:#fff">
              <li  style="padding-bottom:10px; padding-top:10px;" >
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Asisten Ahli </td>
                      <td class="text-left" style=" width:70% " >
                        <?php 
                    if($row->Asisten_Ahli!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Asisten_Ahli."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li  style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor </td>
                      <td class="text-left" style=" width:70% " >
                          <?php 
                    if($row->Lektor!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor."</span>";
                    }
                   
                      ?>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor Kepala </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Lektor_Kepala!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor_Kepala."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Guru Besar/Profesor </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Guru_Besar!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".Guru_Besar."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                  
                 
              </ul>
             <?php }?>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      
                        <div class="col-sm-4 ">
          <div class="card  bg-primary o-hidden h-100">
            <div class="card-body text-white">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file"></i>
              </div>
                <?php
                foreach($berkasproses as $row){
                    
                
                ?>
              <div class=" text-left">
                                    <div class="huge"><?php echo $row->jumlah_berkas_proses ?></div>
                                    <div>Berkas Proses!</div>
                                </div>
            </div>
              <ul class="card-footer clearfix " style="list-style-type: none; background-color:#fff">
              <li  style="padding-bottom:10px; padding-top:10px;" >
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Asisten Ahli </td>
                      <td class="text-left" style=" width:70% " >
                        <?php 
                    if($row->Asisten_Ahli!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Asisten_Ahli."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li  style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor </td>
                      <td class="text-left" style=" width:70% " >
                          <?php 
                    if($row->Lektor!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor."</span>";
                    }
                   
                      ?>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor Kepala </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Lektor_Kepala!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor_Kepala."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Guru Besar/Profesor </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Guru_Besar!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".Guru_Besar."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                  
                 
              </ul>
             <?php }?>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
       <div class="col-sm-4 ">
          <div class="card  bg-primary o-hidden h-100">
            <div class="card-body text-white">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file"></i>
              </div>
                <?php
                foreach($berkasselesai as $row){
                    
                
                ?>
              <div class=" text-left">
                                    <div class="huge"><?php echo $row->Jumlah_Berkas_Selesai ?></div>
                                    <div>Berkas Selesai!</div>
                                </div>
            </div>
              <ul class="card-footer clearfix " style="list-style-type: none; background-color:#fff">
              <li  style="padding-bottom:10px; padding-top:10px;" >
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Asisten Ahli </td>
                      <td class="text-left" style=" width:70% " >
                        <?php 
                    if($row->Asisten_Ahli!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Asisten_Ahli."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li  style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor </td>
                      <td class="text-left" style=" width:70% " >
                          <?php 
                    if($row->Lektor!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor."</span>";
                    }
                   
                      ?>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:50%"> Lektor Kepala </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Lektor_Kepala!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".$row->Lektor_Kepala."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                   <li style="padding-bottom:10px; padding-top:10px;">
                  <table class="" style="padding:100px">
                  <tr>
                        <td style="padding-right:10px"><i class="ti-file"></i></td>
                      <td style="width:30%"> Guru Besar/Profesor </td>
                      <td class="text-left" style=" width:70% " >
                         <?php 
                    if($row->Guru_Besar!=0){
                         echo"
                          <span class='badge ' style='background:#2ecc71;float:right;'>".Guru_Besar."</span>";
                    }
                   
                      ?>
                      </td>
                      </tr>
                  </table>
           
            </li>
                  
                 
              </ul>
             <?php }?>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      
                     
                     
        </div>
            
       
        </div>               
         
              
            </div>
        </div>


       
    



</body>

    <!--   Core JS Files   -->
   <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>



    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>


	<script type="text/javascript">
    	
	</script>

</html>
