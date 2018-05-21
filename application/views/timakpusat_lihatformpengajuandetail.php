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
         
          <th>Jumlah Angka Kredit</th>
            <th>Angka Kredit Penilai</th>
       <th></th>
      </tr>
    
       <?php 
    $jumlahnilaipendidikan=0;   
    $kategorikegiatan ="";
    $jumlahKUMpendidikan=0;   
    foreach($data_pendidikan as $row){
        $getnilai=$m_berkas->getnilaikegiatan($row->IDTriDharma);
        
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
           
           
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td>- ".$row->SubKategoriKegiatan."</td>
           
           <td>".$row->JumlahAngkaKredit."</td>
         <td>
           ";
          foreach($getnilai as $row2){
            $jumlahnilaipendidikan=$jumlahnilaipendidikan+$row2->Nilai;
            echo $row2->Nilai;
        }
           echo"
           </td>
          
        
           
        <td><a href='".base_url()."index.php/kelolaberkas/nilaikegiatanpendidikanpusat?idpengajuan=".$row->IDTriDharma."' class='btn btn-warning btn-sm' style='border-radius:0;'>
           <i class='ti-pencil-alt'></i>
            </a>
            </td>
              </tr>
           ";
           $jumlahKUMpendidikan=$jumlahKUMpendidikan+$row->JumlahAngkaKredit;
           
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                   
    echo"
         <tr>
       <td colspan='2' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpendidikan</h4></td>
             <td><h4>$jumlahnilaipendidikan</h4></td>
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
        
          <th>Jumlah Angka Kredit</th>
      <th>Angka Kredit Penilai</th>
          <th></th>
          
         
      </tr>
      <?php 
    $jumlahnilaipenelitian=0;       
       $kategorikegiatan ="";
    $jumlahKUMpenelitian=0;
    foreach($data_penelitian as $row){
        
        $arrlength = count($row);
$getnilai=$m_berkas->getnilaikegiatan($row->IDTriDharma);
       
      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
              <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
           <td></td>
        
          
        
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
          
           <td>".$row->JumlahAngkaKredit."</td>
            <td>
           ";
          foreach($getnilai as $row2){
            $jumlahnilaipenelitian=$jumlahnilaipenelitian+$row2->Nilai;
            echo $row2->Nilai;
        }
           echo"
           </td>
         <td><a href='".base_url()."index.php/kelolaberkas/nilaikegiatanpenelitianpusat?idpengajuan=".$row->IDTriDharma."' class='btn btn-warning btn-sm' style='border-radius:0;'>
           <i class='ti-pencil-alt'></i>
            </a>
            </td>
           
          
        
              </tr>
           ";
           $jumlahKUMpenelitian=$jumlahKUMpenelitian+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='2' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpenelitian</h4></td>
             <td><h4>$jumlahnilaipenelitian</h4></td>
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
        
          <th>Jumlah Angka Kredit</th>
      <th>Angka Kredit Penilai</th>
          <th></th>
          
      </tr>
     <?php 
        $jumlahnilaipengabdian=0;                 
       $kategorikegiatan ="";
   $jumlahKUMpengabdian=0;
    foreach($data_pengabdian as $row){
        
        $arrlength = count($row);
$getnilai=$m_berkas->getnilaikegiatan($row->IDTriDharma);
        
      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
               <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
          <td></td>
           
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
             
           
           <td>".$row->JumlahAngkaKredit."</td>
           <td>
           ";
          foreach($getnilai as $row2){
            $jumlahnilaipengabdian=$jumlahnilaipengabdian+$row2->Nilai;
            echo $row2->Nilai;
        }
           echo"
           </td>
         <td><a href='".base_url()."index.php/kelolaberkas/nilaikegiatanpengabdianpusat?idpengajuan=".$row->IDTriDharma."' class='btn btn-warning btn-sm' style='border-radius:0;'>
           <i class='ti-pencil-alt'></i>
            </a>
            </td>
           
          
        
              </tr>
           ";
           $jumlahKUMpengabdian=$jumlahKUMpengabdian+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='2' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpengabdian</h4></td>
             <td><h4>$jumlahnilaipengabdian</h4></td>
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
         
          <th>Jumlah Angka Kredit</th>
          <th>Angka Kredit Penilai</th>
          <th></th>
          
      </tr>
     <?php 
         $jumlahnilaipenunjang=0;                 
       $kategorikegiatan ="";
   $jumlahKUMpenunjang=0;
    foreach($data_penunjang as $row){
        
        $arrlength = count($row);
$getnilai=$m_berkas->getnilaikegiatan($row->IDTriDharma);
       
      if($kategorikegiatan!=$row->KategoriKegiatan ){
    echo 
            "
               <tr>
            <td>".$row->Kode."</td>
           <td>".$row->KategoriKegiatan."</td>
           
           
         
            
     
 

           
           <td></td>
           <td></td>
           <td></td>
          
          
           
   
         
           
          
       </tr>";
       }
        echo "
       <tr>
        <td></td>
            <td style='text-align: justify'>- ".$row->SubKategoriKegiatan."</td>
          
           <td>".$row->JumlahAngkaKredit."</td>
          <td>
           ";
          foreach($getnilai as $row2){
            $jumlahnilaipenunjang=$jumlahnilaipenunjang+$row2->Nilai;
            echo $row2->Nilai;
        }
           echo"
           </td>
         <td><a href='".base_url()."index.php/kelolaberkas/nilaikegiatanpenunjangpusat?idpengajuan=".$row->IDTriDharma."' class='btn btn-warning btn-sm' style='border-radius:0;'>
           <i class='ti-pencil-alt'></i>
            </a>
            </td>
           
          
        
              </tr>
           ";
           $jumlahKUMpenunjang=$jumlahKUMpenunjang+$row->JumlahAngkaKredit;
           $kategorikegiatan = $row->KategoriKegiatan;      
        }
                    echo"
         <tr>
       <td colspan='2' style='text-align: center'><h4>Jumlah</h4></td>
             <td><h4>$jumlahKUMpenunjang</h4></td>
             <td><h4>$jumlahnilaipenunjang</h4></td>
        <td></td>
       
        </tr>       
    "
                   ?>

     

     
   </table>
                </div>
                
                
                
                
               <div class='alert alert-danger alert-dismissible fade in'>

                <strong>Perhatian!</strong><p style='text-align:justify;'>Dimohon untuk mengecek kembali sebelum nilai disubmit</p>
                </div> 
              <div class="text-center">  
             <a href='<?php echo base_url();?>index.php/kelolaberkas/submitpenilaianpusat?idpengajuan=<?php echo $this->input->get('idpengajuan')?>' class='btn btn-warning' style='border-radius:0px;'>Submit Penilaian</a> 
                </div>  
                
                
                </div>
</div>
            
             
              
              
                 
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
