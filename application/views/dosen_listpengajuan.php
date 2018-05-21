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
                                  <img class="avatar border-white" style="margin-bottom:0px;" src="<?php echo base_url();?>assets/img/user-dosen.png" alt="..."/>
                                
                                    <p class="title" ><small>Halo !,</small><br /><?php echo $this->session->userdata('nama'); ?>
                                     
                                  </p>
                                </div>
                            </div>
                            
                           
    </div>
            <ul class="nav" style="margin-top:0px;">
                <li >
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboarddosen">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class='active'>
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
              
                <div class="row" style=" margin-bottom:100px;  margin-left:0px; margin-right:0px;">
         <h3 style="text-align:center;  color: #dd5209">PENGAJUAN KENAIKAN JABATAN FUNGSIONAL</h3>
           
        <div class="panel panel-default" style="  border-left: 6px solid #dd5209;">    
            <div class="panel-body">
            <div class="alert alert-warning" style="border-radius:0px;">
  <strong>Perhatian!</strong> Klik tombol Detail untuk melihat detail informasi berkas DUPAK dosen.
</div>    
         <h3 style=" color: #dd5209">Berkas DUPAK</h3><p>Berikut adalah data DUPAK dosen</p>
        <?php 
        foreach ($data_sekarang as $row1){
            $currJabatan = "$row1->NamaJabatan, $row1->GolAngka/$row1->GolHuruf";
            $currKUM = $row1->SyaratKUM;
            
        }
        foreach ($data_tujuan as $row2){
            $toJabatan = "$row2->NamaJabatan, $row2->GolAngka/$row2->GolHuruf";
            $toKUM = $row2->SyaratKUM;
        }  
         foreach ($data_pengajuan as $row3){
            $KUMtempuh = $row3->KUMtempuh;
             $nama = $row3->Nama;
             $NIDN = $row3->NIDN;
             $tanggal = $row3->TglPengajuan;
             $status = $row3->NamaStatus;
             $status_detail = $row3->Detail;
             $idpengajuan = $row3->IDPengajuan;
             $idstatus = $row3->IDStatusPengajuan;
        }          
    echo "
                <table class='table'>
            <thead>
          <tr>
            <th>Pengajuan Jabatan</th> 
              <th>Tanggal Pengajuan</th>
              <th></th>
              <th></th>
            </tr> 
            </thead> 
            <tbody>
            <tr>
            <td>
            <ul style='list-style-type: none; padding:0'>
            <li><strong>".$currJabatan." <span class='glyphicon glyphicon-arrow-right'></span> ".$toJabatan."</strong></li>
            <li>Jumlah KUM Sekarang :<strong> ".$currKUM." </strong></li>
            <li>Jumlah KUM Tujuan :<strong> ".$toKUM."</strong></li>
            <li>Jumlah KUM Tempuh :<strong> ".$KUMtempuh."</strong></li>
            <li>".$nama."</li> 
            <li>".$NIDN."</li> 
            </ul>    
            </td>
            <td>
            ".$tanggal."
            </td>
            <td><div class='status ";if($idstatus==5){echo "status-tolak";}else echo "status-proses"; echo"'>".$status."</div><br>
                 <small id='HintKet' class='form-text text-muted' style='color: red;'>*".$status_detail."</small>
            </td>
            <td>";
            if($idstatus==5){    
            echo "<a href='".base_url()."index.php/keloladosen/formrevisi?idpengajuan=".$idpengajuan."' class='btn btn-warning' style='border-radius:0px;'>Revisi</a>";
            }
            else{
            echo"<a href='".base_url()."index.php/keloladosen/lihatformpengajuan?idpengajuan=".$idpengajuan."' class='btn btn-info' style='border-radius:0px;'>Detail</a>";   
            }
            echo"    
                </td>    
            </tr>
            
            </tbody>
            </table>
        ";
            
    ?>
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
