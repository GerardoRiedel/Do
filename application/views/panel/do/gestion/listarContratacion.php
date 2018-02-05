<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25; background-color: #e9c899">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?>
        <div align="right" style="margin-top:-20px">
                <span><a class="tip-bottom" title="Cerrar" href="<?php echo base_url("do/gestion/index/")?>"><i class="fa fa-times-circle" aria-hidden="true" style="color:red"></i></a></span>
        </div>
        </h1>
    </div>
    
     

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">  
        
        </div>
            <div class="col-xs-12"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
                
                
                <div  class="col-lg-12" style="overflow: auto;">
                    <?php //die(var_dump($contratacion)); ?>
                <table class='table table-bordered table-hover table-striped data-table'>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha Registro</th>
                                <th>Fecha Ingreso Requerida</th>
                                <th>Empresa</th>
                                <th>Unidad</th>
                                <th>Cargo</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                                
                                <th>Gestion</th>
                                <th>Rechazar</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($contratacion as $item) : ?>
                                <?php 
                                    $area = '';
                                    IF(!empty($unidad)){;
                                        FOREACH($unidad as $uni){
                                            IF($uni->id===$item->conUnidad){
                                                $area = $uni->descripcion;
                                            }
                                        } 
                                    }
                                   
                                    IF($item->conEstado === '1')$color = 'green'; 
                                    ELSEIF($item->conEstado === '2')$color = 'red'; 
                                    ELSEIF($item->conEstado === '4')$color = 'red'; 
                                    ELSEIF($item->conEstado === '6')$color = 'red'; 
                                    ELSE $color = 'grey'; 
                                    $color = '#6a6968';
                                    
                                    IF($item->conEmpresa==='1')$empresa = 'Cetep';
                                    ELSEIF($item->conEmpresa==='2')$empresa = 'MirAndes';
                                    
                                    $estadoNombre = $item->estNombre;
                                ?>
                            <tr>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php echo $item->conId; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php $date = new DateTime($item->conFechaRegistro);echo $date->format('d-m-Y');//echo $item->id; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php $date = new DateTime($item->conFechaIngRequerida);echo $date->format('d-m-Y');//echo $item->id; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php echo $empresa; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php echo $area; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php echo $item->carNombre; IF($item->conCargo==='1000')echo $item->conCargoOtro; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px"><?php echo $item->motNombre; ?></td>
                                <td style="color:<?php echo $color; ?>;font-size:12px" align="center"><?php echo $estadoNombre; ?></td>
                                <td align="center">
                                    <?php  IF($item->conEstado !== '5' && $item->conEstado !== '4'){ ?>
                                        <a class="tip-bottom" title="Gestionar" href="<?php echo base_url("do/gestion/cargarContratacion/" . $item->conId )?>"><i class="fas fa-exchange-alt" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <?php } ?>
                                        <a class="tip-bottom" title="Imprimir" href="<?php echo base_url("do/gestion/imprimirContratacion/" . $item->conId )?>"><i class="fa fa-print" aria-hidden="true" style="color:green"></i></a>
                                </td>
                                <td align="center">
                                    <?php IF($item->conEstado !== '5' && $item->conEstado !== '4'){ ?>
                                    <a class="tip-bottom" title="Rechazar" href="<?php echo base_url("do/gestion/rechazarContratacion/" . $item->conId )?>"><i class="fa fa-ban" aria-hidden="true" style="color:red"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-lg-2">
                    <!--
                    <button onclick="goBack()" class="btn btn-default btn-sm">Cancelar</button><script>function goBack(){window.history.go(-1);}</script>
                -->
                </div>
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>

    
<script src="<?php echo base_url(); ?>../assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>../assets/js/hs.tables.js"></script>


