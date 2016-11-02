<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

	public function index()
	{
		$this->load->view('conta/login');
	}

	public function login()
	{

		// Declarando a variavel alerta, para retornar a mensagem de alerta, se necessario
		$alerta = NULL;

		// Verificando se o formulario foi submetido
		if ($this->input->post('email')) {

			// Definindo regras de validações
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]|max_length[10]');

			// Verificando se as regras de validação foram atendidas
			if($this->form_validation->run())
			{
				// Formulario validado


			}else {
				// Formulario NÂO validado

				// Define uma mensagem de retorno para o usuario

				$alerta = array(
									'class' 	=> 'danger',
									'mensagem'	=> 'Falha na validação do formulario! <hr>' . validation_errors()
				);
			}

		}

		// Definindo varial com a mensagem de retorno para passar para a view
		$dados = array('alerta' => $alerta);

		// Carregando view do login
		$this->load->view('conta/login', $dados);

	}

	public function logout()
	{
		echo "logout solicitado! (controller)";
	}
}
