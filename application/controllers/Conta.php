<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logado') == TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/painel/');
		}
		else {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login/');
		}
	}

	public function painel()
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Enviar dados para a view
		$dados = array(
			'titulo' => 'Painel'
		);

		// Chamar View
		$this->load->view('conta/painel', $dados);
	}

	public function usuarios()
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Carregar model de verificação de usuarios (Usuarios_model)
		$this->load->model('Usuarios_model');

		// Enviar dados para a view
		$dados = array(
			'titulo'   => 'Usuarios', 
			'tela' 	   => 'listar',
			'usuarios' => $this->Usuarios_model->listarUsuarios()
		);

		// Chamar View
		$this->load->view('conta/usuarios', $dados);
	}

	public function usuarios_ver($id_usuarios)
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Carregar model de verificação de usuarios (Usuarios_model)
		$this->load->model('Usuarios_model');

		// Enviar dados para a view
		$dados = array(
			'titulo'   => 'Visualizar Usuario', 
			'tela' 	   => 'ver',
			'id_usuario' => $id_usuarios,
			'usuarios' => $this->Usuarios_model->listarUsuarios()
		);

		// Chamar View
		$this->load->view('conta/usuarios', $dados);
	}

	public function usuarios_cadastrar()
	{

		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Declarando a variavel alerta, para retornar a mensagem de alerta, se necessario
		$alerta = NULL;

		// Verificando se o formulario foi submetido
		if ($this->input->post()) {

			// Definindo regras de validações
			$this->form_validation->set_rules('nome', 'Nome', 'required|min_length[8]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('senha2', 'Confirmação Senha', 'required|matches[senha]');

			// Verificando se as regras de validação foram atendidas
			if($this->form_validation->run())
			{
				// Formulario validado
				$alerta = array(
									'class' 	=> 'success',
									'mensagem'	=> 'Usuario e Senha válidos!'
				);

				// Carregar model de verificação de usuarios (Usuarios_model)
				$this->load->model('Usuarios_model');

				// Salva os dados do formularios em variaveis
				$dados = var_dump($this->input->post());

				// Salva resultado da função que verifica se login existe (TRUE/FALSE)
				$id_insert = $this->Usuarios_model->cadastrarUsuario($dados);

				if ($id_insert) {

					// Usuario e senha encontrados no Banco de Dados
					$alerta = array(
									'class' 	=> 'success',
									'mensagem'	=> 'Cadastrado com sucesso'
					);

					// Redirecionado para a pagina Painel
					redirect(base_url() . 'conta/usuarios/');
				}
				else {
					
					// Usuario e senha NÂO encontrados no Banco de Dados

					$alerta = array(
									'class' 	=> 'danger',
									'mensagem'	=> 'Erro ao cadastrar usuario'
					);
				}

			}else {
				// Formulario NÂO validado
				// Define uma mensagem de retorno para o usuario
				$alerta = array(
									'class' 	=> 'danger',
									'mensagem'	=> 'Falha na validação do formulario! <hr>' . validation_errors()
				);
			}
		}

		// Enviar dados para a view
		$dados = array(
			'titulo'   => 'Editar Usuario', 
			'tela' 	   => 'cadastrar'
		);

		// Chamar View
		$this->load->view('conta/usuarios', $dados);
	}

	public function usuarios_editar($id_usuarios)
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Carregar model de verificação de usuarios (Usuarios_model)
		$this->load->model('Usuarios_model');

		// Enviar dados para a view
		$dados = array(
			'titulo'   => 'Editar Usuario', 
			'tela' 	   => 'editar',
			'id_usuario' => $id_usuarios,
			'usuarios' => $this->Usuarios_model->listarUsuarios()
		);

		// Chamar View
		$this->load->view('conta/usuarios', $dados);
	}

		public function usuarios_excluir($id_usuarios)
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Carregar model de verificação de usuarios (Usuarios_model)
		$this->load->model('Usuarios_model');

		// Enviar dados para a view
		$dados = array(
			'titulo'   	 => 'Ecluir Usuario', 
			'tela' 	   	 => 'excluir',
			'id_usuario' => $id_usuarios,
			'usuarios' 	 => $this->Usuarios_model->listarUsuarios()
		);

		// Chamar View
		$this->load->view('conta/usuarios', $dados);
	}

	public function configuracoes()
	{
		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') != TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login');
		}
		/////////////////////////////////////////////////////////////////

		// Enviar dados para a view
		$dados = array(
			'titulo' => 'Configurações'
		);

		// Chamar View
		$this->load->view('conta/configuracoes', $dados);
	}

	public function login()
	{

		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') == TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/painel');
		}
		/////////////////////////////////////////////////////////////////

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
				$alerta = array(
									'class' 	=> 'success',
									'mensagem'	=> 'Usuario e Senha válidos!'
				);

				// Carregar model de verificação de usuarios (Usuarios_model)
				$this->load->model('Usuarios_model');

				// Salva os dados do formularios em variaveis
				$email = $this->input->post('email');
				$senha = $this->input->post('senha');

				// Salva resultado da função que verifica se login existe (TRUE/FALSE)
				$login_existe = $this->Usuarios_model->checkLogin($email, $senha);

				if ($login_existe) {

					// salvando resultado do Usuarios_model na variavel usuario
					$usuario = $login_existe;
					
					// Usuario e senha encontrados no Banco de Dados
					$alerta = array(
									'class' 	=> 'success',
									'mensagem'	=> 'Sucesso no login'
					);

					// Configurar dados para a sessão
					$session = array(
									'nome' 	=> $usuario['nome'],
									'email'	=> $usuario['email'],
									'created' => date('d/m/Y H:i:s'),
									'logado' => TRUE
					);

					// Iniciando a sessão
					$this->session->set_userdata($session);

					// Sessão expira em 4 horas
					$this->session->sess_expiration = '14400';

					// Redirecionado para a pagina Painel
					redirect(base_url() . 'conta/painel/');
				}
				else {
					
					// Usuario e senha NÂO encontrados no Banco de Dados

					$alerta = array(
									'class' 	=> 'danger',
									'mensagem'	=> 'Insucesso no login'
					);
				}

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
		$dados = array(
			'alerta' => $alerta,
			'titulo' => 'Login'
		);

		// Chamar View
		$this->load->view('conta/login', $dados);

	}

	public function logout()
	{
		// Destruindo toda a sessão
		$this->session->sess_destroy();

		/////////////////////////////////////////////////////////////////
		//
		//  SEGURANÇA
		//
		/////////////////////////////////////////////////////////////////
		// Verifica se o usuario esta logado
		if ($this->session->userdata('logado') == TRUE) {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/painel/');
		}
		else {
			// Redirecionado para a pagina login
			redirect(base_url() . 'conta/login/');
		}
		/////////////////////////////////////////////////////////////////
	}
}
