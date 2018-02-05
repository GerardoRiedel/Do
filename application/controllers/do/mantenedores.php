<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mantenedores extends CI_Controller {
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->folder = 'uploads/';
        $this->load->model("mantenedores_model");
        
        //die($this->session->userdata('acceso_ok').'okkk');
        if($this->session->userdata('acceso_ok') !== 'OK' ){
            $this->session->sess_destroy();
            header('location: http://www.cetep.cl/do');
        }
    }
    
    public function listarCargos()
    {
        $data['datos']   = $this->mantenedores_model->dameCargos();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "cargos";
        $data['title']           = 'Lista de Cargos';
        Layout_Helper::cargaVista($this,'../mantenedores/listarCargos',$data,'ingresos');   
    }
    public function cargarCargo($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameCargo($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "cargos";
        $data['title']           = 'Lista de Cargos';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarCargo',$data,'ingresos');   
    }
    public function guardarCargo()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->carId= $id;
        }
        $this->mantenedores_model->carNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarCargo();
        $this->listarCargos();
    }
    
    
    
    public function listarMotivos()
    {
        $data['datos']   = $this->mantenedores_model->dameMotivos();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "motivos";
        $data['title']           = 'Lista de Motivos';
        Layout_Helper::cargaVista($this,'../mantenedores/listarMotivos',$data,'ingresos');   
    }
    public function cargarMotivo($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameMotivo($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "motivos";
        $data['title']           = 'Lista de Motivos';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarMotivo',$data,'ingresos');   
    }
    public function guardarMotivo()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->motId= $id;
        }
        $this->mantenedores_model->motNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarMotivo();
        $this->listarMotivos();
    }
    
    
    public function listarModalidades()
    {
        $data['datos']   = $this->mantenedores_model->dameModalidades();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "modalidades";
        $data['title']           = 'Lista de Modalidades';
        Layout_Helper::cargaVista($this,'../mantenedores/listarModalidades',$data,'ingresos');   
    }
    public function cargarModalidad($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameModalidad($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "modalidades";
        $data['title']           = 'Lista de Modalidades';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarModalidad',$data,'ingresos');   
    }
    public function guardarModalidad()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->modId= $id;
        }
        $this->mantenedores_model->modNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarModalidad();
        $this->listarModalidades(); 
    }
    
    
    public function listarMateriales()
    {
        $data['datos']   = $this->mantenedores_model->dameMateriales();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "materiales";
        $data['title']           = 'Lista de Materiales';
        Layout_Helper::cargaVista($this,'../mantenedores/listarMateriales',$data,'ingresos');   
    }
    public function cargarMaterial($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameMaterial($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "materiales";
        $data['title']           = 'Lista de Materiales';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarMaterial',$data,'ingresos');   
    }
    public function guardarMaterial()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->matId= $id;
        }
        $this->mantenedores_model->matNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarMaterial();
        $this->listarMateriales();
    }
    public function listarUniformes()
    {
        $data['datos']   = $this->mantenedores_model->dameUniformes();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "uniformes";
        $data['title']           = 'Lista de Uniforme y Equipo';
        Layout_Helper::cargaVista($this,'../mantenedores/listarUniformes',$data,'ingresos');   
    }
    public function cargarUniforme($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameUniforme($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "uniformes";
        $data['title']           = 'Lista de Uniforme y Equipo';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarUniforme',$data,'ingresos');   
    }
    public function guardarUniforme()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->uniId= $id;
        }
        $this->mantenedores_model->uniNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarUniforme();
        $this->listarUniformes();
    }
    
    
    
    
    public function listarDocumentacion()
    {
        $data['datos']   = $this->mantenedores_model->dameDocumentos();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "documentacion";
        $data['title']           = 'Lista de Documentos';
        Layout_Helper::cargaVista($this,'../mantenedores/listarDocumentacion',$data,'ingresos');   
    }
    public function cargarDocumentacion($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameDocumento($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "documentacion";
        $data['title']           = 'Lista de Documentos';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarDocumentacion',$data,'ingresos');   
    }
    public function guardarDocumentacion()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->docId= $id;
        }
        $this->mantenedores_model->docNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarDocumento();
        $this->listarDocumentacion();
    }
    public function listarSeguridad()
    {
        $data['datos']   = $this->mantenedores_model->dameSeguridades();
        $data['menu']       = "mantenedores";
        $data['submenu']    = "seguridad";
        $data['title']           = 'Lista de inducción, seguridad y calidad';
        Layout_Helper::cargaVista($this,'../mantenedores/listarSeguridad',$data,'ingresos');   
    }
    public function cargarSeguridad($id='')
    {
        IF(!empty($id)){$data['datos']   = $this->mantenedores_model->dameSeguridad($id);}
        $data['menu']       = "mantenedores";
        $data['submenu']    = "seguridad";
        $data['title']           = 'Lista de inducción, seguridad y calidad';
        Layout_Helper::cargaVista($this,'../mantenedores/cargarSeguridad',$data,'ingresos');   
    }
    public function guardarSeguridad()
    {
        $id   = $this->input->post('id');
         IF(!empty($id)){
            $this->mantenedores_model->segId= $id;
        }
        $this->mantenedores_model->segNombre= $this->input->post('nombre');
        $this->mantenedores_model->guardarSeguridad();
        $this->listarSeguridad();
    }
}