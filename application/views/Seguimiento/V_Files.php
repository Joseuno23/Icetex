<div class="card shadow">
    <div class="card-body">
        <form class="fileupload"  id="upload_documento" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Radicado N°</label>
                        <input type="text" class="form-control req-upload" name="id_radicado" id="id_radicado" placeholder="Ejemplo: 10.02.05.1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tipo Seguimiento</label>
                        <select class="form-control req-upload" name="id_tipo_seguimiento" id="id_tipo_seguimiento" onchange="ValidateInput(this.id)">
                            <option value=""></option>
                            <?php foreach ($tipos as $v) : ?>
                                <option value="<?= $v->id_tipo ?>"><?= $v->description ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Titulo</label>
                        <input type="text" class="form-control req-upload" name="titulo" id="titulo" placeholder="Titulo.." onchange="ValidateInput(this.id)">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control req-upload" name="descripcion" id="descripcion" onchange="ValidateInput(this.id)"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
