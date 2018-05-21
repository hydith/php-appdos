<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/simple-sidebar.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
      <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
       <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js "></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
      
      
   <style type="text/css">
		
			.error {color:red; }
	
			 .fa {cursor: pointer; }
       .active1, input[type='text'] {width: 100%; height: 34px;margin: 10px 0 0 0;}
		
		</style>

  </head>

 <body>
    <div id="wrapper" class="active">
      
      <!-- Sidebar -->
            <!-- Sidebar -->
     
            <?php
                $this->load->view('navigasi-menu');
            ?> 
        
      <!-- Halaman Konten -->
      <div id="page-content-wrapper">
        <!-- Buat seluruh isi konten berada dalam class="page-content inset" -->
        <div class="page-content inset">
            <div id="top-banner" style="background:#7f8c8d; height: 80px;">
           <img src="<?php echo base_url();?>assets/gambar/logo1.png" style="margin-left:880px; position:absolute;">
                <img src="<?php echo base_url();?>assets/gambar/logo2.png" style="opacity:0.2; float:right; ">
            </div>
         
        
            
    <div id="content" style="margin-left:200px; margin-right:40px;">     
                 
         
          <div class="tag"><a href="#">Home</a></div>
       
            
         <div class="row" style="padding:0;">
              <div class="panel panel-default" style="  border-left: 6px solid #dd5209;">    
            <div class="panel-body">
                
                <h3 style=" color: #dd5209">Ubah Password</h3><p>Ubah password anda demi keamanan</p>
              <form action="<?php echo base_url();?>index.php/keloladosen/setpasswordbaru" method="post" id="frm-mhs">
                <table class="table table-striped table-bordered">
                <tr>
         <td>
         <label>Password Baru</label>
        
             <input type="password" name="pass1" id="pass1" class="form-control" required>
         
         </td>
         </tr>
                    <tr>
         <td>
         <label>Password Baru (Again) <i id="icon" class="fa fa-eye-slash"></i> </label>
        
             <input type="password" name="pass2" id="pswd2" class="form-control" required>
         
         </td>
         </tr>
                </table> 
                
        <input type="submit" class="btn btn-info" value="Ganti Password" style="width:100%; border-radius:0;"/>        
                </form>
                  </div>
             </div>
                   
        
       
        </div>               
         
  
        </div>          
            
        
        </div>
      </div>
      
    </div><!-- Akhir Wrapper -->
      <script>
      $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          pass2: {
            equalTo: "#pass1"
          }
        },
        messages: {
          pass2: {
            equalTo: "<p>Password yang Anda Masukan Tidak Sama</p>"
          }
        }
      });
    });

// Proses Show Password
var input = document.getElementById('pswd2'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

     if(input.className == 'active1') {
        input.setAttribute('type', 'text');
        icon.className = 'fa fa-eye';
       input.className = '';

     } else {
         
        input.setAttribute('type', 'password');
        icon.className = 'fa fa-eye-slash';
       input.className = 'active1';
    }

   }
      
      </script>
     
  </body>
    
    
</html>
