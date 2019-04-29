
<div class="content-wrapper">
  <section class="content">
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $cant->total; ?></h3>
              <p>Registrado</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('detalle/listado/4');?>" class="small-box-footer">Ver Listado <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>0</h3>
              <p>Concluye en 15 Dias</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('detalle/listado/1');?>" class="small-box-footer">Ver Listado <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Concluye en 10 Dias</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('detalle/listado/2');?>" class="small-box-footer">Ver Listado <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>concluye en 5 Dias</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('detalle/listado/3');?>" class="small-box-footer">Ver Listado <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-light-blue">
            <div class="inner">
              <h3>0</h3>

              <p>Concluida</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url('detalle/listado/5');?>" class="small-box-footer">Ver Listado <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
     
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de contratos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display responsive" width="100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Beneficiario</th>
                  <th>Empresa</th>
                  <th>Fuente</th>
                  <th>nro contrato</th>
                  <th>Moneda</th>
                  <th>Monto</th>
                  <th>Objeto</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Total Adendas</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                   <?php $i=1;?>
                 <?php foreach ($contrato as $row) {?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->tipo;?></td>
                    <td><?php echo $row->beneficiario;?></td>
                    <td><?php echo $row->empresa;?></td>
                    <td><?php echo $row->ent_financiera;?></td>
                    <td><?php echo $row->no_contrato;?></td>
                    <td><?php echo $row->moneda;?></td>
                    <td><?php echo $row->monto;?></td>
                    <td><?php echo $row->objeto;?></td>
                    <td><?php echo $row->inicio;?></td>       
                    <td><?php echo $row->fin;?></td>    
                    <td>5</td>           
                    <td>
                      <a href="<?php echo base_url('detalle_cont/contrato/').$row->id;?>"><span class="badge bg-light-green"><i class="fa fa-search"></i></span></a>                    
                      <a href="<?php echo base_url('boleta/formulario/').$row->id;?>"><span class="badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                      <a href="<?php echo base_url('detalle_cont/adenda/').$row->id;?>"><span class="badge bg-light-green"><i class="fa fa-search"></i> Listado de Adendas</span></a>
                      <a href="<?php echo base_url('adenda/nuevo');?>/<?php echo $row->id;?>"><span class="badge bg-green"><i class="fa fa-plus"></i> Agregar Adenda</span></a>
                      <span class="badge bg-red eliminar2" data-id="<?php echo base_url('boleta/del_boleta/').$row->id;?>"><i class="fa fa-trash"></i></span>
                    
                    </td>
                  </tr>
                 
                <?php }?>  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar Registro</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <p>Elimniar registro??</p>
                <input type="text" id="id_vue" name="id_vue" hidden="" value="" required>
                <input type="text" id="id_bue" name="id_bue" hidden="" value="" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
          <a id="delB" href="" class="btn btn-outline">Eliminar</a>
        </div>
      </div>
      <!-- /.modal-content -->
  </div>
</div>
<div class="modal modal-success fade" id="modal-liberar">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&&times;</span></button>
          <h4 class="modal-title">Liberar Registro</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <p>Liberar registro??</p>
                <input type="text" id="id_vue" name="id_vue" hidden="" value="" required>
                <input type="text" id="id_bue" name="id_bue" hidden="" value="" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
          <a id="libB" href="" class="btn btn-outline">Liberar</a>
        </div>
      </div>
      <!-- /.modal-content -->
  </div>
</div>