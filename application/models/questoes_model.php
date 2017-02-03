<?php
class Questoes_model extends CI_Model
{
	public function pegar_questoes( $where = false )
	{
		if ( isset( $where['order'] ) && isset( $where['orderby'] ) )
		{
			$this->db->order_by($where['orderby'], $where['order']);
			unset($where['orderby']);
			unset($where['order']);
		}
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('questoes');
		if ( $busca->num_rows() > 0 )
			return $busca->result();
		return false;
	}
	
	public function pegar_questao( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('questoes');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
	
	public function inserir( $insert )
	{
		$this->db->insert('questoes', $insert);
		return $this->db->insert_id();
	}
	
	public function excluir( $where )
	{
		$this->db->delete('questoes', $where);
	}
}
?>
	