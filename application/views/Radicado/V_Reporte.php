<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Generar</span> Reporte</h1>

        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div>

                        </div>
                        <div class="card-options">
                            <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="fe fe-more-horizontal fs-20"></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="id_fecha" autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dependencia</label>
                                    <select class="form-control select2 input-sm" id="id_dependencia" >
                                        <option value="all">TODOS</option>
                                        <?php foreach ($dependencias as $v) : ?>
                                        <option value="<?=$v->id_dependencia?>" code="<?=$v->codigo?>"><?=$v->description?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Serie</label>
                                    <select class="form-control select2 input-sm" id="id_serie" >
                                        <option value="all">TODOS</option>
                                        <?php foreach ($series as $v) : ?>
                                        <option value="<?=$v->id_serie?>"  code="<?=$v->codigo?>"><?=$v->descripcion?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sub Serie</label>
                                    <select class="form-control select2 input-sm" id="id_subserie">
                                        <option value="all">TODOS</option>
                                        <?php foreach ($subseries as $v) : ?>
                                        <option value="<?=$v->id_sub_serie?>" code="<?=$v->codigo?>"><?=$v->descripcion?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <button type="button" class="btn pull-left btn-primary" ><i class="fa fa-fw fa-file-excel-o"></i> Generar</button>
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
        $('#id_fecha').daterangepicker({
                locale: {format: 'YYYY-MM-DD'}
        });

        $('.btn-primary').click(function () {

            if ($("#id_fecha").val() != '') {

                var id_dependencia = $("#id_dependencia").val();
                var id_serie = $("#id_serie").val();
                var id_subserie = $("#id_subserie").val();
                
                var result = $("#id_fecha").val().split(' - ');
                var fecha_ini = result[0];
                var fecha_fin = result[1];

               
                $.post("<?= base_url() ?>Radicado/C_Radicado/Radicador", {fecha_fin: fecha_fin, fecha_ini: fecha_ini, id_dependencia: id_dependencia, id_serie: id_serie, id_subserie: id_subserie}, function (data) {
                    if (data.result != 'ok') {
                        alertify.error("Ha ocurrido un error al descargar el archivo");
                        return false;
                    } else {
                        window.location.replace("<?= base_url() ?>Radicado/C_Radicado/Radicador/" + data.archivo);
                    }
                }, 'JSON');

            } else {
                alertify.error('SELECCIONE UN RANGO DE FECHA');
            }
        });
    });
</script>