<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" />
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js "></script>
</head>

  <body style="background: radial-gradient(80% 80%, #424242, #212121);">

  <div class="row">
      <div class="col-sm-6" style=" margin-top:180px; padding-left:200px;">
         
       <img style="width:80%; margin-top:7px; " src="<?php echo base_url();?>assets/img/logo.png">
      
          <div class="col-sm-3" style="padding-left:0px;">
        <img style="width:100%; margin-top:18px; " src="<?php echo base_url();?>assets/img/logo-ub.png">      
          
          </div> 
          <div class="col-sm-8" style="padding-left:0px; padding-top:15px">
          <p>Sistem Informasi Kenaikan Jabatan Fungsional Dosen Universitas Brawijaya</p>
          </div>  
      </div>
      <div class="col-sm-6" style=" margin-top:150px; padding-top:50px; padding-right:280px; padding-left:50px">
    <div class="form login">

       
      <div class="form__field">
        <label for="login__username" style="height:60px;"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
        <input style="height:60px;" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
      </div>

      <div class="form__field">
        <label for="login__password" style="height:60px;"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock" style="height:20px;"></use></svg><span class="hidden">Password</span></label>
        <input style="height:60px";  id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
           <a id='ajukandupak' class='btn1 btn1-color ' onclick='login();'
              style='border-radius:0px; width:100%; height:50px;
              color: #eee;
              font-weight: 700;
              text-transform: uppercase;  padding: 16px;
              padding: 1rem; '>Sign In</a>
        
      </div>

    </div>

      </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>

      
</body>
  <script>
        function login(){
        var username = document.getElementById('login__username').value;   
        var password = document.getElementById('login__password').value;    
       var passhash = CryptoJS.MD5(password);
            
        window.location.href = "<?php echo base_url()?>index.php/login/cek_login?username="+username+"&password="+passhash;
        }
      </script>
  

</html>
