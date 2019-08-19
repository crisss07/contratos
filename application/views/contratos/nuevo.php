<style type="text/css">
  input[type="radio"] {
      -ms-transform: scale(1.5); /* IE 9 */
      -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
      transform: scale(1.5);
      padding-right: 10px;
  }
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($tipo=='reg'){
  $fTit='Crear Contrato';
  $fSpa='';
  $tip='';
  $cat='';
  $af='';
  $em='';
  if(isset($id) && $id!=''){
    $fTit='Crear Ampliación';
    foreach ($boleta as $row) {
      $tip=$row->tipo;
      $cat=$row->categoria;
      $af=$row->afianzado;
      $em=$row->empresa;
    }    
  }
}
if ($tipo=='upd'){
  $fTit='Editar Boleta';
  if ($vigencia!='no') {
    foreach($boleta as $row){
      if($row->fin!='')
          $dif = $row->dif2;
      else
        $dif = $row->dif1;
      if($row->estado!=2){
        if($dif<=15){
          if( $dif>10)
            $fSpa = '<span style="font-size:14px;" class="label bg-blue">'.$dif.' dias</span>';
          else{
            if ($dif>5) 
              $fSpa = '<span style="font-size:14px;" class="label bg-yellow">'.$dif.' dias</span>';
            else{
              if($dif>=0)
                $fSpa = '<span style="font-size:14px;" class="label bg-red">'.$dif.' dias</span>';
              else
                $fSpa = '<span style="font-size:14px;" class="label bg-black">'.$dif.' dias</span>';
            }
          }
        }
        else{
          $fSpa = '<span style="font-size:14px;" class="label bg-green">'.$dif.' dias</span>';
        }
      }
      else
        $fSpa = '<span style="font-size:14px;" class="label bg-green">Liberado</span>';
    }
  }
  else{
   $fTit='Editar Ampliación'; 
   $fSpa=''; 
  }
  foreach ($boleta as $res) {
    if($res->respaldo!=''){
      $fSpa .= '<a class="btn btn-social btn-success" style="float:right;" href="'.base_url('assets/respaldo/'.$res->respaldo).'" target="_blank"><i class="fa fa-file-pdf-o"></i> Descargar Respaldo</a>';
    }
    else{
      $fSpa .= '<a class="btn btn-social btn-danger" style="float:right;" href="javascript:;"><i class="fa fa-file-pdf-o"></i> Sin Respaldo</a>';
    }
  }
}if ($tipo=='regU'){
  $fTit='Crear Usuario';
  $fSpa='';
}
if ($tipo=='updU'){
  $fTit='Actualizar Usuario';
  $fSpa='';
}
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $fTit.' '.$fSpa;?>
    </h1>
  </section>
<?php if($tipo=='reg'){?>
  <!-- Main content -->
  <section class="content">
    <?php $att = array('id' => 'formBR','class'=>'','autocomplete'=>'off','enctype'=>'multipart/form-data'); echo form_open('contratos/guarda_contrato',$att); ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Datos generales</h3>
            </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <!-- <label for="exampleInputPassword1">Boleta:</label> -->
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Contrato</label>
                            <select id="tipo" name="tipo" class="form-control" required>
                              <option value="">Selecciona Tipo</option>
                              <option value="Consultoria">Consultoria</option>
                              <option value="Bienes y Servicios">Bienes y Servicios</option>
                              <option value="Supervision">Supervision</option>
                              <option value="Ejecucion">Ejecucion</option>
                              <option value="Otro">Otros</option>
                            </select>
                          </div>
                        </div>
                        <!-- <div class="col-sm-6">
                          <div class="form-group">
                            <label>Categoria</label>
                            <select id="cat" name="cat" class="form-control" required <?php //if($cat!=''){echo 'disabled';}?>>
                              <option disabled <?php //if($cat==''){echo 'selected';}?>>Selecciona Categoria</option>
                              <option value="Cumplimiento de Contrato" <?php //if($cat=='Cumplimiento de Contrato'){echo 'selected';}?>>Cumplimiento de Contrato</option>
                              <option value="Seriedad de Propuesta" <?php //if($cat=='Seriedad de Propuesta'){echo 'selected';}?>>Seriedad de Propuesta</option>
                              <option value="Correcta Inversion de Anticipo" <?php //if($cat=='Correcta Inversion de Anticipo'){echo 'selected';}?>>Correcta Inversion de Anticipo</option>
                            </select>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="afi">Beneficiario:</label>
                      <input <?php if($af!=''){?>readonly<?php }?> type="text" class="form-control" id="afi" name="afi" placeholder="Ingresar a cuenta de" required value="<?php echo $af;?>">
                    </div>
                    <div class="form-group">
                      <label for="emp">Contratante:</label>
                      <input <?php if($em!=''){?>readonly<?php }?> type="text" class="form-control" id="emp" name="emp" value="MINISTERIO DE OBRAS PUBLICAS, SERVICIOS Y VIVIENDA" required value="<?php echo $em;?>">
                    </div>    
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Fuente de financiamiento:</label>
                    <div class="form-group">
                      <!-- <input type="text" class="form-control" id="enf" name="enf" placeholder="Entidad Financiera" required> -->
                      <input type="radio" name="fuente" value="BID" checked>&nbsp;BID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="fuente" value="CTR">&nbsp;TGN
                    </div>

                    <label for="exampleInputPassword1">Numero de Contrato:</label>
                    <div class="form-group">
                      <input type="text" class="form-control" id="npl" name="npl" placeholder="Codigo" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Monto:</label>
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="bs" name="bs" placeholder="Monto" required>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <select id="moneda" name="moneda" class="form-control" required>
                              <option disabled selected>Selecciona Moneda</option>
                              <option value="BS">BS</option>
                              <option value="USD">USD</option>
                              <option value="EUR">EUR</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
					    <label>Respaldo PDF:</label>
					    <input type="file" accept="application/pdf" size="5" class="form-control" id="res" name="res" placeholder="Agregar Respaldo">
					</div>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detalles</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Objeto:</label>
                      <input type="text" class="form-control" id="obj" name="obj" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Supervision:</label>
                      <input type="text" class="form-control" id="super" name="super" >
                    </div>
                    
                  </div>
                  
              </div>    
            </div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Vigencia</h3>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Inicio: </label>
                        <input type="date" class="form-control" id="obj" name="ini" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fin: </label>
                      <input type="date" class="form-control" id="super" name="fin" required>
                    </div>
                  </div>  
                </div>

              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <?php if(isset($id) && $id!=''){$vid=$id;}else{$vid='no';}?>
      <input type="text" id="id" name="id" hidden="" value="<?php echo$vid;?>" required>
    <?php echo form_close(); ?>
    <!-- /.row -->
  </section>
<?php }?>
    
</div>