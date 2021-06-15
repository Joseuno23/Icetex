<div class="card shadow">
    <div class="card-header">
        <div>
            <h3 class="card-title">Documentos</h3>
        </div>
    </div>
    <div class="card-body">
        <form class="fileupload"  id="upload_documento" method="POST" enctype="multipart/form-data">
            <!-- Redirect browsers with JavaScript disabled to the origin page -->
            <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
            <input type="hidden" name="id_radicado" id="id_radicado" <?php if(isset($id_radicado)): ?> value="<?=  $id_radicado ?>" <?php endif; ?>>
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="row fileupload-buttonbar">
                <div class="col-md-4">
                    <span class="btn btn-success fileinput-button" style="background-color: #17d092;">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Add Archivo...</span>
                        <input type="file" name="files[]" multiple>
                    </span>
                    <?php if (isset($BtnAddRadicado)): ?>
                        <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Guardar</span>
                        </button>
                    <?php endif; ?>

                </div>
                <div class="col-md-6 fileupload-progress fade">
                    <!-- The global progress bar -->
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                    </div>
                    <!-- The extended global progress state -->
                    <div class="progress-extended">&nbsp;</div>
                </div>
            </div><table role="presentation" id="table-adjuntos" class="table table-striped"><tbody class="files"></tbody></table>

            <div class="row">
                <?php foreach ($adjuntos as $v) : ?>
                    <div class="col-md-3 adj-<?= $v->id ?>">
                        <div class="card overflow-hidden">
                            <?php 
                            if (strpos($v->archivo, '.pdf') === false) :
                                if (strpos($v->archivo, '.xls') === false && strpos($v->archivo, '.xlsx') === false) :
                                    if (strpos($v->archivo, '.doc') === false && strpos($v->archivo, '.docx') === false) :
                                        if (strpos($v->archivo, '.pptx') === false) :
                                            echo '<img style="width:100px; margin:0 auto;" src="'.base_url().'Adjuntos/'.$v->path.'path/'.$v->archivo.'" alt="image">';
                                        else:
                                            echo '<img style="width:100px; margin:0 auto;" src="../../../assets/images/icons/pptx.png" alt="image">';
                                        endif;
                                    else:
                                        echo '<img style="width:100px; margin:0 auto;" src="../../../assets/images/icons/word.png" alt="image">';
                                    endif;
                                else:
                                    echo '<img style="width:100px; margin:0 auto;" src="../../../assets/images/icons/excel.png" alt="image">';
                                endif;
                            else:
                                echo '<img style="width:100px; margin:0 auto;" src="../../../assets/images/icons/pdf.png" alt="image">';
                            endif;
                            ?>
                            
                            <div class="card-body">
                                <h5 class="card-title mb-0 mt-3"><?= $v->name ?></h5>
                                <p class="card-text text-muted"><?= $v->archivo ?>.</p>
                                <p class="card-text text-muted"><?= $v->fecha ?>.</p>
                                
                                <a href="<?= base_url() ?>Adjuntos/<?= $v->path ?>/path/<?= $v->archivo ?>" download="<?= $v->archivo ?>" class="btn btn-primary btn-xs pull-right" style="margin-left: 2px"><i class="fa fa-cloud-download"></i></a>
                                <a onclick="deleteAdjunto(<?= $v->id ?>,'<?=$v->path?>','<?=$v->archivo?>')" class="btn btn-warning btn-xs "><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </form>
    </div>
</div>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload faded">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>
    <p class="size">Subiendo...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn btn-primary start" disabled>
    <i class="glyphicon glyphicon-upload"></i>
    <span>Subir</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancelar</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download faded">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% }else{ %}
    
    {% if (file.type == 'application/pdf') { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img style="max-width:60px;" src="<?= base_url() ?>{%='assets/images/icons/pdf.png'%}"></a>
    {% } %}
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" target='_blank' title="{%=file.name%}">{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}/"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Eliminar</span>
    </button>

    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancelar</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/Upload/externa/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/Upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/Upload/css/jquery.fileupload-ui.css">
<script src="<?= base_url() ?>assets/plugins/Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/externa/tmpl.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/externa/load-image.all.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/externa/canvas-to-blob.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/externa/jquery.blueimp-gallery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.iframe-transport.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.fileupload.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.fileupload-process.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.fileupload-image.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.fileupload-validate.js"></script>
<script src="<?= base_url() ?>assets/plugins/Upload/js/jquery.fileupload-ui.js"></script>