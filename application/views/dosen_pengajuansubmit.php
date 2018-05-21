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
<script> 
          $(document).ready(function(){
   $('#gol').on('change',function(){
    var get=$('select option:selected').text();
    if(get=='Asisten Ahli, III/b'){
        document.getElementById('text_area').value=150;
    };
    if(get=='Lektor, III/c'){
        document.getElementById('text_area').value=200;
    };
    if(get=='Lektor, III/d'){
        document.getElementById('text_area').value=300;
    };   
       if(get=='Lektor Kepala, IV/a'){
        document.getElementById('text_area').value=400;
    };
        if(get=='Lektor Kepala, IV/b'){
        document.getElementById('text_area').value=550;
    };
        if(get=='Lektor Kepala, IV/c'){
        document.getElementById('text_area').value=700;
    };
       if(get=='Guru Besar/Professor, IV/d'){
        document.getElementById('text_area').value=850;
    };
        if(get=='Guru Besar/Professor, IV/e'){
        document.getElementById('text_area').value=1050;
    };
    
});
          });
      </script>
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
              
                 <div class="row" style="padding:0;">
              <!-- konten disini -->
        <div class="col-sm-12" style="padding:0;"> 
           <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 style="text-align:center;  color: #dd5209" class="title">Jabatan Saat Ini</h4>
                                
                            </div>
                            <div class="content">
                                 <?php foreach ($data as $row){
    
            $currKUM = $row->SyaratKUM;
          echo "
          <table class='table' >
          <tr style='margin-bottom:75px'>
          <td>Jabatan Fungsional Sekarang</td>
          <td>:</td>
          <td>".$row->NamaJabatan.", ".$row->GolAngka."/".$row->GolHuruf." </td>
        </tr>
        <tr>
          <td>Jumlah KUM Saat Ini</td>
          <td>:</td>
          <td>".$currKUM."</td>
        </tr>
          </table>
          
          ";
} ?> 
                            </div>
                        </div>
                    </div>  
         <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 style="text-align:center;  color: #dd5209" class="title">Pengajuan Kenaikan Jabatan</h4>
                                
                            </div>
                            <div class="content">
                               <?php echo form_open('keloladosen/pengajuansubmit'); ?>  
           <table class="table">
          <tr>
          <td>Naik Ke Jabatan</td>
          <td>:</td>
          <td>
        
  
      <select class="form-control" name="gol" id="gol" required>
          
         <option>Asisten Ahli, III/b</option>
        <option>Lektor, III/c</option>
        <option>Lektor, III/d</option>
        <option>Lektor Kepala, IV/a</option>
          <option>Lektor Kepala, IV/b</option>
          <option>Lektor Kepala, IV/c</option>  
        <option>Guru Besar/Professor, IV/d</option>
          <option>Guru Besar/Professor IV/e</option>
          
      </select>
        
             
              </td>
        </tr>
        <tr>
          <td>Jumlah KUM Jabatan</td>
          <td>:</td>
          <td>
           
              <textarea class="form-control" name="textarea" id="text_area" style="height:33px;"></textarea>    
           
          
            
              
            
                            
       
          
           
            </td>
        </tr>
          </table>
                                <input type="submit" name="submit" value="Submit" class='btn btn-info' style='border-radius:0px;'/>
            <?php echo form_close()?>  
                            </div>
                        </div>
                    </div>
        
      
  
            
           
            
        </div>   
         
            
                  <!-- jwpopup box -->
                    <div id="jwpopupBox" class="jwpopup">
	<!-- jwpopup content -->
	<div class="jwpopup-content">
		<div class="jwpopup-head">
			<span class="close">×</span>
			
		</div>
		 <div class="card">
                            <div class="header">
                                <h4 style=" color: #dd5209" class="title">Review Pengajuan Kenaikan Jabatan</h4>
                                <p class="category">Ulasan kenaikan jabatan yang diinginkan</p>
                            </div>
                            <div class="content">
                              <?php 
                            $akpendidikan;
                            $akpenelitian;
                            $akpengabdian;
                            $akpenunjang;
                            foreach($data as $row){
                                $kumsekarang=$row->SyaratKUM;
                                $kumtempuh=$kum-$kumsekarang;
                                $currjabatan=$row->IDJabatan;
                                $currGol=$row->IDGolongan;
                                echo "
                                <table class='table'>
                                <tr>
                                <td>Jabatan Saat Ini</td>
                                <td>:</td>
                                <td>".$row->NamaJabatan.", ".$row->GolAngka."/".$row->GolHuruf."</td>
                                </tr>
                                <tr>
                                <td>Jumlah KUM Saat Ini</td>
                                <td>:</td>
                                <td>".$kumsekarang."</td>
                                </tr>
                                <tr>
                                <td>Jabatan yang Dituju</td>
                                <td>:</td>
                                <td>".$jabatanpilihan."</td>
                                </tr>
                                <tr>
                                <td>Jumlah Kum Tujuan</td>
                                <td>:</td>
                                <td>".$kum."</td>
                                </tr>
                                <tr>
                                <td>Kum yang harus ditempuh</td>
                                <td>:</td>
                                <td>".$kumtempuh."</td>
                                </tr>
                                
                                </table>
                                
                                ";
                            }
                                if($jabatanpilihan=='Asisten Ahli, III/b'){
                                    $akpendidikan=$kumtempuh*55/100;
                                    $akpenelitian=$kumtempuh*25/100;
                                    $akpengabdian=$kumtempuh*10/100;
                                    $akpenunjang=$kumtempuh*10/100;
                                }
                                elseif($jabatanpilihan=='Lektor, III/c' || $jabatanpilihan=='Lektor, III/d'){
                                    $akpendidikan=$kumtempuh*45/100;
                                    $akpenelitian=$kumtempuh*35/100;
                                    $akpengabdian=$kumtempuh*10/100;
                                    $akpenunjang=$kumtempuh*10/100;
                                }
                                elseif($jabatanpilihan=='Lektor Kepala, IV/a' || $jabatanpilihan=='Lektor Kepala, IV/b' || $jabatanpilihan=='Lektor Kepala, IV/c'){
                                    $akpendidikan=$kumtempuh*40/100;
                                    $akpenelitian=$kumtempuh*40/100;
                                    $akpengabdian=$kumtempuh*10/100;
                                    $akpenunjang=$kumtempuh*10/100;
                                }
                                elseif($jabatanpilihan=='Guru Besar/Professor, IV/d' || $jabatanpilihan=='Guru Besar/Professor, IV/e'){
                                    $akpendidikan=$kumtempuh*35/100;
                                    $akpenelitian=$kumtempuh*45/100;
                                    $akpengabdian=$kumtempuh*10/100;
                                    $akpenunjang=$kumtempuh*10/100;
                                }
                                
                                echo "
                                  <h4 style=' color: #dd5209' class='title'>Angka Kredit Perbidang</h4>
                                <p class='category'>Kebutuhan Angka Kredit Perbidang</p>
                           
                 <div style='text-align:center; '>
                 <table class='table table-striped' style='text-align:center; '  >
                 <tr>
                 <th style='text-align:center; width:50%;'>Unsur Kegiatan</th>
                 <th style='text-align:center; width:50%;'>Nilai AK</th>
                 </tr>
                 <tr>
                 <td>Pendidikan dan Pengajaran</td>
                 <td style='text-align:center;'> minimum ".$akpendidikan."</td> 
                 </tr>
                 <tr>
                 <td>Penelitian</td>
                 <td style='text-align:center;'> minimum ".$akpenelitian."</td> 
                 </tr>
                 <tr>
                 <td>Pengabdian</td>
               <td style='text-align:center;'> maksimum ".$akpengabdian."</td> 
                 </tr>
                 <tr>
                 <td>Peunjang</td>
                 <td style='text-align:center;'> maksimum ".$akpenunjang."</td> 
                 </tr>
                 </table>
                 </div>
                 
                 <a href='".base_url()."index.php/keloladosen/ajukankenaikan?jabatanpilihan=".$jabatanpilihan."&currJabatan=".$currjabatan."&currKUM=".$kumsekarang."&currGol=".$currGol."&kumtujuan=".$kum."&kumtempuh=".$kumtempuh."&akpendidikan=".$akpendidikan."&akpenelitian=".$akpenelitian."&akpengabdian=".$akpengabdian."&akpenunjang=".$akpenunjang."' class='btn btn-info' style='border-radius:0px; width:100%;'>Ajukan</a>
                                
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
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>



    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>


	 <script>
     function myFunction(){
         <?php foreach ($data as $row){
                $idgol = $row->IDGolongan;
        } ?>
         var gol = <?php echo $idgol ?>;
         
    if (gol==2){
        document.getElementById("gol").selectedIndex = "0";
         document.getElementById('text_area').value=150;
    
    }
    else if (gol==3){
        document.getElementById("gol").selectedIndex = "1";
        document.getElementById('text_area').value=200;
    }
    else if (gol==4){
        document.getElementById("gol").selectedIndex = "2";
        document.getElementById('text_area').value=300;
    }
    else if (gol==5){
        document.getElementById("gol").selectedIndex = "3";
        document.getElementById('text_area').value=400;
    }
    else if (gol==6){
        document.getElementById("gol").selectedIndex = "4";
         document.getElementById('text_area').value=550;
    }     
    else if (gol==7){
        document.getElementById("gol").selectedIndex = "5";
        document.getElementById('text_area').value=700;
    }     
    else if (gol==8){
        document.getElementById("gol").selectedIndex = "6";
        document.getElementById('text_area').value=850;
    }
    else if (gol==9){
        document.getElementById("gol").selectedIndex = "7";
        document.getElementById('text_area').value=1050;
    }
     }
     
         myFunction();  
         
    // untuk mendapatkan jwpopup
var jwpopup = document.getElementById('jwpopupBox');

// untuk mendapatkan link untuk membuka jwpopup
var mpLink = document.getElementById("jwpopupLink");

// untuk mendapatkan aksi elemen close
var close = document.getElementsByClassName("close")[0];

// membuka jwpopup ketika link di klik
    function insertajuantemp(){
       var gol =document.getElementById('gol').value;
        var kum =document.getElementById('text_area').value;
        
        $.ajax({
            type : 'POST',
            url  :"<?php echo base_url()?>index.php/keloladosen/datapengajuantemp/",
            data : 'jabatan=' + gol + '&kum=' + kum
            
         
        });
       
    $('.jwpopup').fadeIn();
    }     
//    $('#jwpopupLink').click(function() {
//        var gol =document.getElementById('gol').value;
//        var kum =document.getElementById('text_area').value;
//        $.ajax({
//            type : 'POST',
//            url  :"<?php echo base_url()?>index.php/keloladosen/datapengajuantemp/",
//            data : 'jabatan=' + gol + '&kum=' + kum,
//                success :function(data ){
//                alert("berhasil");
//           }
//            error: function(XMLHttpRequest, textStatus, errorThrown) { 
//        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
//    }
//        });        
//  
//  });
         


// membuka jwpopup ketika elemen di klik
close.onclick = function() {
    jwpopup.style.display = "none";
}

// membuka jwpopup ketika user melakukan klik diluar area popup
window.onclick = function(event) {
    if (event.target == jwpopup) {
        jwpopup.style.display = "none";
    }
}     
     </script>

</html>
