<?php

class M_dosen extends CI_Model{
    
    public function getDataDosen($username){
        $query=$this->db->query("select * from dosen a, golongan b, jabatan c, unit_kerja d where a.NIDN='".$username."' and a.IDGolongan=b.IDGolongan and a.IDJabatan=c.IDJabatan and a.IDUnitKerja=d.IDUnitKerja");
        return $query->result();
    }
    public function insertpengajuan($data){
        $q = "INSERT INTO pengajuan (`NIDN`,`CurrJabatan`, `CurrGolongan`, `ToJabatan`, `ToGol`,`targetKUM`, `KUMtempuh`, `TglPengajuan`, `IDStatusPengajuan` ) VALUES ('".$data['nidn']."','".$data['jabatansekarang']."','".$data['currGol']."','".$data['tojabatan']."','".$data['toGol']."','".$data['kumtujuan']."','".$data['kumtempuh']."','".$data['date']."','".$data['statuspengajuan']."')";
        $this->db->query($q);
        $id=$this->db->insert_id();
        return $id;
    }
    public function cekpass($data){
        $this->db->select('*');
        $this->db->from('user');  
        $this->db->where('username', $data);
        $query=$this->db->get();
        return $query->result();
    }
    public function insertakperbidang($data){
        $q = "INSERT INTO ak_perbidang (`AKPendidikan`,`AKPenelitian`, `AKPengabdian`,`AKPenunjang`, `IDPengajuan` ) VALUES ('".$data['akpendidikan']."','".$data['akpenelitian']."','".$data['akpengabdian']."','".$data['akpenunjang']."','".$data['id']."')";
        $this->db->query($q);
    }
    
     public function insertijazah($data){
        $q = "INSERT INTO pengajuan_ijazah (`Ijazah`,`NIDN` ) VALUES ('".$data['ijazah']."','".$data['id']."')"; 
        $this->db->query($q);
    }
    public function cekijazah($id){
          $this->db->select('*');
        $this->db->from('pengajuan_ijazah');  
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query->result(); 
    }
    public function insertpengajuantemp($data){
        $q = "INSERT INTO pengajuan_temp (`jabatan`,`kum`,`NIDN` ) VALUES ('".$data['jabatan']."','".$data['kum']."','".$data['nidn']."')"; 
        $this->db->query($q);
    }
    public function getpengajuantemp($id){
          $this->db->select('*');
        $this->db->from('pengajuan_temp');  
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query->result(); 
    }
    
    public function getstatuspengajuan($id){
          $this->db->select('*');
        $this->db->from('pengajuan');  
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query->result(); 
    }
    
    public function cekpengajuan($id){
          $this->db->select('*');
        $this->db->from('pengajuan');  
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query; 
    }
    public function getstatus($id){
          $query=$this->db->query("SELECT * FROM pengajuan a where a.IDPengajuan = '".$id."'");
        return $query->result(); 
    }
    public function getketrevisi($id){
        $query=$this->db->query("SELECT * FROM ket_revisi a where a.IDPengajuan = '".$id."'");
        return $query->result(); 
    }
    
    public function getidpengajuan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a where a.NIDN = '".$id."' and a.IDStatusPengajuan=7");
        return $query->result();
    }
    
    function cekberkas_a($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='A'");
		return $data2;
		
	}
    function cekberkas_b($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='B'");
		return $data2;
		
	}
    function cekberkas_c($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='C'");
		return $data2;
		
	}
    function cekberkas_d($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='D'");
		return $data2;
		
	}
    function cekberkas_e($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='E'");
		return $data2;
		
	}
    function cekberkas_f($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='F'");
		return $data2;
		
	}
    function cekberkas_g($id){
		$data2 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='G'");
		return $data2;
		
	}
    function getberkas_a($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='A'");
		return $query->result();
		
	}
    function getberkas_b($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='B'");
		return $query->result();
		
	}
    function getberkas_c($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='C'");
		return $query->result();
		
	}
    function getberkas_d($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='D'");
		return $query->result();
		
	}
    function getberkas_e($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='E'");
		return $query->result();
		
	}
    function getberkas_f($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='F'");
		return $query->result();
		
	}
    function getberkas_g($id){
		$query = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id."' and KodeBerkas='G'");
		return $query->result();
		
	}
    function hapusberkas_a($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='A'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='A'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_b($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='B'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='B'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_c($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='C'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='C'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_d($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='D'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='D'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_e($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='E'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='E'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_f($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='F'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='F'";
        $this->db->query($q1);
        
       
		
	}
    function hapusberkas_g($id){
		
        $query1 = $this->db->query("SELECT * FROM berkas_administrasi a where a.IDPengajuan = '".$id['id']."' and KodeBerkas='G'");
        $row = $query1->row();
 
        unlink("./berkas/administrasi/".$row->NamaBerkas);
         $q1 = "DELETE FROM `berkas_administrasi` where IDPengajuan='".$id['id']."' and KodeBerkas='G'";
        $this->db->query($q1);
        
       
		
	}
    
    
    public function ubahstatuske1($id){
         $this->db->query("DELETE FROM `ket_revisi` where IDPengajuan ='".$id."'");
        $q="update pengajuan set IDStatusPengajuan='1' where IDPengajuan='".$id."'";
		$this->db->query($q);
    }
    
    public function editpassword($data){
        $pass = md5($data['password']);
        $q="update user set pass='".$pass."' where username='".$data['username']."'";
		$this->db->query($q);
    }
    public function ubahstatuske4($id){
         $this->db->query("DELETE FROM `ket_revisi` where IDPengajuan ='".$id."'");
        $q="update pengajuan set IDStatusPengajuan='4' where IDPengajuan='".$id."'";
		$this->db->query($q);
    }
   
    public function getdatapengajuan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a, status_pengajuan b, dosen c where a.IDStatusPengajuan = b.IDStatusPengajuan and a.NIDN = c.NIDN and a.NIDN = '".$id."'");
        return $query->result();
    }
     public function getdatacurrjabatan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a, jabatan b, golongan c where a.CurrJabatan = b.IDJabatan and a.CurrGolongan = c.IDGolongan and a.NIDN = '".$id."'");
        return $query->result();
    }
     public function getdatatojabatan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a, jabatan b, golongan c where a.ToJabatan = b.IDJabatan and a.ToGol = c.IDGolongan and a.NIDN = '".$id."'");
        return $query->result();
    }
     public function getakperbidang($id){
    
        $this->db->select('*');
        $this->db->from('ak_perbidang');  
        $this->db->where('IDPengajuan', $id);
        $query=$this->db->get();
        return $query->result();   
    }
    
       public function getkategoripendidikan(){
    
        $this->db->select('*');
        $this->db->from('kategori_pendidikan');   
        $query=$this->db->get();
        return $query->result();   
    }
     public function getkategoripenelitian(){
    
        $this->db->select('*');
        $this->db->from('kategori_penelitian');   
        $query=$this->db->get();
        return $query->result();   
    }
     public function getkategoripengabdian(){
    
        $this->db->select('*');
        $this->db->from('kategori_pengabdian');   
        $query=$this->db->get();
        return $query->result();   
    }
    
     public function getkategoripenunjang(){
    
        $this->db->select('*');
        $this->db->from('kategori_penunjang');   
        $query=$this->db->get();
        return $query->result();   
    }
    
    public function geturaiankategori($kode){
        $this->db->select('*');
        $this->db->from('kategori_pendidikan_hint');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
        
    }
    
     public function geturaiankategoripenelitian($kode){
        $this->db->select('*');
        $this->db->from('kategori_penelitian_hint');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
        
    }
    public function geturaiankategoripengabdian($kode){
        $this->db->select('*');
        $this->db->from('kategori_pengabdian_hint');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
        
    }
     public function geturaiankategoripenunjang($kode){
        $this->db->select('*');
        $this->db->from('kategori_penunjang_hint');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
        
    }
     public function geturaiankategoripenelitiankaryailmiah(){
        $this->db->select('*');
        $this->db->from('jenis_karya_ilmiah');
        $query=$this->db->get();
        return $query->result();
        
    }
      public function getjenispengabdian(){
        $this->db->select('*');
        $this->db->from('jenis_pengabdian');
        $query=$this->db->get();
        return $query->result();
        
    }
    
     public function getbentukkaryailmiah($no){
        $this->db->select('*');
        $this->db->from('bentuk_kerya_ilmiah');
        $this->db->where('IDJenisKaryaIlmiah', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
     public function getwaktupengabdian($no){
        $this->db->select('*');
        $this->db->from('waktu_pengabdian');
        $this->db->where('IDJenisPengabdian', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
    public function getmacamkaryailmiah($no){
        $this->db->select('*');
        $this->db->from('macam_karya_ilmiah');
        $this->db->where('IDBentukKaryaIlmiah', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
    public function geturaiankategoridetail($no){
        $this->db->select('*');
        $this->db->from('kategori_pendidikan_hint');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
     public function geturaiankategoripengabdiandetail($no){
        $this->db->select('*');
        $this->db->from('kategori_pengabdian_hint');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
      public function geturaiankategoripenunjangdetail($no){
        $this->db->select('*');
        $this->db->from('kategori_penunjang_hint');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    public function gettingkatpengabdiandetail($no){
        $this->db->select('*');
        $this->db->from('tingkat_pengabdian');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
    
    public function getmacamkaryailmiahdetail($no){
        $this->db->select('*');
        $this->db->from('macam_karya_ilmiah');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
    public function gettingkatpengabdian($no){
        $this->db->select('*');
        $this->db->from('tingkat_pengabdian');
        $this->db->where('IDWaktuPengabdian', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    public function geturaiankategoripenelitiandetail($no){
        $this->db->select('*');
        $this->db->from('kategori_penelitian_hint');
        $this->db->where('No', $no);
        $query=$this->db->get();
        return $query->result();
        
    }
    
    
    
    public function getnamakegiatanpenelitian($kode){
         $this->db->select('*');
        $this->db->from('kategori_penelitian');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
    }
     public function getnamakegiatanpengabdian($kode){
         $this->db->select('*');
        $this->db->from('kategori_pengabdian');
        $this->db->where('Kode', $kode);
        $query=$this->db->get();
        return $query->result();
    }
    
    
    public function geturaiankategoridetaillanjut($no){
          $query=$this->db->query("select * from kategori_pendidikan a, kategori_pendidikan_hint b where a.No=b.Kode and b.No='".$no."'");
          return $query->result();
    }
    
     public function geturaiankategoripenunjangdetaillanjut($no){
          $query=$this->db->query("select * from kategori_penunjang a, kategori_penunjang_hint b where a.Kode=b.Kode and b.No='".$no."'");
          return $query->result();
    }
    public function inputkegiatan($data){
      $q = "INSERT INTO kegiatantridharma (`IDGolongan`,`Kode`,`KategoriKegiatan`, `SubKategoriKegiatan`,`Tanggal`, `SatuanHasil`, `AngkaKredit`,`JumlahAngkaKredit`, `IDPengajuan` , `NIDN`   ) VALUES ('".$data['idgolongan']."','".$data['KodeKegiatan']."','".$data['kegiatan']."','".$data['ket']."','".$data['tgl']."','".$data['satuanhasilkegiatan']."','".$data['angkakreditkegiatan']."','".$data['jumlahangkakredit']."','".$data['idpengajuan']."','".$data['NIDN']."')";
        $query=$this->db->query($q);
        $id=$this->db->insert_id();
        return $id;
    }
     
     public function inputkegiatanpengabdian($data){
      $q = "INSERT INTO pengabdian (`No`,`KategoriKegiatan`, `SubKategoriKegiatan`, `Tanggal`,`SatuanHasil`, `AngkaKredit`,`JumlahAngkaKredit`,`IDPengajuan` , `NIDN`   ) VALUES ('".$data['KodeKegiatan']."','".$data['kegiatan']."','".$data['ket']."','".$data['tgl']."','".$data['satuanhasilkegiatan']."','".$data['angkakreditkegiatan']."','".$data['jumlahangkakredit']."','".$data['idpengajuan']."','".$data['NIDN']."')";
        $query=$this->db->query($q);
        $id=$this->db->insert_id();
        return $id;
    }
    
     public function inputkegiatanpenunjang($data){
      $q = "INSERT INTO penunjang (`No`,`KategoriKegiatan`, `SubKategoriKegiatan`, `Tanggal`,`SatuanHasil`, `AngkaKredit`,`JumlahAngkaKredit`, `IDPengajuan` , `NIDN`   ) VALUES ('".$data['KodeKegiatan']."','".$data['kegiatan']."','".$data['ket']."','".$data['tgl']."','".$data['satuanhasilkegiatan']."','".$data['angkakreditkegiatan']."','".$data['jumlahangkakredit']."','".$data['idpengajuan']."','".$data['NIDN']."')";
        $query=$this->db->query($q);
        $id=$this->db->insert_id();
        return $id;
    }
    
    public function insertbuktifisik($data){
		$query2 ="INSERT INTO bukti_fisik_kegiatan (`IDKegiatan`,`NamaBuktiFisik`, `NIDN` ) VALUES ('".$data['id']."','".$data['namafile']."','".$data['nidn']."')";
		$this->db->query($query2);
	
	}
    
    public function insertberkaspenelitian($data){
		$query2 ="INSERT INTO berkas_penelitian (`IDPenelitian`,`NamaBerkas`, `NIDN` ) VALUES ('".$data['id']."','".$data['namafile']."','".$data['nidn']."')";
		$this->db->query($query2);
	
	}
    
     public function insertberkaspengabdian($data){
		$query2 ="INSERT INTO berkas_pengabdian (`IDPengabdian`,`NamaBerkas`, `NIDN` ) VALUES ('".$data['id']."','".$data['namafile']."','".$data['nidn']."')";
		$this->db->query($query2);
	
	}
      public function insertberkaspenunjang($data){
		$query2 ="INSERT INTO berkas_penunjang (`IDPenunjang`,`NamaBerkas`, `NIDN` ) VALUES ('".$data['id']."','".$data['namafile']."','".$data['nidn']."')";
		$this->db->query($query2);
	
	}
    public function getbuktifisik($id){
          $this->db->select('*');
        $this->db->from('bukti_fisik_kegiatan');
        $this->db->where('IDKegiatan', $id);
        $query=$this->db->get();
        return $query->result();
    }
   
    
    public function deletekegiatanpendidikan($id){
        $this->db->where('IDKegiatan',$id['idpend']);
        $query1 = $this->db->get('bukti_fisik_kegiatan');
        $row = $query1->result();
        foreach($row as $row1){
        unlink("./berkas/pendidikan/".$row1->NamaBuktiFisik);
        }
         $q1 = "DELETE FROM `bukti_fisik_kegiatan` where IDKegiatan='".$id['idpend']."' ";
        $this->db->query($q1);
        
         $q2 = "DELETE FROM `kegiatantridharma` where IDTriDharma='".$id['idpend']."' ";
       $this->db->query($q2);
    }
     public function deletekegiatanpenelitian($id){
         $this->db->where('IDKegiatan',$id['id']);
        $query1 = $this->db->get('bukti_fisik_kegiatan');
        $row = $query1->result();
        foreach($row as $row1){
        unlink("./berkas/penelitian/".$row1->NamaBuktiFisik);
        }
         $q1 = "DELETE FROM `bukti_fisik_kegiatan` where IDKegiatan='".$id['id']."' ";
        $this->db->query($q1);
        
         $q2 = "DELETE FROM `kegiatantridharma` where IDTriDharma='".$id['id']."' ";
         $this->db->query($q2);
    }
    
     public function deletekegiatanpengabdian($id){
         $this->db->where('IDKegiatan',$id['id']);
        $query1 = $this->db->get('bukti_fisik_kegiatan');
        $row = $query1->result();
         foreach($row as $row1){
        unlink("./berkas/pengabdian/".$row1->NamaBuktiFisik);
         }
         $q1 = "DELETE FROM `bukti_fisik_kegiatan` where IDKegiatan='".$id['id']."' ";
        $this->db->query($q1);
        
         $q2 = "DELETE FROM `kegiatantridharma` where IDTriDharma='".$id['id']."' ";
         $this->db->query($q2);
    }
    public function deletekegiatanpenunjang($id){
         $this->db->where('IDKegiatan',$id['id']);
        $query1 = $this->db->get('bukti_fisik_kegiatan');
        $row = $query1->result();
        foreach($row as $row1){
        unlink("./berkas/penunjang/".$row1->NamaBuktiFisik);
        }
         $q1 = "DELETE FROM `bukti_fisik_kegiatan` where IDKegiatan='".$id['id']."' ";
        $this->db->query($q1);
        
         $q2 = "DELETE FROM `kegiatantridharma` where IDTriDharma='".$id['id']."' ";
         $this->db->query($q2);
    }
    
    public function getkegiatanpendidikan($id){
      $query=$this->db->query("SELECT * FROM `kegiatantridharma` where IDPengajuan='".$id."' and IDGolongan=1 ORDER BY `Kode` ASC, `KategoriKegiatan` ASC");
        return $query->result(); 
    }
    
    public function getkegiatandetail($id){
      $query=$this->db->query("SELECT * FROM `kegiatantridharma` where IDTriDharma='".$id."'");
        return $query->result(); 
    }
    public function getkegiatanpenelitian($id){
      $query=$this->db->query("SELECT * FROM `kegiatantridharma` where IDPengajuan='".$id."' and IDGolongan=2 ORDER BY `Kode` ASC, `KategoriKegiatan` ASC");
        return $query->result(); 
    }
    
     public function getkegiatanpengabdian($id){
      $query=$this->db->query("SELECT * FROM `kegiatantridharma` where IDPengajuan='".$id."' and IDGolongan=3 ORDER BY `Kode` ASC, `KategoriKegiatan` ASC");
        return $query->result(); 
    }
    public function getkegiatanpenunjang($id){
      $query=$this->db->query("SELECT * FROM `kegiatantridharma` where IDPengajuan='".$id."' and IDGolongan=4 ORDER BY `Kode` ASC, `KategoriKegiatan` ASC");
        return $query->result(); 
    }
    public function inputpengajaranpendidikan($data){
         $q = "INSERT INTO pengajaran (`MataKuliah`,`JumlahKelas`, `SKS`,`NIDN` ) VALUES ('".$data['matkul']."','".$data['kelas']."','".$data['sks']."','".$data['nidn']."')";
        $query=$this->db->query($q);
    }
    public function getpengajaran($id){
        $this->db->select('*');
        $this->db->from('pengajaran');
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query->result();
    }
    public function hapuspengajaranpendidikan($id){
          $q = "DELETE FROM `pengajaran` where IDPengajaran='".$id['idajar']."' ";
        $query=$this->db->query($q);
    }
    public function getjabatan($id){
         $query=$this->db->query("select * from dosen a, golongan b, jabatan c, unit_kerja d where a.NIDN='".$id."' and a.IDGolongan=b.IDGolongan and a.IDJabatan=c.IDJabatan and a.IDUnitKerja=d.IDUnitKerja");
        return $query->result();
    }
    public function tampilpengajaran($id){
        $this->db->select('*');
        $this->db->from('pengajaran');
        $this->db->where('NIDN', $id['nidn']);
        $query=$this->db->get();
        return $query->result();
    }
    public function inputjumlahkumajar($data){
         $q = "INSERT INTO kum_pengajaran (`NIDN`,`JumlahKUM`) VALUES ('".$data['nidn']."','".$data['kum']."')";
        $query=$this->db->query($q);
    }
    public function getkumajar($id){
        $this->db->select('*');
        $this->db->from('kum_pengajaran');
        $this->db->where('NIDN', $id);
        $query=$this->db->get();
        return $query->result();
    }
    
    public function gettahapberkas($id){
       $query=$this->db->query("SELECT * FROM `proses_berkas` a,proses b where a.IDProses=b.IDProses and IDPengajuan=".$id."");
        return $query->result(); 
    }
    public function hapuspengajaran(){
         $q = "DELETE FROM `pengajaran`";
        $query=$this->db->query($q);
    }
    public function hapuskumajar(){
         $q = "DELETE FROM `kum_pengajaran`";
        $query=$this->db->query($q);
    }
    
    public function inputdatadosen($data){
       
      $q = "INSERT INTO dosen (`NIDN`,`No_Karpeg`, `Nama`,`Email`,`No_Hp`,`Alamat`, `Tanggal_lahir`, `kelahiran`,`Jenis_Kelamin`, `IDGolongan` , `TMT_Gol`, `IDJabatan`, `TMT_Jab`,`IDUnitKerja`, `Pendidikan` ) VALUES ('".$data['nidn']."','".$data['karpeg']."','".$data['nama']."','".$data['email']."','".$data['hp']."','".$data['alamat']."','".$data['tgl']."','".$data['kelahiran']."','".$data['jk']."','".$data['gol']."','".$data['tmt_gol']."','".$data['jabatan']."','".$data['tmt_jab']."','".$data['unit_kerja']."','".$data['pendidikan']."')";
        $query=$this->db->query($q);
        $id=$this->db->insert_id();
        return $id;
    
    }
    
    public function inputfoto($data){
        $q="update dosen set Foto='".$data['namafile']."' where No='".$data['id']."'";
		$this->db->query($q);
    }
    public function gantifoto($data){
        
        $q="update dosen set Foto='".$data['namafile']."' where No='".$data['id']."'";
		$this->db->query($q);
    }
    
    public function inputeditdosen($data){
       $q="update dosen set NIDN='".$data['nidn']."',No_Karpeg='".$data['karpeg']."',Nama='".$data['nama']."',Email='".$data['email']."',No_Hp='".$data['hp']."',Alamat='".$data['alamat']."',Tanggal_Lahir='".$data['tgl']."',kelahiran='".$data['kelahiran']."',Jenis_Kelamin='".$data['jk']."',IDGolongan='".$data['gol']."',TMT_Gol='".$data['tmt_gol']."',IDJabatan='".$data['jabatan']."',TMT_Jab='".$data['tmt_jab']."',IDUnitKerja='".$data['unit_kerja']."',Pendidikan='".$data['pendidikan']."' where No='".$data['id']."' ";
        $this->db->query($q);
    }
    
    public function inputuser($data){
        $pass = md5($data['password']);
		$query2 ="INSERT INTO user (`username`,`pass`) VALUES ('".$data['username']."','".$pass."')";
		$this->db->query($query2);
	
	}
    
    
     public function getnidnfrompengajuan($id){
         $query=$this->db->query("SELECT * FROM pengajuan a where  a.idpengajuan = '".$id."'");
        return $query->result();
    }
  
    
    function getalldosen(){  
   $query=$this->db->query("select * from dosen a, golongan b, jabatan c, unit_kerja d where  a.IDGolongan=b.IDGolongan and a.IDJabatan=c.IDJabatan and a.IDUnitKerja=d.IDUnitKerja");
        return $query->result();     
    }
    
    function ceknilaikegiatan($id){
        $data2 = $this->db->query("SELECT * FROM nilai_kegiatantridharma a where a.IDTriDharma = '".$id."'");
		return $data2;
    }
    
}
?>