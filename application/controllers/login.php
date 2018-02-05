<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('login_model','usuarios_panel_log_model','parametros_model'));
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form','security','layout'));
    }
	
        public function index()
        { 
            //$this->session->sess_destroy();die('aca');
            //$data = array('is_logged_in'     =>  FALSE);
            //$this->session->set_userdata($data);	
           //die($this->session->userdata('is_logged_in'));
           //die($_GET['var']);
            //die($this->session->userdata('acceso_ok') );
                if($this->session->userdata('acceso_ok') === 'OK' ){
            
//die('aca');
                   $agente = $_SERVER['HTTP_USER_AGENT'];
                  //echo $agente; echo '<br>';
                  // $agente = preg_match('/Chrome/i',$agente);
                  //die($agente.'s');
                   if(preg_match('/Chrome/i',$agente)){
                    $nav = "Chrome";}
                    else {$nav = "";}
                    $alert = "alert('Su navegador no se encuentra optimizado, algunas funcionalidades podrian no estar disponibles. Le recomendamos utilizar Google Chrome.');";

                    //Guarda Log
                    //$this->usuarios_panel_log_model->uplFecha    = date('Y-m-d H:i:s');
                    //$this->usuarios_panel_log_model->uplPerfil      = $this->session->userdata('perfil');
                    //$this->usuarios_panel_log_model->uplUsuario = $this->session->userdata('id_usuario');
                    //$this->usuarios_panel_log_model->uplDescripcion = "Acceso a panel de control";
                    //$this->usuarios_panel_log_model->guardarLog();

                    if($this->session->userdata('perfil') >= '1'){ 
                        IF($nav != 'Chrome'){
                        echo "<script>".$alert."window.location.href='".base_url()."do/gestion';</script>";}
                        ELSE {redirect(base_url().'do/gestion');}
                    }
             //     elseif($this->session->userdata('perfil') == '2'){ //die(var_dump($this->session->userdata));
             //     $this->session->sess_destroy();
             //     echo "<script>alert('Usuario no registrado');</script>";
             //         //IF($nav != 'Chrome'){
             //         //echo "<script>".$alert."window.location.href='".base_url()."calidad/sugerencia/felicitacion';</script>";}
             //         //ELSE {
             //        //     redirect(base_url().'calidad/sugerencia/inicio');
             //             
             //         //}
             //     }
             //     elseif($this->session->userdata('perfil') == '3' || $this->session->userdata('perfil') == '4'){ //die(var_dump($this->session->userdata));
             //         //die('aca');
             //         IF($nav != 'Chrome'){
             //         echo "<script>".$alert."window.location.href='".base_url()."calidad/gestion';</script>";}
             //         ELSE {redirect(base_url().'do/gestion');}
             //     }
                    else{
                        echo "<script>alert('Usuario o password mal ingresados.');</script>";
                    }

                }elseif(!empty($_GET['var'])){
                    $this->nuevo($_GET['var']);
                }else{//die('ultimo');
                    $this->session->sess_destroy();
                    $this->login();
                    //echo "<script>alert('Usuario no registrado');</script>";
                        
                    //$this->visita();
                }
        }
        
   //   public function visita()
   //   {
   //           //die('visita');
   //           $data = array(
   //                               'acceso_ok'        =>  'OK',
   //                               'id_usuario'         =>  10,
   //                               'perfil'                    =>  '2',
   //                               'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
   //                           );	
   //           $this->session->set_userdata($data);	
   //           
   //          
   //           $this->guardarLog();                                     
   //            redirect(base_url().'do/sugerencia/inicio');
   //           //$this->index();
   //   }
        
        public function nuevo($id)
        {
                $colaborador = $this->parametros_model->dameColaborador($id);
                //die(var_dump($colaborador));
                IF(!empty($colaborador->idunidad)){
                            
                            IF($colaborador->idunidad==='1'){//die('finanzas');
                                //FINANZAS
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '3',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                            } ELSEIF($colaborador->idunidad==='8' || $colaborador->idunidad==='17')   {
                                //DO Y RRHH
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '4',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                            }
                            ELSE {
                                //JEFATURAS
                                $check = $this->parametros_model->checkJefeUnidad($colaborador->idcolaborador);
                                IF(!empty($check->idunidad)){
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '1',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                                }
                                ELSE {
                                    echo "<script>alert('Acceso Restingido.');</script>";
                                    echo "<script>window.location.href='".base_url()."do/gestion';</script>";
                                }
                            }
                            $this->session->set_userdata($data);
                            $this->guardarLog();             
                            $this->index();
                }ELSE{
                    die('visita');
                }
                
            
        }
        
        public function salir()
        {
                $this->session->sess_destroy();
                //$data = array('is_logged_in'     =>  FALSE);
                //$this->session->set_userdata($data);	
                //header('location: http://localhost/calidad');
                //echo    '<script> 
                  //              window.close(); 
                    //        </script>';
                header('location: http://www.cetep.cl');
        }
         public function salirIntranet()
        {
                $data = array('acceso_ok'     =>  '');
                $this->session->set_userdata($data);	
                //die('aca');
                //myWindow.close();
                header('location: http://www.cetep.cl/do');
                //echo '<script>window.close();</script>';
                //header('location: http://www.cetep.cl');
                // echo    '<script>window.close();</script>';
                //header('location: http://www.cetep.cl/intracetep');
        }
        public function guardarLog(){
             //Guarda Log
                $this->usuarios_panel_log_model->uplFecha = date('Y-m-d H:i:s');
                $this->usuarios_panel_log_model->uplPerfil = $this->session->userdata('perfil');
                $this->usuarios_panel_log_model->uplUsuario = $this->session->userdata('id_usuario');
                $this->usuarios_panel_log_model->uplDescripcion = "Acceso a panel de control";
                $this->usuarios_panel_log_model->guardarLog();
        }
        
        public function login()
        {
            $this->load->view('login_view.php');
        }
        
        public function usuario_externo()
        {
            

                    $username = $this->input->post('username',TRUE);
                    $password = md5($this->input->post('password',TRUE));
                    $passwordSin = $this->input->post('password');
                    $colaborador = $this->login_model->loginUsuario($username,$passwordSin);
                    IF(!empty($colaborador->idunidad)){
                            
                            IF($colaborador->idunidad==='1'){
                                //FINANZAS
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '3',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                            } ELSEIF($colaborador->idunidad==='8' || $colaborador->idunidad==='17')   {
                                //DO Y RRHH
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '4',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                            }
                            ELSE {
                                //JEFATURAS
                                $check = $this->parametros_model->checkJefeUnidad($colaborador->idcolaborador);
                                IF(!empty($check->idunidad)){
                                $data = array(
                                                    'acceso_ok'     =>  'OK',
                                                    'id_usuario'         =>  $colaborador->idcolaborador,
                                                    'perfil'                    =>  '1',
                                                    'reloj'                     =>  date('Y-m-d H:i:s',strtotime ( '+60 minutes' )),
                                                    );	
                                }
                                ELSE {
                                    echo "<script>alert('Acceso Restingido.');</script>";
                                    echo "<script>window.location.href='".base_url()."do/gestion';</script>";
                                }
                            }
                            $this->session->set_userdata($data);
                            $this->guardarLog();             
                            $this->index();
                }ELSE{
                    die('nuevo');
                }
                
                                                                        
		
	}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	
    
    
    public function forget()
	{
		if (isset($_GET['info'])) {
               $data['info'] = $_GET['info'];
              }
		if (isset($_GET['error'])) {
              $data['error'] = $_GET['error'];
              }
		$data['token'] = $this->token();
                $data['recuperar'] = 1;
		$data['titulo'] = 'Login con roles de usuario en codeigniter';
		$this->load->view('login_view',$data);
	} 
    public function doforget()
	{
                $data['recuperar'] = 1;
		$email= $_POST['email'];
		$q = $this->login_model->enviarEmail($email);
                
		if (!empty($q->uspEmail)) {
                    $this->reiniciaClave($q);
                    $info= "Se ha reseteado la contraseña, y ha sido enviada a: ". $email;
                    $data['info'] = $info;
                    $this->load->view('login_view',$data);
                }
                else {
                    $error = "El email ingresado no se encuentra registrado.";
                    $data['info'] = $error;
                    $this->load->view('login_view',$data);
                }
		
	} 
    private function reiniciaClave($user)
	{
		$password= random_string('alnum', 6);
                //echo $password;
                $this->login_model->uspId = $user->uspId;
                $this->login_model->uspPassword = MD5($password);
                $this->login_model->guardar();
                
                
                $config = array(
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		); 
 
		//cargamos la configuración para enviar
		
                
		$this->load->library('email');
                $this->email->initialize($config);
		$this->email->from('cetep@cetep.cl', 'Cetep');
		$this->email->to($user->uspEmail);
                $this->email->bcc('dti@cetep.cl');  	
		$this->email->subject('Reseteo de Contraseña');
		$this->email->message('Usted ha solicitado una nueva contraseña de ingreso para el usuario <b>"'.$user->uspUsuario.'"</b>, al panel de control de la Clínica MirAndes.<br>La nueva contraseña de acceso es: '.$password.'<br><br>Atentamente,<br>Equipo DTI');	
		$this->email->send();
        //echo $this->email->print_debugger();
	} 
	
	

	
	
}



?>