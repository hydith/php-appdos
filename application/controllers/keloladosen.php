<?php if (!defined('BASEPATH')) exit('No direct script acces allowed');

class Keloladosen extends CI_Controller {
    
        
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect("login/index");
        }
        else{
             $this->load->library('session');
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
       
        }
    }
    function dashboarddosen(){
        $this->load->model('m_dosen');
        $username=$this->session->userdata('username');
        $data=array(
            'data'=> $this->m_dosen->getDataDosen($username)
        );
        $this->load->view('dosen_dashboard', $data);
    }
    
     function dashboardkepegfakultas(){
        $this->load->model('m_berkas');
        $data=array(
            'berkasbaru'=> $this->m_berkas->kepegfak_getberkasbaru(),
            'berkasproses'=> $this->m_berkas->kepegfak_getberkasproses(),
            'berkasselesai'=> $this->m_berkas->kepegfak_getberkasselesai(),
            'rincianjabatan'=> $this->m_berkas->getrincianjabatandosen()
        );
        $this->load->view('kepegfak_dashboard',$data);
    }
     function dashboardsenat(){
        $this->load->model('m_berkas');
        $data=array(
            'berkasbaru'=> $this->m_berkas->senat_getberkasbaru(),
            'rincianjabatan'=> $this->m_berkas->getrincianjabatandosen()
        );
        $this->load->view('senat_dashboard',$data);
    }
    function dashboardtimakfak(){
        $this->load->model('m_berkas');
        $data=array(
            'berkasbaru'=> $this->m_berkas->timakfak_getberkasbaru(),
            'rincianjabatan'=> $this->m_berkas->getrincianjabatandosen()
        );
        $this->load->view('timakfak_dashboard',$data);
    }
    function dashboardtimakpusat(){
        $this->load->model('m_berkas');
        $data=array(
            'berkasbaru'=> $this->m_berkas->timakpusat_getberkasbaru(),
            'rincianjabatan'=> $this->m_berkas->getrincianjabatandosen()
        );
        $this->load->view('timakpusat_dashboard',$data);
    }
    function dashboardkepegpusat(){
        $this->load->model('m_berkas');
        $data=array(
            'berkasbaru'=> $this->m_berkas->kepegpus_getberkasbaru(),
            'berkasproses'=> $this->m_berkas->kepegpus_getberkasproses(),
            'berkasselesai'=> $this->m_berkas->kepegpus_getberkasselesai(),
            'rincianjabatan'=> $this->m_berkas->getrincianjabatandosen()
        );
        $this->load->view('kepegpus_dashboard',$data);
    }
    
    function gantipassword(){
       $this->load->view('dosen_gantipassword');
    }
    function setpasswordbaru(){
       $this->load->model('m_dosen');
        $data=array(
            'username'=> $this->session->userdata('username'),
            'password'=> $this->input->post('pass2')
        );
        $this->m_dosen->editpassword($data);
        echo "<script>
            alert('password berhasil diubah');
            window.location.href='dashboarddosen';
            </script>";
      
    }
    
    function insertberkas(){
         $this->load->model('m_dosen');
        $username=$this->session->userdata('username');
        $cekpengajuan = $this->m_dosen->cekpengajuan($username);
       
        if ($cekpengajuan->num_rows() >= 1){
            
            $statuspengajuan = $this->m_dosen->getstatuspengajuan($username);
            foreach ($statuspengajuan as $row){
                $status = $row->IDStatusPengajuan;
                if($status==7){
                    
                    redirect ('keloladosen/formpengajuan');
                    
                }
                elseif($status!=8){
                    
                    redirect ('keloladosen/pantauberkas');
                    
                }
                 
            }
                 
                
        }
        
        
        else{
            $data=array(
           
            'data'=> $this->m_dosen->getDataDosen($username),
            'm_dosen' =>$this->m_dosen    
                );   
                $this->load->view('dosen_insertberkas', $data);
        }
        
        
        
       
    }
    
    function pantauberkas(){
        $this->load->model('m_dosen');
         $id=$this->session->userdata('username');
         $data=array(
            'data_pengajuan'=> $this->m_dosen->getdatapengajuan($id),
            'data_sekarang'=> $this->m_dosen->getdatacurrjabatan($id),
             'data_tujuan'=> $this->m_dosen->getdatatojabatan($id)
                ); 
        
        $this->load->view('dosen_listpengajuan', $data);
    }
    function lihatberkasajuan(){
         $this->load->model('m_dosen');
        $data=array(
            
            'nidn'=> $this->session->userdata('username'),
            'jabatansekarang'=> $this->input->get('currJabatan'),
           'kumsekarang'=> $this->input->get('currKUM'),
            'jabatanpilihan'=> $this->input->get('jabatanpilihan'),
            'kumtujuan'=> $this->input->get('kumtujuan'),
            'kumtempuh'=> $this->input->get('kumtempuh'),
            'date'=> date('Y-m-d'),
            'statuspengajuan'=> 6
            
        );
         $tempid=$this->m_dosen->insertpengajuan($data);
        $data2=array(
            'akpendidikan'=> $this->input->get('akpendidikan'),
            'akpenelitian'=> $this->input->get('akpenelitian'),
            'akpengabdian'=> $this->input->get('akpengabdian'),
            'akpenunjang'=> $this->input->get('akpenunjang'),
            'id'=> $tempid
        );
        $this->m_dosen->insertakperbidang($data2);
        redirect ('keloladosen/formpengajuan');
    }
    
    
    function datapengajuantemp(){
        $this->load->model('m_dosen');
        $username=$this->session->userdata('username');
         $data=array(
             'nidn'=>$this->session->userdata('username'),
            'jabatan'=> $this->input->post('jabatan'),
            'kum'=> $this->input->post('kum')
           
        );
         $this->m_dosen->insertpengajuantemp($data);
    }
     
    
    function pengajuansubmit(){
         $this->load->model('m_dosen');
        $username=$this->session->userdata('username');
        
        $data=array(
            'data'=> $this->m_dosen->getDataDosen($username),
            'kum'=> $this->input->post('textarea'),
             'jabatanpilihan'=> $this->input->post('gol')
        );
        $this->load->view('dosen_pengajuansubmit', $data);
    }
    
    
    function ajukankenaikan(){
         $this->load->model('m_dosen');
        $toJabatan;
            $toGol;
        $jabatanpilihan =$this->input->get('jabatanpilihan');
        if ($jabatanpilihan == 'Asisten Ahli, III/b'){
            $toJabatan = 1;
            $toGol = 2;
        }
        elseif ($jabatanpilihan == 'Lektor, III/c'){
            $toJabatan = 2;
            $toGol = 3;
        }
         elseif ($jabatanpilihan == 'Lektor, III/d'){
            $toJabatan = 2;
            $toGol = 4;
        }
        elseif ($jabatanpilihan == 'Lektor Kepala, IV/a'){
            $toJabatan = 3;
            $toGol = 5;
        }
        elseif ($jabatanpilihan == 'Lektor Kepala, IV/b'){
            $toJabatan = 3;
            $toGol = 6;
        }
         elseif ($jabatanpilihan == 'Lektor Kepala, IV/c'){
            $toJabatan = 3;
            $toGol = 7;
        }
        elseif ($jabatanpilihan == 'Guru Besar/Professor, IV/d'){
            $toJabatan = 4;
            $toGol = 8;
        }
        elseif ($jabatanpilihan == 'Guru Besar/Professor, IV/e'){
            $toJabatan = 4;
            $toGol = 9;
        }
        $data=array(
            
            'nidn'=> $this->session->userdata('username'),
            'jabatansekarang'=> $this->input->get('currJabatan'),
           'kumsekarang'=> $this->input->get('currKUM'),
            'currGol'=> $this->input->get('currGol'),
            'tojabatan'=> $toJabatan,
            'toGol'=> $toGol,
            'kumtujuan'=> $this->input->get('kumtujuan'),
            'kumtempuh'=> $this->input->get('kumtempuh'),
            'date'=> date('Y-m-d'),
            'statuspengajuan'=> 7
            
        );
         $tempid=$this->m_dosen->insertpengajuan($data);
        $data2=array(
            'akpendidikan'=> $this->input->get('akpendidikan'),
            'akpenelitian'=> $this->input->get('akpenelitian'),
            'akpengabdian'=> $this->input->get('akpengabdian'),
            'akpenunjang'=> $this->input->get('akpenunjang'),
            'id'=> $tempid
        );
        $this->m_dosen->insertakperbidang($data2);
        redirect ('keloladosen/formpengajuan');

            }
    
    function formpengajuan(){
        $id = $this->session->userdata('username');
         $this->load->model('m_dosen');
        $result = $this->m_dosen->getidpengajuan($id);
        foreach($result as $row){
            $idpengajuan = $row->IDPengajuan;
        }
        $data=array(
            'idpengajuan' => $idpengajuan,
            'statuspengajuan' => $this->m_dosen->getstatus($idpengajuan),
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
             'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
            'm_dosen' =>$this->m_dosen     

        );
       
        $this->load->view('dosen_formpengajuan',$data);
    }
      function lihatformpengajuan(){
          $idpengajuan = $this->input->get('idpengajuan');
        $id = $this->session->userdata('username');
         $this->load->model('m_dosen');
        $data=array(
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'm_dosen' =>$this->m_dosen    

        );
       
        $this->load->view('dosen_lihatformpengajuan',$data);
    }
    function formrevisi(){
          $idpengajuan = $this->input->get('idpengajuan');
        
         $this->load->model('m_dosen');
        $data=array(
            'idpengajuan' => $idpengajuan,
            'statuspengajuan' => $this->m_dosen->getstatus($idpengajuan),
              'data_pendidikan' => $this->m_dosen->getkegiatanpendidikan($idpengajuan),
            'data_penelitian' => $this->m_dosen->getkegiatanpenelitian($idpengajuan),
              'data_pengabdian' => $this->m_dosen->getkegiatanpengabdian($idpengajuan),
            'data_penunjang' => $this->m_dosen->getkegiatanpenunjang($idpengajuan),
            'ak_perbidang' =>  $this->m_dosen->getakperbidang($idpengajuan),
            'm_dosen' =>$this->m_dosen    

        );
       
        $this->load->view('dosen_formrevisi',$data);
    }
    function formpengajuanpendidikan(){
        $this->load->model('m_dosen');
        $data=array(
            'kategori' => $this->m_dosen->getkategoripendidikan()
        );
        $this->load->view('dosen_formpendidikan',$data);
    }
     function formpengajuanpenelitian(){
        $this->load->model('m_dosen');
        $data=array(
            'kategori' => $this->m_dosen->getkategoripenelitian()
        );
        $this->load->view('dosen_formpenelitian', $data);
    }
    
     function formpengajuanpengabdian(){
        $this->load->model('m_dosen');
        $data=array(
            'kategori' => $this->m_dosen->getkategoripengabdian()
        );
        $this->load->view('dosen_formpengabdian', $data);
    }
    
    function formpengajuanpenunjang(){
        $this->load->model('m_dosen');
        $data=array(
            'kategori' => $this->m_dosen->getkategoripenunjang()
        );
        $this->load->view('dosen_formpenunjang', $data);
    }
    
    
    
    function hapuspendidikan(){
        $this->load->model('m_dosen');
        $data=array(
            'idpend' => $this->input->post('id')
        );
        $this->m_dosen->deletekegiatanpendidikan($data);
        
    }
    
    function hapusberkas_a(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_a($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_b(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_b($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_c(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_c($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_d(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_d($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_e(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_e($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_f(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_f($data);
        redirect("keloladosen/formpengajuan");
        
    }
    function hapusberkas_g(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->get('idpengajuan')
        );
        $this->m_dosen->hapusberkas_g($data);
        redirect("keloladosen/formpengajuan");
        
    }
    
    function hapuspenelitian(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->post('id')
        );
        $this->m_dosen->deletekegiatanpenelitian($data);
    }
    function hapuspengabdian(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->post('id')
        );
        $this->m_dosen->deletekegiatanpengabdian($data);
    }
    
     function hapuspenunjang(){
        $this->load->model('m_dosen');
        $data=array(
            'id' => $this->input->post('id')
        );
        $this->m_dosen->deletekegiatanpenunjang($data);
    }
    
    function formgeturaiankegiatan(){
         $this->load->model('m_dosen');
         $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->geturaiankategori($kode_kegiatan);
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->UraianKegiatan."</option>
        </select>
        "; 
            }
    
    }
    
    function formgeturaiankegiatanpenelitian(){
         $this->load->model('m_dosen');
         $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->geturaiankategoripenelitian($kode_kegiatan);
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->UraianKegiatan."</option>
        </select>
        "; 
            }
    
    }
    
    function formgeturaiankegiatanpenunjang(){
         $this->load->model('m_dosen');
         $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->geturaiankategoripenunjang($kode_kegiatan);
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->UraianKegiatan."</option>
        </select>
        "; 
            }
    
    }
    
     function formgeturaiankegiatanpengabdian(){
         $this->load->model('m_dosen');
         $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->geturaiankategoripengabdian($kode_kegiatan);
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->UraianKegiatan."</option>
        </select>
        "; 
            }
    
    }
    
     function formgeturaiankegiatanpenelitiankaryailmiah(){
         $this->load->model('m_dosen');
        $result = $this->m_dosen->geturaiankategoripenelitiankaryailmiah();
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control' required>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->JenisKaryaIlmiah."</option>
        </select>
        "; 
            }
    
    }
    
     function formgetjenispengabdian(){
         $this->load->model('m_dosen');
        $result = $this->m_dosen->getjenispengabdian();
        
         echo "
         <select name='input_sub_kegiatan' id='input_sub_kegiatan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->Jenis_Pengabdian."</option>
        </select>
        "; 
            }
    
    }
    
    function formgetbentukkaryailmiah(){
         $this->load->model('m_dosen');
        $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->getbentukkaryailmiah($no_kegiatan);
        
         echo "
         <select name='bentuk_ki' id='bentuk_ki' class='form-control' required>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->Bentuk."</option>
        </select>
        "; 
            }
    
    }
    
     function formgetwaktupengabdian(){
         $this->load->model('m_dosen');
        $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->getwaktupengabdian($no_kegiatan);
        
         echo "
         <select name='bentuk_ki' id='bentuk_ki' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->WaktuPengabdian."</option>
        </select>
        "; 
            }
    
    }
    
     function formgetmacamkaryailmiah(){
         $this->load->model('m_dosen');
        $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->getmacamkaryailmiah($kode_kegiatan);
        
         echo "
         <select name='golongan' id='golongan' class='form-control' required>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->MacamKaryaIlmiah."</option>
        </select>
        "; 
            }
    
    }
    
     function formgettingkatpengabdian(){
         $this->load->model('m_dosen');
        $kode_kegiatan = $this->input->post('kode');
        $result = $this->m_dosen->gettingkatpengabdian($kode_kegiatan);
        
         echo "
         <select name='golongan' id='golongan' class='form-control'>

         <option></option>";
        foreach ($result as $row){
        echo "<option value=".$row->No.">".$row->TingkatPengabdian."</option>
        </select>
        "; 
            }
    
    }
    function formgetmacamkaryailmiahdetail(){
         $this->load->model('m_dosen');
         $no = $this->input->post('no');
        $result1 = $this->m_dosen->getmacamkaryailmiahdetail($no);
        foreach ($result1 as $row1){
            $arrkegiatan1 = array(
                'Ket' => $row1->Ket,
                'SatuanHasil' => $row1->SatuanHasil,
                'AngkaKredit' => $row1->AngkaKredit,
                'KetBukti' => $row1->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan1);
    }
    
    function formgeturaiankegiatandetail(){
         $this->load->model('m_dosen');
         $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->geturaiankategoridetail($no_kegiatan);
        foreach ($result as $row){
            
            $arrkegiatan = array(
                'Ket' => $row->Ket,
                'KetBukti' => $row->KetBukti,
                'Tanggal' => $row->Tanggal,
                'SatuanHasil' => $row->SatuanHasil,
                'AngkaKredit' => $row->AngkaKredit,
                'KetBukti' => $row->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan);
    }
    
    function formgeturaiankegiatanpengabdiandetail(){
         $this->load->model('m_dosen');
         $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->geturaiankategoripengabdiandetail($no_kegiatan);
        foreach ($result as $row){
            $arrkegiatan = array(
                'Ket' => $row->Ket,
                'Tanggal' => $row->Tanggal,
                'SatuanHasil' => $row->SatuanHasil,
                'AngkaKredit' => $row->AngkaKredit,
                'KetBukti' => $row->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan);
    }
    
     function formgeturaiankegiatanpenunjangdetail(){
         $this->load->model('m_dosen');
         $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->geturaiankategoripenunjangdetail($no_kegiatan);
        foreach ($result as $row){
            $arrkegiatan = array(
                'Tanggal' => $row->Tanggal,
                'SatuanHasil' => $row->SatuanHasil,
                'AngkaKredit' => $row->AngkaKredit,
                'KetBukti' => $row->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan);
    }
     function formgettingkatpengabdiandetail(){
         $this->load->model('m_dosen');
         $no_kegiatan = $this->input->post('no');
        $result = $this->m_dosen->gettingkatpengabdiandetail($no_kegiatan);
        foreach ($result as $row){
            $arrkegiatan = array(
                'Ket' => $row->Ket,
                'Tanggal' => $row->Tanggal,
                'SatuanHasil' => $row->SatuanHasil,
                'AngkaKredit' => $row->AngkaKredit,
                'KetBukti' => $row->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan);
    }
    function formgeturaiankegiatanpenelitiandetail(){
         $this->load->model('m_dosen');
         $no_kegiatan = $this->input->post('noKeg');
        $result = $this->m_dosen->geturaiankategoripenelitiandetail($no_kegiatan);
        foreach ($result as $row){
            $arrkegiatan = array(
                'Ket' => $row->Ket,
                'SatuanHasil' => $row->SatuanHasil,
                'AngkaKredit' => $row->AngkaKredit,
                'KetBukti' => $row->KetBukti
            ); 
            }
        echo json_encode($arrkegiatan);
    }
    
    public function submitkegiatanpendidikan(){
        $jmlKUMkegiatan;
        
        $this->load->model('m_dosen');
        $kodekegiatan= $this->input->post('kegiatan_input');
        $kegiatan= $this->input->post('input_sub_kegiatan');
        $id =$this->session->userdata('username');
        $result = $this->m_dosen->geturaiankategoridetaillanjut($kegiatan);
        $result2 = $this->m_dosen->getkumajar($id);
        $idpengajuan =$this->input->post('id'); 
        $result3 = $this->m_dosen->getstatus($idpengajuan);
        foreach($result3 as $data){
            $idstatus = $data->IDStatusPengajuan;
        }
        
       foreach ($result as $row){
           
            if ($kodekegiatan == "I.A"){
                
            $ijazah_sebelum;
            $ijazah_ajuan = $row->UraianKegiatan;
            $cekijazah =  $this->m_dosen->cekijazah($id);
                
             foreach ($cekijazah as $row1){    
            $ijazah_sebelum = $row1->Ijazah;
            }
                
            if($ijazah_sebelum == "Ijazah S2"){
                $jmlKUMkegiatan = $row->AngkaKredit - 150;
            }
                elseif($ijazah_sebelum==null) {
                    $jmlKUMkegiatan = $row->AngkaKredit;
                }
                
                                                
        }
           elseif ($kodekegiatan == "II.A"){
               
               foreach ($result2 as $row1){
                  $jmlKUMkegiatan = $row1->JumlahKUM ;
               }
        }
           elseif($kodekegiatan=="II.J"){
               $jmlsemester = $this->input->post('jml_semester');
               $jmlKUMkegiatan = $jmlsemester * $row->AngkaKredit;
           }
            else{
            $jmlKUMkegiatan = $row->AngkaKredit;
        }
          
         $data1=array(
            'kegiatan' => $row->KategoriKegiatan,
            'ket' => $this->input->post('ket'),
            'tgl' => $this->input->post('tgl'),
            'KodeKegiatan' => $row->Kode ,
            'NIDN' => $id ,
            'idpengajuan' => $idpengajuan, 
            'satuanhasilkegiatan' => $row->SatuanHasil,
            'angkakreditkegiatan' => $row->AngkaKredit,
            'jumlahangkakredit' => $jmlKUMkegiatan,
             'idgolongan' => 1
        );
        }
       
        $tempid=$this->m_dosen->inputkegiatan($data1);
		echo $tempid;
		$config['upload_path']          = './berkas/pendidikan/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "Berkas-Bukti-Pendidikan-".$tempid."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $tempid,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data1);
		}
        if (!empty($_FILES['uploadfile2']['name'])){
            $this->upload->do_upload('uploadfile2');
			$namagambar2=$this->upload->data();
			$data2 = array(
                'id' => $tempid,
                'namafile' => $namagambar2['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data2);
		}
        if (!empty($_FILES['uploadfile3']['name'])){
            $this->upload->do_upload('uploadfile3');
			$namagambar3=$this->upload->data();
			$data3 = array(
                'id' => $tempid,
                'namafile' => $namagambar3['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data3);
		}
        $this->m_dosen->hapuspengajaran();
        $this->m_dosen->hapuskumajar();
        
        if($idstatus==5){
            redirect('keloladosen/formrevisi?idpengajuan='.$idpengajuan.'');
        }
        else
         redirect('keloladosen/formpengajuan?idpengajuan='.$idpengajuan.'');
      
        
       
    }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
     public function submitkegiatanpenelitian(){
        $nama_kegiatan; 
        $this->load->model('m_dosen');
        $kodekegiatan= $this->input->post('kegiatan_input');
        $kegiatan= $this->input->post('input_sub_kegiatan');
        $id =$this->session->userdata('username');
        $result = $this->m_dosen->geturaiankategoridetaillanjut($kegiatan);
        $result2 = $this->m_dosen->getnamakegiatanpenelitian($kodekegiatan);
        $idpengajuan =$this->input->post('id'); 
        $result3 = $this->m_dosen->getstatus($idpengajuan);
        foreach($result3 as $data){
            $idstatus = $data->IDStatusPengajuan;
        }
        foreach ($result2 as $row2){
            $nama_kegiatan = $row2->NamaKegiatan;
        }
        
        if($kodekegiatan == "III.A"){
            $id_karyailmiah = $this->input->post('golongan');
            $result = $this->m_dosen->getmacamkaryailmiahdetail($id_karyailmiah);
        }
         else{
             $id_karyailmiah = $this->input->post('input_sub_kegiatan');
             $result = $this->m_dosen-> geturaiankategoripenelitiandetail($id_karyailmiah);
         }
       foreach ($result as $row){
          
         $data1=array(
            'kegiatan' => $nama_kegiatan,
            'ket' => $this->input->post('ket'),
            'KodeKegiatan' => $kodekegiatan ,
            'tgl' => "", 
            'NIDN' => $id,
             'idpengajuan' => $idpengajuan,
            'satuanhasilkegiatan' => $row->SatuanHasil,
            'angkakreditkegiatan' => $row->AngkaKredit,
            'jumlahangkakredit' => $this->input->post('nilai'),
             'idgolongan' => 2
        );
        }
       
        $tempid=$this->m_dosen->inputkegiatan($data1);
	
		$config['upload_path']          = './berkas/penelitian/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "Berkas-Penelitian-".$tempid.""; 
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $tempid,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data1);
		}
        if (!empty($_FILES['uploadfile2']['name'])){
            $this->upload->do_upload('uploadfile2');
			$namagambar2=$this->upload->data();
			$data2 = array(
                'id' => $tempid,
                'namafile' => $namagambar2['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data2);
		}
        if (!empty($_FILES['uploadfile3']['name'])){
            $this->upload->do_upload('uploadfile3');
			$namagambar3=$this->upload->data();
			$data3 = array(
                'id' => $tempid,
                'namafile' => $namagambar3['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data3);
		}
       
           if($idstatus==5){
            redirect('keloladosen/formrevisi?idpengajuan='.$idpengajuan.'');
        }
        else
         redirect('keloladosen/formpengajuan?idpengajuan='.$idpengajuan.'');
      
        
       
    }
    
    public function submitkegiatanpengabdian(){
        $nama_kegiatan; 
        $this->load->model('m_dosen');
        $kodekegiatan= $this->input->post('kegiatan_input');
        $kegiatan= $this->input->post('input_sub_kegiatan');
        $id =$this->session->userdata('username');
       $result2 = $this->m_dosen->getnamakegiatanpengabdian($kodekegiatan);
        $idpengajuan =$this->input->post('id'); 
        $result3 = $this->m_dosen->getstatus($idpengajuan);
        foreach($result3 as $data){
            $idstatus = $data->IDStatusPengajuan;
        }
        foreach ($result2 as $row2){
            $nama_kegiatan = $row2->NamaKegiatan;
        }
        
        if($kodekegiatan == "IV.C"){
            $id_tingkat = $this->input->post('tingkat');
            $result = $this->m_dosen->gettingkatpengabdiandetail($id_tingkat);
        }
         else{
             $no_pengabdian = $this->input->post('input_sub_kegiatan');
             $result = $this->m_dosen-> geturaiankategoripengabdiandetail($no_pengabdian);
         }
       foreach ($result as $row){
          
         $data1=array(
            'kegiatan' => $nama_kegiatan,
            'ket' => $this->input->post('ket'),
            'tgl' => $this->input->post('tgl'),
            'KodeKegiatan' => $kodekegiatan ,
            'NIDN' => $id,
             'idpengajuan' => $idpengajuan,
            'satuanhasilkegiatan' => $row->SatuanHasil,
            'angkakreditkegiatan' => $row->AngkaKredit,
            'jumlahangkakredit' => $row->AngkaKredit,
            'idgolongan' => 3
        );
        }
       
        $tempid=$this->m_dosen->inputkegiatan($data1);
	
		$config['upload_path']          = './berkas/pengabdian/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "Berkas-Pengabdian-".$tempid."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $tempid,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data1);
		}
        if (!empty($_FILES['uploadfile2']['name'])){
            $this->upload->do_upload('uploadfile2');
			$namagambar2=$this->upload->data();
			$data2 = array(
                'id' => $tempid,
                'namafile' => $namagambar2['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data2);
		}
        if (!empty($_FILES['uploadfile3']['name'])){
            $this->upload->do_upload('uploadfile3');
			$namagambar3=$this->upload->data();
			$data3 = array(
                'id' => $tempid,
                'namafile' => $namagambar3['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data3);
		}
       
           if($idstatus==5){
            redirect('keloladosen/formrevisi?idpengajuan='.$idpengajuan.'');
        }
        else
         redirect('keloladosen/formpengajuan?idpengajuan='.$idpengajuan.'');
      
       
    }
    
    public function submitkegiatanpenunjang(){
    
        $this->load->model('m_dosen');
        $kegiatan= $this->input->post('input_sub_kegiatan');
        $id =$this->session->userdata('username');
       $result = $this->m_dosen->geturaiankategoripenunjangdetaillanjut($kegiatan);
      $idpengajuan =$this->input->post('id'); 
        $result3 = $this->m_dosen->getstatus($idpengajuan);
        foreach($result3 as $data){
            $idstatus = $data->IDStatusPengajuan;
        }
       foreach ($result as $row){
          
         $data1=array(
            'kegiatan' => $row->NamaKegiatan,
            'ket' => $this->input->post('ket'),
            'tgl' => $this->input->post('tgl'),
            'KodeKegiatan' => $row->Kode ,
            'NIDN' => $id,
             'idpengajuan' => $idpengajuan,
            'satuanhasilkegiatan' => $row->SatuanHasil,
            'angkakreditkegiatan' => $row->AngkaKredit,
            'jumlahangkakredit' => $row->AngkaKredit,
             'idgolongan' => 4
        );
        }
       
        $tempid=$this->m_dosen->inputkegiatan($data1);
	
		$config['upload_path']          = './berkas/penunjang/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 20000000;
        $config['file_name']            = "Berkas-Penunjang-".$tempid."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $tempid,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data1);
		}
        if (!empty($_FILES['uploadfile2']['name'])){
            $this->upload->do_upload('uploadfile2');
			$namagambar2=$this->upload->data();
			$data2 = array(
                'id' => $tempid,
                'namafile' => $namagambar2['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data2);
		}
        if (!empty($_FILES['uploadfile3']['name'])){
            $this->upload->do_upload('uploadfile3');
			$namagambar3=$this->upload->data();
			$data3 = array(
                'id' => $tempid,
                'namafile' => $namagambar3['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->insertbuktifisik($data3);
		}
       
           if($idstatus==5){
            redirect('keloladosen/formrevisi?idpengajuan='.$idpengajuan.'');
        }
        else
         redirect('keloladosen/formpengajuan?idpengajuan='.$idpengajuan.'');
      
        
       
    }
    
    public function inputpengajaran(){
        $jmlKUM;
         $jmlSKS=0;
        $jmlKUMpertama=0;
        $jmlKUMlain=0;
        $jabatan="";
         $this->load->model('m_dosen');
        $data= array(
            'matkul' =>$this->input->post('matkul'),
            'sks' => $this->input->post('sks'),
            'kelas' => $this->input->post('kelas'),
            'nidn' => $this->session->userdata('username')
        );
        $this->m_dosen->inputpengajaranpendidikan($data);
        $id = $this->session->userdata('username');
        $result=$this->m_dosen->getpengajaran($id);
        $result1 = $this->m_dosen->getjabatan($id);
        foreach ($result1 as $row){
           $jabatan = $row->NamaJabatan; 
        }
        echo "
        <div class='panel panel-default'>
                 <div class='panel-heading'><b>Perolehan Mengajar</b></div>
                    <div class='panel-body'>
                        <table class='table'>
                        <tr>
                        <th style='text-align: center'>Matakuliah</th>
                        <th style='text-align: center'>SKS</th>
                        <th style='text-align: center'>Jumlah Kelas</th>
                        <th></th>    
                        </tr>
                        ";
                        foreach ($result as $row){
                    echo "        
                         <tr>
                        <td style='text-align: center'>".$row->MataKuliah."</td>
                        <td style='text-align: center'>".$row->SKS."</td>
                        <td style='text-align: center'>".$row->JumlahKelas."</td>
                        <td>   <a  div='hapus' style='color:red' onclick='deletedata(".$row->IDPengajaran.")'>
				                <span class='glyphicon glyphicon-trash'></span> 
			                 </a>
                             </td>    
                        </tr>
                        ";
                     
                           $jmlSKS=$jmlSKS+($row->SKS*$row->JumlahKelas);
                        }
                        if($jabatan=="Asisten Ahli"){
                            if ($jmlSKS >10){
                                $sisa = $jmlSKS - 10;
                                $jmlKUMpertama = 10 * 0.5;
                                $jmlKUMlain = $sisa * 0.25;
                                $jmlKUM = $jmlKUMpertama + $jmlKUMlain ;
                            }
                            else{
                               $jmlKUM = $jmlSKS * 0.25;
                            }
                         
                        }
                        else{
                            
                            if ($jmlSKS >10){
                                $sisa = $jmlSKS - 10;
                                $jmlKUMpertama = 10 * 1;
                                $jmlKUMlain = $sisa * 0.5;
                                $jmlKUM = $jmlKUMpertama + $jmlKUMlain ;
                            }
                            else{
                               $jmlKUM = $jmlSKS * 0.5;
                            }
                        }
                        echo"
                    
                        </table>
                         <table style='margin-left:22px'>
                        <label>Total Perolehan KUM</label>
                        <tr>
                        <td style='padding:5px'>Jumlah SKS</td>
                        <td style='padding:15px'>:</td>
                        <td style='padding:15px'>".$jmlSKS."</td>
                        </tr>
                        <tr>
                        <td style='padding:5px'>Jumlah KUM</td>
                        <td style='padding:15px'>:</td>
                        <td style='padding:15px'>".$jmlKUM."</td>
                        </tr>
                        </table>
                        <a id='ajukanpengajaran' class='btn btn-info' onclick='tampilmatkul(".$id.",".$jmlKUM.")' style='width:100%;'>Ajukan Pengajaran</a>
                 </div>
                 </div>
        ";
    
}
     public function hapuspengajaran(){
            $jmlKUM;
             $jmlSKS=0;
        $jmlKUMpertama=0;
        $jmlKUMlain=0;
        $jabatan="";
         $this->load->model('m_dosen');
        $data= array(
            'idajar' =>$this->input->post('id'),
            
        );
        $this->m_dosen->hapuspengajaranpendidikan($data);
        $id = $this->session->userdata('username');
        $result=$this->m_dosen->getpengajaran($id);
        $result1 = $this->m_dosen->getjabatan($id);
        foreach ($result1 as $row){
           $jabatan = $row->NamaJabatan; 
        }
        echo "
        <div class='panel panel-default'>
                 <div class='panel-heading'><b>Perolehan Mengajar</b></div>
                    <div class='panel-body'>
                        <table class='table'>
                        <tr>
                        <th style='text-align: center'>Matakuliah</th>
                        <th style='text-align: center'>SKS</th>
                        <th style='text-align: center'>Jumlah Kelas</th>
                        <th></th>    
                        </tr>
                        ";
                        foreach ($result as $row){
                    echo "        
                         <tr>
                        <td style='text-align: center'>".$row->MataKuliah."</td>
                        <td style='text-align: center'>".$row->SKS."</td>
                        <td style='text-align: center'>".$row->JumlahKelas."</td>
                        <td>   <a  div='hapus' style='color:red' onclick='deletedata(".$row->IDPengajaran.")'>
				                <span class='glyphicon glyphicon-trash'></span> 
			                 </a></td>    
                        </tr>
                        ";
                            
                             $jmlSKS=$jmlSKS+($row->SKS*$row->JumlahKelas);
                        }
                            if($jabatan=="Asisten Ahli"){
                            if ($jmlSKS >10){
                                $sisa = $jmlSKS - 10;
                                $jmlKUMpertama = 10 * 0.5;
                                $jmlKUMlain = $sisa * 0.25;
                                $jmlKUM = $jmlKUMpertama + $jmlKUMlain ;
                            }
                            else{
                                $jmlKUM = $jmlSKS * 0.25;
                            }
                         
                        }
                        else{
                            
                            if ($jmlSKS >10){
                                $sisa = $jmlSKS - 10;
                                $jmlKUMpertama = 10 * 1;
                                $jmlKUMlain = $sisa * 0.5;
                                $jmlKUM = $jmlKUMpertama + $jmlKUMlain ;
                            }
                            else{
                                $jmlKUM = $jmlSKS * 0.5;
                            }
                        }
                echo"
                    
                        </table>
                         <table style='margin-left:22px'>
                        <label>Total Perolehan KUM</label>
                        <tr>
                        <td style='padding:5px'>Jumlah SKS</td>
                        <td style='padding:15px'>:</td>
                        <td style='padding:15px'>".$jmlSKS."</td>
                        </tr>
                        <tr>
                        <td style='padding:5px'>Jumlah KUM</td>
                        <td style='padding:15px'>:</td>
                        <td style='padding:15px'>".$jmlKUM."</td>
                        </tr>
                        </table>
                        <a id='ajukanpengajaran' class='btn btn-info' onclick='tampilmatkul(".$id.",".$jmlKUM.")' style='width:100%;'>Ajukan Pengajaran</a>
                 </div>
                 </div>
        ";
    
}
    
    public function tampilpengajaran(){
       
        $this->load->model('m_dosen');
        $data= array(
            'nidn' =>$this->input->post('id'),
            'kum' =>$this->input->post('kum')
        );
        
        $this->m_dosen->inputjumlahkumajar($data);
        $result = $this->m_dosen->tampilpengajaran($data);
        
        foreach ($result as $row){
           echo "".$row->MataKuliah." ".$row->SKS." SKS, ".$row->JumlahKelas." Kelas / ";
          
        }
       
    }
    
    public function ajukanpengajuan(){
        $this->load->model('m_dosen');
        $id = $this->input->post('id');
        $this->m_dosen->ubahstatuske1($id);
       
    }
    public function revisikepegpusat(){
        $this->load->model('m_dosen');
        $id = $this->input->post('id');
        $this->m_dosen->ubahstatuske4($id);
       
    }
    public function revisikepegfak(){
        $this->load->model('m_dosen');
        $id = $this->input->post('id');
        $this->m_dosen->ubahstatuske1($id);
       
    }
    function tampilsemuadosen(){
         
         $this->load->library('pagination');
        $this->load->model('m_dosen');
           
    $config['base_url']=base_url()."index.php/keloladosen/tampilsemuadosen";
        
     $data=array(
            'datadosen'=> $this->m_dosen->getalldosen(),
             'm_dosen'=> $this->m_dosen
        );
 
        $this->load->view('kepegfak_tampilsemuadosen',$data);
    }
    public function tambahdosen(){
       $this->load->view('kepegfak_tambahdosen'); 
    }
    public function acakangkahuruf($panjang){
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
    public function submitdatadosen(){
        $this->load->model('m_dosen');
        $data= array(
            'nama' =>$this->input->post('nama'),
            'nidn' =>$this->input->post('nidn'),
            'karpeg' =>$this->input->post('karpeg'),
            'email' =>$this->input->post('email'),
            'hp' =>$this->input->post('hp'),
            'alamat' =>$this->input->post('alamat'),
            'tgl' =>$this->input->post('tgl'),
            'kelahiran' =>$this->input->post('kelahiran'),
            'jk' =>$this->input->post('jk'),
            'gol' =>$this->input->post('gol'),
            'tmt_gol' =>$this->input->post('tmt_gol'),
            'jabatan' =>$this->input->post('jabatan'),
            'tmt_jab' =>$this->input->post('tmt_jab'),
            'unit_kerja' =>$this->input->post('unit_kerja'),
            'pendidikan' =>$this->input->post('pendidikan')
            
        );
        
        $tempid=$this->m_dosen->inputdatadosen($data);
        $config['upload_path']          = './foto/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 20000000;
        $config['max_width']            = 10000;
		$config['max_height']           = 10000;
        $config['file_name']            = "foto-".$tempid."";
		$this->load->library('upload', $config);
		if (!empty($_FILES['uploadfile1']['name'])){
            $this->upload->do_upload('uploadfile1');
			$namagambar=$this->upload->data();
			$data1 = array(
                'id' => $tempid,
                'namafile' => $namagambar['file_name'],
                'nidn' => $this->session->userdata('username')
            );
			$this->m_dosen->inputfoto($data1);
		}
        $password = $this->acakangkahuruf(8);
        $datauser=array(
            'username' => $this->input->post('nidn'),
            'password' => $password
        );
        $this->m_dosen->inputuser($datauser);
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "putra.aditama25@gmail.com";
        $config['smtp_pass'] = "aditama25";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $htmlContent = "<div><strong>username</strong> = ".$datauser['username']."</div>"; 
        $htmlContent .= "<div><strong>password</strong> = " .$datauser['password']."</div>";
        $ci->email->initialize($config);
 
        $ci->email->from('putra.aditama25@gmail.com', 'Putra Aditama');
        $list = array($this->input->post('email'));
        $ci->email->to($list);
        $ci->email->subject('USERNAME DAN PASSWORD APPDOS');
        $ci->email->message($htmlContent);
        $this->email->send();
        redirect('keloladosen/tampilsemuadosen');
    }
    
 
    public function submiteditdosen(){
        $this->load->model('m_dosen');
        $data= array(
            'id'=>$this->input->post('id'),
            'nama' =>$this->input->post('nama'),
            'nidn' =>$this->input->post('nidn'),
            'karpeg' =>$this->input->post('karpeg'),
            'email' =>$this->input->post('email'),
            'hp' =>$this->input->post('hp'),
            'alamat' =>$this->input->post('alamat'),
            'tgl' =>$this->input->post('tgl'),
            'kelahiran' =>$this->input->post('kelahiran'),
            'jk' =>$this->input->post('jk'),
            'gol' =>$this->input->post('gol'),
            'tmt_gol' =>$this->input->post('tmt_gol'),
            'jabatan' =>$this->input->post('jabatan'),
            'tmt_jab' =>$this->input->post('tmt_jab'),
            'unit_kerja' =>$this->input->post('unit_kerja'),
            'pendidikan' =>$this->input->post('pendidikan')
            
        );
        
        $this->m_dosen->inputeditdosen($data);
        
        redirect('keloladosen/tampilsemuadosen');
    }
    function lihatdosendetail(){
        $username = $this->input->get('id');
        $this->load->model('m_dosen');
        $data=array(
            'data'=> $this->m_dosen->getDataDosen($username)
        );
        $this->load->view('kepeg_detaildosen', $data);
    }
    
    function editdatadosen(){
        $username = $this->input->get('id');
        $this->load->model('m_dosen');
        $data=array(
            'data'=> $this->m_dosen->getDataDosen($username)
        );
        $this->load->view('kepegfak_editdosen', $data);
    }
    
   
    
   
    
}
?>