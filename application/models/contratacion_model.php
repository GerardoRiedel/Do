<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 22/06/17
 * Time: 09:22
 */
class Contratacion_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
     public function guardar()
    {
        if(isset($this->conId))
            $this->db->update('contratacion', $this, array('conId' => $this->conId));
        else
            $this->db->insert('contratacion', $this);
    }
    public function dameUltimo()
    {
        return $this->db->select('*')
                        ->from('contratacion')
                        ->where('conUsuario',$this->session->userdata('id_usuario'))
                        ->order_by('conId','desc')
                        ->get()
                        ->row();
    }
    public function dameUno($id)
    {
        return $this->db->select('*')
                        ->from('contratacion')
                        ->join('cargos','carId=conCargo','left')
                        ->join('motivos','motId=conMotivo')
                        ->join('estados','estId=conEstado','left')
                        ->join('modalidad','modId=conModalidad')
                        ->where('conId',$id)
                        ->order_by('conId','desc')
                        ->get()
                        ->row();
    }
    public function dameTodos()
    {
        return $this->db->select('*')
                        ->from('contratacion')
                        ->join('cargos','carId=conCargo','left')
                        ->join('motivos','motId=conMotivo')
                        ->join('estados','estId=conEstado','left')
                        ->order_by('conId','desc')
                        ->get()
                        ->result();
    }
    public function dameTodosUsuario($usuario='')
    {
        IF(!empty($usuario)){$this->db->where('conUsuario',$usuario); }
        return $this->db->select('*')
                        ->from('contratacion')
                        ->join('cargos','carId=conCargo','left')
                        ->join('motivos','motId=conMotivo')
                        ->join('estados','estId=conEstado','left')
                        ->order_by('conId','desc')
                        ->get()
                        ->result();
    }
    public function dameMaterialesContratacion($id)
    {
        return $this->db->select('*')
                        ->from('contratacion_materiales')
                        ->where('matConContratacion',$id)
                        ->order_by('matConMaterial','asc')
                        ->get()
                        ->result();
    }
    public function dameUniformesContratacion($id)
    {
        return $this->db->select('*')
                        ->from('contratacion_uniformes')
                        ->where('uniConContratacion',$id)
                        ->order_by('uniConUniforme','asc')
                        ->get()
                        ->result();
    }
    public function dameDocumentacionContratacion($id)
    {
        return $this->db->select('*')
                        ->from('contratacion_documentacion')
                        ->where('docConContratacion',$id)
                        ->order_by('docConDocumentacion','asc')
                        ->get()
                        ->result();
    }
    public function dameSeguridadContratacion($id)
    {
        return $this->db->select('*')
                        ->from('contratacion_seguridad')
                        ->where('segConContratacion',$id)
                        ->order_by('segConSeguridad','asc')
                        ->get()
                        ->result();
    }
    
}