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
                <li>
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboardkepegpusat">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class="active">
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
                   <div class="panel panel-default" style="">    
            <div class="panel-body">
                 <h3 style=" color: #dd5209;">List Berkas Pengajuan</h3><p style=" padding-bottom:20px; border-bottom:1px solid #DDDDDD;">Menampilkan semua berkas pengajuan kenaikan jabatan.</p>
                
                
             <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="padding-left:50px;">Nama</th>
                                        <th>Jabatan Saat Ini</th>
                                        <th>Jabatan yang diajukan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Statu</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($databerkas as $row){
                                    $datadosen=$m_berkas->getdatadosen($row->IDPengajuan);
                                    $datajabatantujuan=$m_berkas->getdatatojabatan($row->IDPengajuan);
                                    $getstatus=$m_berkas->getdatapengajuan($row->IDPengajuan);   
                                    foreach($datadosen as $row1){
                                        $nama=$row1->Nama;
                                        $currJabatan = "$row1->NamaJabatan, $row1->GolAngka/$row1->GolHuruf";
                                    } 
                                    foreach($datajabatantujuan as $row2){
                                        $toJabatan = "$row2->NamaJabatan, $row2->GolAngka/$row2->GolHuruf";
                                    } 
                                    foreach($getstatus as $row3){
                                        $idstatus=$row3->IDStatusPengajuan;
                                        $status = $row3->NamaStatus;
                                        $detail = $row3->Detail;
                                    }     
                                    echo"    
                                    <tr>
                                        <td>
                                        <ul style='list-style-type: none;'>
                                        <li>".$nama."</li>
                                        <li>".$row->NIDN."</li>
                                        </ul>
                                        </td>
                                        <td>".$currJabatan."</td>
                                        <td>".$toJabatan."</td>
                                        <td>".$row->TglPengajuan."</td>
                                        <td>
                                        ";
                                        if($idstatus==4){
                                            echo "<span class='status' style='background-color:#19B5FE; color:#fff'>Baru</span><br>
                                            <small id='Hint' style='color:#F03434'>".$detail." </small>
                                            </td>
                                            
                                            ";
                                        }
                                        elseif($idstatus!=4&&$idstatus!=8){
                                            echo "<span class='status status-proses' style=''>".$status."</span><br>
                                             <small id='Hint' style='color:#F03434'>".$detail." </small>
                                            </td>";
                                        }
                                        else{
                                             "<span class='status' style='background-color:#2ECC71; color:#fff'>".$status."</span><br>
                                              <small id='Hint' style='color:#F03434'>".$detail." </small>
                                             </td>";
                                        }
                                      
                                        echo"
                                        <td>
                                        <a href='".base_url()."index.php/kelolaberkas/lihatformpengajuandetailkepegpus?idpengajuan=".$row->IDPengajuan."' class='btn btn-info' style='border-radius:0px;'>Detail</a>";
                                      
                                      
                                        echo"
                                        </td>
                                    </tr>
                                    ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            
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
        $('#dataTables-example').DataTable({
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
         "order": [[ 5, "desc" ]]    
        });
    });
    </script>

</html>
