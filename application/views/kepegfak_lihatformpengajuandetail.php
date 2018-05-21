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
    
 <style type="text/css">
          
   

 
          .header {
  background-color:  #dd5209;
  color: white;
  font-size: 1.5em;
  padding: 1rem;
  text-align: center;
  text-transform: uppercase;
}
      .table-users {
      
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  max-width: calc(100% - 2em);
  margin: 1em auto;
  overflow: hidden;
  width: 1000px;
}

table {
  width: 100%;
}
table td, table th {
  color: #414040;
  padding: 10px;
}
table td {
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.95em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #7f8c8d;
  font-weight: 300;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #ecf0f1;
}

@media screen and (max-width: 700px) {
  table, tr, td {
    display: block;
  }

  td:first-child {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    width: 100px;
  }
  td:not(:first-child) {
    clear: both;
    margin-left: 100px;
    padding: 4px 20px 4px 90px;
    position: relative;
    text-align: left;
  }
  td:not(:first-child):before {
    color: #91ced4;
    content: '';
    display: block;
    left: 0;
    position: absolute;
  }
  td:nth-child(2):before {
    content: 'Name:';
  }
  td:nth-child(3):before {
    content: 'Email:';
  }
  td:nth-child(4):before {
    content: 'Phone:';
  }
  td:nth-child(5):before {
    content: 'Comments:';
  }

  tr {
    padding: 10px 0;
    position: relative;
  }
  tr:first-child {
    display: none;
  }
}
@media screen and (max-width: 500px) {
  .header {
    background-color: transparent;
    color: white;
    font-size: 2em;
    font-weight: 700;
    padding: 0;
    text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
  }

  img {
    border: 3px solid;
    border-color: #daeff1;
    height: 100px;
    margin: 0.5rem 0;
    width: 100px;
  }

  td:first-child {
    background-color: #c8e7ea;
    border-bottom: 1px solid #91ced4;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: 0;
    -webkit-transform: translateY(0);
            transform: translateY(0);
    width: 100%;
  }
  td:not(:first-child) {
    margin: 0;
    padding: 5px 1em;
    width: 100%;
  }
  td:not(:first-child):before {
    font-size: .8em;
    padding-top: 0.3em;
    position: relative;
  }
  td:last-child {
    padding-bottom: 1rem !important;
  }

  tr {
    background-color: white !important;
    border: 1px solid #6cbec6;
    border-radius: 10px;
    box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 0;
  }

  .table-users {
    border: none;
    box-shadow: none;
    overflow: visible;
  }
    
      
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
                                  <img class="avatar border-white" style="margin-bottom:0px;" src="<?php echo base_url();?>assets/img/user-admin.png" alt="..."/>
                                
                                    <p class="title" ><small>Halo !,</small><br />Admin Kepegawaian Fakultas
                                     
                                  </p>
                                </div>
                            </div>
                            
                           
    </div>

            <ul class="nav" style="margin-top:0px;">
                <li >
                    <a href="<?php echo base_url();?>index.php/keloladosen/dashboardkepegfakultas">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li >
                 <li class="active">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilsemuaberkas">
                        <i class="ti-files"></i>
                        <p>Berkas</p>
                    </a>
                </li>
                <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasbaru">
                        <i class="ti-file"></i>
                        <p>Berkas Baru</p>
                    </a>
                </li>
                 <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasproses">
                        <i class="ti-file"></i>
                        <p>Berkas Proses</p>
                    </a>
                </li>
                <li style="padding-left:30px;">
                    <a href="<?php echo base_url();?>index.php/kelolaberkas/tampilberkasselesai">
                        <i class="ti-file"></i>
                        <p>Berkas Selesai</p>
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo base_url();?>index.php/keloladosen/tampilsemuadosen">
                        <i class="ti-user"></i>
                        <p>List Dosen</p>
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
              <section>
				<div class="tabs tabs-style-tzoid">
					<nav>
						<ul>
							<li><a style="font-size: 1.25em;" href="#section-tzoid-1" ><span>Keterangan Perorangan</span></a></li>
							<li><a style="font-size: 1.25em;" href="#section-tzoid-2"><span>Berkas Administrasi</span></a></li>
                            <li><a style="font-size: 1.25em;" href="#section-tzoid-2"><span>Berkas DUPAK</span></a></li>
						
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-tzoid-1">
                <div class="panel panel-default" style="  border-left: 6px solid #dd5209;margin-top:30px;  ">    
            <div class="panel-body">
                <h3 style=" color: #dd5209">KETERANGAN PERORANGAN</h3><p>Data Diri Dosen yang mengajukan kenaikan jabatan.</p>
            
           
        <?php foreach ($datadosen as $row){
        $idpengajuan=$this->input->get('idpengajuan');
    echo "
        <div class='col-sm-4' style='padding-top:30px; padding-left:80px;'>
             <img style='width:144px; height:216px;' src='".base_url()."foto/".$row->Foto."'>
             </div>";
      
        $originalDate = $row->Tanggal_lahir;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $tmtgol = date("d-m-Y", strtotime($row->TMT_Gol));
        $tmtjab = date("d-m-Y", strtotime($row->TMT_jab));
     echo "
        <div class='col-sm-7' style=''>
             <h2 style='color: #dd5209'>".$row->Nama."</h2>
            <table class='table table-striped'>    
            <tr>
            <td>No Karpeg</td>
            <td>:</td>
            <td>".$row->No_Karpeg."</td>    
            </tr>
            <tr>
            <td>NIDN</td>
            <td>:</td>
            <td>".$row->NIDN."</td>
            </tr>    
            <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>".$row->Alamat."</td>
            </tr>
                <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>".$row->Jenis_Kelamin."</td>
            </tr>
                <tr>
            <td>Kelahiran</td>
            <td>:</td>
            <td>".$row->kelahiran." , ".$newDate."</td>
            </tr>
                <tr>
            <td>Golongan/Pangkat</td>
            <td>:</td>
            <td>".$row->GolAngka."/".$row->GolHuruf." ".$row->Pangkat."</td>
            </tr>
            <tr>
            <td>TMT Pangkat/Gol</td>
            <td>:</td>
            <td>".$tmtgol."</td>
            </tr>
                <tr>
            <td>Jabatan Fungsional</td>
            <td>:</td>
            <td> ".$row->NamaJabatan."</td>
            </tr>
            <tr>
            <td>TMT jabatan Fungsional</td>
            <td>:</td>
            <td>".$tmtjab."</td>
            </tr>
                
                <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td>".$row->NamaUnitKerja."</td>
            </tr>
               <tr>
            <td>Pendidikan Tertinggi</td>
            <td>:</td>
            <td>".$row->Pendidikan."</td>
            </tr>
            </table>
             </div> 
             ";     
}
             ?>
                
              <?php
                $getstatus=$m_dosen->getstatus($idpengajuan);
                foreach($getstatus as $row){
                    $status=$row->IDStatusPengajuan;
                }
                if($status==1){
                echo"
                <div style='text-align:center;'>
            <a href='".base_url()."index.php/kelolaberkas/verifikasiberkas?id=".$idpengajuan."' class='btn btn-info' style='border-radius:0px;'>Validasi Berkas Pengajuan</a>
            <a id='tolak' class='btn btn-danger' onclick='' style='border-radius:0px;'>Tolak Berkas Pengajuan</a> 
            </div> 
            <div id='revisi' style='display:none; margin-top:20px;'>
            <div class='alert alert-danger alert-dismissible fade in'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Perhatian!</strong> Isikan Keterangan Revisi Pada Kolom Dibawah.
</div>";    
            echo form_open('kelolaberkas/tolakberkas');
            echo"        
            <input type='hidden' name='id' id='id' value='".$this->input->get('idpengajuan')."'/> 
            <div class='form-group'>
                <textarea name='ket_revisi' id='ket_revisi'  class='form-control' value='Isikan Keterangan Revisi' rows='5' style='white-space: pre-line;' required></textarea>  
                </div>
            <input type='submit' class='btn btn-warning' value='Submit' style=' border-radius:0;'/>";    
           echo form_close();
            echo"
                    </div>   
               ";
                }
                elseif($status==9){
                   echo "
                   <div class='text-center'>  
                   <a href='".base_url()."index.php/kelolaberkas/kirimberkaspengajuankepusat?id=".$idpengajuan."' class='btn btn-info' style='border-radius:0px;'>Kirim Berkas Pengajuan ke Kepegawaian Pusat/Rektorat</a>
                   </div
                   "; 
                }
                
             ?>  
                </div>
            </div>
             
               
        
             
              
                        </section>
                        <section id="section-tzoid-2">
                            <?php
                $idpengajuan = $this->input->get('idpengajuan');
                ?>
            <div class="panel panel-default" style="  border-left: 6px solid #dd5209; margin-top:30px; ">    
            <div class="panel-body">
                
             <h3 style=" color: #dd5209">KELENGKAPAN BERKAS</h3><p>Kelengkapan Berkas Administrasi.</p>
            
             <table class="table-striped">
            <tr >
            <th  style='padding:25px' >No</th>
            <th>Data</th>
            <th>Status</th>
            <th></th>
            <th></th>    
            </tr>
            <?php
            $cekberkas_a=$m_dosen->cekberkas_a($idpengajuan);
            ?>     
            <tr>
            <td style='padding:25px'>A</td>
            <td>SC Karpeg.</td>
            <td>
            <?php    
            if ($cekberkas_a->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?>    
            </td>
            <td>
            <?php    
            if ($cekberkas_a->num_rows() == 1){
             $result=$m_dosen->getberkas_a($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?>    
            </td>    
            </tr>
                 
                 
            <?php
            $cekberkas_b=$m_dosen->cekberkas_b($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>B</td>
            <td>SC SK Konversi NIP</td>
            <td> <?php    
            if ($cekberkas_b->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?> </td>
            <td>
            <?php    
            if ($cekberkas_b->num_rows() == 1){
             $result=$m_dosen->getberkas_b($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?>    
            </td>
               
            </tr>
                 
                 
            <?php
            $cekberkas_c=$m_dosen->cekberkas_c($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>C</td>
            <td>SC Penetapan Angka Kredit(PAK) terakhir</td>
            <td>
            <?php    
            if ($cekberkas_c->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?></td>
            <td><?php    
            if ($cekberkas_c->num_rows() == 1){
             $result=$m_dosen->getberkas_c($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?></td>
                
            </tr>
                 
                 
                 
                 
                 
            <?php
            $cekberkas_d=$m_dosen->cekberkas_d($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>D</td>
            <td>SC SK Kenaikan Jabatan Akademik Dosen terakhir</td>
            <td> <?php    
            if ($cekberkas_d->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?></td>
            <td><?php    
            if ($cekberkas_d->num_rows() == 1){
             $result=$m_dosen->getberkas_d($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?></td>
               
            </tr>
                 
            <?php
            $cekberkas_e=$m_dosen->cekberkas_e($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>E</td>
            <td>SC SK Kenaikan Pangkat/Golongan terakhir</td>
            <td><?php    
            if ($cekberkas_e->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?></td>
            <td><?php    
            if ($cekberkas_e->num_rows() == 1){
             $result=$m_dosen->getberkas_e($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?></td>
               
            </tr>
            <?php
            $cekberkas_f=$m_dosen->cekberkas_f($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>F</td>
            <td>SC Penilaian Prestasi Kerja PNS 2 Tahun terakhir</td>
            <td><?php    
            if ($cekberkas_f->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?></td>
            <td><?php    
            if ($cekberkas_f->num_rows() == 1){
             $result=$m_dosen->getberkas_f($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?></td>
              
            </tr> 
            <?php
            $cekberkas_g=$m_dosen->cekberkas_g($idpengajuan);
            ?>     
            <tr>
            <td  style='padding:25px'>G</td>
            <td>
            <ul style='list-style-type: none; padding:0'>
                   
                    <li>SC Sertifikat Pendidik</li>
                    <li><small id="Hint" class="form-text text-muted">Untuk Usul Jabatan Lektor Kepala dan Profesor </small></li>
                   
                    </ul>
            </td>
            <td><?php    
            if ($cekberkas_g->num_rows() == 1){
            echo "<span class='badge' style='background:#2ecc71;'>tersimpan</span>";
            }
            else 
             echo "<span class='badge' style='background:#f9243f;'>belum ada</span>";   
            ?></td>
            <td><?php    
            if ($cekberkas_g->num_rows() == 1){
             $result=$m_dosen->getberkas_g($idpengajuan);
            foreach ($result as $row1){
                echo "<a href='".base_url()."/berkas/administrasi/".$row1->NamaBerkas."'>".$row1->NamaBerkas."</a><br>";
            }
            }
       
            ?></td>
               
            </tr> 
                 
            
            </table>  
                
                
                
 <!-- POP UP -->   
                
                               
                </div>
          </div>
             
             
                        </section>
						<section id="section-tzoid-3">  
                                <div class="panel panel-default" style="  border-left: 6px solid #dd5209; margin-top:30px; ">    
            <div class="panel-body">
                
             <h3 style=" color: #dd5209">KELENGKAPAN BERKAS</h3><p>Kelengkapan Usul Penetapan Angka Kredit (PAK).</p>
                
                
                </div>
          </div>
            <div class="panel panel-default" style="  border-left: 6px solid #dd5209;  ">    
            <div class="panel-body">
            <div class="table-users">
   <div class="header">Pendidikan
             
                </div>
   
   <table cellspacing="0">
      <tr>
         <th>No</th>
         <th>Urutan Kegiatan</th>
         <th>Tanggal</th>
         <th>Satuan Hasil</th>
          <th>Angka Kredit</th>
          <th>Jumlah Angka Kredit</th>
          <th>Ket./Bukti Fisik</th>
          
      </tr>
    
       <?php 
    $kategorikegiatan ="";
    $jumlahKUMpendidikan=0;
    foreach($data_pendidikan as $row){
        
        $arrlength = count($row);

      if($data_pendidikan!=$row->KategoriKegiatan ){
    echo 
            "
               <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
          
           <td></td>
           <td></td>
           <td></td>
           
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td>- ".$row->SubKategoriKegiatan."</td>
           <td>".$row->Tanggal."</td>
           <td>".$row->SatuanHasil."</td>
       
           <td>".$row->AngkaKredit."</td>
           <td>".$row->JumlahAngkaKredit."</td>
          
           <td>";
            $result=$m_dosen->getbuktifisik($row->IDTriDharma);
            foreach ($result as $row1){
          echo "<a href='".base_url()."/berkas/pendidikan/".$row1->NamaBuktiFisik."'>".$row1->NamaBuktiFisik."</a><br>";
            }
        echo "
           </td>
          
        
              </tr>
           ";
           $jumlahKUMpendidikan=$jumlahKUMpendidikan+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                   
    echo"
         <tr>
       <td colspan='5' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpendidikan</h4></td>
       <td></td>
        </tr>       
    "
?>
     
   </table>
                </div>
               </div>
            </div>
         <div class="panel panel-default" style="  border-left: 6px solid #dd5209; ">    
            <div class="panel-body">
         <div class="table-users">
   <div class="header">Penelitian
             </div>
   
   <table cellspacing="0">
      <tr>
         <th>No</th>
         <th>Urutan Kegiatan</th>
         <th>Satuan Hasil</th>
          <th>Angka Kredit</th>
          <th>Jumlah Angka Kredit</th>
          <th>Ket./Bukti Fisik</th>
          
         
      </tr>
      <?php 
       $kategorikegiatan ="";
    $jumlahKUMpenelitian=0;
    foreach($data_penelitian as $row){
        
        $arrlength = count($row);

      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
              <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
          
           <td></td>
           <td></td>
          
        
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
           <td>".$row->SatuanHasil."</td>
           <td>".$row->AngkaKredit."</td>
           <td>".$row->JumlahAngkaKredit."</td>
          
           <td>";
            $result=$m_dosen->getbuktifisik($row->IDTriDharma);
            foreach ($result as $row1){
          echo "<a href='".base_url()."/berkas/penelitian/".$row1->NamaBuktiFisik."'>".$row1->NamaBuktiFisik."</a><br>";
            }
        echo "
           </td>
           
          
        
              </tr>
           ";
           $jumlahKUMpenelitian=$jumlahKUMpenelitian+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='4' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpenelitian</h4></td>
        <td></td>
       
        </tr>       
    "
                   ?>
      
   </table>
                </div>
             </div>
                 </div>
            
        <div class="panel panel-default" style="  border-left: 6px solid #dd5209; ">    
            <div class="panel-body">    
       <div class="table-users">
           
   <div class="header">Pengabdian
           
           </div>
   
   <table cellspacing="0">
      <tr>
         <th>No</th>
         <th>Urutan Kegiatan</th>
         <th>Tanggal</th>
         <th>Satuan Hasil</th>
          <th>Angka Kredit</th>
          <th>Jumlah Angka Kredit</th>
          <th>Ket./Bukti Fisik</th>
          
          
      </tr>
     <?php 
       $kategorikegiatan ="";
   $jumlahKUMpengabdian=0;
    foreach($data_pengabdian as $row){
        
        $arrlength = count($row);

      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
               <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
          
           <td></td>
           <td></td>
           <td></td>
       
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
             <td>".$row->Tanggal."</td>
           <td>".$row->SatuanHasil."</td>
           <td>".$row->AngkaKredit."</td>
           <td>".$row->JumlahAngkaKredit."</td>
          
           <td>";
            $result=$m_dosen->getbuktifisik($row->IDTriDharma);
            foreach ($result as $row1){
          echo "<a href='".base_url()."/berkas/pengabdian/".$row1->NamaBuktiFisik."'>".$row1->NamaBuktiFisik."</a><br>";
            }
        echo "
           </td>
           
         
        
              </tr>
           ";
           $jumlahKUMpengabdian=$jumlahKUMpengabdian+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='5' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpengabdian</h4></td>
        <td></td>
         
        </tr>       
    "
                   ?>

     
   </table>
                </div>
            </div>
            </div>  
            
            <div class="panel panel-default" style="  border-left: 6px solid #dd5209; ">    
            <div class="panel-body">
             <div class="table-users">
   <div class="header">Penunjang
            
                 </div>
   
   <table cellspacing="0">
      <tr>
         <th>No</th>
         <th>Urutan Kegiatan</th>
         <th>Tanggal</th>
         <th>Satuan Hasil</th>
          <th>Angka Kredit</th>
          <th>Jumlah Angka Kredit</th>
          <th>Ket./Bukti Fisik</th>
          
      </tr>
     <?php 
       $kategorikegiatan ="";
   $jumlahKUMpenunjang=0;
    foreach($data_penunjang as $row){
        
        $arrlength = count($row);

      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
               <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
          
           <td></td>
           <td></td>
           <td></td>
           
   
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
             <td>".$row->Tanggal."</td>
           <td>".$row->SatuanHasil."</td>
           <td>".$row->AngkaKredit."</td>
           <td>".$row->JumlahAngkaKredit."</td>
          
           <td>";
            $result=$m_dosen->getbuktifisik($row->IDTriDharma);
            foreach ($result as $row1){
          echo "<a href='".base_url()."/berkas/penunjang/".$row1->NamaBuktiFisik."'>".$row1->NamaBuktiFisik."</a><br>";
            }
        echo "
           </td>
           
          
        
              </tr>
           ";
           $jumlahKUMpenunjang=$jumlahKUMpenunjang+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='5' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpenunjang</h4></td>
        <td></td>
       
        </tr>       
    "
                   ?>

     

     
   </table>
                </div>
                </div>
</div>
            
             
                              
  </section>
						
					</div><!-- /content -->
				</div><!-- /tabs -->
				
			</section>
               
                 
        </div>               
         
              
            </div>
        </div>


       
    



</body>

 
 <!--   Core JS Files   -->
   <script src="<?php echo base_url();?>assets/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/cbpFWTabs.js"></script>



    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>


	<script type="text/javascript">
    	(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
     $("#tolak").click(function() {
        
            $('#revisi').show();
          
      
});    
	</script>

</html>
