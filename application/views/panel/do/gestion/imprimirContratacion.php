<script type="text/javascript">
    window.document.write('<style>'+
                '.cabeceraVerde{font-size: 100%;font-family: Arial; color:green !important } '+
                '.cabeceraAzul{font-size: 100%;font-family: Arial; color:blue !important } '+
                '</style>');
        
window.print();window.close();window.history.go(-1);
</script>
<style>
                td{border:none; font-size:13px; height:20px} 
                body{font-size: 100%;font-family: Arial;} 
</style>


<div id="imprimir" style="display: true;margin-top:-130px; overflow: hidden; height: 1500px" >
    <?php
            $fecha = new DateTime($contratacion->conFechaRegistro);$fecha = $fecha->format('d-m-Y');
            IF($contratacion->conEmpresa==='2')$empresa = 'MirAndes';
            ELSEIF($contratacion->conEmpresa==='3')$empresa = 'Otec';
            ELSE $empresa = 'Cetep';
            $area = $costos = $jefaturas = '';
            IF(!empty($unidad)){;
                FOREACH($unidad as $uni){
                    IF($uni->id===$contratacion->conUnidad){
                        $area = $uni->descripcion;
                    }
                } 
            }
            IF(!empty($costo)){;
                FOREACH($costo as $cos){
                    IF($cos->id===$contratacion->conCosto){
                        $costos = $cos->descripcion;
                    }
                } 
                $costos = str_replace('Ã³', 'ó', $costos); $costos = str_replace('Ã­', 'í', $costos); $costos = str_replace('Ã±', 'ñ', $costos); 
            }
            IF(!empty($jefatura)){;
                FOREACH($jefatura as $jef){
                    IF($jef->idcolaborador===$contratacion->conJefatura){
                        $jefaturas = $jef->nombre.' '.$jef->apellidoPaterno.' '.$jef->apellidoMaterno;
                    }
                } 
            }
            $perfil = $contratacion->conPerfil; IF($perfil === '1')$perfil = 'Si'; ELSE $perfil = 'No';
            $critico = $contratacion->conCritico; IF($critico === '1')$critico = 'Si'; ELSE $critico = 'No';
            $proceso = $contratacion->conProceso; IF($proceso === '1')$proceso = 'Publico'; ELSE $proceso = 'Confidencial';
            $fechaIngRequerida = new DateTime($contratacion->conFechaIngRequerida);$fechaIngRequerida = $fechaIngRequerida->format('d-m-Y');
            $sueldo= $contratacion->conSueldo;IF($sueldo === '0')$sueldo = '';
            $seleccionado= $contratacion->conSeleccionado;IF($seleccionado === '0')$seleccionado = '';
            $nombreCargo = $contratacion->carNombre;
            IF(empty($nombreCargo)&&!empty($contratacion->conCargoOtro))$nombreCargo = $contratacion->conCargoOtro;
            foreach($colaboradores as $col){
            IF(!empty($contratacion->conColaborador) && $contratacion->conColaborador === $col->idcolaborador) {$colaborador= strtoupper($col->apellidoPaterno).' '.strtoupper($col->apellidoMaterno).' '.strtoupper($col->nombre);} ELSE {$colaborador='';}
            }
                                   
$resumen="
    <div align='center' style='vertical-align: top;height:1200px'>
        <table style='border-style: double;border-bottom: none;width:700px;'>
            <tr>
                <td rowspan='2' style='width:500px'><br>";
IF($empresa === 'MirAndes'){$resumen.="<img style='width: 20%; ' src='".base_url()."../assets/img/MirandesTrans.png' >";}
ELSEIF($empresa === 'Otec'){$resumen.="<img style='width: 20%; ' src='".base_url()."../assets/img/logo impulsa.png' >";}
ELSE{$resumen.="<img style='width: 20%; ' src='".base_url()."../assets/img/logo_vertical_cetep.png' >";}
$resumen.="
                </td>
                <td style='width:200px' align='left'>N° de Solicitud <span style='font-size:13px'><b>".$contratacion->conId."</b></span></td>
            </tr>
            <tr>
                <td align='left' >Fecha de Solicitud <span style='font-size:13px'>".$fecha."</span></td>
            </tr>
        </table>
        
        <table style='border-style: double;border-top: none;width:700px'>
            <tr>
                <td colspan='3' align='center'><u><b><h4>Formulario de Solicitud de Contratación o Prestación de Servicios</h4></b></u></td>
            </tr>
            <tr>
                <td style='width:20px'></td>
                <td style='width:200px;' ><b><span class='cabeceraVerde'>Cargo</span></b></td>
                <td>".$nombreCargo."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>N° de Vacantes</span></b></td>
                <td>".$contratacion->conVacante."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Empresa</span></b></td>
                <td>".$empresa."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Unidad</span></b></td>
                <td>".$area."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Centro de Costos</span></b></td>
                <td>".$costos."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Jefatura Directa</span></b></td>
                <td>".$jefaturas."</td>
            </tr>
           <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Motivo Solicitud</span></b></td>
                <td>".$contratacion->motNombre."</td>
            </tr>";
IF($contratacion->conMotivo >= '5' && $contratacion->conMotivo <= '8'){
$resumen.="<tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Periodo de reemplazo</span></b></td>
                <td>".$contratacion->conPeriodo."</td>
            </tr>";
}
$resumen.="            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Colaborador a reemplazar</span></b></td>
                <td>".$colaborador."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Perfil de Cargo (Descriptor)</span></b></td>
                <td>".$perfil."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Horas Semanales</span></b></td>
                <td>".$contratacion->conHoras." horas</td>
            </tr>";


/*$resumen.=" 
            <tr>
                <td></td>
                <td><b>Cargo Critico</b></td>
                <td>".$critico."</td>
            </tr>
            <tr>
                <td></td>
                <td><b>Tipo de Proceso</b></td>
                <td>".$proceso."</td>
            </tr>
            <tr>
                <td></td>
                <td><b>Fecha de Ingreso Requerida</b></td>
                <td>".$fechaIngRequerida."</td>
            </tr>";
 * */

$resumen.=" <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Jornada</span></b></td>
                <td>".$contratacion->conJornada."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Modalidad Requerida</span></b></td>
                <td>".$contratacion->modNombre."</td>
            </tr>
            <tr>
                <td></td>
                <td><b><span class='cabeceraVerde'>Observaciones, experiencia requerida u otro requisito</span></b></td>
                <td>".$contratacion->conObservacion."</td>
            </tr>
            <tr>
                <td><br></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            <td colspan='3'>
            <div align='center'>
                <table>
                            <tr>
                                <td style='width:50px'></td>
                                <td style='width:260px' align='center'><label><span class='cabeceraVerde'>Materiales Requeridos</span></label></td>
                                <td style='width:50px'></td>
                                <td style='width:240px' align='center'><label><span class='cabeceraVerde'>Entrega de Uniforme</span></label></td>
                                <td style='width:50px'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style='vertical-align: top'>";
                                    FOREACH($material as $mat){ 
                                            
                                                $estado = 'No';
                                                IF(!empty($contratacion_material)){
                                                    FOREACH($contratacion_material as $conMat){
                                                        IF($mat->matId===$conMat->matConMaterial){
                                                            IF($conMat->matConEstado === '1'){$estado='Si';}
                                                        }
                                                    } 
                                                }
                                            
$resumen.= $estado." - ".$mat->matNombre."<br>";
                                     } 
$resumen.=$contratacion->conMatOtro."<br><br></td><td></td><td  style='vertical-align: top'>";
                                    FOREACH($uniforme as $uni){ 
                                   
                                                $estado = 'No';
                                                IF(!empty($contratacion_uniforme)){
                                                    FOREACH($contratacion_uniforme as $conUni){
                                                        IF($uni->uniId===$conUni->uniConUniforme){
                                                            IF($conUni->uniConEstado === '1'){$estado='Si';}
                                                        }
                                                    } 
                                                }
                                            
$resumen.= $estado." - ".$uni->uniNombre."<br>";
                                     } 
$resumen.=$contratacion->conUniOtro."<br><br></td><td></td></tr>"
        . "</table>"
        ."</div>"
        . "</td></tr>";
$resumen.= "<tr><td colspan='3' align='center'><b><u><span class='cabeceraAzul'>V°B° UAF<span class='cabeceraVerde'></u></b><br></td></tr>";
$resumen.= "<tr><td></td><td><b><span class='cabeceraVerde'>Rango de Sueldo UAF</span></b></td><td>".$sueldo."</td></tr>";
$resumen.= "<tr><td></td><td><b>Seleccionado</b></td><td>".$seleccionado."</td></tr>";
$resumen.= "<tr><td></td><td><b>Fecha de Ingreso</b></td><td>".$contratacion->conFechaIngreso."</td></tr>";
$resumen.= "<tr><td></td><td><br></td><td></td></tr>"
        . "</table><div align='right' style='margin-right:40px'><br>Solicitud N°".$contratacion->conId." pág 1/2</div>";
$resumen.= "<div style='page-break-before: always;height:900px'><table style='border-style: double;width:700px;'>"
        . "<tr><td colspan='3' align='center'><b><u><br><span class='cabeceraAzul'>USO INTERNO RRHH</span></u></b><br></td></tr>";        
$resumen.= "<tr>
            <td colspan='3'>
            <div align='center'>
                <table>
                            <tr>
                                <td style='width:50px'></td>
                                <td style='width:250px' align='center'><label><span class='cabeceraVerde'>Recepción Documentación</span></label></td>
                                <td style='width:50px'></td>
                                <td style='width:250px' align='center'><label><span class='cabeceraVerde'>Inducción, seguridad y calidad</span></label></td>
                                <td style='width:50px'></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  style='vertical-align: top'>";
                                    FOREACH($documentacion as $doc){ 
                                                $estado = 'No';
                                                IF(!empty($contratacion_documentacion)){
                                                    FOREACH($contratacion_documentacion as $conDoc){
                                                        IF($doc->docId===$conDoc->docConDocumentacion){
                                                            IF($conDoc->docConEstado === '1'){$estado='Si';}
                                                        }
                                                    } 
                                                }
                                            
$resumen.= $estado." - ".$doc->docNombre."<br>";
                                     } 
$resumen.="<br><br></td><td></td><td  style='vertical-align: top'>";
                                    FOREACH($seguridad as $seg){ 
                                                $estado = 'No';
                                                IF(!empty($contratacion_seguridad)){
                                                    FOREACH($contratacion_seguridad as $conSeg){
                                                        IF($seg->segId===$conSeg->segConSeguridad){
                                                            IF($conSeg->segConEstado === '1'){$estado='Si';}
                                                        }
                                                    } 
                                                }
                                            
$resumen.= $estado." - ".$seg->segNombre."<br>";
                                     } 
$resumen.= "<br><br></td><td></td></tr>";
$resumen.= "</table></div></div></td></tr>";    
$resumen.= "</table><div align='right' style='margin-right:40px'><br><br><br><br><br><br><br><br><br>Solicitud N°".$contratacion->conId." pág 2/2</div><br></div><br>";
echo $resumen;
?>
    
</div>



