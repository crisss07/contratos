<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//verificar cambios
class Adenda extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->model('boletas_model');
		$this->load->model('vigencias_model');
		$this->load->model('usuario_model');
		$this->load->model('Adenda_model');
		$this->load->helper('form');
		$this->load->database('default');
		$this->load->library('encrypt');
		$this->load->library('user_agent');
		$this->load->helper('vayes_helper');
	}
	
	//NUEVA ADENDA
	public function nuevo($id){
		if (!$this->session->userdata('is_logued_in')){
			redirect('inicio/login','refresh');
		}
		else{


		$data['contrato'] = $this->db->query("SELECT *
										FROM contrato
										WHERE id_contrato = $id")->row();
		
		$data['tipo'] = 'reg';
		

		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('admin/adenda', $data);
		$this->load->view('common/footer', $data);
		}
	}

	//NUEVA ADENDA
	public function insertar(){
		if (!$this->session->userdata('is_logued_in')){
			redirect('inicio/login','refresh');
		}
		else{
			$datos = $this->input->post();

			$pdf = '';
		$conf_file = array(
			'upload_path' => './assets/respaldo',
			'allowed_types'	=> 'pdf',
			'encrypt_name' => true
		);
		$this->load->library('upload',$conf_file);
		if($this->upload->do_upload("res")){
			$data = array('upload_data' => $this->upload->data());
			$pdf = $data['upload_data']['file_name'];
		}
			if(isset($datos))
			{
				$tipo = $datos['tipo'];
				$categoria = $datos['categoria'];
				$beneficiario = $datos['beneficiario'];
				$empresa = $datos['empresa'];
				$ent_financiera = $datos['ent_financiera'];
				$no_contrato = $datos['no_contrato'];
				$moneda = $datos['moneda'];
				$monto = $datos['monto'];
				$objeto = $datos['objeto'];
				$supervision = $datos['supervision'];
				$inicio = $datos['ini'];
				$fin = $datos['fin'];
				$id_contrato = $datos['id_contrato'];
				$respaldo = $pdf;
				

				$this->Adenda_model->insertar_adenda($tipo, $categoria, $beneficiario, $empresa, $ent_financiera, $no_contrato, $moneda, $monto, $objeto, $supervision, $inicio, $fin, $id_contrato, $respaldo);
				redirect(base_url());
			}
		}
	}



	public function formulario(){
		if (!$this->session->userdata('is_logued_in'))
			redirect('inicio/login','refresh');
		if ($this->uri->segment(3)) {
			if($this->uri->segment(4)!='no'){
				$data = array(
					'boleta' => $this->boletas_model->getBoleta($this->uri->segment(3)),
					'vigencia' => $this->vigencias_model->getVigencia2($this->uri->segment(3)),
				);
			}
			else{
				$data = array(
					'boleta' => $this->vigencias_model->getVigencia($this->uri->segment(3)),
					'vigencia' => 'no',
				);	
			}
			$data['tipo'] ='upd';
		}
		else{
			$data['tipo'] ='reg';
		}
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('admin/form_boletas', $data);
		$this->load->view('common/footer', $data);
	}
	public function add_boleta(){
		$pdf = '';
		$conf_file = array(
			'upload_path' => './assets/respaldo',
			'allowed_types'	=> 'pdf',
			'encrypt_name' => true
		);
		$this->load->library('upload',$conf_file);
		if($this->upload->do_upload("res")){
			$data = array('upload_data' => $this->upload->data());
			$pdf = $data['upload_data']['file_name'];
		}
		$valores = array(
			'tipo'=>$this->input->post('tipo'),
			'categoria'=>$this->input->post('cat'),
			'afianzado'=>$this->input->post('afi'),
			'empresa'=>$this->input->post('emp'),
			'ent_financiera'=>$this->input->post('enf'),
			'codigo'=>$this->input->post('npl'),
			'monto'=>$this->input->post('bs'),
			'moneda'=>$this->input->post('moneda'),
			'objeto'=>$this->input->post('obj'),
			'obs'=>$this->input->post('obs'),
			'inicio'=>$this->input->post('ini'),
			'respaldo'=> $pdf,
			'fin'=>$this->input->post('fin')
		);
		if($this->input->post('id')=='no'){
			$resultado = $this->boletas_model->addBoleta($valores);
			if($resultado!=''){
				redirect(base_url('boleta/formulario/').$resultado,'refresh');
			}
		}
		else{
			$valores['id_boleta']=$this->input->post('id');
			$resultado = $this->vigencias_model->addVigencia($valores);
			if($resultado!='')
				redirect(base_url('boleta/formulario/').$resultado,'refresh');
		}
		if($resultado!=''){
			if ($resultado2!='') {
				redirect(base_url('boleta/formulario/').$resultado,'refresh');
			}
		}
		else
			$this->index();
	}
	public function upd_boleta(){
		$pdf = '';
		$conf_file = array(
			'upload_path' => './assets/respaldo',
			'allowed_types'	=> 'pdf',
			'encrypt_name' => true
		);
		$this->load->library('upload',$conf_file);
		if($this->upload->do_upload("res")){
			$data = array('upload_data' => $this->upload->data());
			$pdf = $data['upload_data']['file_name'];
		}
		$valores = array(
			'id'=>$this->input->post('id_b'),
			'tipo'=>$this->input->post('tipo'),
			'categoria'=>$this->input->post('cat'),
			'afianzado'=>$this->input->post('afi'),
			'empresa'=>$this->input->post('emp'),
			'ent_financiera'=>$this->input->post('enf'),
			'codigo'=>$this->input->post('npl'),
			'monto'=>$this->input->post('bs'),
			'moneda'=>$this->input->post('moneda'),
			'objeto'=>$this->input->post('obj'),
			'obs'=>$this->input->post('obs'),
			'inicio'=>$this->input->post('ini'),
			'respaldo'=>$pdf,
			'fin'=>$this->input->post('fin')
		);
		$resultado = $this->boletas_model->updBoleta($valores);
		if($resultado!=''){
			redirect(base_url('boleta/formulario/').$resultado,'refresh');
		}
		else
			$this->index();
	}
	public function del_boleta(){
		$resultado = $this->boletas_model->delBoleta($this->uri->segment(3));
		redirect($this->agent->referrer());
	}
	public function lib_boleta(){
		$resultado = $this->boletas_model->libBoleta($this->uri->segment(3));
		redirect($this->agent->referrer());
	}
	public function add_vigencia(){
		if (!$this->session->userdata('is_logued_in'))
			redirect('inicio/login','refresh');
		$data =array(
			'tipo'=>'reg',
			'id'=>$this->input->post('id_v'),
			'boleta' => $this->boletas_model->getBoleta($this->input->post('id_v')),
		);
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('admin/form_boletas', $data);
		$this->load->view('common/footer', $data);
	}
	public function add_vigencia1(){
		$valores2 = array(
			'fecha_inicio'=>$this->input->post('ini'),
			'fecha_fin'=>$this->input->post('fin'),
			'id_boleta'=>$this->input->post('id_v'),
		);
		$resultado2 = $this->vigencias_model->addVigencia($valores2);
		if ($resultado2!='') {
			redirect(base_url('detalle'),'refresh');
		}
	}
	public function upd_vigencia(){
		$pdf = '';
		$conf_file = array(
			'upload_path' => './assets/respaldo',
			'allowed_types'	=> 'pdf',
			'encrypt_name' => true
		);
		$this->load->library('upload',$conf_file);
		if($this->upload->do_upload("res")){
			$data = array('upload_data' => $this->upload->data());
			$pdf = $data['upload_data']['file_name'];
		}
		$valores2 = array(
			'id'=>$this->input->post('id_b'),
			'tipo'=>$this->input->post('tipo'),
			'categoria'=>$this->input->post('cat'),
			'afianzado'=>$this->input->post('afi'),
			'empresa'=>$this->input->post('emp'),
			'ent_financiera'=>$this->input->post('enf'),
			'codigo'=>$this->input->post('npl'),
			'monto'=>$this->input->post('bs'),
			'moneda'=>$this->input->post('moneda'),
			'objeto'=>$this->input->post('obj'),
			'obs'=>$this->input->post('obs'),
			'inicio'=>$this->input->post('ini'),
			'respald'=>$pdf,
			'fin'=>$this->input->post('fin')
		);
		$resultado2 = $this->vigencias_model->updVigencia($valores2);
		redirect(base_url('boleta/formulario/').$resultado2.'/no','refresh');
	}
	public function del_vigencia(){
		$valores2 = array(
			'id'=>$this->input->post('id_vue'),
		);
		$resultado2 = $this->vigencias_model->delVigencia($valores2);
		redirect(base_url('boleta/formulario/').$this->input->post('id_bue'),'refresh');
	}

	public function holas(){
		echo 'Holas desde code';
	}

	public function envia(){

/*		$this->load->library('email');
	    $this->email->set_newline("\r\n");
		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'mail.oopp.gob.bo';
		$config['smtp_port'] = '25';
		$config['smtp_timeout'] = '7';
		$config['smtp_user'] = 'cristiam.herrera@oopp.gob.bo';
		$config['smtp_pass'] = '450748';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
	    $config['mailtype'] = 'text'; // or html
	    $config['validation'] = TRUE; // bool whether to validate email or not      

	    $this->email->initialize($config);
	    $this->email->set_newline("\r\n");

	    $this->email->from('cristiam.herrera@oopp.gob.bo', 'Cristiam Prueba');
	    $this->email->to('elmer.secko@oopp.gob.bo'); 

	    $this->email->subject('Prueba dede codeigniter');
	    $this->email->message('Aqui el mensaje de prueba.');  

	    $this->email->send();

	    echo $this->email->print_debugger();
*/
	    // require_once APPPATH.'third_party/PHPMailerAutoload.php';

	    $this->load->library("phpmailer_library");
        $mail = $this->phpmailer_library->load();

	    date_default_timezone_set('Etc/UTC');
	    $mail->isSMTP();
	    $mail->SMTPDebug = 2;
	    $mail->Debugoutput = 'html';
	    $mail->Host = "mail.oopp.gob.bo";
	    $mail->Port = 25;
	    $mail->SMTPAuth = true;
	    $mail->Username = "marco.calderon@oopp.gob.bo";
	    $mail->Password = "6753182";
	    $mail->setFrom('marco.calderon@oopp.gob.bo', 'Marco Demo');
	    $mail->addAddress('edwin.yujra@oopp.gob.bo', 'Edwin');
	    $mail->Subject = 'Esta es la prueba de que envia';
	    $mail->Body = 'Este es el cuerpo';
	    $mail->AltBody = 'Este es el mensaje';
	    if (!$mail->send()) {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	    } else {
	        echo "Mensaje enviado!";
	    }

		//$this->load->library('PHPMailerAutoload');
	}

	public function listado($idContrato = null){
		$data['detalle_adenda'] = $this->db->get_where('adenda', array('id_contrato'=>$idContrato))->result();
		// vdebug($adendas, true, false, true);
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('adendas/listado', $data);
		$this->load->view('common/footer', $data);
	}

	public function elimina_adenda($idAdenda, $idContrato){
		// vdebug($idAdenda, true, false, true);
		$this->db->where('id_adenda', $idAdenda);
		$this->db->delete('adenda');
		redirect(base_url("adenda/listado/$idContrato"));
	}

}
