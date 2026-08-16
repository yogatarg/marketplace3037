<?php
class Martikel extends CI_Model {
	function tampil_artikel_terbaru(){
		$this->db->order_by('id_artikel', 'desc');
		$q = $this->db->get('artikel', 4, 0);
		$d = $q->result_array();

		return $d;
	}

	public function tampilan($id_artikel){
		$this->db->where('id_artikel', $id_artikel);
		$q = $this->db->get('artikel');
		$d = $q->row_array();

		return $d;
	}




}