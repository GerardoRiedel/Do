<style>
    .titulo{
        color: #a15ebe;
    }
    .icon{
        width: 25px;
        margin-left: -200%;
    }
    .title{
        font-size:12px;
        margin-left: -250px;
        background-color: #D3D3D3;
        color:red;
        padding-left: 10px;
        border-radius: 10px solid grey;
        box-shadow: 10px 10px 5px grey;
        
        min-height: 18px
    }
    
</style>

<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #e9c899">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info">
            <?php echo $title;?>
            <div align="right" style="margin-top:-20px">
                <span><a class="tip-bottom" title="Cerrar" href="<?php echo base_url("do/gestion/index/")?>"><i class="fa fa-times-circle" aria-hidden="true" style="color:red"></i></a></span>
            </div>
        </h1>
    
                                  
    
    
    </div>
    
    <div class="container-fluid" id="precargar">
<script>
    $("#precargar").hide();
</script>
        <div class="row">
            <div class="col-xs-12">
			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
            <?php $attributes = array('id' => 'form'); 
                echo form_open('do/gestion/guardarContratacion',$attributes);
            ?>
        <input name="conId"  type="hidden"  value="<?php IF(!empty($contratacion->conId))echo $contratacion->conId; ?>" >
        <input name="conEstado"  type="hidden"  value="<?php IF(!empty($contratacion->conEstado))echo $contratacion->conEstado;ELSE echo '0'; ?>" >
        <input type="hidden" id="perfil" value="<?php echo $this->session->userdata('perfil'); ?>">
                    
            <div class='widget-content' id="cargomostrar" >
                
                <div><!--COMIENZO TRATAMIENTO DE FICHA-->
                    <div class="col-lg-12" ><br>
                    <div class="col-lg-4 titulo">
                        <label>Completar Formulario de Contratación</label> <br><br>
                    </div></div>
                <!-- DATOS DE PERSONALES-->     
                   
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Cargo Requerido</label> 
                    </div>
                    
                    <div class='col-lg-4' id="selectCargo">
                        <select name="cargo" id="cargo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($cargo as $car): ?>
                                <option value="<?php echo $car->carId;?>" <?php IF(!empty($contratacion->conCargo) && $contratacion->conCargo === $car->carId)echo 'selected'; ?> ><?php echo $car->carNombre;?></option>
                            <?php endforeach; ?>
                                <option value="1000" <?php IF(!empty($contratacion->conCargoOtro) && $contratacion->conCargo === '1000')echo 'selected'; ?>>Otro</option>
                        </select>
                    </div>
                    <div class='col-lg-4' id="inputCargo">
                        <input type="text" id="otroCargo" name="otroCargo" placeholder="Especifique nuevo cargo"  value="<?php IF(!empty($contratacion->conCargoOtro))echo $contratacion->conCargoOtro; ?>">
                    </div>
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconCargo"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                     <div class="col-lg-3">
                        <label>N° de Vacantes</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="vacante"  type="text" minlength="1" class="vacante" id="vacante" required  value="<?php IF(!empty($contratacion->conVacante))echo $contratacion->conVacante;?>" placeholder="Ingrese la cantidad" title="Ingrese numero de vacantes">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Empresa</label>
                    </div>
                    <div class='col-lg-5'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="empresa" value="1" <?php IF(!empty($contratacion->conEmpresa) && $contratacion->conEmpresa === '1')echo 'checked'; ?> title="sdggsdg"></td>
                                <td style=" width: 75px">Cetep</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="empresa" value="2" <?php IF(!empty($contratacion->conEmpresa) && $contratacion->conEmpresa === '2')echo 'checked'; ?>></td>
                                <td style=" width: 75px">MirAndes</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="empresa" value="3" <?php IF(!empty($contratacion->conEmpresa) && $contratacion->conEmpresa === '3')echo 'checked'; ?>></td>
                                <td style=" width: 75px">Otec</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconEmpresa"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Unidad</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="unidad" id="unidad" style="width:300px">
                            <option value="0">Seleccione...</option>
                            <?php foreach($unidad as $uni): ?>
                                <option value="<?php echo $uni->idunidad;?>" <?php IF(!empty($contratacion->conUnidad) && $contratacion->conUnidad === $uni->idunidad)echo 'selected'; ?> ><?php echo $uni->descripcion;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div> 
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconUnidad"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Centro de Costos</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="costo" id="costo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($costo as $cos): ?>
                            <?php $nombreCentro = str_replace('Ã³', ó, $cos->descripcion); $nombreCentro = str_replace('Ã­', í, $nombreCentro); $nombreCentro = str_replace('Ã±', ñ, $nombreCentro); ?>
                                <option value="<?php echo $cos->id;?>" <?php IF(!empty($contratacion->conCosto) && $contratacion->conCosto === $cos->id)echo 'selected'; ?> ><?php echo $nombreCentro;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div> 
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconCosto"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Jefatura Directa</label>
                    </div>
                    <div class='col-lg-4' id="titleJefaturaMostrar">
                        <select name="jefatura" id="jefatura" style="width:300px">
                            <option value="0" >Seleccione...</option>
                            <?php foreach($jefatura as $jef): ?>
                                <option value="<?php echo $jef->idcolaborador;?>" <?php IF(!empty($contratacion->conJefatura) && $contratacion->conJefatura === $jef->idcolaborador)echo 'selected'; ?> ><?php echo strtoupper($jef->apellidoPaterno).' '.strtoupper($jef->apellidoMaterno).' '.strtoupper($jef->nombre);?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconJefatura"/>
                    </div>
                    <div id="titleJefatura" class="col-lg-3 title">Ingrese Jefe directo del cargo solicitado</div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Motivo Solicitud</label>
                    </div>
                    <div class='col-lg-4' id="titleMotivoMostrar">
                        <select name="motivo" id="motivo">
                            <option value="0">Seleccione...</option>
                            <?php foreach($motivo as $mot): ?>
                                <option value="<?php echo $mot->motId;?>" <?php IF(!empty($contratacion->conMotivo) && $contratacion->conMotivo === $mot->motId)echo 'selected'; ?> <?php IF($mot->motId==='6')echo 'id="reemVacaciones"'; ?>><?php echo $mot->motNombre;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconMotivo"/>
                    </div>
                        <div class="col-lg-3">
                            <div id="titleMotivo" class="title" style=" position: absolute">
                            <table>
                                <tr>
                                    <td style="width:140px"><u>Internalización:</u></td>
                                    <td>Colaborador a honorarios es contratado.</td>
                                </tr>
                                <tr>
                                    <td><u>Reemplazo Cargo Vacante:</u></td>
                                    <td>Cargo vacante en su unidad, puede ser generado por traslado, cambio de área, desvinculación, renuncia del trabajador o similar.</td>
                                </tr>
                                
                                <tr>
                                    <td><u>Reemplazo Vacaciones:</u></td>
                                    <td>Se Solicita con 30 días de anticipación.</td>
                                </tr>
                                <tr>
                                    <td><u>Reemplazo programado:</u></td>
                                    <td>Reemplazo para capacitaciones, permisos legales o apoyo ante contingencias. Se solicita con 30 días de anticipación.</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!------------INICIO REEMPLAZO--------------------->
                    <div id="divPeriodo">
                        <div class="col-lg-12"></div>
                        <div class="col-lg-1"></div>
                         <div class="col-lg-3">
                            <label>Periodo</label>
                        </div>
                        <div class='col-lg-4'>
                            <input name="periodo"  type="text" minlength="1"  id="periodo" value="<?php IF(!empty($contratacion->conPeriodo))echo $contratacion->conPeriodo;?>" placeholder="Ingrese periodo a reemplazar">
                        </div>
                        <div class="col-lg-1">
                            <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconPeriodo"/>
                        </div>
                         </div>
                    <!--  PERIODO REEMPLAZO-->
                    
                        <div class="col-lg-12"></div>
                        <div class="col-lg-1"></div>
                         <div class="col-lg-3">
                            <label>Nombre colaborador</label>
                        </div>
                        <div class='col-lg-4'>
                            <select name="colaborador" id="colaborador" style="width:300px">
                            <option value="0">Seleccione...</option>
                            <?php foreach($colaboradores as $col): ?>
                                <option value="<?php echo $col->idcolaborador;?>" <?php IF(!empty($contratacion->conColaborador) && $contratacion->conColaborador === $col->idcolaborador)echo 'selected'; ?> ><?php echo strtoupper($col->apellidoPaterno).' '.strtoupper($col->apellidoMaterno).' '.strtoupper($col->nombre);?></option>
                            <?php endforeach; ?>
                        </select> 
                        </div>
                        <div class="col-lg-1">
                            <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconColaborador"/>
                        </div>
                   
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Tiene perfil de Cargo (Descriptor)</label>
                    </div>
                    <div class='col-lg-4' id="titlePerfilMostrar">
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="perfil" value="1" <?php IF(!empty($contratacion->conPerfil) && $contratacion->conPerfil === '1')echo 'checked'; ?>></td>
                                <td style=" width: 75px">Si</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="perfil" value="2" <?php IF(!empty($contratacion->conPerfil) && $contratacion->conPerfil === '2')echo 'checked'; ?>></td>
                                <td>No</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconPerfil"/>
                    </div>
                    <div id="titlePerfil" class="col-lg-4 title" style=" position: relative">El requerimiento cuenta con descriptor o perfil de cargo creado</div>
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                     <div class="col-lg-3">
                        <label>Horas Semanales</label>
                    </div>
                    <div class='col-lg-5' id="titleHorasMostrar">
                        <input name="horas"  type="text" minlength="1" id="horas" required  value="<?php IF(!empty($contratacion->conHoras))echo $contratacion->conHoras;?>" placeholder="Ingrese numero de horas" title="Ingrese numero de horas semanales">
                    </div>
                    <div class="col-lg-2">
                        <div id="titleHoras" class="title">1/2 hora de colación si corresponde</div>
                    </div>
                    
                    <!--
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Cargo Crítico</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="critico" value="1" <?php IF(!empty($contratacion->conCritico) && $contratacion->conCritico === '1')echo 'checked'; ?>></td>
                                <td style=" width: 75px">Si</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="critico" value="2" <?php IF(!empty($contratacion->conCritico) && $contratacion->conCritico === '2')echo 'checked'; ELSE echo 'checked'; ?>></td>
                                <td>No</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Tipo Proceso</label>
                    </div>
                    <div class='col-lg-3'>
                        <table>
                            <tbody>
                            <tr>
                                <td style=" width: 30px" align="center"><input type="radio" name="proceso" value="1" <?php IF(!empty($contratacion->conProceso) && $contratacion->conProceso === '1')echo 'checked'; ?>></td>
                                <td style=" width: 75px">Publico</td>
                                <td style=" width: 30px" align="center"><input type="radio" name="proceso" value="2" <?php IF(!empty($contratacion->conProceso) && $contratacion->conProceso === '2')echo 'checked'; ELSE echo 'checked'; ?>></td>
                                <td>Privado</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> 
                    
                    
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Fecha de Ingreso Requerida</label> 
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control" required placeholder="día-mes-año" style=" width: 158px !important" name="fecha" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($contratacion->conFechaIngRequerida)) {$fecha = new datetime($contratacion->conFechaIngRequerida); $fecha = $fecha->format('d-m-Y'); echo $fecha; }  ?>" >
                        </div>
                    </div>
                    -->
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                     <div class="col-lg-3">
                        <label>Horario de Trabajo (Jornada)</label>
                    </div>
                    <div class='col-lg-3'>
                        <input name="jornada"  type="text" minlength="3" required  value="<?php IF(!empty($contratacion->conJornada) )echo $contratacion->conJornada; ?>" placeholder="Ingrese Jornada">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Modalidad</label>
                    </div>
                    <div class='col-lg-4'>
                        <select name="modalidad" id="modalidad" style="width:300px">
                            <option value="0">Seleccione...</option>
                            <?php foreach($modalidad as $mod): ?>
                                <option value="<?php echo $mod->modId;?>" <?php IF(!empty($contratacion->conModalidad) && $contratacion->conModalidad === $mod->modId)echo 'selected'; ?> ><?php echo $mod->modNombre;?></option>
                            <?php endforeach; ?>
                        </select> 
                    </div>
                    <div class="col-lg-1">
                        <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconModalidad"/>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Observaciones</label> 
                    </div>
                    <div class='col-lg-6'>
                        <textarea name="observacion" style=" width: 100%; height:60px" placeholder="Indique alguna observación extra, años de experiencia, software, carrera, industria, etc" ><?php IF(!empty($contratacion->conObservacion))echo $contratacion->conObservacion; ?></textarea>
                    </div>
                    <div id="titleJefatura" class="col-lg-3 title">Ingrese Jefe directo del cargo solicitado</div>
                    <div class="col-lg-12"><hr></div>
                    <div class="col-lg-1"></div>
                    
                    <div class="col-lg-10">
                        <table >
                            <tr>
                                <td style="width:315px"><label>Materiales Requeridos</label></td>
                                <td style="width:150px"></td>
                                <td style="width:290px"><label>Entrega de Uniforme</label></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td  style=" vertical-align: top" id='titleMaterialesMostrar'>
                                    <?php FOREACH($material as $mat){ ?>
                                            <?php 
                                                $estado = '';
                                                IF(!empty($contratacion_material)){
                                                    FOREACH($contratacion_material as $conMat){
                                                        IF($mat->matId===$conMat->matConMaterial){
                                                            IF($conMat->matConEstado === '1'){$estado='checked';}
                                                        }
                                                    } 
                                                }
                                            ?>
                                    <input type="checkbox" name="<?php echo 'mat'.$mat->matId; ?>" <?php echo $estado; ?>> <?php echo $mat->matNombre; ?><br>
                                    <?php } ?>
                                    <input type="text" name="matOtro" placeholder="Introducir Otro Material"><br>
                                </td>
                                <td >
                                    <div id="titleMateriales" class="title" style="margin-left:0px !important">Marcar solo si es requerido</div>
                                </td>
                                <td  style=" vertical-align: top" id='titleUniformesMostrar'>
                                    <?php FOREACH($uniforme as $uni){ ?>
                                    <?php 
                                                $estado = '';
                                                IF(!empty($contratacion_uniforme)){
                                                    FOREACH($contratacion_uniforme as $conUni){
                                                        IF($uni->uniId===$conUni->uniConUniforme){
                                                            IF($conUni->uniConEstado === '1'){$estado='checked';}
                                                        }
                                                    } 
                                                }
                                            ?>
                                    <input type="checkbox" name="<?php echo 'uni'.$uni->uniId; ?>" <?php echo $estado; ?>> <?php echo $uni->uniNombre; ?><br>
                                    <?php } ?>
                                    <input type="text" name="uniOtro" placeholder="Introducir Otro Equipo"><br>
                                </td>
                                <td  style=" vertical-align: top; width: 150px">
                                    <div id="titleUniformes" class="title" style="margin-left:0px !important">
                                        Aplica para cargos de:<br>
                                        - Auxiliar de aseo<br>
                                        - Secretarias<br>
                                        - Estafetas<br>
                                        - Tens
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php IF($this->session->userdata('perfil') === '3' || $this->session->userdata('perfil') === '2'){ ?>
                    <div class="col-lg-12"><hr></div>
                    <div class="col-lg-12" ><br>
                        <div class="col-lg-3 titulo">
                            <label>Departamento de Finanzas</label> <br>
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Rango Sueldo</label> 
                    </div>
                    <div class='col-lg-4'>
                        <input  type="text"name="sueldo" id="sueldo" placeholder="Ingrese rango de sueldo" value="<?php IF(!empty($contratacion->conSueldo))echo $contratacion->conSueldo; ?>">
                    </div>
                    <div class="col-lg-1">
                            <img class="icon" src="<?php echo base_url();?>../assets/img/icons/signo.png" id="iconSueldo"/>
                    </div>
                    <?php } ELSE { ?>
                    <div class="col-lg-12"><hr></div>
                    <div class="col-lg-12" ><br>
                        <div class="col-lg-3 titulo">
                            <label>Departamento de Finanzas</label> <br>
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Rango Sueldo</label> 
                    </div>
                    <div class='col-lg-6'>
                        <input  type="text" readonly="true" placeholder="Ingrese rango de sueldo" value="<?php IF(!empty($contratacion->conSueldo))echo $contratacion->conSueldo; ?>">
                    </div>
                    <?php } ?>
                    <?php IF($this->session->userdata('perfil') === '3' || $this->session->userdata('perfil') === '4'){ ?>
                    <div class="col-lg-12"><hr></div>
                    <div class="col-lg-12" ><br>
                        <div class="col-lg-4 titulo">
                            <label>Departamento de Desarrollo Organizacional</label> <br>
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Seleccionado</label> 
                    </div>
                    <div class='col-lg-4'>
                        <input  type="text"name="seleccionado" placeholder="Ingrese Nombre" value="<?php IF(!empty($contratacion->conNombre))echo $contratacion->conNombre; ?>">
                    </div>
                    <div class="col-lg-12"></div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <label>Fecha de Ingreso</label> 
                    </div>
                    <div class='col-lg-4'>
                        <div class="input-group input-group-sm date datepicker" required data-date="<?php //echo (new DateTime())->format('Y-m-d H:i:s') ?>" data-date-format="yyyy-mm-dd">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control"  placeholder="día-mes-año" style=" width: 158px !important" name="fechaIngreso" minlength="10" maxlength="10" title="Ingrese una fecha valida" value="<?php IF(!empty($contratacion->conFechaIngreso)) {$fechaIngreso = new datetime($contratacion->conFechaIngreso); $fechaIngreso = $fechaIngreso->format('d-m-Y'); echo $fechaIngreso; }  ?>" >
                        </div>
                    </div>
                    <?php } ?>
                    <?php IF($this->session->userdata('perfil') === '3' || $this->session->userdata('perfil') === '4'){ ?>
                    <div class="col-lg-12"><hr></div>
                    <div class="col-lg-12" ><br>
                        <div class="col-lg-3 titulo">
                            <label>Departamento de RRHH</label> <br>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    
                    <div class="col-lg-10">
                        <table>
                            <tr>
                                <td style="width:300px"><label>Recepción Documentación</label></td>
                                <td style="width:50px"></td>
                                <td style="width:300px"><label>Proceso de Inducción, Seguridad y Calidad</label></td>
                            </tr>
                            <tr>
                                <td style=" vertical-align: top">
                                    <?php FOREACH($documento as $doc){ ?>
                                            <?php 
                                                $estado = '';
                                                IF(!empty($contratacion_documentacion)){
                                                    FOREACH($contratacion_documentacion as $conDoc){
                                                        IF($doc->docId===$conDoc->docConDocumentacion){
                                                            IF($conDoc->docConEstado === '1'){$estado='checked';}
                                                        }
                                                    } 
                                                }
                                            ?>
                                    <input type="checkbox" name="<?php echo 'doc'.$doc->docId; ?>" <?php echo $estado; ?>> <?php echo $doc->docNombre; ?><br>
                                    <?php } ?>
                                    <?php IF(!empty($contratacion->conFechaIngreso) && $contratacion->conModalidad==='2'){ ?>
                                        <?php 
                                            $fechaIngreso = $contratacion->conFechaIngreso;
                                            $fechaHonorario = strtotime ( '+1 month' , strtotime ( $fechaIngreso ) ) ;$fechaHonorario =  date ( 'd-m-Y' , $fechaHonorario );
                                            $fechaInfefinido = strtotime ( '+1 day' , strtotime ( $fechaHonorario ) ) ;$fechaInfefinido =  date ( 'd-m-Y' , $fechaInfefinido );
                                        ?>
                                    <label>Fecha Término Honorarios</label> <?php echo $fechaHonorario;  ?> <br>
                                    <label>Fecha Inicio Contrato Indefinido</label> <?php echo $fechaInfefinido;  ?> <br>
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td style=" vertical-align: top">
                                    <?php FOREACH($seguridad as $seg){ ?>
                                    <?php 
                                                $estado = '';
                                                IF(!empty($contratacion_seguridad)){
                                                    FOREACH($contratacion_seguridad as $conSeg){
                                                        IF($seg->segId===$conSeg->segConSeguridad){
                                                            IF($conSeg->segConEstado === '1'){$estado='checked';}
                                                        }
                                                    } 
                                                }
                                            ?>
                                    <input type="checkbox" name="<?php echo 'seg'.$seg->segId; ?>" <?php echo $estado; ?>> <?php echo $seg->segNombre; ?><br>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php } ?>
                    
                    
                   
                    
                    
                    
                    
                    
               
                <div class="col-lg-12" align="center"><hr>
                    <div class="col-lg-12" style="font-size:11px;color:green">Este formulario será enviado a la Directora de UAF para solicitar su validación y aprobación, una vez validado se enviará copia al Jefe Gestión RRHH y Jefe DO.</div>
                    <?php IF(!empty($contratacion->conId) && $this->session->userdata('perfil') === '4'){ ?>
                    <a href="<?php echo base_url("do/gestion/aceptarContratacion/" . $contratacion->conId )?>"><input type="button" value="Terminar" class="btnTerminar"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                    <?php 
                    $estadoSolicitud='Enviar Solicitud';
                    IF(!empty($contratacion->conEstado)){
                        $estadoSolicitud = $contratacion->conEstado; 
                        IF($estadoSolicitud==='0')$estadoSolicitud='Enviar Solicitud a Finanzas';
                        ELSEIF($estadoSolicitud==='1')$estadoSolicitud='Validar Solicitud';
                        ELSEIF($estadoSolicitud>='2')$estadoSolicitud='Guardar';
                    }//die($estadoSolicitud.'sad');
                    ?>
                    <?php IF($this->session->userdata('perfil') === '2' && $contratacion->conEstado==='1'){ ?>
                        <?php echo form_submit('',$estadoSolicitud,'class="btn btn-primary btn-sm btnCetep"');?>
                    <?php } ELSEIF($this->session->userdata('perfil') !== '2' ){ ?>
                        <?php IF($this->session->userdata('perfil') === '3' || $this->session->userdata('perfil') === '2'){ ?>
                            <?php echo form_submit('',$estadoSolicitud,'class="btn btn-primary btn-sm btnCetep"');?>
                        <?php }ELSEIF($this->session->userdata('perfil') === '4' && $estadoSolicitud!='Validar Solicitud'){ ?>
                            <?php echo form_submit('',$estadoSolicitud,'class="btn btn-primary btn-sm btnCetep"');?>
                        <?php }ELSE IF (empty($contratacion->conId)) {?>
                            <?php echo form_submit('',$estadoSolicitud,'class="btn btn-primary btn-sm btnCetep"');?>
                        <?php } ?>
                        <?php echo form_close();?>
                        <?php IF(!empty($contratacion->conId)){ ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("do/gestion/rechazarContratacion/" . $contratacion->conId )?>"><input type="button" value="Rechazar" class="btnRechazar"></a>
                        <?php } ?>        
                    <?php } ?>
                </div>
                    <div class='col-lg-12'><br></div>
</div><!-- FIN DIV FICHA COMPLETA-->
                
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->







<script>
    //////VALIDACIONES DE TECLAS//////
        $("#vacante").keyup(function (event){
                if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("vacante").value = "";
                }
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#vacante" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("vacante").value = texto;
                event.returnValue = false;
                }
        });
        $("#horas").keyup(function (event){
                if(event.keyCode == 8 || event.keyCode == 46){
                    document.getElementById("horas").value = "";
                }
                else if (event.keyCode == 13 || event.keyCode == 110 || event.keyCode == 190 || event.keyCode == 75 || event.keyCode > 95 && event.keyCode < 106 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 111 || event.keyCode == 16 || event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode > 47 && event.keyCode < 58)
                {}
                else {
                texto = $( "#horas" ).val();
                texto = texto.substring(0,texto.length-1);
                document.getElementById("horas").value = texto;
                event.returnValue = false;
                }
        });
        
</script>
<script>
    $(".title").hide();
$(document).ready(function(){
    $("#precargar").show();
    
    
    $("#cargomostrar").mouseover(function(){
        if($("#cargo").val()==='1000') {
            $("#selectCargo").hide();
            $("#inputCargo").show();
            if($("#otroCargo").val()===''){
                $("#otroCargo").attr("disabled", false).css("box-shadow","0 0 15px red");
            }
            else {
                $("#otroCargo").attr("disabled", false).css("box-shadow","0 0 0px grey");
            }
        }
        if($("#motivo").val()==='5' || $("#motivo").val()==='6' || $("#motivo").val()==='7' || $("#motivo").val()==='8') { 
            $("#divPeriodo").show();
        }
        
    });
    
    $("#titleJefaturaMostrar").mouseover(function(){
        $(".title").hide();
        $("#titleJefatura").show();
    });
    $("#titleJefaturaMostrar").mouseleave(function(){
        $(".title").hide();
    });
    $("#titleMotivoMostrar").mouseover(function(){
        $(".title").hide();
        $("#titleMotivo").show();
    });
   // $("#titleMotivoMostrar").mouseleave(function(){
  //      $(".title").hide();
  //  });
    $("#titlePerfilMostrar").mouseover(function(){
        $(".title").hide();
        $("#titlePerfil").show();
    });
    $("#titlePerfilMostrar").mouseleave(function(){
        $(".title").hide();
    });
    $("#titleHorasMostrar").mouseover(function(){
        $(".title").hide();
        $("#titleHoras").show();
    });
    $("#titleHorasMostrar").mouseleave(function(){
        $(".title").hide();
    });
    $("#titleMaterialesMostrar").mouseover(function(){
        $(".title").hide();
        $("#titleMateriales").show();
    });
    $("#titleMaterialesMostrar").mouseleave(function(){
        $(".title").hide();
    });
    $("#titleUniformesMostrar").mouseover(function(){
        $(".title").hide();
        $("#titleUniformes").show();
    });
    $("#titleUniformesMostrar").mouseleave(function(){
        $(".title").hide();
    });
});
</script>

<script>
$(".icon").hide();
$("#inputCargo").hide();
$("#divPeriodo").hide();

$("#form").submit(function () { 
    $(".icon").hide();
    if($("#costo").val()==='0') {   $("#iconCosto").show();  }
    if($("#modalidad").val()==='0') {   $("#iconModalidad").show();   }
     if($("#unidad").val()==='0') {   $("#iconUnidad").show();  }
     if($("#cargo").val()==='0') {   $("#iconCargo").show();    }
     if($("#jefatura").val()==='0') {   $("#iconJefatura").show();   }
     if($("#motivo").val()==='0') {   $("#iconMotivo").show();   }
     if($('input:radio[name=empresa]:checked').val()===undefined) {  $("#iconEmpresa").show();    }
     if($('input:radio[name=perfil]:checked').val()===undefined) {  $("#iconPerfil").show();    }
     if($("#motivo").val()==='5' || $("#motivo").val()==='6' || $("#motivo").val()==='7' || $("#motivo").val()==='8') { 
            if($("#periodo").val()===''){$("#iconPeriodo").show();}
            if($("#colaborador").val()==='0'){$("#iconColaborador").show();}
            if($("#periodo").val()===''){window.scrollTo(0,0);return false; }
            if($("#colaborador").val()==='0'){window.scrollTo(0,0);return false;}
    }
    if($("#cargo").val()==='1000') {
          if($("#otroCargo").val()===''){
            window.scrollTo(0,0);return false;
        }
    }
    
    if($('input:radio[name=empresa]:checked').val()===undefined || $('input:radio[name=perfil]:checked').val()===undefined || $("#costo").val()==='0' || $("#unidad").val()==='0'  || $("#cargo").val()==='0'  || $("#jefatura").val()==='0'  || $("#motivo").val()==='0'  || $("#modalidad").val()==='0'){
        window.scrollTo(0,0);return false;
    }
    if($("#perfil").val()==='3' || $("#perfil").val()==='2'){
        if($("#sueldo").val()===''){$("#iconSueldo").show();window.scrollTo(0,750);return false;}
    }
});
</script>
