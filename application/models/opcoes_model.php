<?php
class Opcoes_model extends CI_Model
{
	public function pegar_opcoes( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('opcoes');
		if ( $busca->num_rows() > 0 )
			return $busca->result();
		return false;
	}
	
	public function pegar_opcao( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('opcoes');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
	
	public function inserir( $insert )
	{
		$this->db->insert('opcoes', $insert);
		return $this->db->insert_id();
	}
	
	public function excluir( $where )
	{
		$this->db->delete('opcoes', $where);
	}
}
?>
	