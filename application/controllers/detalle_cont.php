<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle_cont extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->model('boletas_model');
		$this->load->model('vigencias_model');
		$this->load->model('usuario_model');
		$this->load->model('dashboard_model');
		$this->load->model('contrato_model');
		$this->load->helper('form');
		$this->load->database('default');
		$this->load->library('encrypt');
	}
	public function index()
	{	
		if (!$this->session->userdata('is_logued_in'))
			redirect('inicio/login','refresh');
		$data = array(
			'boletas' => $this->boletas_model->getBoletas(),
			'tipo'=>0
		);
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('admin/listado',$data);
		$this->load->view('common/footer');
	}
	public function adenda($id = null)
	{	
		if (!$this->session->userdata('is_logued_in'))
			redirect('inicio/login','refresh');
		$data['detalle_adenda'] = $this->dashboard_model->getadenda($id);		
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('list_adendas/listado',$data);
		$this->load->view('common/footer');
	}
	public function contrato($id = null)
	{	
		if (!$this->session->userdata('is_logued_in'))
			redirect('inicio/login','refresh');
		$data['detalle_adenda'] = $this->dashboard_model->getadenda($id);
		$data['d_contrato'] = $this->dashboard_model->getdatoscontrato($id);		
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('list_adendas/datos_contrato',$data);
		$this->load->view('common/footer');
	}

	public function cont_diez()
	{	
		if (!$this->session->userdata('is_logued_in'))
		redirect('inicio/login','refresh');		
		$data['contrato'] = $this->contrato_model->cont_list_diez();		
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('list_adendas/datos_cnt_diez',$data);
		$this->load->view('common/footer');
	}
}
