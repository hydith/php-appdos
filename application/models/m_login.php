<?php
class M_login extends CI_Model{
	function login($data){
		$data2 = $this->db->get_where('user',$data);
		return $data2;
		//$query=$this->db->query('select * from member');
		//$query=$this->db->where('username',$data['username']);
		//$query=$this->db->where('password',$data['password']);
		//return $query->result();
	}
	public function login_ambildata($row,$namatabel,$where,$value,$limit){
		$this->db->select($row);
			$this->db->from($namatabel);
			$this->db->where($where,$value);
			$this->db->limit($limit);
			$query = $this->db->get();
			return $query->result_array();
	}
}
?>