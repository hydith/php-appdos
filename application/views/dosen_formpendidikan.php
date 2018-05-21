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
               <div class="row" style="padding:0;  margin-left:0px; margin-right:0px;">
              <!-- konten disini -->
        <div class="col-sm-12" style="background: #ecf0f1;"> 
            <h3 style="text-align:center; margin-bottom:50px;  color: #dd5209">FORM PERNYATAAN<br>   MELAKSANAKAN PENDIDIKAN </h3>
           
        <div class="col-sm-6">
            <div class="panel panel-default" style=" border-left: 6px solid #dd5209; ">
                <div class="panel-heading" style="color:#dd5209"><b>Form Pengisian Kegiatan</b></div>
                    <div class="panel-body">
                        
                        
                          <?php echo form_open_multipart('keloladosen/submitkegiatanpendidikan');?>
                        
                        
                        
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
              "<option value=".$row->No.">".$row->KategoriKegiatan."</option>
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
        
             <tr id="form_tambahan" style="display:none">
         <td>
         <label>Jumlah Periode/Semester</label>
         <div id="combox3" > <!-- sebagai indentitas combo box -->
             <div class="row">
                 <div class="col-sm-2"  >
             <input type="text" name="jml_semester" id="jml_semester" class="form-control" style="width:50px;"> 
                     </div>
                 <div class="col-sm-2" style="padding-top:7px; padding-left:0px;">
                     <p>Semester</p>
                 </div>
             </div>
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
                            <td>Angka Kredit</td>
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
          <div id="ifAjar" style="display:none">
             <div class="panel panel-default">
                <div class="panel-heading"><b>Masukkan Mata Kuliah</b></div>
                    <div class="panel-body">
                        
                        
                         <form method="post" class="form-user">
                           <table class="table">
                              
                 <tr>
                <td>Nama Mata Kuliah</td>
                <td>:</td>
                <td><textarea name="matkul" id="ket"  class="form-control" rows="5" id="comment" required></textarea></td>     
                </tr>
                     <tr>
                     <td>SKS Matkul</td>
                     <td>:</td>
                     <td><input type="text" name="sks" id="tgl" class="form-control" style="width:75px;" required></td>
                     </tr>
                     <tr>
                     <td>Jumlah Kelas</td>
                     <td>:</td>
                     <td><input type="text" name="kelas" id="tgl" class="form-control" style="width:75px;" required></td>
                     </tr>
                    
                 </table>
                         <a id="tambah" class="btn btn-info"  style="width:100%; border-radius:0;">Tambah MataKuliah</a>
                               </form>
                        
                        
                 </div>
                 </div>
           
            
            <div class="tampilmatkul">
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
        if ($(this).val() == "II.A") {
            $('#ifAjar').show();
          
        } else {
         
            $('#ifAjar').hide();
        }
        if ($(this).val() == "II.J") {
            $('#form_tambahan').show();
          
        } else {
         
            $('#form_tambahan').hide();
        }
    });
});
 
     </script>

  <script>
      
$(document).ready(function () {
    $('#combox1 select').change(function () {
        
        var kodeKeg = $(this).val();
        console.log(kodeKeg);  //menampilan pada log browser apa yang dibawa pada saat dipilih pada combo box
        $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgeturaiankegiatan/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "kode="+kodeKeg,   //data yang akan dibawa di url
            dataType: "html",
            success: function(data) {
                $('#input_sub_kegiatan').html(data); 
                
                //hasil ditampilkan pada combobox id=kota
            },
          
        })
    });
 });
    
      
      $(document).ready(function(){
    $('#tambah').click(function(){
        var data = $('.form-user').serialize();
        $.ajax({
            type : 'POST',
            url  :"<?php echo base_url()?>index.php/keloladosen/inputpengajaran/",
            data : data,
           success :function(data){
               $('.tampilmatkul').html(data);
           }
        })
    });
     
});
         function deletedata(kode){
        
        var idajar = kode;
        $.ajax({
            type : 'POST',
            url  :"<?php echo base_url()?>index.php/keloladosen/hapuspengajaran/",
            data : "id="+idajar,
           success :function(data ){
              $('.tampilmatkul').html(data);
           }
        });
    }
      
      function tampilmatkul(kode, kum){
          var idajar = kode;
          var kumajar = kum;
        var datas="id="+idajar+"&kum="+kumajar;
        var idajar = kode;
        $.ajax({
            type : 'POST',
            url  :"<?php echo base_url()?>index.php/keloladosen/tampilpengajaran/",
            data : datas,
           success :function(data ){
              $('#ket').html(data);
           }
        });
    }
     

var max;      
$(document).ready(function () {
    $('#combox2 select').change(function () {
        var no = $(this).val();
        //alert(no);
        console.log(no);  //menampilan pada log browser apa yang dibawa pada saat dipilih pada combo box
       $.ajax({
            url: "<?=base_url()?>index.php/keloladosen/formgeturaiankegiatandetail/",       //memanggil function controller dari url
            async: false,
            type: "POST",     //jenis method yang dibawa ke function
            data: "noKeg="+no,   //data yang akan dibawa di url
            dataType: "json",
            success: function(data) {
                
                $('#HintKet').html(data['Ket']); 
                $('#HintTanggal').html(data['Tanggal']);
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
