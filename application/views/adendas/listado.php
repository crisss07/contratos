
<div class="content-wrapper">
  <section class="content">
    
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de adendas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display responsive" width="100%">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo Adenda</th>
                  <th>Beneficiario</th>
                  <th>Empresa</th>
                  <th>Fuente</th>
                  <th>nro contrato</th>
                  <th>Moneda</th>
                  <th>Monto</th>
                  <th>Objeto</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Adjunto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                   <?php $i=1;?>
                 <?php foreach ($detalle_adenda as $row) {?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->categoria;?></td>
                    <td><?php echo $row->beneficiario;?></td>
                    <td><?php echo $row->empresa;?></td>
                    <td><?php echo $row->ent_financiera;?></td>
                    <td><?php echo $row->no_contrato;?></td>
                    <td><?php echo $row->moneda;?></td>
                    <td><?php echo $row->monto;?></td>
                    <td><?php echo $row->objeto;?></td>
                    <td><?php echo $row->inicio;?></td>       
                    <td><?php echo $row->fin;?></td>    
                    <td>
                      <?php if ($row->respaldo): ?>
                        SI
                      <?php else: ?>
                        NO
                      <?php endif ?>
                    </td>    
                    <td>
                      <span class="badge bg-red" onclick="elimina_adenda(<?php echo $row->id_adenda; ?>,<?php echo $row->id_contrato; ?>)" title="Elimina adenda"><i class="fa fa-times"></i> Eliminar</span>
                    </td>    
                  </tr>
                <?php }?>  
                </tbody>
              </table>
               <a class="btn btn-success" href="<?php echo site_url('inicio'); ?>" align="right">Volver</a>
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
<script type="text/javascript">
  var id_contrato;
  function elimina_adenda(id_adenda, id_contrato){
    if(confirm('Desea eliminar el adenda ?')==true){
      url = "<?php echo base_url('/adenda/elimina_adenda/');?>"+id_adenda+'/'+id_contrato;
      // console.log(url);
      // window.location(url);
      window.location.replace(url);
    }
  }
</script>