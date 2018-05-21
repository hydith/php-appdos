<?php if (!defined('BASEPATH')) exit('No direct script acces allowed');

class Kelolaberkas extends CI_Controller {
    public $jumlah;
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect("login/index");
       
            
        };
         $this->load->model('m_dosen');
        $username=$this->session->userdata('username');
        $pass_sess=$this->session->userdata('pass');
        $result = $this->m_dosen->cekpass($username);
        foreach($result as $row){
            $pass = $row->pass;
        }
        if($pass_sess != $pass){
            redirect("login/logout");
        }
        $this->load->library('pagination');
            $this->load->helper('cookie');
        $this->load->database();
        
        
    }
    
     function tampilsemuaberkas(){
 
        $this->load->model('m_berkas');
         $data=array(
            'databerkas'=> $this->m_berkas->getSemuaBerkas(),
             'm_berkas'=> $this->m_berkas
        );
        $this->load->view('kepegfak_tampilsemuaberkas',$data);
         }
   
    
    function tampilberkasbaru(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');
        
                

    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=1 and IDStatusPengajuan!=7 ")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('kepegfak_tampilberkaskosong');
    }
        
    else{    
  
         $data=array(
            'databerkas'=> $this->m_berkas->getBerkasBaru(),
             'm_berkas'=> $this->m_berkas
        );
 
        $this->load->view('kepegfak_tampilberkasbaru',$data);
    }
    }
    
    function tampilberkasproses(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');
    
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan!=7 and IDStatusPengajuan!=8 and IDStatusPengajuan!=1")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('kepegfak_tampilberkaskosong');
    }
    else{    
  
          $this->load->model('m_berkas');
         $data=array(
            'databerkas'=> $this->m_berkas->getBerkasProses(),
             'm_berkas'=> $this->m_berkas
        );
     
 
        $this->load->view('kepegfak_tampilberkasproses',$data);
    }
    }
    function tampilberkasselesai(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');
    
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=8")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('kepegfak_tampilberkaskosong');
    }
    else{ 
       
        $this->load->model('m_berkas');
         $data=array(
            'databerkas'=> $this->m_berkas->getBerkasSelesai(),
             'm_berkas'=> $this->m_berkas
        );

        $this->load->view('kepegfak_tampilberkasselesai',$data);
    }
    }
      
    function tampilsemuaberkaskepegpusat(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');
                
    
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=4 or IDStatusPengajuan=10 or IDStatusPengajuan=11")->num_rows();
        
    if($config['total_rows']==0){
        
               $this->load->view('kepegpus_tampilberkaskosong');
    }
    else{    
    
        $this->load->model('m_berkas');
         $data=array(
            'databerkas'=> $this->m_berkas->getallberkaskepegpusat(),
             'm_berkas'=> $this->m_berkas
        );
        $this->load->view('kepegpus_tampilsemuaberkas',$data);
        
   
    }
    }
    function tampilberkasbarukepegpusat(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');

    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=4")->num_rows();
        if($config['total_rows']==0){
        
               $this->load->view('kepegpus_tampilberkaskosong');
    }
    else{ 
     $data=array(
            'databerkas'=> $this->m_berkas->getberkasbarukepegpusat(),
             'm_berkas'=> $this->m_berkas
        );
  
        $this->load->view('kepegpus_tampilberkasbaru',$data);
    }
    }
    
    function tampilberkasproseskepegpusat(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');

    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=10 or IDStatusPengajuan=11")->num_rows();
        if($config['total_rows']==0){
        
               $this->load->view('kepegpus_tampilberkaskosong');
    }
    else{ 
          $data=array(
            'databerkas'=> $this->m_berkas->getberkasproseskepegpusat(),
             'm_berkas'=> $this->m_berkas
        );
   
        $this->load->view('kepegpus_tampilberkasproses',$data);
    }
    }
    function tampilberkasselesaikepegpusat(){
         
         $this->load->library('pagination');
        $this->load->model('m_berkas');

    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=8")->num_rows();
        if($config['total_rows']==0){
        
               $this->load->view('kepegpus_tampilberkaskosong');
    }
    else{ 
   $data=array(
            'databerkas'=> $this->m_berkas->getberkasselesaikepegpusat(),
             'm_berkas'=> $this->m_berkas
        );
        $this->load->view('kepegpus_tampilberkasselesai',$data);
    }
    }
    public function cari(){
        $this->load->library('pagination');
        $this->load->model('m_berkas');
        $key= $this->input->get('key');
        
    if(isset($_POST['jumlah_data']) && !empty($_POST['jumlah_data'])){ 
                $config['per_page'] = $_POST['jumlah_data'];
                $jml = $_POST['jumlah_data'];
                $this->input->set_cookie('jml', $jml, 3600*2);
      
    }else{
                $config['per_page'] = 2;
                }
         
         if ($this->uri->segment(3) !="") {
               $jumlah= $this->input->cookie('jml');
             $config['per_page'] = $jumlah;
             $jml = $jumlah;
             
            } 
                
    $config['base_url']=base_url()."index.php/kelolaberkas/tampilsemuaberkas";
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDPengajuan='".$key."'")->num_rows();
    
    $config['num_links'] = 1;
    $config['uri_segment']=3;
 $config['display_pages'] = TRUE;
        
        //Tambahan untuk styling
       $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
  
 
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
 
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
 
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
 
        $this->pagination->initialize($config);
 
        $this->load->model('m_berkas');
        $data['databerkas']=$this->m_berkas->cariberkaspengajuan($key);
        
         if(isset($_POST['jumlah_data']) && !empty($_POST['jumlah_data'])){
        $data['jml']=$jml; 
         }
         if ($this->uri->segment(3) !="") {
             $data['jml']=$jml;
             
            }
 
        $this->load->view('kepegfak_tampilsemuaberkas',$data);
    }
    function lihatformpengajuandetail(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
             'datadosen'=> $this->m_berkas->getdatadosen($idpengajuan),
            'm_dosen' =>$this->m_dosen    

        );
       
        $this->load->view('kepegfak_lihatformpengajuandetail',$data);
    }
    function lihatpengajuandetailbaru(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
             'datadosen'=> $this->m_berkas->getdatadosen($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas    


        );
       
        $this->load->view('kepegfak_lihatpengajuandetailbaru',$data);
    }
    function lihatformpengajuandetailkepegpus(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
             'datadosen'=> $this->m_berkas->getdatadosen($idpengajuan),
            'm_dosen' =>$this->m_dosen    

        );
       
        $this->load->view('kepegpus_lihatformpengajuandetail',$data);
    }
    
    function lihatformpengajuanternilai(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
             'datadosen'=> $this->m_berkas->getdatadosen($idpengajuan),
            'm_berkas' =>$this->m_berkas,
            'm_dosen' =>$this->m_dosen 

        );
       
        $this->load->view('kepegfak_lihatformpengajuanternilai',$data);
    }
     function lihatformpengajuandetailsenat(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
             'datadosen'=> $this->m_berkas->getdatadosen($idpengajuan),
            'm_dosen' =>$this->m_dosen    

        );
       
        $this->load->view('senat_lihatformpengajuandetail',$data);
    }
    
    function lihatformpengajuandetailpenilaifak(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
                'statuspengajuan' => $this->m_dosen->getstatus($idpengajuan),
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
            'm_berkas' =>$this->m_berkas    

        );
       
        $this->load->view('timakfak_lihatformpengajuandetail',$data);
    }
    
    function lihatformpengajuandetailpenilaipusat(){
        $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_berkas');
         $this->load->model('m_dosen');
        $data=array(
                'statuspengajuan' => $this->m_dosen->getstatus($idpengajuan),
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
            'm_berkas' =>$this->m_berkas    

        );
       
        $this->load->view('timakpusat_lihatformpengajuandetail',$data);
    }
    
    function nilaikegiatanpendidikan(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_pendidikan' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakfak_nilaiberkaspendidikan',$data);
    }
    function nilaikegiatanpendidikanpusat(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_pendidikan' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakpusat_nilaiberkaspendidikan',$data);
    }
    function nilaikegiatanpenelitian(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_penelitian' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakfak_nilaiberkaspenelitian',$data);
    }
    function nilaikegiatanpenelitianpusat(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_penelitian' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakpusat_nilaiberkaspenelitian',$data);
    }
    function nilaikegiatanpengabdian(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_pengabdian' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakfak_nilaiberkaspengabdian',$data);
    }
    function nilaikegiatanpengabdianpusat(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_pengabdian' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakpusat_nilaiberkaspengabdian',$data);
    }
    function nilaikegiatanpenunjang(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_penunjang' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakfak_nilaiberkaspenunjang',$data);
    }
    function nilaikegiatanpenunjangpusat(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_penunjang' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('timakpusat_nilaiberkaspenunjang',$data);
    }
    function submitnilaikegiatan(){
        $this->load->model('m_berkas');
        $this->load->model('m_dosen');
        $idtridharma=$this->input->post('id');
        $idpengajuan=$this->input->post('idpengajuan');
        $ceknilaikegiatan=$this->m_dosen->ceknilaikegiatan($idtridharma);
        if($ceknilaikegiatan->num_rows() == 1){
             $data=array(
             'id' => $idtridharma,
            'nilai' => $this->input->post('nilai'),
            
        );
            
          $this->m_berkas->ubahnilaikegiatan($data);  
            
        }
        else{
        $data=array(
             'id' => $idtridharma,
            'nilai' => $this->input->post('nilai'),
            'idpengajuan' => $idpengajuan
        );
        $this->m_berkas->simpannilaikegiatan($data);
        }
        redirect("kelolaberkas/lihatformpengajuandetailpenilaifak?idpengajuan=".$idpengajuan."");
    }
    function submitnilaikegiatanpusat(){
        $this->load->model('m_berkas');
        $this->load->model('m_dosen');
        $idtridharma=$this->input->post('id');
        $idpengajuan=$this->input->post('idpengajuan');
        $ceknilaikegiatan=$this->m_dosen->ceknilaikegiatan($idtridharma);
        if($ceknilaikegiatan->num_rows() == 1){
             $data=array(
             'id' => $idtridharma,
            'nilai' => $this->input->post('nilai'),
            
        );
            
          $this->m_berkas->ubahnilaikegiatan($data);  
            
        }
        else{
        $data=array(
             'id' => $idtridharma,
            'nilai' => $this->input->post('nilai'),
            'idpengajuan' => $idpengajuan
        );
        $this->m_berkas->simpannilaikegiatan($data);
        }
        redirect("kelolaberkas/lihatformpengajuandetailpenilaipusat?idpengajuan=".$idpengajuan."");
    }
    
    function submitberkas_a(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC Karpeg ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_a($data1);
            $message = "File berhasil di upload";
            echo "<script type='text/javascript'>alert('$message');</script>";
           
		}
         redirect("keloladosen/formpengajuan");
    }
    function submitberkas_b(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC SK Konversi NIP ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile2']['name'])){
            $this->upload->do_upload('uploadfile2');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_b($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
    function submitberkas_c(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC Penetapan Angka Kredit(PAK) terakhir ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile3']['name'])){
            $this->upload->do_upload('uploadfile3');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_c($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
    function submitberkas_d(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC SK Kenaikan Jabatan Akademik Dosen terakhir ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile4']['name'])){
            $this->upload->do_upload('uploadfile4');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_d($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
    function submitberkas_e(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC SK Kenaikan Pangkat/Golongan terakhir ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile5']['name'])){
            $this->upload->do_upload('uploadfile5');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_e($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
    function submitberkas_f(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC Penilaian Prestasi Kerja PNS 2 Tahun terakhir ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile6']['name'])){
            $this->upload->do_upload('uploadfile6');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_f($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
    
    function submitberkas_g(){
        $this->load->model('m_berkas');
        $username = $this->session->userdata('username');
        $result=$this->m_berkas->getidpengajuan($username);
        foreach($result as $row){
            $id=$row->IDPengajuan;
        }
        $config['upload_path']          = './berkas/administrasi/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "SC Sertifikat Pendidik ".$id."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile7']['name'])){
            $this->upload->do_upload('uploadfile7');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $id,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_berkas->insertberkas_g($data1);
           
		}
         redirect("keloladosen/formpengajuan");
    }
   
   
    
    function submitpenilaianfakultas(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('idpengajuan'),
            'tgl' => date('Y-m-d')
        );
     
        $this->m_berkas->berkasselesaidinilaitimfak($data);
        
        redirect('kelolaberkas/tampilberkasbarutimakfak');
    }
    
    function submitpenilaianpusat(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('idpengajuan'),
            'tgl' => date('Y-m-d')
        );
     
        $this->m_berkas->berkasselesaidinilaitimpusat($data);
        
        redirect('kelolaberkas/tampilberkasbarutimakpusat');
    }
    
    function tolakberkas(){
       $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->post('id'),
            'pesan' => $this->input->post('ket_revisi'),
            'status' =>1
        );
       $this->m_berkas->revisikepegfak($data);
        redirect('kelolaberkas/tampilsemuaberkas');
    }
    function tolakberkaskepegpusat(){
       $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->post('id'),
            'pesan' => $this->input->post('ket_revisi'),
            
        );
        $this->m_berkas->revisikepegpusat($data);
        redirect('kelolaberkas/tampilsemuaberkaskepegpusat');
    }
    
    function verifikasiberkas(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('id'),
            'tgl' => date('Y-m-d')
        );
     
        $this->m_berkas->verfikasiberkaskepegfak($data);
          redirect('kelolaberkas/tampilsemuaberkas');
    }
    function verifikasiberkaskepegpusat(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('id'),
            'tgl' => date('Y-m-d')
        );
     
        $this->m_berkas->verfikasiberkaskepegpusat($data);
          redirect('kelolaberkas/tampilsemuaberkaskepegpusat');
    }
    
    function kirimberkaspengajuankepusat(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('id')    
        );
     
        $this->m_berkas->berkasdikirimkepusat($data);
          redirect('kelolaberkas/tampilsemuaberkas');
    }
    
     function berkasdisetujui(){
        $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->get('id'),
            'tgl' => date('Y-m-d')
        );
     
        $this->m_berkas->berkasdisetujui($data);
          redirect('kelolaberkas/tampilberkasbarusenat');
    }
    
    function tolakberkassenat(){
       $this->load->model('m_berkas');
        $data=array(
            'id' => $this->input->post('id'),
            'pesan' => $this->input->post('ket_revisi'),
            'tgl' => date('Y-m-d')
        );
        $this->m_berkas->tolakberkas($data);
        redirect('kelolaberkas/tampilberkasbarusenat');
    }
    function tampilberkasbarusenat(){
        $this->load->library('pagination');
        $this->load->model('m_berkas');
   
        
                
   
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=2")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('senat_tampilsemuaberkaskosong');
    }
     else{   
     $data=array(
            'databerkas'=> $this->m_berkas->getberkasbarusenat(),
             'm_berkas'=> $this->m_berkas
        );
       
 
        $this->load->view('senat_tampilsemuaberkas',$data);
    }
    }
    function tampilberkasbarutimakfak(){
        $this->load->library('pagination');
        $this->load->model('m_berkas');
   
        
                
    
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=3")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('timakfak_tampilsemuaberkaskosong');
    }
        
    else{  
         $data=array(
            'databerkas'=> $this->m_berkas->getberkasbarutimakfak(),
             'm_berkas'=> $this->m_berkas
        );
    
    
           
 
        $this->load->view('timakfak_tampilsemuaberkas',$data);
    }
    }
    
    function tampilberkasbarutimakpusat(){
        $this->load->library('pagination');
        $this->load->model('m_berkas');
   
        
                
   
    $config['total_rows']= $this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=10")->num_rows();
    if($config['total_rows']==0){
        
               $this->load->view('timakpusat_tampilsemuaberkaskosong');
    }
        
    else{  
        $this->load->model('m_berkas');
         $data=array(
            'databerkas'=> $this->m_berkas->getberkasbarutimakpusat(),
             'm_berkas'=> $this->m_berkas
        );
     
           
 
        $this->load->view('timakpusat_tampilsemuaberkas',$data);
    }
    }
     function nilaireviewer(){
         $idpengajuan = $this->input->get('idpengajuan');
        $this->load->model('m_dosen');
        $this->load->model('m_berkas');
        $data=array(
            'data_penelitian' => $this->m_dosen->getkegiatandetail($idpengajuan),
            'm_dosen' =>$this->m_dosen,
            'm_berkas' =>$this->m_berkas
        );
        $this->load->view('kepegfak_nilaireviewer',$data);
    }
    
    function submitnilaireviewer(){
        $nilaiakhir;
        $this->load->model('m_berkas');
        $this->load->model('m_dosen');
        $idtridharma=$this->input->post('id');
        $idpengajuan=$this->input->post('idpengajuan');
        $nilai1 =$this->input->post('nilai1');
        $nilai2 =$this->input->post('nilai2');
        $nilaiakhir = ($nilai1+$nilai2)/2;
        $result = $this->m_dosen->getnidnfrompengajuan($idpengajuan);
        foreach($result as $row){
            $nidn=$row->NIDN;
        }
        $data=array(
             'id' => $idtridharma,
            'nilai' => $nilaiakhir,
            'idpengajuan' => $idpengajuan
        );
        $this->m_berkas->simpannilaireviewer($data);
        
        $config['upload_path']          = './berkas/penelitian/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "Berkas-Penelitian-Reviewer".$idtridharma.""; 
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $idtridharma,
                'namafile' => $namagambar['file_name'],
                'nidn' => $nidn
            );
			$this->m_dosen->insertbuktifisik($data1);
		}
        
        redirect("kelolaberkas/lihatpengajuandetailbaru?idpengajuan=".$idpengajuan."");
    }
     
    
}

?>