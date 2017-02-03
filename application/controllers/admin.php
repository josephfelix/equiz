<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('quiz_model');
		$this->load->model('questoes_model');
		$this->load->model('opcoes_model');
		$this->load->model('resultados_model');
		$this->load->model('usuarios_model');
		$this->load->library('guid');
		
		$this->base_url = 'http://equiz.dev/';
		define('BASE_URL_ADMIN', $this->base_url);
	}
	public function index()
	{		
		if ( $this->session->userdata('admin') ) 
		{
			header('Location: ' . $this->base_url . 'admin/quiz');
		} else
			header('Location: ' . $this->base_url . 'admin/login');
	}
	
	public function upload()
	{
		if ( !empty( $_FILES['file']['name'] ) && $this->session->userdata('admin') )
		{
			$ext = pathinfo( $_FILES['file']['name'], PATHINFO_EXTENSION );
			$fileName = md5(uniqid(time())) . '.' . $ext;
			while ( file_exists('static/' . $fileName) )
				$fileName = md5(uniqid(time())) . '.' . $ext;
				
			$fp = fopen('static/' . $fileName, 'wb');
			fwrite( $fp, file_get_contents( $_FILES['file']['tmp_name'] ) );
			fclose( $fp );
			
			if ( file_exists('static/' . $fileName) )
				print json_encode( array( 'status' => 'OK', 'file' => $fileName ) );
			else
				print json_encode(array('status' => 'FAIL'));
			die;
		} else
			print json_encode(array('status' => 'FAIL'));
	}
	
	public function login()
	{		
		$error = false;
		if ( strtoupper( $this->input->server('REQUEST_METHOD' ) ) == 'POST' )
		{
			if ( $this->input->post('login') && $this->input->post('senha') )
			{
				$login = $this->input->post('login');
				$senha = $this->input->post('senha');
				$pegar = array('senha' => $senha, 'tipo' => 'ADMIN');
				if ( filter_var( $login, FILTER_VALIDATE_EMAIL ) )
					$pegar['email'] = $login;
				else
					$pegar['login'] = $login;
					
				if ( is_object( $this->usuarios_model->pegar_usuario($pegar) ) )
				{
					$this->session->set_userdata('admin', true);
					header('Location: ' . $this->base_url . 'admin');
					die;
				} else
					$error = 'login ou senha incorretos';
			}
		}
		
		$this->load->view('admin/login', array('error' => $error));
	}
	
	public function quiz()
	{		
		if ( $this->session->userdata('admin') ) 
		{
			if ( strtoupper( $this->input->server('REQUEST_METHOD') ) == 'POST' )
			{
				if ( !empty( $_FILES['file']['name'] ) )
				{
					$ext = pathinfo( $_FILES['file']['name'], PATHINFO_EXTENSION );
					$nome = basename( $_FILES['file']['name'], '.' . $ext );
					$guid = $this->guid->generate( $nome );
					$fileName = $guid . '-' . rand(1,99) . '.' . $ext;
					while ( file_exists('static/' . $fileName) )
						$fileName = $guid . '-' . rand(1,99) . '.' . $ext;
						
					$fp = fopen('static/' . $fileName, 'wb');
					fwrite( $fp, file_get_contents( $_FILES['file']['tmp_name'] ) );
					fclose( $fp );
					
					$id_quiz = $this->quiz_model->inserir(
						array(
							'titulo' => htmlentities($this->input->post('titulo'), ENT_QUOTES, "UTF-8"),
							'guid' => $this->guid->generate( $this->input->post('titulo') ),
							'descricao' => htmlentities($this->input->post('descricao'), ENT_QUOTES, "UTF-8"),
							'categoria' => $this->input->post('categoria'),
							'capa' => $fileName,
							'passos' => sizeof(json_decode($this->input->post('questao'))),
							'data_inserido' => date('Y-m-d H:i:s')
						)
					);
					
					$questoesCtrl = array();
					
					$questoes = json_decode($this->input->post('questao'));
					foreach ( $questoes as $questao )
					{
						$id_questao = $this->questoes_model->inserir(
							array(
								'idquiz' => $id_quiz,
								'titulo' => htmlentities($questao->titulo, ENT_QUOTES, "UTF-8"),
								'capa' => $questao->capa,
								'data_inserido' => date('Y-m-d H:i:s')
							)
						);
						$questoesCtrl[$questao->titulo] = array();
						
						foreach ( $questao->opcoes as $opcao )
						{
							$this->opcoes_model->inserir(
								array(
									'idquiz' => $id_quiz,
									'idquestao' => $id_questao,
									'opcao' => htmlentities($opcao->opcao, ENT_QUOTES, "UTF-8")
								)
							);
							$questoesCtrl[$questao->titulo][] = $opcao->opcao;
						}
					}
					
					$resultados = json_decode($this->input->post('resultados'));
					foreach ( $resultados as $resultado )
					{
						foreach ( $resultado->questoes as $pergunta => $questaoCtrl )
						{
							foreach ( $questaoCtrl->opcoes as $opcao => $opcaoCtrl )
							{
								$this->resultados_model->inserir(
									array(
										'idquiz' => $id_quiz,
										'questao' => htmlentities($pergunta, ENT_QUOTES, "UTF-8"),
										'opcao' => htmlentities($opcao, ENT_QUOTES, "UTF-8"),
										'capa' => $resultado->capa,
										'titulo' => htmlentities($resultado->titulo, ENT_QUOTES, "UTF-8"),
										'descricao' => htmlentities($resultado->descricao, ENT_QUOTES, "UTF-8")
									)
								);
							}
						}
					}
					
					print json_encode(array('status' => 'OK'));
				} else
					print json_encode(array('status' => 'FAIL'));
			} else
			{
				$this->load->view('admin/header');
				$this->load->view('admin/novo_quiz');
				$this->load->view('admin/footer');
			}
		}
	}
	
	public function listar()
	{
		if ( $this->session->userdata('admin') )
		{
			$quizes = $this->quiz_model->pegar_quizes();
			$this->load->view('admin/header');
			$this->load->view('admin/listar_quiz', array('quizes' => $quizes));
			$this->load->view('admin/footer');
		} else
			header('Location: ' . $this->base_url . 'admin');
	}
	
	public function excluirquiz( $id_quiz = false )
	{
		if ( $id_quiz && $this->session->userdata('admin') )
		{
			$this->quiz_model->excluir( array( 'id' => $id_quiz ) );
			$this->questoes_model->excluir( array( 'idquiz' => $id_quiz ) );
			$this->opcoes_model->excluir( array( 'idquiz' => $id_quiz ) );
			$this->resultados_model->excluir( array( 'idquiz' => $id_quiz ) );
			header('Location: ' . $this->base_url . 'admin/listar');
		} else
			header('Location: ' . $this->base_url . 'admin');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		header('Location: ' . $this->base_url . 'admin/login');
	}
}
?>
