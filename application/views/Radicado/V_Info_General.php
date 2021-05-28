<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Info. General</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Dependencia</label>
                    <select class="form-control req-1" id="id_dependencia" name="id_dependencia">
                        <option value="">. . .</option>
                        <?php foreach ($dependencias as $v) : ?>
                        <option value="<?=$v->id_dependencia?>"><?=$v->description?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tipo Radicado</label>
                    <select class="form-control req-1" id="id_tipo_radicado" name="id_tipo_radicado">
                        <option value="">. . .</option>
                        <?php foreach ($tipos_radicado as $v) : ?>
                        <option value="<?=$v->id_tipo?>"><?=$v->description?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tipo Documento</label>
                    <select class="form-control " id="id_tipo_documento" name="id_tipo_documento">
                        <option value="">. . .</option>
                        <?php foreach ($tipos_documento as $v) : ?>
                        <option value="<?=$v->id_tipo?>"><?=$v->description?></option>
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