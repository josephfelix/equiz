<?php
class Resultados_usuario_model extends CI_Model
{
	public function pegar_resultado( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('resultados_usuario');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
	public function inserir( $insert )
	{
		$this->db->insert('resultados_usuario', $insert);
		return $this->db->insert_id();
	}
}
?>