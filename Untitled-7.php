 <div class="panel panel-default" style="  border-left: 6px solid #dd5209; margin-top:30px; ">    
            <div class="panel-body">
                
             <h3 style=" color: #dd5209">KELENGKAPAN BERKAS</h3><p>Kelengkapan Usul Penetapan Angka Kredit (PAK).</p>
                
                
                </div>
          </div>
            
           <?php foreach($statuspengajuan as $data){
                    $id = $data->IDPengajuan;
                    $kumtempuh = $data->KUMtempuh;
                }
          ?>
        <div  style="font-size:12px;" >     
         <div class="table-users">
   <div class="header">Pendidikan
                <?php echo"
                <a href='".base_url()."index.php/keloladosen/formpengajuanpendidikan?idpengajuan=".$id."'  style='float:right; margin-right:20px;'>
                
          <i class='fa fa-plus-square '></i>
        </a>";
              ?>
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
          <th></th>
      </tr>
    
       <?php 
    $kategorikegiatan ="";
    $jumlahKUMpendidikan=0;
    foreach($data_pendidikan as $row){
        
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
           
           <td><a href='#' class='btn btn-danger btn-sm' onclick='deletedata(".$row->IDTriDharma.")' style='border-radius:0;'>
           <span class='glyphicon glyphicon-remove'></span>
            </a>
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
       <td></td>
        </tr>       
    "
?>
     
   </table>

            </div>
         
         <div class="table-users">
   <div class="header">Penelitian
       <?php echo"
                <a href='".base_url()."index.php/keloladosen/formpengajuanpenelitian?idpengajuan=".$id."'  style='float:right; margin-right:20px;'>
                
         <i class='fa fa-plus-square '></i>
        </a>";
              ?>
             </div>
   
   <table cellspacing="0">
      <tr>
         <th>No</th>
         <th>Urutan Kegiatan</th>
         <th>Satuan Hasil</th>
          <th>Angka Kredit</th>
          <th>Jumlah Angka Kredit</th>
          <th>Ket./Bukti Fisik</th>
          <th></th>
         
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
           
           <td><a href='#' class='btn btn-danger btn-sm' onclick='deletepenelitian(".$row->IDTriDharma.")' style='border-radius:0;'>
           <span class='glyphicon glyphicon-remove'></span>
            </a>
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
         <td></td>
        </tr>       
    "
                   ?>
      
   </table>

                 </div>
              
       <div class="table-users">
           
   <div class="header">Pengabdian
           <?php echo"
                <a href='".base_url()."index.php/keloladosen/formpengajuanpengabdian?idpengajuan=".$id."'  style='float:right; margin-right:20px;'>
                
          <i class='fa fa-plus-square '></i>
        </a>";
              ?>
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
          <th></th>
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
           
           <td><a href='#' class='btn btn-danger btn-sm' onclick='deletepengabdian(".$row->IDTriDharma.")' style='border-radius:0;'>
           <span class='glyphicon glyphicon-remove'></span>
            </a>
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
         <td></td>
        </tr>       
    "
                   ?>

     
   </table>

            </div>  
            
             <div class="table-users">
   <div class="header">Penunjang
           <?php echo"
                <a href='".base_url()."index.php/keloladosen/formpengajuanpenunjang?idpengajuan=".$id."'  style='float:right; margin-right:20px;'>
          <i class='fa fa-plus-square '></i>
        </a>";
              ?>
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
          <th></th>
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
           
           <td><a href='#' class='btn btn-danger btn-sm' onclick='deletepenunjang(".$row->IDTriDharma.")' style='border-radius:0;'>
           <span class='glyphicon glyphicon-remove'></span>
            </a>
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
         <td></td>
        </tr>       
    "
                   ?>

     

     
   </table>
</div>
          
             
             
             </div> 
             
             
<div  style="margin-top:30px; text-align:center; margin-bottom:75px">
    
    <div id="alert_pendidikan" style="display:none">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong> Jumlah KUM pendidikan tidak boleh kurang dari <?php echo $AKpendidikan ?>.
</div>
        </div>
    
     
    <div id="alert_penelitian" style="display:none">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong> Jumlah KUM penelitian tidak boleh kurang dari <?php echo $AKpenelitian ?>.
</div>
        </div>
    
     
    <div id="alert_pengabdian" style="display:none">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong> Jumlah KUM pengabdian tidak boleh lebih dari <?php echo $AKpengabdian ?>.
</div>
        </div>
    
     
    <div id="alert_penunjang" style="display:none">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong> Jumlah KUM pendidikan tidak boleh lebih dari <?php echo $AKpenunjang ?>.
</div>
        </div>
    <div id="alert_kumtempuh" style="display:none">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Perhatian!</strong> Jumlah KUM keseluruhan kurang dari jumlah KUM yang harus ditempuh yaitu <?php echo $kumtempuh ?>.
</div>
        </div>
    <?php
    
         echo"
                
                 <div class='panel-heading'><b>Kebutuhan Angka Kredit Perbidang</b></div>
                 <div style='text-align:center; padding-left:250px;'>
                 <table class='table table-striped' style='text-align:center; width:65%;'  >
                 <tr>
                 <th style='text-align:center; width:50%;'>Unsur Kegiatan</th>
                 <th style='text-align:center; width:50%;'>Nilai AK</th>
                 </tr>
                 <tr>
                 <td>Pendidikan dan Pengajaran</td>
                 <td style='text-align:center;'> minimum ".$AKpendidikan."</td> 
                 </tr>
                 <tr>
                 <td>Penelitian</td>
                 <td style='text-align:center;'> minimum ".$AKpenelitian."</td> 
                 </tr>
                 <tr>
                 <td>Pengabdian</td>
               <td style='text-align:center;'> maksimum ".$AKpengabdian."</td> 
                 </tr>
                 <tr>
                 <td>Peunjang</td>
                 <td style='text-align:center;'> maksimum ".$AKpenunjang."</td> 
                 </tr>
                 </table>
                 </div>
                 ";       
        
        
    
                        
                        
    ?>
    
   <p>Harap teliti kembali semua inputan kegiatan sebelum diajukan untuk kenaikan jabatan fungsional anda</p>
    <?php
    
    echo "
         <a id='ajukandupak' class='btn btn-info' onclick='  cekakperbidang([".$jumlahKUMpendidikan.",".$jumlahKUMpenelitian.",".$jumlahKUMpengabdian.",".$jumlahKUMpenunjang.",".$AKpendidikan.",".$AKpenelitian.",".$AKpengabdian.",".$AKpenunjang.",".$id.",".$kumtempuh."])' style='border-radius:0px; '>Ajukan Berkas</a>
         ";
      ?>       
             </div>