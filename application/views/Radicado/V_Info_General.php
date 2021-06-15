<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Info. General</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Dependencia</label>
                    <select class="form-control req-1" id="id_dependencia" name="id_dependencia" onchange="loadSeries(this.value)">
                        <option value="" code="">. . .</option>
                        <?php foreach ($dependencias as $v) : ?>
                        <option value="<?=$v->id_dependencia?>" code="<?=$v->codigo?>"><?=$v->description?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Serie</label>
                    <select class="form-control req-1" id="id_serie" name="id_serie" onchange="loadSubSeries(this.value)">
                        <option value=""  code="">. . .</option>
                        <?php foreach ($series as $v) : ?>
                        <option value="<?=$v->id_serie?>"  code="<?=$v->codigo?>"><?=$v->descripcion?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Sub Serie</label>
                    <select class="form-control req-1" id="id_subserie" name="id_subserie">
                        <option value="" code="">. . .</option>
                        <?php foreach ($subseries as $v) : ?>
                        <option value="<?=$v->id_sub_serie?>" code="<?=$v->codigo?>"><?=$v->descripcion?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Canal</label>
                    <select class="form-control req-1" id="id_canal" name="id_canal">
                        <option value="">. . .</option>
                        <?php foreach ($canales as $v) : ?>
                        <option value="<?=$v->id_canal?>"><?=$v->description?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Asunto</label>
                    <input type="text" class="form-control  req-1" id="asunto" name="asunto" placeholder="Asunto">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="..."></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(isset($info)): ?>
<script>
    $(function(){
        $('#id_dependencia').val('<?=$info->id_dependencia?>');
        $('#id_subserie').val('<?=$info->id_subserie?>');
        $('#id_serie').val('<?=$info->id_serie?>');
        $('#id_canal').val('<?=$info->id_canal?>');
        $('#asunto').val('<?=$info->asunto?>');
        $('#descripcion').val('<?=$info->descripcion?>');
    })
</script> 
<?php endif; ?>