
<div class="content-wrapper">
  <section class="content">
     
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
                  <th>Fuente</th>                  
                  <th>Moneda</th>
                  <th>Monto</th>
                  <th>Objeto</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>nro contrato</th>
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
                    <td><?php echo $row->ent_financiera;?></td>                    
                    <td><?php echo $row->moneda;?></td>
                    <td><?php echo $row->monto;?></td>
                    <td><?php echo $row->objeto;?></td>
                    <td><?php echo $row->inicio;?></td>       
                    <td><?php echo $row->fin;?></td>
                    <td>
                      <a href="<?php echo base_url('assets/respaldo/').$row->respaldo;?>" target="_blank"><span class="badge bg-green"><i class=""><?php echo $row->no_contrato; ?></i></span></a>
                    </td>    
                    <td><?php $q=$this->db->query("SELECT respaldo,no_contrato FROM adenda where id_contrato=$row->id_contrato")->result();
                    if(($q)!=null){ ?>
                      <?php  
                    foreach ($q as $cnt) {
                      ?>
                      <a href="<?php echo base_url('assets/respaldo/').$cnt->respaldo;?>" target="_blank"><span class="badge bg-light-blue"><i class=""><?php echo $cnt->no_contrato; ?></i></span></a>
                      
                      <?php
                    }                                          
                    }else
                    {
                      echo 'NO';
                    }

                    ?></td>           
                    <td>
                      <a href="<?php echo base_url('detalle_cont/contrato/').$row->id_contrato;?>"><span class="badge bg-light-green"><i class="fa fa-search"></i></span></a>                    
                      <a href="<?php echo base_url('boleta/formulario/').$row->id_contrato;?>"><span class="badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                      <a href="<?php echo base_url('detalle_cont/adenda/').$row->id_contrato;?>"><span class="badge bg-light-green"><i class="fa fa-search"></i> Listado de Adendas</span></a>
                      <a href="<?php echo base_url('adenda/nuevo');?>/<?php echo $row->id_contrato;?>"><span class="badge bg-green"><i class="fa fa-plus"></i> Agregar Adenda</span></a>
                      <span class="badge bg-red eliminar2" data-id="<?php echo base_url('boleta/del_boleta/').$row->id_contrato;?>"><i class="fa fa-trash"></i></span>                    
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