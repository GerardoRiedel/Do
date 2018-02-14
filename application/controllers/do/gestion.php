<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gestion extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();


        $this->load->helper(array('download', 'file', 'url', 'html', 'form'));
        $this->load->helper('layout');
        
        $this->folder = 'uploads/';
        $this->load->model("contratacion_model");
        $this->load->model("material_model");
        $this->load->model("parametros_model");
        
        //die($this->session->userdata('acceso_ok').'okkk');
        if($this->session->userdata('acceso_ok') !== 'OK' ){
            $this->session->sess_destroy();
            header('location: http://www.cetep.cl/do');
        }
    }
    public function index()
    {
        $data['title']           = '';
        Layout_Helper::cargaVista($this,'inicio',$data,'ingresos');   
    }
    public function listarContratacion()
    {
        IF($this->session->userdata('perfil') === '2'){$this->session->sess_destroy();}
        $usuario = '';
        $perfil = $this->session->userdata('perfil');
        IF($perfil === '1'){
            $usuario = $this->session->userdata('id_usuario');
        }
        $data['contratacion']   = $this->contratacion_model->dameTodosUsuario($usuario);
        $data['unidad'] = $this->parametros_model->dameUnidades();
        $data['menu']       = "formularios";
        $data['submenu']    = "listacontratacion";
        $data['title']           = 'Lista de Formularios de Contratación';
        Layout_Helper::cargaVista($this,'listarContratacion',$data,'ingresos');   
    }
    public function aceptarContratacion($id)
    {
        $this->contratacion_model->conId = $id;
        $this->contratacion_model->conEstado = 4;
        $this->contratacion_model->conUsuarioModificacion = $this->session->userdata('id_usuario');
        $this->contratacion_model->conFechaModificacion= date('Y-m-d H:i:s');
        $this->contratacion_model->guardar();
        $this->listarContratacion();
    }
    public function rechazarContratacion($id)
    {
        $this->contratacion_model->conId = $id;
        $this->contratacion_model->conEstado = 5;
        $this->contratacion_model->conUsuarioModificacion = $this->session->userdata('id_usuario');
        $this->contratacion_model->conFechaModificacion= date('Y-m-d H:i:s');
        $this->contratacion_model->guardar();
        $this->listarContratacion();
    }
    public function contratacion()
    {
        $data['cargo']   = $this->parametros_model->dameCargos();
        $data['unidad'] = $this->parametros_model->dameUnidades();
        $data['motivo']  = $this->parametros_model->dameMotivos();
        $data['costo']   = $this->parametros_model->dameCentrosCosto();
        $data['modalidad']   = $this->parametros_model->dameModalidad();
        $data['colaboradores']   = $this->parametros_model->dameColaboradores();
        $data['jefatura']   = $this->parametros_model->dameJefaturasUnidad();
        $data['material']   = $this->parametros_model->dameMateriales();
        $data['uniforme']   = $this->parametros_model->dameUniformes();
        $data['documento']   = $this->parametros_model->dameDocumentacion();
        $data['seguridad']   = $this->parametros_model->dameSeguridad();
        $data['menu']       = "formularios";
        $data['submenu']    = "contratacion";
        $data['title']           = 'Formulario de Solicitud de Contratación';
        Layout_Helper::cargaVista($this,'contratacion',$data,'ingresos');   
    }
    public function cargarContratacion($id)
    {
        $data['cargo']   = $this->parametros_model->dameCargos();
        $data['unidad'] = $this->parametros_model->dameUnidades();
        $data['motivo']  = $this->parametros_model->dameMotivos();
        $data['costo']   = $this->parametros_model->dameCentrosCosto();
        $data['modalidad']   = $this->parametros_model->dameModalidad();
        $data['colaboradores']   = $this->parametros_model->dameColaboradores();
        $data['jefatura']   = $this->parametros_model->dameJefaturasUnidad();
        $data['material']   = $this->parametros_model->dameMateriales();
        $data['uniforme']   = $this->parametros_model->dameUniformes();
        $data['documento']   = $this->parametros_model->dameDocumentacion();
        $data['seguridad']   = $this->parametros_model->dameSeguridad();
        $data['contratacion']   = $this->contratacion_model->dameUno($id);
        $data['contratacion_material']   = $this->contratacion_model->dameMaterialesContratacion($id);
        $data['contratacion_uniforme']   = $this->contratacion_model->dameUniformesContratacion($id);
        $data['contratacion_documentacion']   = $this->contratacion_model->dameDocumentacionContratacion($id);
        $data['contratacion_seguridad']   = $this->contratacion_model->dameSeguridadContratacion($id);
        $data['menu']       = "formularios";
        $data['submenu']    = "contratacion";
        $data['title']           = 'Formulario de Solicitud de Contratación';
        Layout_Helper::cargaVista($this,'contratacion',$data,'ingresos');   
    }
    public function guardarContratacion()
    {
        $conId   = $this->input->post('conId');
         IF(!empty($conId)){
            $this->contratacion_model->conId= $conId;
            $this->contratacion_model->conUsuarioModificacion = $this->session->userdata('id_usuario');
            $this->contratacion_model->conFechaModificacion= date('Y-m-d H:i:s');
        }ELSE{
            $this->contratacion_model->conUsuario= $this->session->userdata('id_usuario');
            $this->contratacion_model->conFechaRegistro= date('Y-m-d H:i:s');
        }
        
        $cargo   = $this->input->post('cargo');
        $otroCargo   = $this->input->post('otroCargo');
        $vacante   = $this->input->post('vacante');
        $empresa   = $this->input->post('empresa');
        $unidad   = $this->input->post('unidad');
        $costo   = $this->input->post('costo');
        $jefatura   = $this->input->post('jefatura');
        $motivo   = $this->input->post('motivo');
        $periodo   = $this->input->post('periodo');
        $colaborador   = $this->input->post('colaborador');
        $perfil   = $this->input->post('perfil');
        $critico   = $this->input->post('critico');
        $proceso   = $this->input->post('proceso');
        $date   = $this->input->post('fecha');
        $fechadate       = new DateTime($date);
        $fecha      = $fechadate->format('Y-m-d');
        $jornada   = $this->input->post('jornada');
        $modalidad   = $this->input->post('modalidad');
        $observacion   = $this->input->post('observacion');
        $matOtro   = $this->input->post('matOtro');
        $uniOtro   = $this->input->post('uniOtro');
        $horas   = $this->input->post('horas');
        $fechaIngresodate   = $this->input->post('fechaIngreso');
        IF(!empty($fechaIngresodate)){
            $fechaIng       = new DateTime($fechaIngresodate);
            $fechaIngreso      = $fechaIng->format('Y-m-d');
            $this->contratacion_model->conFechaIngreso= $fechaIngreso;
        }
        $seleccionado   = $this->input->post('selaccionado');
        $sueldo   = $this->input->post('sueldo');
        $material   = $this->parametros_model->dameMateriales();
        $uniforme   = $this->parametros_model->dameUniformes();
        $documentacion   = $this->parametros_model->dameDocumentacion();
        $seguridad   = $this->parametros_model->dameSeguridad();
        $estado = $this->input->post('conEstado');
            IF(($this->session->userdata('perfil') === '3' || $this->session->userdata('perfil') === '2') && $estado<'2') {$estado = 2;}
            ELSEIF($estado==='0'){$estado=$estado+1;}
            ELSEIF($estado==='1'){$estado=$estado+1;}
            ELSEIF($estado==='2'){$estado=$estado+1;}
        
        IF($motivo === '5' ||$motivo === '6' ||$motivo === '7' || $motivo === '8'){
            $this->contratacion_model->conPeriodo= $periodo;
            
        }
        $this->contratacion_model->conColaborador= $colaborador;
        $this->contratacion_model->conCargo= $cargo;
        $this->contratacion_model->conCargoOtro= $otroCargo;
        $this->contratacion_model->conVacante= $vacante;
        $this->contratacion_model->conEmpresa= $empresa;
        $this->contratacion_model->conUnidad= $unidad;
        $this->contratacion_model->conJefatura= $jefatura;
        $this->contratacion_model->conCosto= $costo;
        $this->contratacion_model->conMotivo= $motivo;
        $this->contratacion_model->conPerfil= $perfil;
        $this->contratacion_model->conCritico= $critico;
        $this->contratacion_model->conProceso= $proceso;
        $this->contratacion_model->conFechaIngRequerida= $fecha;
        $this->contratacion_model->conHoras= $horas;
        $this->contratacion_model->conJornada= $jornada;
        $this->contratacion_model->conModalidad= $modalidad;
        $this->contratacion_model->conObservacion= $observacion;
        $this->contratacion_model->conMatOtro= $matOtro;
        $this->contratacion_model->conUniOtro= $uniOtro;
        $this->contratacion_model->conEstado= $estado;
        $this->contratacion_model->conSeleccionado= $seleccionado;
        $this->contratacion_model->conSueldo= $sueldo;
        $this->contratacion_model->guardar();
        $operaciones = $dti = '';
        
        IF(empty($conId)){$contratacion = $this->contratacion_model->dameUltimo(); $conId = $contratacion->conId; }
        $this->material_model->limpiar($conId);
         FOREACH($material as $mat){
            $estado='';
            $this->material_model->matConContratacion = $conId;
            $this->material_model->matConMaterial = $mat->matId;
            $estado = $this->input->post('mat'.$mat->matId);
            IF($estado === 'on')$estado = 1; ELSE $estado = 0; 
            $this->material_model->matConEstado = $estado;
            $this->material_model->guardarMaterial();
                IF($estado===1){
                    IF($mat->matId==='1'){$operaciones = ' - Lugar/Puesto de trabajo (requiere nuevo).<br>'; 
                    }ELSE IF($mat->matId==='2'){$operaciones .= ' - Silla - Escritorio (requiere nuevo),<br>'; 
                    }ELSE IF($mat->matId==='4'){$dti = ' - Asignación PC/Notebook (requiere nuevo),<br>'; 
                    }ELSE IF($mat->matId==='5'){$dti .= ' - Requiere Teclado/Mouse(requiere nuevo),<br>'; 
                    }
                }
            
        }
        unset($this->material_model->matConContratacion,$this->material_model->matConMaterial,$this->material_model->matConEstado);   
         FOREACH($documentacion as $doc){
            $estado='';
            $this->material_model->docConContratacion = $conId;
            $this->material_model->docConDocumentacion = $doc->docId;
            $estado = $this->input->post('doc'.$doc->docId);
            IF($estado === 'on')$estado = 1; ELSE $estado = 0; 
            $this->material_model->docConEstado = $estado;
            $this->material_model->guardarDocumentacion();
        }
        unset($this->material_model->docConContratacion,$this->material_model->docConDocumentacion,$this->material_model->docConEstado);  
        FOREACH($seguridad as $seg){
            $estado='';
            $this->material_model->segConContratacion = $conId;
            $this->material_model->segConSeguridad = $seg->segId;
            $estado = $this->input->post('seg'.$seg->segId);
            IF($estado === 'on')$estado = 1; ELSE $estado = 0; 
            $this->material_model->segConEstado = $estado;
            $this->material_model->guardarSeguridad();
            
        }
        unset($this->material_model->segConContratacion,$this->material_model->segConSeguridad,$this->material_model->segConEstado);  
        FOREACH($uniforme as $uni){
            $estado='';
            $this->material_model->uniConContratacion = $conId;
            $this->material_model->uniConUniforme = $uni->uniId;
            $estado = $this->input->post('uni'.$uni->uniId); 
            IF($estado === 'on')$estado = 1; ELSE $estado = 0; 
            $this->material_model->uniConEstado = $estado;
            $this->material_model->guardarUniforme();
        }

        IF($estado<='2'){$this->enviarCorreo($conId,$operaciones,$dti); }
        IF($this->session->userdata('perfil') === '2'){$this->session->sess_destroy();}
        $this->listarContratacion();
    }
    
    public function enviarCorreo($conId,$operaciones='',$dti='')
    {
        $envio = $this->contratacion_model->dameUno($conId);
        
        IF($envio->conEstado==='1'){
            $token=$token = md5(date('Y-m-d'));
            $destinatario = 'marcelapaz@cetep.cl'; 
            //$destinatario = 'gerardo.riedel.c@gmail.com';
            $mensaje = 'Estimado departamento de Finanzas,<br><br>La Jefatura a enviado la solicitud de contratación N°'.$envio->conId.'.<br>Token valido por 24hrs: <a href="www.cetep.cl/do/?var=43&token='.$token.'&formulario='.$envio->conId.'">Validar</a><br>Para validarlo posteriormente favor ingresar a la plataforma a través de su Intracetep.<br><br>Atentamente<br><br><img style="width: 20%;"src="'.base_url().'../assets/img/logo_vertical_cetep.png"><br>Cetep';
        }
        ELSEIF($envio->conEstado==='2'){
            $destinatario = 'mramirez@cetep.cl,amartinez@cetep.cl'; 
            //$destinatario = 'gerardo.riedel.c@gmail.com';
            $mensaje = 'Estimados departamentos de RRHH y DO,<br><br>El departamento de finanzas a validado la solicitud de contratación N°'.$envio->conId.'.<br>Para revisar favor ingresar a la plataforma a través de su Intracetep<br><br>Atentamente<br><br><img style="width: 20%;"src="'.base_url().'../assets/img/logo_vertical_cetep.png"><br>Cetep';
            IF(!empty($operaciones)||!empty($dti)){$this->enviarCorreoDTI($conId,$operaciones,$dti); }
        }
        IF(!empty($destinatario)){
            $asunto = 'Formulario de Contratación';
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            $headers .= "From: Cetep <cetep@cetep.cl>\r\n"; //dirección del remitente 
            $headers .= "bcc: griedel@cetep.cl";
            mail($destinatario,$asunto,$mensaje,$headers) ;
        }
    }
    public function enviarCorreoDTI($conId,$operaciones='',$dti='')
    {
        $envio = $this->contratacion_model->dameUno($conId);
        ////////ENVIAR A OPERACIONES
        IF(!empty($operaciones)){
            $destinatario = 'operaciones@cetep.cl'; 
            //$destinatario = 'gerardo.riedel.c@gmail.com';
            $mensaje = 'Estimado departamento de Operaciones,<br><br>El area de Finanzas a validado la solicitud de contratación N°'.$envio->conId.'.<br>Para lo cual requerirá materiales de apoyo:<br><br>'.$operaciones.'<br><br>Atentamente<br><br>    <img style="width: 20%;"src="'.base_url().'../assets/img/logo_vertical_cetep.png">               <br>Cetep';
        }
        IF(!empty($destinatario)){
            $asunto = 'Formulario de Contratación';
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            $headers .= "From: Cetep <cetep@cetep.cl>\r\n"; //dirección del remitente 
     //       $headers .= "cc: mramirez@cetep.cl,amartinez@cetep.cl\r\n";
            $headers .= "bcc: griedel@cetep.cl";
            mail($destinatario,$asunto,$mensaje,$headers) ;
        }
        
        
        /////ENVIAR A DTI
        IF(!empty($dti)){
            $destinatario = 'dti@cetep.cl'; 
            //$destinatario = 'gerardo.riedel.c@gmail.com';
            $mensaje = 'Estimado departamento DTI,<br><br>El area de Finanzas a validado la solicitud de contratación N°'.$envio->conId.'.<br>La cual requiere materiales de apoyo:<br><br>'.$dti.'<br><br>Atentamente<br><br><img style="width: 20%;"src="'.base_url().'../assets/img/logo_vertical_cetep.png"><br>Cetep';
        }
        IF(!empty($destinatario)){
            $asunto = 'Formulario de Contratación';
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            $headers .= "From: Cetep <cetep@cetep.cl>\r\n"; //dirección del remitente 
     //       $headers .= "cc: mramirez@cetep.cl,amartinez@cetep.cl\r\n";
            $headers .= "bcc: griedel@cetep.cl";
            mail($destinatario,$asunto,$mensaje,$headers) ;
        }
    }
    public function imprimirContratacion($id)
    {
        $data['cargo']   = $this->parametros_model->dameCargos();
        $data['unidad'] = $this->parametros_model->dameUnidades();
        $data['motivo']  = $this->parametros_model->dameMotivos();
        $data['costo']   = $this->parametros_model->dameCentrosCosto();
        $data['colaboradores']   = $this->parametros_model->dameColaboradores();
        $data['modalidad']   = $this->parametros_model->dameModalidad();
        $data['jefatura']   = $this->parametros_model->dameJefaturasUnidad();
        $data['material']   = $this->parametros_model->dameMateriales();
        $data['uniforme']   = $this->parametros_model->dameUniformes();
        $data['documentacion']   = $this->parametros_model->dameDocumentacion();
        $data['seguridad']   = $this->parametros_model->dameSeguridad();
        $data['contratacion']   = $this->contratacion_model->dameUno($id);
        $data['contratacion_material']   = $this->contratacion_model->dameMaterialesContratacion($id);
        $data['contratacion_uniforme']   = $this->contratacion_model->dameUniformesContratacion($id);
        $data['contratacion_documentacion']   = $this->contratacion_model->dameDocumentacionContratacion($id);
        $data['contratacion_seguridad']   = $this->contratacion_model->dameSeguridadContratacion($id);
        $data['menu']       = "formularios";
        $data['submenu']    = "contratacion";
        $data['title']           = 'Formulario de Solicitud de Contratación';
        Layout_Helper::cargaVista($this,'imprimirContratacion',$data,'ingresos');   
        
        
        
        
    }
}
