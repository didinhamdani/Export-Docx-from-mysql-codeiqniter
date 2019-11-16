<?php 

class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}

	function tampil_data1(){
		$this->db->where('demo_db');
		$tampil = $this->db->get('user');
		if($tampil->num_row() >0 ){
			return $tampil->result();
		}else{
			return array();
		}
	}
}