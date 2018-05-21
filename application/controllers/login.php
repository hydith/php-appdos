 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		$this->load->view('halaman_login');
	}

	function logout(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->view('halaman_login');
	}
    
    function coba(){
		
		$this->load->view('salah');
	}

	function cek_login(){
        $this->load->model('m_dosen');
		$pass=$this->input->get('password');
        $user=$this->input->get('username');
		$data=array(
			'username'=>$user,
			'pass'=>$pass
		);
		$this->load->model('m_login');
		$hasil=$this->m_login->login($data);
		if ($hasil->num_rows() == 1){
			$this->session->set_userdata($data);
            $username = $this->session->userdata('username');
            if ($username == 'kepegawaianfakultas'){
				redirect('keloladosen/dashboardkepegfakultas');
            }
		  elseif($username == 'senat'){
              redirect('keloladosen/dashboardsenat');
          }
            elseif($username == 'timakfakultas'){
              redirect('keloladosen/dashboardtimakfak');
          } 
            elseif($username == 'timakpusat'){
              redirect('keloladosen/dashboardtimakpusat');
          } 
            elseif($username == 'kepegawaianpusat'){
              redirect('keloladosen/dashboardkepegpusat');
          } 
            else{
              $hasil=$this->m_dosen->getDataDosen($user);
                foreach($hasil as $row){
                    $nama=$row->Nama;
                }
             $this->session->set_userdata('nama', $nama); 
              redirect('keloladosen/dashboarddosen');
          }     
		}
        
        else { 
			// query error
			$data['error']='username atau password salah!';
			echo $data['error'];
			
		}
		/*if($cek == 1){
			$ambil = $this->m_login->login_ambildata('STATUS','member','USERNAME',$data['username'],'1');
			foreach($ambil as $a){
			$this->load->library('session');
			$newdata = array(
						'status' => $a['status'],
						'username' => $data['username']
						);
			$this->session->set_userdata($newdata);
			}
			if ($this->session->userdata('status')=='ADMIN'){
			echo "adasd";
				redirect('admin/daftarmember');
			}
			else if ($this->session->userdata('status')=='MEMBER'){
				redirect('admin/daftarmember');
			}
			else 
				redirect('admin/daftarmember');
		}*/

	}


}
?>

	