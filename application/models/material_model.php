<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 22/06/17
 * Time: 09:22
 */
class Material_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }
    
     public function guardarMaterial()
    {
        if(isset($this->matConId))
            $this->db->update('contratacion_materiales', $this, array('matConId' => $this->matConId));
        else
            $this->db->insert('contratacion_materiales', $this);
    }
     public function guardarUniforme()
    {
        if(isset($this->uniConId))
            $this->db->update('contratacion_uniformes', $this, array('uniConId' => $this->uniConId));
        else
            $this->db->insert('contratacion_uniformes', $this);
    }
    public function guardarDocumentacion()
    {
        if(isset($this->docConId))
            $this->db->update('contratacion_documentacion', $this, array('docConId' => $this->docConId));
        else
            $this->db->insert('contratacion_documentacion', $this);
    }
     public function guardarSeguridad()
    {
        if(isset($this->segConId))
            $this->db->update('contratacion_seguridad', $this, array('segConId' => $this->segConId));
        else
            $this->db->insert('contratacion_seguridad', $this);
    }
    public function limpiar($conId)
    {
        $this->db->where('matConContratacion', $conId);
        $this->db->delete('contratacion_materiales');
        
        $this->db->where('uniConContratacion', $conId);
        $this->db->delete('contratacion_uniformes');
        
        $this->db->where('segConContratacion', $conId);
        $this->db->delete('contratacion_seguridad');
        
        $this->db->where('docConContratacion', $conId);
        $this->db->delete('contratacion_documentacion');
    }
    
}