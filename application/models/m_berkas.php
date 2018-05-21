<?php
class M_berkas extends CI_Model{
    
function getSemuaBerkas(){  
    $query=$this->db->query("SELECT * FROM pengajuan");
        return $query->result();    
    }
    
function getBerkasBaru(){  
    $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=1 and IDStatusPengajuan!=7");
        return $query->result();   
    }
    
    function getBerkasProses(){  
        $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan!=7 and IDStatusPengajuan!=8 and IDStatusPengajuan!=1");
        return $query->result();         
    }
    
    function getBerkasSelesai(){  
       $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=8");
        return $query->result();     
    }
    
function getberkasbarusenat(){ 
   
    $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=2");
        return $query->result();       
    }
    
function getberkasbarutimakfak(){ 
    $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=3");
        return $query->result();     
    }  
function getberkasbarutimakpusat(){ 
     $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=10");
        return $query->result();       
    }      
    function getallberkaskepegpusat(){
    $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=4 or IDStatusPengajuan=10 or IDStatusPengajuan=11");
        return $query->result();      
    }
    function getberkasbarukepegpusat(){
     $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=4 and IDStatusPengajuan!=7");
        return $query->result();       
    }
    function getberkasproseskepegpusat(){
     $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=10 or IDStatusPengajuan=11 and IDStatusPengajuan!=7");
        return $query->result();         
    }
    function getberkasselesaikepegpusat(){
     $query=$this->db->query("SELECT * FROM pengajuan where IDStatusPengajuan=8 and IDStatusPengajuan!=7");
        return $query->result();       
    }
   function simpannilaikegiatan($data){
        $q = "INSERT INTO nilai_kegiatantridharma (`IDTridharma`,`Nilai`,`IDPengajuan`) VALUES ('".$data['id']."','".$data['nilai']."','".$data['idpengajuan']."')"; 
        $this->db->query($q);
   }
    
     
    public function getnilaikegiatan($id){
         $query=$this->db->query("SELECT * FROM nilai_kegiatantridharma where IDTriDharma = '".$id."'");
        return $query->result();
    }
  
 public function getdatacurrjabatan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a, jabatan b, golongan c where a.CurrJabatan = b.IDJabatan and a.CurrGolongan = c.IDGolongan and a.IDPengajuan = '".$id."'");
        return $query->result();
    } 
public function getdatapengajuan($id){
        $query=$this->db->query("SELECT * FROM pengajuan a, status_pengajuan b, dosen c where a.IDStatusPengajuan = b.IDStatusPengajuan and a.NIDN = c.NIDN and a.IDPengajuan = '".$id."'");
        return $query->result();
}
    public function getdatadosen($id){
        $query=$this->db->query("SELECT * FROM pengajuan a, dosen b,jabatan c, golongan d, unit_kerja e where a.NIDN = b.NIDN and b.IDGolongan=d.IDGolongan and b.IDJabatan=c.IDJabatan and b.IDUnitKerja=e.IDUnitKerja and a.IDPengajuan = '".$id."'");
        return $query->result();
}
    
    public function getdatatojabatan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a, jabatan b, golongan c where a.ToJabatan = b.IDJabatan and a.ToGol = c.IDGolongan and a.IDPengajuan = '".$id."'");
        return $query->result();
    }
    
    function  count_barang_search($orlike) {
    $this->db->or_like($orlike);
    $query = $this->db->get('pengajuan');
 
    return $query->num_rows();
}
    public function ubahstatusrevisi($id){
        $q="update pengajuan set IDStatusPengajuan='5' where IDPengajuan='".$id['id']."' ";
		$this->db->query($q);
    }
    
     public function cariberkaspengajuan($id){
          $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('IDPengajuan', $id);
        $query=$this->db->get();
        return $query->result();
    }
    public function revisikepegfak($data){
        $q = "INSERT INTO ket_revisi (`StatusRevisi`,`Ket`,`IDPengajuan` ) VALUES ('1','".$data['pesan']."','".$data['id']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan='5' where IDPengajuan='".$data['id']."' ";
		$this->db->query($q2);
    } 
    public function revisikepegpusat($data){
        $q = "INSERT INTO ket_revisi (`StatusRevisi`,`Ket`,`IDPengajuan` ) VALUES ('2','".$data['pesan']."','".$data['id']."')"; 
        $this->db->query($q);
         $q="update pengajuan set IDStatusPengajuan=5 where IDPengajuan='".$data['id']."' ";
		$this->db->query($q);
    }
    
    public function kepegfak_getberkasbaru(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=1&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=1&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=1&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=1&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=1,IDPengajuan,NULL)) as Jumlah_Berkas_Baru FROM pengajuan");
        return $query->result();
    }
    
    public function kepegfak_getberkasproses(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan!=1&&IDStatusPengajuan!=8&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan!=1&&IDStatusPengajuan!=8&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan!=1&&IDStatusPengajuan!=8&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan!=1&&IDStatusPengajuan!=8&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan!=1&&IDStatusPengajuan!=8,IDPengajuan,NULL)) as jumlah_berkas_proses FROM pengajuan");
        return $query->result();
    }
    public function kepegfak_getberkasselesai(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=8&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=8,IDPengajuan,NULL)) as Jumlah_Berkas_Selesai FROM pengajuan");
        return $query->result();
    }
    
    public function kepegpus_getberkasbaru(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=4&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=4&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=4&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=4&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=4,IDPengajuan,NULL)) as Jumlah_Berkas_Baru FROM pengajuan");
        return $query->result();
    }
    
    public function kepegpus_getberkasproses(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=10||IDStatusPengajuan=11&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=10||IDStatusPengajuan=11&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=10||IDStatusPengajuan=11&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=10||IDStatusPengajuan=11&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=10||IDStatusPengajuan=11,IDPengajuan,NULL)) as jumlah_berkas_proses FROM pengajuan");
        return $query->result();
    }
    public function kepegpus_getberkasselesai(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=8&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=8&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=8,IDPengajuan,NULL)) as Jumlah_Berkas_Selesai FROM pengajuan");
        return $query->result();
    }
    
     public function senat_getberkasbaru(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=2&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=2&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=2&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=2&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=2,IDPengajuan,NULL)) as Jumlah_Berkas_Baru FROM pengajuan");
        return $query->result();
    }
    
    public function timakfak_getberkasbaru(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=3&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=3&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=3&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=3&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=3,IDPengajuan,NULL)) as Jumlah_Berkas_Baru FROM pengajuan");
        return $query->result();
    }
    public function timakpusat_getberkasbaru(){
        $query=$this->db->query("SELECT COUNT(IF(IDStatusPengajuan=10&&ToJabatan=1,ToJabatan,NULL)) as Asisten_Ahli, COUNT(IF(IDStatusPengajuan=10&&ToJabatan=2,ToJabatan,NULL)) as Lektor, COUNT(IF(IDStatusPengajuan=10&&ToJabatan=3,ToJabatan,NULL)) as Lektor_Kepala, COUNT(IF(IDStatusPengajuan=10&&ToJabatan=4,ToJabatan,NULL)) as Guru_Besar, COUNT(IF(IDStatusPengajuan=10,IDPengajuan,NULL)) as Jumlah_Berkas_Baru FROM pengajuan");
        return $query->result();
    }
    
    public function getrincianjabatandosen(){
      $query=$this->db->query("SELECT a.IDJabatan, NamaJabatan, COUNT(a.IDJabatan) as Jumlah from dosen a, jabatan b where a.IDjabatan = b.IDJabatan group by IDJabatan");
        return $query->result(); 
    }
    
    public function verfikasiberkaskepegfak($data){
        $query1=$this->db->query("SELECT * from nilai_reviewer where IDPengajuan ='".$data['id']."'");
        $hasil1=$query1->result();
        foreach($hasil1 as $row1){
        $this->db->query("update kegiatantridharma set JumlahAngkaKredit=".$row1->Nilai." where IDTriDharma='".$row1->IDTriDharma."'");
        }
       
        
        $this->db->query("DELETE FROM `nilai_reviewer` where IDPengajuan =".$data['id']."");
         $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (2,".$data['id'].",'".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=2 where IDPengajuan=".$data['id'];
		$this->db->query($q2);
    }
    
    
    public function verfikasiberkaskepegpusat($data){
         $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (5,'".$data['id']."','".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=10 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
    }
    
     public function berkasdisetujui($data){
         $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (3,".$data['id'].",'".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=3 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
    }
    
    public function berkasselesaidinilaitimfak($data){
         $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (4,'".$data['id']."','".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=9 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
    }
    
    public function berkasdikirimkepusat($data){
        $query1=$this->db->query("SELECT * from nilai_kegiatantridharma where IDPengajuan ='".$data['id']."'");
        $hasil1=$query1->result();
        foreach($hasil1 as $row1){
            $this->db->query("update kegiatantridharma set JumlahAngkaKredit=".$row1->Nilai." where IDTriDharma='".$row1->IDTriDharma."'");
        }
       
        
        $this->db->query("DELETE FROM `nilai_kegiatantridharma` where IDPengajuan =".$data['id']."");
        
    
         $q2="update pengajuan set IDStatusPengajuan=4 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
    }
    
    public function berkasselesaidinilaitimpusat($data){
           $query1=$this->db->query("SELECT * from nilai_kegiatantridharma where IDPengajuan ='".$data['id']."'");
        $hasil1=$query1->result();
        foreach($hasil1 as $row1){
            $this->db->query("update kegiatantridharma set JumlahAngkaKredit=".$row1->Nilai." where IDTriDharma='".$row1->IDTriDharma."'");
        }
       
        
        $this->db->query("DELETE FROM `nilai_kegiatantridharma` where IDPengajuan =".$data['id']."");
        
        $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (6,'".$data['id']."','".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=11 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
    }
    
     public function tolakberkas($data){
         $q = "INSERT INTO proses_berkas (`IDProses`,`IDPengajuan`,`TglProses` ) VALUES (8,'".$data['id']."','".$data['tgl']."')"; 
        $this->db->query($q);
         $q2="update pengajuan set IDStatusPengajuan=6 where IDPengajuan='".$data['id']."'";
		$this->db->query($q2);
         $q3 = "INSERT INTO ket_tolak (`Ket`,`IDPengajuan` ) VALUES ('".$data['pesan']."',".$data['id'].")"; 
        $this->db->query($q3);
    }
    
    
    public function getidpengajuan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a where a.NIDN = '".$id."' and a.IDStatusPengajuan=7");
        return $query->result();
    }
    
    public function insertberkas_a($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('A','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_b($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('B','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_c($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('C','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_d($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('D','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_e($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('E','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_f($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('F','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function insertberkas_g($data){
        $q = "INSERT INTO berkas_administrasi (`KodeBerkas`,`NamaBerkas`,`IDPengajuan`,`NIDN` ) VALUES ('G','".$data['namafile']."','".$data['id']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    
public function ubahnilaikegiatan($id){
        $q="update nilai_kegiatantridharma set Nilai='".$id['nilai']."' where IDTriDharma='".$id['id']."' ";
        $query=$this->db->query($q);
    }
    
     function simpannilaireviewer($data){
        $q = "INSERT INTO nilai_reviewer (`IDTriDharma`,`Nilai`,`IDPengajuan`) VALUES ('".$data['id']."','".$data['nilai']."','".$data['idpengajuan']."')"; 
        $this->db->query($q);
   }
    public function getnilaireviewer($id){
         $query=$this->db->query("SELECT * FROM nilai_reviewer where IDTriDharma = '".$id."'");
        return $query->result();
    }
    
}
?>