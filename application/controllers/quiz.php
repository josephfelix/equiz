<?php 
class Quiz extends CI_Controller
{
	public function index( $categoria = false, $guid = false, $resposta = false )
	{
		$this->load->library('mobile_detect');
		$this->load->library('mobile_equiz');
		$this->load->model('quiz_model');
		$this->load->model('opcoes_model');
		$this->load->model('questoes_model');
		$this->load->model('resultados_usuario_model');
		if ( $categoria && $guid )
		{
			$pegar = array();
			if ( is_numeric( $guid ) )
				$pegar['id'] = $guid;
			else
				$pegar['guid'] = $guid;
			$quiz = $this->quiz_model->pegar_quiz( $pegar );
			if ( $quiz )
			{
				$questoes = $this->questoes_model->pegar_questoes( array('idquiz' => $quiz->id, 'orderby' => 'id', 'order' => 'DESC') );
				$opcoes = $this->opcoes_model->pegar_opcoes( array('idquiz' => $quiz->id) );
				foreach ( $questoes as $key => $questao )
				{
					foreach ( $opcoes as $opcao )
					{
						if ( $questao->id == $opcao->idquestao )
						{
							if ( !isset( $questoes[$key]->opcoes ) )
								$questoes[$key]->opcoes = array();
								
							$questoes[$key]->opcoes[] = $opcao;
						}
					}
				}
				
				$quizes = $this->quiz_model->pegar_quizes(array('categoria' => $quiz->categoria, 'orderby' => 'data_inserido', 'order' => 'DESC', 'id !=' => $quiz->id));
				
				$meta_tags = false;
				if ( $resposta )
					$meta_tags = $this->resultados_usuario_model->pegar_resultado(array('id' => $resposta));
				
				if ( !$this->mobile_detect->isMobile() && !$this->mobile_equiz->detect() )
					$this->load->view('pagina_quiz', array(
						'quiz' => $quiz,
						'questoes' => $questoes,
						'quizes' => $quizes,
						'meta_tags' => $meta_tags,
						'resposta' => $resposta
					));
				else
					$this->load->view('pagina_quiz_mobile', array(
						'quiz' => $quiz,
						'questoes' => $questoes,
						'quizes' => $quizes,
						'meta_tags' => $meta_tags,
						'resposta' => $resposta
					));
			} else
				header('Location: ' . base_url());
		} else
			header('Location: ' . base_url());
	}
	
	public function resultado( $id_quiz = false )
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: Cache-Control, Pragma, Origin, Authorization, Content-Type, X-Requested-With');
		header('Access-Control-Allow-Methods: GET, PUT, POST');
	
		$this->load->model('resultados_model');
		$this->load->model('quiz_model');
		$this->load->model('resultados_usuario_model');
		if ( $id_quiz )
		{
			if ( strtoupper( $this->input->server('REQUEST_METHOD') ) == 'POST' )
			{
				$post = json_decode(rawurldecode(file_get_contents('php://input')));
				if ( isset( $post->values ) && $id_quiz )
				{
					$resultados = array();
					$resultadoFinal = false;
					$capa = array();
					foreach ( $post->values as $question => $option )
					{
						$resultados[] = array(
								'questao' => $question,
								'opcao' => $option,
								'idquiz' => $id_quiz
							);
					}
					
					$this->db->select('*, COUNT(*) as contador');
					$this->db->from('resultados');
					foreach ( $resultados as $resultado )
					{
						$this->db->or_where("(questao = '{$resultado['questao']}' AND opcao = '{$resultado['opcao']}')");
					}
					$this->db->where('idquiz', $id_quiz);
					$this->db->group_by('capa');
					$this->db->order_by('contador', 'DESC');
					$this->db->limit(1);
					$busca = $this->db->get();
					
					$this->quiz_model->aumentar_realizacoes(array('id' => $id_quiz));
					 
					if ( $busca->num_rows() > 0 )
					{
						$resultadoFinal = $busca->row();
						$titulo_quiz = $this->quiz_model->pegar_quiz(array('id' => $id_quiz))->titulo;
						
						$id_resposta = $this->resultados_usuario_model->inserir(
							array(
								'capa' => $resultadoFinal->capa,
								'titulo' => $resultadoFinal->titulo,
								'titulo_quiz' => $titulo_quiz,
								'descricao' => $resultadoFinal->descricao,
								'data_inserido' => date('Y-m-d H:i:s')
							)
						);
						print json_encode(
							array(
								'status' => 'OK',
								'capa' => $resultadoFinal->capa,
								'titulo' => $resultadoFinal->titulo,
								'descricao' => $resultadoFinal->descricao,
								'resposta' => $id_resposta
							)
						);
					} else
					{
						$this->db->where('idquiz', $id_quiz);
						$this->db->order_by('rand()');
						$busca = $this->db->get('resultados');
						$resultados = $busca->result();
						$resultadoRnd = $resultados[mt_rand(0, sizeof($resultados)-1)];
						
						$titulo_quiz = $this->quiz_model->pegar_quiz(array('id' => $id_quiz))->titulo;
						
						$id_resposta = $this->resultados_usuario_model->inserir(
							array(
								'capa' => $resultadoRnd->capa,
								'titulo' => $resultadoRnd->titulo,
								'titulo_quiz' => $titulo_quiz,
								'descricao' => $resultadoRnd->descricao,
								'data_inserido' => date('Y-m-d H:i:s')
							)
						);
						
						print json_encode(
							array(
								'status' => 'OK',
								'capa' => $resultadoRnd->capa,
								'titulo' => $resultadoRnd->titulo,
								'descricao' => $resultadoRnd->descricao,
								'resposta' => $id_resposta
							)
						);
					}
					die;
				}
			}
		}
		print json_encode(array('status' => 'FAIL'));
	}
	
	
	public function carregar()
	{
		
	}
}
?>
