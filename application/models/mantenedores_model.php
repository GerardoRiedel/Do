<?php

/**
 * Created by Netbeans.
 * User: Gerardo Riedel
 * Date: 22/06/17
 * Time: 09:22
 */
class Mantenedores_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
    }

    public function dameCargos()
    {
        return $this->db->select('carId, carNombre')
                        ->from('cargos')
                        ->order_by('carNombre')
                        ->get()
                        ->result();
    }
    public function dameCargo($id)
    {
        return $this->db->select('carId, carNombre')
                        ->from('cargos')
                        ->where('carId',$id)
                        ->get()
                        ->row();
    }
    public function guardarCargo()
    {
        if(isset($this->carId))
            $this->db->update('cargos', $this, array('carId' => $this->carId));
        else
            $this->db->insert('cargos', $this);
    }
    
    
     public function dameMotivos()
    {
        return $this->db->select('motId, motNombre')
                        ->from('motivos')
                        ->order_by('motNombre')
                        ->get()
                        ->result();
    }
    public function dameMotivo($id)
    {
        return $this->db->select('motId, motNombre')
                        ->from('motivos')
                        ->where('motId',$id)
                        ->get()
                        ->row();
    }
    public function guardarMotivo()
    {
        if(isset($this->motId))
            $this->db->update('motivos', $this, array('motId' => $this->motId));
        else
            $this->db->insert('motivos', $this);
    }
    
    
    public function dameModalidades()
    {
        return $this->db->select('modId, modNombre')
                        ->from('modalidad')
                        ->order_by('modNombre')
                        ->get()
                        ->result();
    }
    public function dameModalidad($id)
    {
        return $this->db->select('modId, modNombre')
                        ->from('modalidad')
                        ->where('modId',$id)
                        ->get()
                        ->row();
    }
    public function guardarModalidad()
    {
        if(isset($this->modId))
            $this->db->update('modalidad', $this, array('modId' => $this->modId));
        else
            $this->db->insert('modalidad', $this);
    }
    
    
    
    
    public function dameMateriales()
    {
        return $this->db->select('matId, matNombre')
                        ->from('materiales')
                        ->order_by('matNombre')
                        ->get()
                        ->result();
    }
    public function dameMaterial($id)
    {
        return $this->db->select('matId, matNombre')
                        ->from('materiales')
                        ->where('matId',$id)
                        ->get()
                        ->row();
    }
    public function guardarMaterial()
    {
        if(isset($this->matId))
            $this->db->update('materiales', $this, array('matId' => $this->matId));
        else
            $this->db->insert('materiales', $this);
    }
    public function dameUniformes()
    {
        return $this->db->select('uniId, uniNombre')
                        ->from('uniformes')
                        ->order_by('uniNombre')
                        ->get()
                        ->result();
    }
    public function dameUniforme($id)
    {
        return $this->db->select('uniId, uniNombre')
                        ->from('uniformes')
                        ->where('uniId',$id)
                        ->get()
                        ->row();
    }
    public function guardarUniforme()
    {
        if(isset($this->uniId))
            $this->db->update('uniformes', $this, array('uniId' => $this->uniId));
        else
            $this->db->insert('uniformes', $this);
    }
    public function dameDocumentos()
    {
        return $this->db->select('docId, docNombre')
                        ->from('documentacion')
                        ->order_by('docNombre')
                        ->get()
                        ->result();
    }
    public function dameDocumento($id)
    {
        return $this->db->select('docId, docNombre')
                        ->from('documentacion')
                        ->where('docId',$id)
                        ->get()
                        ->row();
    }
    public function guardarDocumento()
    {
        if(isset($this->docId))
            $this->db->update('documentacion', $this, array('docId' => $this->docId));
        else
            $this->db->insert('documentacion', $this);
    }
    public function dameSeguridades()
    {
        return $this->db->select('segId, segNombre')
                        ->from('seguridad')
                        ->order_by('segNombre')
                        ->get()
                        ->result();
    }
    public function dameSeguridad($id)
    {
        return $this->db->select('segId, segNombre')
                        ->from('seguridad')
                        ->where('segId',$id)
                        ->get()
                        ->row();
    }
    public function guardarSeguridad()
    {
        if(isset($this->segId))
            $this->db->update('seguridad', $this, array('segId' => $this->segId));
        else
            $this->db->insert('seguridad', $this);
    }

   
    
}