<?php //error_reporting(E_ALL ^ E_NOTICE); ?>

<style>
    .titulo{
        color: #a15ebe;
    }
    .in{
        max-width: 150px
    }
    
    .icon{
            width: 40%;
            padding-top: 5%;
            padding-left: 5%;
    }
    .iconCom{
            width: 35%;
            padding-top: 6%;
            margin-left: -69px;
    }
   
    

    
</style>
<div id="content" style="-webkit-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
-moz-box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);
box-shadow: -2px 2px 41px 2px rgba(0,0,0,0.75);z-index: 25 ">
    <div id="content-header" style="background-color: #e9c899; max-height: 10px !important" >
        <h1 style="background-color: #a15ebe !important;border:none;color:#ffffff; margin-right: 30px;-webkit-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);-moz-box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);box-shadow: 10px 10px 23px -6px rgba(0,0,0,0.75);" class="alert alert-info"><?php echo $title;?></h1>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                

			
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container" >
            <?php $attributes = array('id' => 'form');
            //die(var_dump($datos));
                echo form_open('do/mantenedores/guardarCargo',$attributes);
            ?>
                            
            <div class='widget-content'>
                
                <br>
                    <input type="hidden" value="<?php IF(!empty($datos->carId))echo $datos->carId;?>" name="id">
                

                    
            <!-- DATOS DE PERSONALES-->               
                    <div class="col-lg-12" style=" margin-top: 10px">
                    <label class="titulo">Datos de Cargo</label>
                    </div>
                    <div class="col-lg-2">
                        <label>Identificador</label>
                    </div>
                    <div class='col-lg-3'>
                        <input type="text" placeholder="Identificador" readonly="true" value="<?php IF(!empty($datos->carId))echo $datos->carId;?>">
                    </div>
                    
                    <div class="col-lg-2">
                        <label>Nombre</label>
                    </div>
                    <div class='col-lg-3'>
                        <input type="text" name="nombre" placeholder="Ingrese Nombre" minlength="4" required value="<?php IF(!empty($datos->carNombre))echo $datos->carNombre; ?>">
                    </div>
                    
                    
                    
            <div class="col-lg-12" align="center"><br>
                        <?php echo form_submit('','Guardar','class="btn btn-primary btn-sm btnCetep"');?>
                    </div>
                 
                    
            <?php echo form_close();?>
                
               
        </div><!-- div class='widget-content'-->    
                    
                
                
            </div><!-- div class="col-xs-12" -->
        </div><!-- row -->
   </div>
</div><!-- content -->
</div>
