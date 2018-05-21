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
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
      
      
   <style type="text/css">
		
			.error {color:red; }
	
			 .fa {cursor: pointer; }
       .active1, input[type='text'] {width: 100%; height: 34px;margin: 10px 0 0 0;}
		
		</style>
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
                                  <img class="avatar border-white" style="margin-bottom:0px;" src="<?php echo base_url();?>assets/img/user-dosen.png" alt="..."/>
                                
                                    <p class="title" ><small>Halo !,</small><br /><?php echo $this->session->userdata('nama'); ?>
                                     
                                  </p>
                                </div>
                            </div>
                            
                           
    </div>
            <ul class="nav" style="margin-top:0px;">
                <li class='active' >
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboarddosen">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li>
                    <a href="<?php echo base_url();?>index.php/keloladosen/insertberkas">
                        <i class="ti-file"></i>
                        <p>Berkas Pengajuan</p>
                    </a>
                </li>
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
            <div class="container-fluid" >
                <div class="navbar-header" style="">
                    <p class="navbar-brand" >Sistem Informasi<br  /> Kenaikan Jabatan Fungsional Dosen</p>
                     
             </div>
            <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

						<li>
                            <a href="<?php echo base_url();?>index.php/keloladosen/gantipassword">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>    
            </div>
        </nav>
        



        <div class="content">
            <div class="container-fluid">
              
                 <div class="row" style=" overflow:hidden; margin-left:0px; margin-right:0px; margin-bottom:50px;  ">
        <div class="card">
                            <div class="header">
                                <h4 class="title">Uraian Kegiatan</h4>
                                <p class="category">Kegiatan Pendidikan dan Pengajaran</p>
                            </div>
                            <div class="content">
                              
                <h3 style=" color: #dd5209">Ubah Password</h3><p>Ubah password anda demi keamanan</p>
              <form action="<?php echo base_url();?>index.php/keloladosen/setpasswordbaru" method="post" id="frm-mhs">
                <table class="table table-striped table-bordered">
                <tr>
         <td>
         <label>Password Baru</label>
        
             <input type="password" name="pass1" id="pass1" class="form-control" required>
         
         </td>
         </tr>
                    <tr>
         <td>
         <label>Password Baru (Again) <i id="icon" class="fa fa-eye-slash"></i> </label>
        
             <input type="password" name="pass2" id="pswd2" class="form-control" required>
         
         </td>
         </tr>
                </table> 
                
        <input type="submit" class="btn btn-info" value="Ganti Password" style="width:100%; border-radius:0;"/>        
                </form>
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

<script>
      $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          pass2: {
            equalTo: "#pass1"
          }
        },
        messages: {
          pass2: {
            equalTo: "<p>Password yang Anda Masukan Tidak Sama</p>"
          }
        }
      });
    });

// Proses Show Password
var input = document.getElementById('pswd2'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

     if(input.className == 'active1') {
        input.setAttribute('type', 'text');
        icon.className = 'fa fa-eye';
       input.className = '';

     } else {
         
        input.setAttribute('type', 'password');
        icon.className = 'fa fa-eye-slash';
       input.className = 'active1';
    }

   }
      
      </script>
     

</html>
