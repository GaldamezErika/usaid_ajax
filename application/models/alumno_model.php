<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumno_model extends CI_Model {

	public function get_alumno(){

		$pa_consultar = "CALL pa_consultar()";
		$query = $this->db->query($pa_consultar);

		if ($query->num_rows()>0) {
			return $query->result();
		} else {
			return false;
		}
		
	}

	public function eliminar($id){

		$pa_eliminar = "CALL pa_eliminar(?)";
		$arreglo = array('id_alumno' => $id);
		$query = $this->db->query($pa_eliminar,$arreglo);

		if ($query) {
			return true;
		} else {
			return false;
		}
		
	}

	public function get_sexo(){

		$exe = $this->db->get('sexo');
		return $exe->result();
	}

	public function get_curso(){

		$exe = $this->db->get('curso');
		return $exe->result();
	}

	public function set_alumno($datos){

		$pa_insertar = "CALL pa_insertar(?,?,?,?)";
		$arreglo = array('nombres' => $datos['nombres'],
			'apellidos' => $datos['apellidos'],
			'id_sexo' => $datos['sexo'],
			'id_alumno' => $datos['curso']);
		$query = $this->db->query($pa_insertar,$arreglo);

		if ($query !== null) {
			return 'add';
		} else {
			return false;
		}
		
	}

	public function get_datos($id){

		$this->db->where('id_alumno',$id);
		$exe = $this->db->get('alumno');

		if ($exe->num_rows()>0) {
			return $exe->row();
		} else {
			return false;
		}
		
	}

	public function actualizar($datos){

		$pa_modificar = "CALL pa_modificar(?,?,?,?,?)";
		$arreglo = array( 'id_alumno' => $datos['id'],
			'nombres' => $datos['nombres'],
			'apellidos' => $datos['apellidos'],
			'id_sexo' => $datos['sexo'],
			'id_curso' => $datos['curso']);
		$query = $this->db->query($pa_modificar,$arreglo);

		if ($query) {
			return 'edi';
		} else {
			return false;
		}
		
	}

	
}
