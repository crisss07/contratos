<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}	
	function getContrato(){
		$r = $this->db->query("SELECT * FROM contrato");
		return $r->result();
	}

	function getadenda($id){
		$r = $this->db->query("SELECT * FROM adenda a
			WHERE id_contrato=$id");
		return $r->result();
	}

	function getdatoscontrato($id){
		$r = $this->db->query("SELECT * FROM contrato 
			WHERE id_contrato=$id");
		return $r->row();
	}
}
?>