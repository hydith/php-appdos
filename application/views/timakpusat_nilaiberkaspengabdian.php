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
                                
                                    <p class="title" ><small>Halo !,</small><br />Admin Tim Ak Fakultas
                                     
                                  </p>
                                </div>
                            </div>
                            
                           
    </div>


            <ul class="nav" style="margin-top:0px;">
                <li >
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboardtimakpusat">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 <li class="active">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasbarutimakpusat">
                        <i class="ti-file"></i>
                        <p>Berkas</p>
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
                   
                     <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Uraian Kegiatan</h4>
                                <p class="category">Kegiatan Pendidikan dan Pengajaran</p>
                            </div>
                            <div class="content">
                              <?php
                            foreach($data_pengabdian as $row){
                                $idpengajuan=$row->IDPengajuan;
                                $max=$row->JumlahAngkaKredit;
                                echo"
                                <table class='table table-striped'>
                                <tr>
                                <td> <label>Kode Kegiatan</label></td>
                                <td>".$row->Kode."</td>
                                </tr>
                                <tr>
                                <td> <label>Kategori Kegiatan</label></td>
                                <td>".$row->KategoriKegiatan."</td>
                                </tr>
                                <tr>
                                <td> <label>Uraian Kegiatan</label></td>
                                <td>".$row->SubKategoriKegiatan."</td>
                                </tr>
                                <tr>
                                <td> <label>Waktu</label></td>
                                <td>".$row->Tanggal."</td>
                                </tr>
                                <tr>
                                <td> <label>Satuan Hasil</label></td>
                                <td>".$row->SatuanHasil."</td>
                                </tr>
                                <tr>
                                <td> <label>Angka Kredit</label></td>
                                <td>".$row->AngkaKredit."</td>
                                </tr>
                                <tr>
                                <td> <label>Jumlah Angka Kredeit</label></td>
                                <td>".$row->JumlahAngkaKredit."</td>
                                </tr>
                                <tr>
                                <td> <label>Bukti Fisik</label></td>
                                <td>
                                <ul style='list-style-type: none;'>
                                ";
                               $result=$m_dosen->getbuktifisik($row->IDTriDharma);
                                foreach ($result as $row1){
                                echo "<li><a href='".base_url()."/berkas/pendidikan/".$row1->NamaBuktiFisik."'>".$row1->NamaBuktiFisik."</a></li>";
                                    }
                                echo " 
                                </ul>
                               </td>
                               </tr>
                               </table>
                                ";
                                    
                                    
                            }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Nilai Kegiatan</h4>
                                <p class="category">Nilai dari Penilai Tim AK</p>
                            </div>
                            <div class="content">
                                <?php echo form_open('kelolaberkas/submitnilaikegiatanpusat');?>
                                <input type='hidden' name='id' id='id' value='<?php echo $this->input->get('idpengajuan')?>'/> 
                                <input type='hidden' name='idpengajuan' id='idpengajuan' value='<?php echo $idpengajuan?>'/> 
                                <label>Nilai Kegiatan</label>
                                <div class="form-group">
                                <?php
                                $ceknilai=$m_dosen->ceknilaikegiatan($this->input->get('idpengajuan'));
                                if ($ceknilai->num_rows() == 1){
                                $nilai=$m_berkas->getnilaikegiatan($this->input->get('idpengajuan'));
                                foreach($nilai as $row2){
                                   echo "<input type='number' value='".$row2->Nilai."' name='nilai' id='nilai' class='form-control' style='width:80px;' min='0' max=".$max." required>"; 
                                }    
                                }
                                else{
                                    echo "<input type='number' name='nilai' id='nilai' class='form-control' style='width:80px;' min='0' max=".$max." required>";  
                                }       
                                       
                                ?>    
                                </div>  
                                 <input type="submit" class="btn btn-info" value="Ajukan" style=" border-radius:0;"/> 
                                <?php echo form_close()?> 
                                
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
