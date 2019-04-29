<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato_model extends CI_Model {
	function __construct(){
		parent::__construct();

	}	
	function getContrato(){
		$r = $this->db->query("SELECT * FROM contrato where estado=1");
		return $r->result();
	}
	function contador(){
		$r = $this->db->query("SELECT COUNT(id) as total FROM contrato where estado=1");
		return $r->row();
	}
}
?>