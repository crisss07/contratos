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
		$r = $this->db->query("SELECT COUNT(id_contrato) as total FROM contrato where estado=1");
		return $r->row();
	}
	function cont_cinco(){
		$r = $this->db->query("SELECT COUNT(id_contrato),DATEDIFF(fin,now()) as dias  FROM contrato
			WHERE DATEDIFF(fin,now())=5");
		return $r->row();
	}
	function cont_diez(){
		$r = $this->db->query("SELECT COUNT(id_contrato),DATEDIFF(fin,now()) as dias  FROM contrato
			WHERE DATEDIFF(fin,now())=10");
		
	}
	function cont_quince(){
		$r = $this->db->query("SELECT COUNT(id_contrato),DATEDIFF(fin,now()) as dias  FROM contrato
			WHERE DATEDIFF(fin,now())=15");
		return $r->row();
	}
	function cont_listado(){
		$r = $this->db->query("SELECT c.*,DATEDIFF(fin,now()) as dias  FROM contrato c
		WHERE DATEDIFF(fin,now())=3");
		return $r->row();
	}
}
?>