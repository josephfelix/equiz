<?php
class Resultados_model extends CI_Model
{
	public function pegar_resultados( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('resultados');
		if ( $busca->num_rows() > 0 )
			return $busca->result();
		return false;
	}
	
	public function pegar_resultado( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('resultados');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
	public function inserir( $insert )
	{
		$this->db->insert('resultados', $insert);
		return $this->db->insert_id();
	}
	
	public function excluir( $where )
	{
		$this->db->delete('resultados', $where);
	}
}
?>