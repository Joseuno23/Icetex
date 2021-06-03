<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Info. del solicitante</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control req-0" id="nombre_solicitante" name="nombre_solicitante" placeholder="Nombre">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Documento</label>
                    <input type="text" class="form-control req-0" id="documento_solicitante" name="documento_solicitante" placeholder="Numero Documento">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control req-0" id="telefono_solicitante" name="telefono_solicitante" placeholder="Telefono" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" class="form-control req-0" id="direccion_solicitante" name="direccion_solicitante" placeholder="Dirección">
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($info)): ?>
<script>
    $(function(){
        $('#nombre_solicitante').val('<?=$info->nombre_solicitante?>');
        $('#documento_solicitante').val('<?=$info->documento_solicitante?>');
        $('#telefono_solicitante').val('<?=$info->telefono_solicitante?>');
        $('#direccion_solicitante').val('<?=$info->direccion_solicitante?>');
    })
</script> 
<?php endif; ?>