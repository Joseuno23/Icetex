<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Preview Radicado</span> N° <?= $info->codigo ?>.<?= $info->id_radicado ?></h1>
            <div class="ml-auto">
                <div class="input-group">                   
                    <a href="#" onclick="listar()" class="btn btn-primary btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Listar">
                        <span>
                            <i class="fe fe-list"></i>
                        </span>
                    </a>
                    <?php if(isset($BtnAddRadicado)): ?>
                    <a href="#" onclick="NewRadicado()" class="btn btn-info btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Nuevo">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span>
                    </a>
                    <?php endif; ?>
                    <?php if(isset($BtnEditRadicado) && !in_array($info->id_estado, array('4'))): ?>
                    <a href="#" onclick="EditRadicado()" class="btn btn-success btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Editar">
                        <span>
                            <i class="fe fe-edit"></i>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad">Info. del solicitante</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table border table-vcenter text-nowrap  mb-0">
                            <thead class="">
                                <tr>
                                    <th>Nombre</th>
                                    <td><?= $info->nombre_solicitante ?></td>
                                </tr>
                                <tr>
                                    <th>Documento</th>
                                    <td><?= $info->documento_solicitante ?></td>
                                </tr>
                                <tr>
                                    <th>Telefono</th>
                                    <td><?= $info->telefono_solicitante ?></td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td><?= $info->direccion_solicitante ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad">Info. General</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table border table-vcenter text-nowrap  mb-0">
                            <thead class="">
                                <tr>
                                    <th>Dependencia</th>
                                    <td><?= $dependencia->description ?></td>
                                </tr>
                                <tr>
                                    <th>Canal</th>
                                    <td><?= $canal->description ?></td>
                                </tr>
                                <tr>
                                    <th>Serie</th>
                                    <td><?= $serie->descripcion ?></td>
                                </tr>
                                <tr>
                                    <th>Sub Serie</th>
                                    <td><?= $subserie->descripcion ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad"></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table border table-vcenter text-nowrap  mb-0">
                            <thead class="">
                                <tr>
                                    <td><b>Asunto:</b> <?= $info->asunto ?></td>
                                </tr>
                                <tr>
                                    <td><b>Descripción:</b> <?= $info->descripcion ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad">Documentos Adjuntos</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table border table-vcenter text-nowrap  mb-0">
                            <thead class="">
                                <tr>
                                    <th>Img</th>
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($adjuntos as $v) : ?>
                                    <?php
                                    if (strpos($v->archivo, '.pdf') === false) :
                                        if (strpos($v->archivo, '.xls') === false && strpos($v->archivo, '.xlsx') === false) :
                                            if (strpos($v->archivo, '.doc') === false && strpos($v->archivo, '.docx') === false) :
                                                if (strpos($v->archivo, '.pptx') === false) :
                                                    $img = '<img class="w-5 h-5 mr-2" src="' . base_url() . 'Adjuntos/' . $v->path . 'path/' . $v->archivo . '" alt="image">';
                                                else:
                                                    $img = '<img class="w-5 h-5 mr-2" src="../../../assets/images/icons/pptx.png" alt="image">';
                                                endif;
                                            else:
                                                $img = '<img class="w-5 h-5 mr-2" src="../../../assets/images/icons/word.png" alt="image">';
                                            endif;
                                        else:
                                            $img = '<img class="w-5 h-5 mr-2" src="../../../assets/images/icons/excel.png" alt="image">';
                                        endif;
                                    else:
                                        $img = '<img class="w-5 h-5 mr-2" src="../../../assets/images/icons/pdf.png" alt="image">';
                                    endif;
                                    ?>
                                    <tr>
                                        <td><?= $img ?></td>
                                        <td><?= $v->archivo ?></td>
                                        <td><?= $v->name ?></td>
                                        <td><?= $v->fecha ?></td>
                                        <td style="text-align: center"><a href="<?= base_url() ?>Adjuntos/<?= $v->path ?>/path/<?= $v->archivo ?>" download="<?= $v->archivo ?>" class="btn btn-primary btn-xs" style="margin-left: 2px"><i class="fa fa-cloud-download"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header bg-transparent border-0">
                        <div>
                            <h3 class="card-title mb-0">Seguimiento</h3>
                        </div>
                        <div class="card-options">
                            <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="fe fe-more-horizontal fs-20"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1005px, 41px, 0px);">
                                <li><a href="#"><i class="fe fe-plus mr-2"></i>Agregar Seguimiento</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <div class="grid-margin">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap  align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Fecha Seguimiento</th>
                                                <th>Tipo Seguimiento</th>
                                                <th>Usuario</th>
                                                <th>Titulo</th>
                                                <th>Descripción</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($seguimiento as $v) : 
                                            $idE = base64_encode(openssl_encrypt($v->id_seguimiento, METHOD_ENCRYP, KEY_ENCRYP, false, $v->iv_key));    
                                            ?>
                                            <tr>
                                                <td class="text-nowrap"><?=$v->fecha?></td>
                                                <td class="text-sm font-weight-600"><?=$v->tipo?></td>
                                                <td><?=$v->name?></td>
                                                <td ><?=$v->titulo?></td>
                                                <td class="text-nowrap"><?=$v->descripcion?></td>
                                                <td class="text-nowrap"><a target="_blank" href="<?=base_url()?>Seguimientos/Edit/<?=$idE?>/<?=$v->iv_key?>" class="btn btn-primary btn-xs" style="margin-left: 2px"><i class="fa fa-search"></i></a></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End app-content-->

<!--Footer-->

<script>
    $(function () {

    });
    
    function NewRadicado(){
        window.location.replace("<?= base_url() ?>Radicados/New");
    }
    
    function listar(){
        window.location.replace("<?= base_url() ?>Radicados");
    }
    
    function EditRadicado(){
        window.location.replace("<?= base_url() ?>Radicados/Edit/<?=$idEncript?>/<?=$tokenId?>");
    }
</script>