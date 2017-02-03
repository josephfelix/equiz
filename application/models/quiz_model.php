<?php
class Quiz_model extends CI_Model
{
	public function pegar_quizes( $where = false )
	{
		if ( isset( $where['orderby'] ) && isset( $where['order'] ) )
		{
			$this->db->order_by( $where['orderby'], $where['order'] );
			unset( $where['orderby'] );
			unset( $where['order'] );
		}
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('quiz');
		if ( $busca->num_rows() > 0 )
			return $busca->result();
		return false;
	}
	
	public function pegar_quiz( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('quiz');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
	
	public function inserir( $insert )
	{
		$this->db->insert('quiz', $insert);
		return $this->db->insert_id();
	}
	
	public function aumentar_realizacoes( $where )
	{
		$this->db->where($where);
		$this->db->set('realizacoes', 'realizacoes+1', FALSE);
		$this->db->update('quiz');
	}
	
	public function excluir( $where )
	{
		$this->db->delete('quiz', $where);
	}
}
?>
	