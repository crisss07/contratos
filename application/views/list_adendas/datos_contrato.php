
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detalle del Contrato <a class="btn btn-success" href="<?php echo site_url('inicio'); ?>" align="right">Volver</a>
      
    </h1>
    <ol class="breadcrumb">
      <li><a id="print" class="btn btn-success" style="color: #fff;font-weight: bold; margin: 5px;" href="#" onclick="window.print();"><i class="fa fa-print"></i> Imprimir</a></li>
    </ol>
  </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <div class="row">
               
                <div class="col-xs-6">
                    <div class="box-header">
                      <h3 class="box-title">Datos Generales</h3>
                    </div>
                    <div class="box-body">
                      <dl class="dl-horizontal">
                        <dt>Entidad</dt>
                        <dd><?php echo $d_contrato->empresa;?></dd>
                        <dt>Tipo</dt>
                        <dd><?php echo $d_contrato->tipo;?></dd>
                        <dt>Beneficiario</dt>
                        <dd><?php echo $d_contrato->beneficiario;?></dd>
                        <dt>A nombre de</dt>
                        <dd><?php echo $d_contrato->tipo;?></dd>
                      </dl>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box-header">
                      <h3 class="box-title"></h3>
                    </div>
                    <div class="box-body">
                      <dl class="dl-horizontal">
                        <dt>Fuente</dt>
                        <dd><?php echo $d_contrato->ent_financiera;?></dd>
                        <dt>Número de Contrato</dt>
                        <dd><?php echo $d_contrato->no_contrato;?></dd>
                        <dt>Monto</dt>
                        <dd><?php echo $d_contrato->monto.' '.$d_contrato->moneda;?></dd>
                        <dt>Fecha Inicio</dt>
                        <dd><?php echo $d_contrato->inicio;?></dd>
                        <dt>Fecha Fin</dt>
                        <dd><?php echo $d_contrato->fin;?></dd>
                      </dl>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="box-header">
                    <h3 class="box-title">Detalle</h3>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="box-body">
                      <dl class="dl-horizontal">
                        <dt>Objeto</dt>
                        <dd><?php echo $d_contrato->objeto;?></dd>
                      </dl>
                  </div>
                </div>
                
              </div>
        
            
            
              <div class="row">
                <div class="col-xs-12">
                  <div class="datos">
                    <p><strong>Eladorado por </strong><?php echo $this->session->userdata('user')?></p>
                    <p><strong>Fecha </strong><?php echo date('d/m/Y H:s')?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
