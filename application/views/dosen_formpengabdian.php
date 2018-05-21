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
                
               <div class="row" style="padding:0;">
              <!-- konten disini -->
        <div class="col-sm-12" style="background: #ecf0f1;"> 
            <h3 style="text-align:center; margin-bottom:50px;">FORM PERNYATAAN<br>   MELAKSANAKAN PENGABDIAN KEPADA MASYARAKAT </h3>
           
        <div class="col-sm-6">
            <div class="panel panel-default"  style=" border-left: 6px solid #dd5209; ">
                <div class="panel-heading" style="color:#dd5209"><b>Form Pengisian Kegiatan</b></div>
                    <div class="panel-body">
                        
                        
                          <?php echo form_open_multipart('keloladosen/submitkegiatanpengabdian');?>
                        
                        
                       
        <table class="table table-striped table-bordered">
         <tr>
         <td>
             
       <input type="hidden" name="id" id="id" value="<?php echo $this->input->get('idpengajuan');?>"/> 
            
            <label>Kategori Kegiatan</label>
         <div id="combox1"> <!-- sebagai indentitas combo box -->
              <select name='kegiatan_input' id='kegiatan_input' class='form-control' required>
                <option></option>
             <?php 
           foreach($kategori as $row){
          echo 
              "<option value=".$row->Kode.">".$row->NamaKegiatan."</option>
              ";
             
            }

            ?>
             </select>
          </div>
         </td>
         </tr>
            
            <tr>
         <td>
         <label>Uraian Kegiatan</label>
         <div id="combox2"> <!-- sebagai indentitas combo box -->
             <select name="input_sub_kegiatan" id="input_sub_kegiatan" class="form-control" required>
                 <option></option>
             </select>
             
          </div>
         </td>
         </tr>
     
        
         
        
                <tr id="form_tambahan" style="display:none">
         <td>
         <label>Waktu</label>
         <div id="combox3" > <!-- sebagai indentitas combo box -->
             <select name="waktu" id="waktu" class="form-control"  >
                 <option></option>
             </select>
             
          </div>
         </td>
         </tr>
            
          <tr id="form_tambahan2" style="display:none">
         <td>
         <label>Tingkat</label>
         <div id="combox4"> <!-- sebagai indentitas combo box -->
             <select name="tingkat" id="tingkat" class="form-control" >
                 <option></option>
             </select>
             
          </div>
         </td>
         </tr>        
           
            
                                     
         <tr>
         <td>
         <label>Keterangan</label>
         <div id="combox"> <!-- sebagai indentitas combo box -->
            <textarea name="ket" id="ket"  class="form-control" rows="5" style="white-space: pre-line;" required></textarea>
             <small id="Hint" class="form-text text-muted">Contoh  : </small>
             <small id="HintKet" class="form-text text-muted"></small>
          
          </div>
         </td>
         </tr>
            
               <tr>
         <td>
         <label>Tanggal/Semester</label>
         <div id="combox"> <!-- sebagai indentitas combo box -->
             <input type="text" name="tgl" id="tgl" class="form-control" required>
          </div>
         </td>
         </tr>
            
         <tr>
         <td>
         <label>Ket./Bukti Fisik</label>
            <div class="input-group" style="margin-bottom:5px;">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        Browse&hellip; <input type="file" id="uploadBtn1" name="uploadfile1" style="display: none;" onchange="validasiFile1();" >
                    </span>
                </label>
                <input id="namaFile1" placeholder="Pilih File..." disabled="disabled" class="form-control" />
            </div>
              <div class="input-group" style="margin-bottom:5px;">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        Browse&hellip; <input type="file" id="uploadBtn2" name="uploadfile2" style="display: none;" onchange="validasiFile2();" >
                    </span>
                </label>
                <input id="namaFile2" placeholder="Pilih File..." disabled="disabled" class="form-control" />
            </div>
             
             <div class="input-group" style="margin-bottom:5px;">
                <label class="input-group-btn">
                    <span class="btn btn-info">
                        Browse&hellip; <input type="file" id="uploadBtn3" name="uploadfile3" style="display: none;" onchange="validasiFile3();" >
                    </span>
                </label>
                <input id="namaFile3" placeholder="Pilih File..." disabled="disabled" class="form-control" />
            </div>
           
         
         </td>
         </tr>
            
                                                          
       
        
       </table>
    
              <input type="submit" class="btn btn-info" value="Ajukan" style="width:100%; border-radius:0;"/>  
                          <?php echo form_close()?> 
                </div>
            </div>
            </div>
              
        <div class="col-sm-6">
             <div class="panel panel-default" style=" border-left: 6px solid #dd5209; ">
                    <div class="panel-body">
                        <table class="table table-striped">
                             <tr>
                            <td>Tanggal/Semester</td>
                            <td>:</td>
                            <td><div id="HintTanggal"></div></td>
                        </tr>
                        <tr>
                            <td>Satuan Hasil</td>
                            <td>:</td>
                            <td><div id="HintHasil"></div></td>
                        </tr> 
                         <tr>
                            <td>Angka Kredit Maksimal</td>
                            <td>:</td>
                            <td><div id="HintAngka"></div></td>
                        </tr>    
                        <tr>
                            <td>Ket/Bukti Fisik</td>
                            <td>:</td>
                            <td><div id="HintBukti"></div></td>
                        </tr>
                        </table>
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
    // Kondisi saat Form di-load
   
    // Kondisi saat ComboBox (Select Option) dipilih nilainya
    $("#kegiatan_input").change(function() {
        if ($(this).val() == "IV.C") {
            $('#form_tambahan').show();
            $('#form_tambahan2').show();
          
        } else {
            $('#form_tambahan').hide();
            $('#form_tambahan2').hide();
        }
    });
});
       
 
     </script>

  <script>

     
$(document).ready(function () {
    $('#combox1 select').change(function () {
        
        var kodeKeg = $(this).val();
      if(kodeKeg=="IV.C"){
        $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgetjenispengabdian/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            dataType: "html",
            success: function(data) {
                $('#input_sub_kegiatan').html(data);   //hasil ditampilkan pada combobox id=kota
            },
          
        })
      
      }
        else{
        $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgeturaiankegiatanpengabdian/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "kode="+kodeKeg,   //data yang akan dibawa di url
            dataType: "html",
            success: function(data) {
                $('#input_sub_kegiatan').html(data);   //hasil ditampilkan pada combobox id=kota
            },
          
        })
        }
        
    });
 });   


      
$(document).ready(function () {
    $('#combox2 select').change(function () {
         var no  = $(this).val();
        var kodeKeg = document.getElementById('kegiatan_input').value;
        if(kodeKeg=='IV.C'){
     $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgetwaktupengabdian/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "noKeg="+no,   //data yang akan dibawa di url
            dataType: "html",
            success: function(data) {
                $('#waktu').html(data); 
            }
        })
        }
        
        else{
            $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgeturaiankegiatanpengabdiandetail/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "noKeg="+no,   //data yang akan dibawa di url
            dataType: "json",
            success: function(data) {
                $('#HintTanggal').html(data['Tanggal']);
                $('#HintKet').html(data['Ket']); 
                $('#HintHasil').html(data['SatuanHasil']);
                $('#HintAngka').html(data['AngkaKredit']);
                $('#HintBukti').html(data['KetBukti']);
            }
        })  
            
        }
    });
 });
      
      $(document).ready(function () {
    $('#combox3 select').change(function () {
        var kodeKeg = $(this).val();
        $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgettingkatpengabdian/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "kode="+kodeKeg,   //data yang akan dibawa di url
            dataType: "html",
            success: function(data) {
                $('#tingkat').html(data);   //hasil ditampilkan pada combobox id=kota
            },
          
        })
    });
 });
      
      $(document).ready(function () {
    $('#combox4 select').change(function () {
        var no = $(this).val();
       $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgettingkatpengabdiandetail/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "no="+no,   //data yang akan dibawa di url
            dataType: "json",
            success: function(data) {
                $('#HintTanggal').html(data['Tanggal']);
                $('#HintKet').html(data['Ket']); 
                $('#HintHasil').html(data['SatuanHasil']);
                $('#HintAngka').html(data['AngkaKredit']);
                $('#HintBukti').html(data['KetBukti']);
            }
        })
    });
 });
      function validasiFile1(){
     
       var fup = document.getElementById('uploadBtn1');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext.toLowerCase() == "pdf")
        {
           
             document.getElementById("namaFile1").value = document.getElementById('uploadBtn1').value;
            return true;
        } 
        else if(ext=="")
        {
            alert("No file selected");
            fup.focus();
            return false;
        }else
        {
            alert("upload berkas dengan file pdf saja!");
            fup.value=' ';
            return false;
        }
       
}
      function validasiFile2(){
     
       var fup = document.getElementById('uploadBtn2');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext.toLowerCase() == "pdf")
        {
           
             document.getElementById("namaFile2").value = document.getElementById('uploadBtn2').value;
            return true;
        } 
        else if(ext=="")
        {
            alert("No file selected");
            fup.focus();
            return false;
        }else
        {
            alert("upload berkas dengan file pdf saja!");
            fup.value=' ';
            return false;
        }
       
}
      function validasiFile3(){
     
       var fup = document.getElementById('uploadBtn3');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext.toLowerCase() == "pdf")
        {
           
             document.getElementById("namaFile3").value = document.getElementById('uploadBtn3').value;
            return true;
        } 
        else if(ext=="")
        {
            alert("No file selected");
            fup.focus();
            return false;
        }else
        {
            alert("upload berkas dengan file pdf saja!");
            fup.value=' ';
            return false;
        }
       
}
      
      
  
    
    
</script>
     
</html>
