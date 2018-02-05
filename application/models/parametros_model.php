<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 23/06/17
 * Time: 14:22
 */
class Parametros_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    public function dameUnidades()
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('idunidad id,idunidad,descripcion,mail,correoUnidad')
                        ->from('unidades')
                        ->where('estado','A')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
         $this->load->database('default',true);
         return $return;
    }
     public function dameCargos()
    {
        return $this->db->select('*')
                        ->from('cargos')
                        ->order_by('carNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameMotivos()
    {
        return $this->db->select('*')
                        ->from('motivos')
                        ->order_by('motNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameCentrosCosto()
    {
        $db = $this->load->database('oc', TRUE);
        $return =  $db->select('*')
                        ->from('centroscosto')
                        ->where('estado','Activo')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
         $this->load->database('default',true);
         return $return;
    }
    public function dameModalidad()
    {
        return $this->db->select('*')
                        ->from('modalidad')
                        ->order_by('modNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameMateriales()
    {
        return $this->db->select('*')
                        ->from('materiales')
                        ->order_by('matNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameUniformes()
    {
        return $this->db->select('*')
                        ->from('uniformes')
                        ->order_by('uniNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameJefaturasUnidad()
    {
        $db = $this->load->database('capacitacion', TRUE);
        $query1 =  $db->select('j.idcolaborador,j.nombre,j.apellidoPaterno,j.apellidoMaterno')
                        ->from('unidades u')
                        ->join('colaboradores j','u.jefe=j.idcolaborador','inner')
                        ->where('u.estado','A')
                        ->order_by('j.apellidoPaterno','asc')
                        ->group_by('j.idcolaborador')
                        ->get()
                        ->result();
         $query2 =  $db->select('j.idcolaborador,j.nombre,j.apellidoPaterno,j.apellidoMaterno')
                        ->from('unidades u')
                        ->join('colaboradores j','u.director=j.idcolaborador','inner')
                        ->where('u.estado','A')
                        ->order_by('j.apellidoPaterno','asc')
                        ->group_by('j.idcolaborador')
                        ->get()
                        ->result();
         $this->load->database('default',true);
         $return = array_merge($query1, $query2);
         return $return;
    }
    public function dameColaboradores()
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('c.idcolaborador id,c.idcolaborador,c.nombre,c.apellidoPaterno,c.apellidoMaterno,c.idunidad')
                        ->from('colaboradores c')
                        ->where('c.estado','A')
                        ->order_by('c.idcolaborador','asc')
                        ->get()
                        ->result();
         $this->load->database('default',true);
         return $return;
    }
    public function dameColaborador($usuario)
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('c.idcolaborador id,c.idcolaborador,c.nombre,c.apellidoPaterno,c.apellidoMaterno,c.idunidad,u.descripcion,c.correo')
                        ->from('colaboradores c')
                        ->join('unidades u','u.idunidad=c.idunidad')
                        ->where('c.estado','A')
                        ->where('c.idcolaborador',$usuario)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         return $return;
    }
    public function checkJefeUnidad($idUsuario)
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('idunidad')
                        ->from('unidades u')
                        ->where('director',$idUsuario)
                        ->or_where('jefe',$idUsuario)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         IF(empty($return)){return false;}
         ELSE {return $return;}
    }
    public function dameDocumentacion()
    {
        return $this->db->select('*')
                        ->from('documentacion')
                        ->order_by('docNombre','asc')
                        ->get()
                        ->result();
    }
    public function dameSeguridad()
    {
        return $this->db->select('*')
                        ->from('seguridad')
                        ->order_by('segNombre','asc')
                        ->get()
                        ->result();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function dameUnidadesApoyo()
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('idunidad,descripcion')
                        ->from('unidades')
                        ->where('categoria','apoyo')
                        ->where('estado','A')
                        ->order_by('descripcion','asc')
                        ->get()
                        ->result();
         $this->load->database('default',true);
         return $return;
    }
    
    public function dameJefe($usuario)
    {
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('*')
                        ->from('unidades')
                        ->where('director',$usuario)
                        ->or_where('jefe',$usuario)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         return $return;
    }
    public function dameJefeUnidad($idUnidad)
    {
         IF($idUnidad === '25')$idUnidad = 3;
         IF($idUnidad === '5')$idUnidad = 30;
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('Nombre,apellidoPaterno,apellidoMaterno')
                        ->from('JefeUnidad')
                        ->where('estado','activo')
                        ->where('idunidad',$idUnidad)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         return $return;
    }
    public function dameDirectorUnidad($idUnidad)
    {
         IF($idUnidad === '25')$idUnidad = 3;
          IF($idUnidad === '5')$idUnidad = 30;
        $db = $this->load->database('capacitacion', TRUE);
        $return =  $db->select('u.director,c.nombre,c.apellidoPaterno,c.apellidoMaterno')
                        ->from('unidades u')
                        ->join('colaboradores c','u.director=c.idcolaborador','left')
                        ->where('u.idunidad',$idUnidad)
                        ->get()
                        ->row();
         $this->load->database('default',true);
         return $return;
    }
    
     

    
    
    
    
    
}