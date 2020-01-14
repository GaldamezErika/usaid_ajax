<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumno_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('alumno_model');
	}

	public function index()
	{
		$data = array('title' => 'USAID || Home');
		$this->load->view('template/header',$data);
		$this->load->view('alumno_view');
		$this->load->view('template/footer');
	}


	public function get_alumno(){

		$respuesta = $this->alumno_model->get_alumno();
		echo json_encode($respuesta);
	}

	public function eliminar(){

		$id = $this->input->post('id');
		$respuesta = $this->alumno_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_sexo(){

		$respuesta = $this->alumno_model->get_sexo();
		echo json_encode($respuesta);
	}

	public function get_curso(){

		$respuesta = $this->alumno_model->get_curso();
		echo json_encode($respuesta);
	}

	public function ingresar(){

		$datos['nombres'] = $this->input->post('nombres');
		$datos['apellidos'] = $this->input->post('apellidos');
		$datos['sexo'] = $this->input->post('sexo');
		$datos['curso'] = $this->input->post('curso');

		$respuesta = $this->alumno_model->set_alumno($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){

		$id = $this->input->post('id');
		$respuesta = $this->alumno_model->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){

		$datos['id'] = $this->input->post('id');
		$datos['nombres'] = $this->input->post('nombres');
		$datos['apellidos'] = $this->input->post('apellidos');
		$datos['sexo'] = $this->input->post('sexo');
		$datos['curso'] = $this->input->post('curso');

		$respuesta = $this->alumno_model->actualizar($datos);
		echo json_encode($respuesta);
	}
}
