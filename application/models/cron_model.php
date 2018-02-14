<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model
{
     public function __construct()
    {
        $this->load->database('default');
    }

    
    
    public function formularios()
    {
      return  $this->db->select('conId,conFechaRegistro')
                ->from('contratacion')
                ->where('conEstado',1)    
                ->get()
                ->result();
    }
    
    
    
    
    
   

}