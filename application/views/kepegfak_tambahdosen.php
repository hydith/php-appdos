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
                
                <li class="active">
                    <a href="<?php echo base_url();?>index.php/keloladosen/tampilsemuadosen">
                        <i class="ti-user"></i>
                        <p>List Dosen</p>
                    </a>
                </li>
                <li>
                <li >
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
              
            <div class="card">
                            <div class="header">
                                <h4 class="title" style=" color: #dd5209">Tambah Dosen</h4>
                            </div>
                            <div class="content">
                                <?php echo form_open_multipart('keloladosen/submitdatadosen');?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name='nama' class="form-control border-input"  placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>NIDN</label>
                                                <input type="text" name='nidn' class="form-control border-input" placeholder="Input NIDN" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Karpeg Dosen</label>
                                                <input type="text" name='karpeg' class="form-control border-input" placeholder="Input Karpeg">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name='email' class="form-control border-input" placeholder="input email" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. Hp</label>
                                                <input type="text" name="hp" class="form-control border-input" placeholder="Input Nommor HP" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat" class="form-control border-input" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="tgl" class="form-control border-input">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="kelahiran" class="form-control border-input" placeholder="Tempat Lahir" >
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jk"  class="form-control border-input" required>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan </option>       
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Unit Kerja</label>
                                                <input type="text" name='unit_kerja' class="form-control border-input" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pendidikan Terakhir</label>
                                                <input type="text" name='pendidikan' class="form-control border-input" placeholder="Input Pendidikan Terakhir">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <select name="gol"  class="form-control border-input" required>
                                            <option value="1">Penata Muda III/a</option>
                                            <option value="2">Penata Muda Tk.I III/b</option>
                                                    <option value="3">Penata III/c</option> 
                                                    <option value="4">Penata Tk.I III/d</option> 
                                                    <option value="5">Pembina IV/a</option> 
                                                    <option value="6">Pembina Tk.I IV/b</option> 
                                                    <option value="7">Pembina Utama Muda IV/c</option> 
                                                    <option value="8">Pembina Utama Madya IV/d</option> 
                                                    <option value="9">Pembina Utama IV/e</option> 
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TMT Golongan</label>
                                                <input type="date" name="tmt_gol" class="form-control border-input" >
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jabatan</label>
                                                <select name="jabatan"  class="form-control border-input" required>
                                            <option value="1">Asisten Ahli</option>
                                            <option value="2">Lektor</option>
                                                    <option value="3">Lektor Kepala</option> 
                                                    <option value="4">Guru Besar/Profesor</option> 
                                                    
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TMT Jabatan</label>
                                                <input type="date" name="tmt_jab" class="form-control border-input" >
                                            </div>
                                        </div>
                                        
                                    </div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                        <label>Upload Foto</label>
                                        <div class="input-group" style="margin-bottom:5px;">
                                            <label class="input-group-btn">
                                                <span class="btn btn-info">
                                                    Browse&hellip; <input type="file" id="uploadBtn1" name="uploadfile1" style="display: none;" onchange="validasiFile1();" >
                                                </span>
                                            </label>
                                            <input id="namaFile1" placeholder="Pilih File..." disabled="disabled" class="form-control" />
                                        </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Submit Data Dosen</button>
                                    </div>
                                    <div class="clearfix"></div>
                               <?php echo form_close()?> 
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
    	function validasiFile1(){
     
       var fup = document.getElementById('uploadBtn1');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext.toLowerCase() == "jpg" || ext.toLowerCase() == "png")
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
            alert("upload berkas dengan file img/png saja!");
            fup.value=' ';
            return false;
        }
       
}
      
	</script>

</html>
