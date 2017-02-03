<?php
class Tag extends CI_Controller
{
	public function index( $tag = '' )
	{
		$this->load->library('mobile_detect');
		$this->load->library('mobile_equiz');
		$this->load->model('quiz_model');
		if ( !empty( $tag ) )
		{
			$quiz_mais_visitado = $this->quiz_model->pegar_quizes(
				array(
					'categoria' => $tag,
					'orderby' => 'realizacoes',
					'order' => 'DESC'
				)
			);
			$pegar = array('categoria' => $tag);
			$view = array('categoria' => $tag);
			
			
			if ( isset( $quiz_mais_visitado[0] ) )
			{
				$pegar['id !='] = $quiz_mais_visitado[0]->id;
				$view['quiz_mais_visitado'] = $quiz_mais_visitado[0];
			} else
				$view['quiz_mais_visitado'] = false;
				
			$view['quizes'] = $this->quiz_model->pegar_quizes($pegar);
			if ( !$this->mobile_detect->isMobile() && !$this->mobile_equiz->detect() )
				$this->load->view('pagina_categoria', $view);
			else
				$this->load->view('pagina_categoria_mobile', $view);
		} else
			header('Location: ' . base_url());
	}
}
?>