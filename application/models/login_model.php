<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function loginUsuario($username,$passwordSin)
	{    
            
                        $db = $this->load->database('capacitacion', TRUE);
                        $return =  $db->select('idcolaborador uspId,idcolaborador,idunidad')
                                        ->from('colaboradores')
                                        ->where('usuario',$username)
                                        ->where('password',$passwordSin)
                                        ->where('estado','A')
                                        ->get()
                                        ->row();
                        $this->load->database('default',true);
                        IF(empty($return)){return false;}
                        ELSE {return $return;}
	}
	
	public function verificaPassword($username,$password)
	{
		$this->db->where('uspEmail',$username);
		$this->db->where('uspPassword',$password);
		$query = $this->db->get('usuarios_panel');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('password incorrecta','La contraseña es incorrecta');
			
		}
	}
	
	
        public function enviarEmail($mail)
        {
            return $this->db->select('uspId,uspEmail,uspUsuario,uspPassword')
                            ->from('usuarios_panel')
                            ->where('uspEmail',$mail)
                            ->where('uspEstado',1)
                            ->or_where('uspEstado = 0 and uspEmail = "'.$mail.'"')
                            ->get()
                            ->row();
        }
        public function guardar()
        {
        if(isset($this->uspId)){
        $this->db->update('usuarios_panel', $this, array('uspId' => $this->uspId));}
        
        
        
        
        }
	
}

?>