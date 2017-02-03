<?php
class Usuarios_model extends CI_Model
{
	public function pegar_usuarios( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('usuarios');
		if ( $busca->num_rows() > 0 )
			return $busca->result();
		return false;
	}
	
	public function pegar_usuario( $where = false )
	{
		if ( $where )
			$this->db->where($where);
		$busca = $this->db->get('usuarios');
		if ( $busca->num_rows() > 0 )
			return $busca->row();
		return false;
	}
}
?>
	