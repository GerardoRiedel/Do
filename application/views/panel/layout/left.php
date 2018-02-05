<?php $color = '#e9c899';
$color = '#e9c899';
IF(empty($menu)){
    $menu ='';
   // $color = '#f4f4f2';
}
IF(empty($submenu)){$submenu='';}//die($this->session->userdata('id_usuario') );?>

<div id="sidebar" style="background-color: <?php echo $color;?>">
    
    <ul class="menu-left" style="">
<!--JEFATURAS-->
        <?php IF($this->session->userdata('perfil') == '1' && $this->session->userdata('id_usuario') != '10001'){?>
            <li class="submenu <?php if($menu === 'formularios' )echo "active open" ?>">
                    <a href=""><i class="fab fa-wpforms" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Formularios</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'contratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/contratacion"); ?>">Nueva Contratación</a></li>            
                        <li <?php if($submenu === 'listacontratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/listarContratacion"); ?>">Lista de Formularios</a></li>            
                    </ul> 
            </li>
            
            <li>
                    <a href="<?php echo base_url();?>login/salirIntranet"><i class="fas fa-sign-out-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Salir</span></a>
             </li>
             
             
             
             
        <?php }ELSEIF($this->session->userdata('perfil') == '2'){ ?>
            <!--VISITA-->
            <li class="submenu <?php if($menu === 'gestion' )echo "active open" ?>">
                    <a href=""><i class="fab fa-wpforms" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Contacto</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'contratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/contratacion"); ?>">Nueva Contratación</a></li>            
                        <li <?php if($submenu === 'listacontratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/listarContratacion"); ?>">Lista de Formularios</a></li>            
                    </ul> 
            </li>
            <li>
                    <a href="<?php echo base_url();?>login/salir"><i class="fas fa-sign-out-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Salir</span></a>
            </li>
            
            
            
<!--FINANZAS-->
            <?php }ELSEIF($this->session->userdata('perfil') == '3'){?>
<?php //die('ese');?>
             <li class="submenu <?php if($menu === 'formularios' )echo "active open" ?>">
                    <a href=""><i class="fab fa-wpforms" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Formularios</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'contratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/contratacion"); ?>">Nueva Contratación</a></li>            
                        <li <?php if($submenu === 'listacontratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/listarContratacion"); ?>">Lista de Formularios</a></li>            
                    </ul> 
            </li>
            <!--
            <li class="submenu <?php if($menu === 'mantenedores' )echo "active open" ?>">
                    <a href=""><i class="fa fa-cog" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'cargos')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarCargos"); ?>">Cargo Requerido</a></li>            
                        <li <?php if($submenu === 'motivos')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarMotivos"); ?>">Motivo Solicitud</a></li>
                        <li <?php if($submenu === 'modalidades')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarModalidades"); ?>">Modalidad Requerida</a></li>            
                        <li <?php if($submenu === 'materiales')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarMateriales"); ?>">Materiales</a></li>
                        <li <?php if($submenu === 'uniformes')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarUniformes"); ?>">Uniformes</a></li>            
                        <li <?php if($submenu === 'documentacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarDocumentacion"); ?>">Documentación</a></li>
                        <li <?php if($submenu === 'seguridad')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarSeguridad"); ?>">Inducción y seguridad</a></li>            
                    </ul> 
            </li>
            -->
            <li>
                    <a href="<?php echo base_url();?>login/salirIntranet"><i class="fas fa-sign-out-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Salir</span></a>
            </li>
             

        
<!--DO Y RRHH-->
            <?php }ELSEIF($this->session->userdata('perfil') == '4'){?>
            <li class="submenu <?php if($menu === 'formularios' )echo "active open" ?>">
                    <a href=""><i class="fab fa-wpforms" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span> Formularios</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'contratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/contratacion"); ?>">Nueva Contratación</a></li>            
                        <li <?php if($submenu === 'listacontratacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/gestion/listarContratacion"); ?>">Lista de Formularios</a></li>            
                    </ul> 
            </li>
            <li class="submenu <?php if($menu === 'mantenedores' )echo "active open" ?>">
                    <a href=""><i class="fa fa-cog" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Mantenedores</span> <i class="arrow fa fa-chevron-right"></i></a>
                    <ul>
                        <li <?php if($submenu === 'cargos')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarCargos"); ?>">Cargo Requerido</a></li>            
                        <li <?php if($submenu === 'motivos')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarMotivos"); ?>">Motivo Solicitud</a></li>
                        <li <?php if($submenu === 'modalidades')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarModalidades"); ?>">Modalidad Requerida</a></li>            
                        <li <?php if($submenu === 'materiales')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarMateriales"); ?>">Materiales</a></li>
                        <li <?php if($submenu === 'uniformes')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarUniformes"); ?>">Uniformes</a></li>            
                        <li <?php if($submenu === 'documentacion')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarDocumentacion"); ?>">Documentación</a></li>
                        <li <?php if($submenu === 'seguridad')  echo "class='active'" ?>><a href="<?php echo base_url("do/mantenedores/listarSeguridad"); ?>">Inducción y seguridad</a></li>            
                    </ul> 
            </li>
            <li>
                    <a href="<?php echo base_url();?>login/salirIntranet"><i class="fas fa-sign-out-alt" aria-hidden="true" style=" width: 20px;text-align: center"></i> <span>Salir</span></a>
             </li>
             

        <?php } ?>   
            
    </ul>
</div><!-- sidebar -->
