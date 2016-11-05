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

	public function cadastrarUsuario($dados)
	{
		$dados_insert = array(
							    'nome' 	=> $this->input->post('nome'),
							    'email' => $this->input->post('email'),
							    'senha' => $this->input->post('senha'),
							    'ativo' => 1
					 	);

		// Inserir os dados da variavel passada como parametro no banco de dados
		$this->db->set($dados_insert);
		$this->db->insert('usuarios', $dados_insert);

		if ($this->db->insert_id() > 0) {

			return $this->db->insert_id();
		}
		else {
			
			return NULL;
		}
	}
}
