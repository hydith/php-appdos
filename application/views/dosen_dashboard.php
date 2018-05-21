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
<?php
    $statusnav=1;
    
    ?>
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
                <li class='active'>
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
                   
        <div class="col-sm-8" style=" padding:20px; ">     
            <div class="panel panel-default" style="  border-left: 6px solid #dd5209; ">    
            <div class="panel-body">
        <?php foreach ($data as $row){
    echo "
        <div class='col-sm-4' style='padding-top:30px; padding-left:30px;'>
             <img style='width:144px; height:216px;' src='".base_url()."foto/".$row->Foto."'>
             </div>";
      
        $originalDate = $row->Tanggal_lahir;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $tmtgol = date("d-m-Y", strtotime($row->TMT_Gol));
        $tmtjab = date("d-m-Y", strtotime($row->TMT_jab));
     echo "
        <div class='col-sm-8' style=''>
             <h2 style='color: #dd5209'>".$row->Nama."</h2>
            <table class='table table-striped'>    
            <tr>
            <th>No Karpeg</th>
            <th>:</th>
            <th>".$row->No_Karpeg."</th>    
            </tr>
            <tr>
            <th>NIDN</th>
            <th>:</th>
            <th>".$row->NIDN."</th>
            </tr>    
            <tr>
            <th>Alamat</th>
            <th>:</th>
            <th>".$row->Alamat."</th>
            </tr>
                <tr>
            <th>Jenis Kelamin</th>
            <th>:</th>
            <th>".$row->Jenis_Kelamin."</th>
            </tr>
                <tr>
            <th>Kelahiran</th>
            <th>:</th>
            <th>".$row->kelahiran." , ".$newDate."</th>
            </tr>
                <tr>
            <th>Golongan/Pangkat</th>
            <th>:</th>
            <th>".$row->GolAngka."/".$row->GolHuruf." ".$row->Pangkat."</th>
            </tr>
            <tr>
            <th>TMT Pangkat/Gol</th>
            <th>:</th>
            <th>".$tmtgol."</th>
            </tr>
                <tr>
            <th>Jabatan Fungsional</th>
            <th>:</th>
            <th> ".$row->NamaJabatan."</th>
            </tr>
            <tr>
            <th>TMT jabatan Fungsional</th>
            <th>:</th>
            <th>".$tmtjab."</th>
            </tr>
                
                <tr>
            <th>Unit Kerja</th>
            <th>:</th>
            <th>".$row->NamaUnitKerja."</th>
            </tr>
               <tr>
            <th>Pendidikan Tertinggi</th>
            <th>:</th>
            <th>".$row->Pendidikan."</th>
            </tr>
            </table>
             </div> 
             ";     
}
             ?>
                </div>
            </div>
            
                     </div>
             
        <div class="col-sm-4" style="padding:20px;">
              <div class="panel panel-default" style="  border-left: 6px solid #dd5209; height:450px;" >    
            <div class="panel-body">
                <h4 style="color: #dd5209">Template Dokumen</h4><p>Silahkan untuk mendownload template dokumen lampiran untuk kelengkapan berkas pengajuan kenaikan jabatan fungsional</p>
                <h4 style="color: #dd5209">Lampiran</h4>
                <?php
                echo"
                <ul style='list-style-type: none; padding:0'>
                <li><a href='".base_url()."/berkas/1.-PEER-REVIEW-buku (1).doc' style='color:black;'>Peer Review-Buku</a></li>
                <li><a href='".base_url()."/berkas/3.-PEER-REVIEW-jurnal.doc' style='color:black;'>Peer Review-Jurnal</li>
                <li><a href='".base_url()."/berkas/4.-PEER-REVIEW-prosiding.doc' style='color:black;'>Peer Review-Prosiding</li>
                <li><a href='".base_url()."/berkas/5.-PEER-REVIEW-penel-tdk-dipub.doc' style='color:black;'>Peer Review-Panel tidak dipublikasikan</li>
                <li><a href='".base_url()."/berkas/keabsahan-karya-ilmiah.pdf' style='color:black;'>Keabsahan karya ilmiah</li>
                <li><a href='".base_url()."/berkas/berkas/00Petunjuk_Operasional_PAK-_update-Juni-2015_2.pdf' style='color:black;'>Pedoman PAK</li> 
            
                </ul>
                ";
                ?>    
                  </div>
            </div>
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
