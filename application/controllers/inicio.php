<?php 
class Inicio extends CI_Controller
{
	public function index()
	{
		$this->load->library('mobile_detect');
		$this->load->library('mobile_equiz');
		$this->load->model('quiz_model');
		$quiz_mais_visitado = $this->quiz_model->pegar_quizes(
			array(
				'orderby' => 'realizacoes',
				'order' => 'DESC'
			)
		);
		$quizes = $this->quiz_model->pegar_quizes(array('orderby' => 'data_inserido', 'order' => 'DESC', 'id !=' => $quiz_mais_visitado[0]->id));
		
		if ( !$this->mobile_detect->isMobile() && !$this->mobile_equiz->detect() )
		{
			$this->load->view('pagina_inicial',
				array(
					'quiz_mais_visitado' => $quiz_mais_visitado[0],
					'quizes' => $quizes
				)
			);
		} else
			$this->load->view('pagina_inicial_mobile',
				array(
					'quiz_mais_visitado' => $quiz_mais_visitado[0],
					'quizes' => $quizes
				)
			);
	}
}
?>