<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function checkLogin($email, $senha)
	{
		// Definindo paramentro FROM
		$this->db->from('usuarios');

		// Definindo paramentro WHERE
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);

		// Executando a QUERY no Banco de Dados
		$usuarios = $this->db->get();

		// Verificando se foi encontrado algum resultado
		if ($usuarios->num_rows()) {

			// Armazenando o resultado em um array
			$usuario = $usuarios->result_array();
			
			// Retornando dados do resultado
			return $usuario[0];
		}
		else {
			
			return FALSE;
		}
	}

	public function listarUsuarios()
	{
		// Definindo paramentro FROM
		$this->db->from('usuarios');

		//// Definindo paramentro WHERE
		//$this->db->where('email', $email);
		//$this->db->where('senha', $senha);

		// Executando a QUERY no Banco de Dados
		$usuarios = $this->db->get();

		// Retornando o resultado
		return $usuarios;
	}
}
