<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Modulo</span> Series</h1>
            <div class="ml-auto">
                <div class="input-group">
                    <a href="#" onclick="Create()" class="btn btn-info btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Nuevo">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- End page-header -->
        <!-- Row -->
        <div>
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Series</h3>
                    </div>
                    <div class="card-options">
                        <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                            <span class="fe fe-more-horizontal fs-20"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="#" onclick="Create()"><i class="fe fe-plus-circle mr-2"></i>Add</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="content-table">
                    <?= $table ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="menu_form" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">DATOS DEPENDENCIAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="form" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control required" id="descripcion"  />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Código</label>
                            <input type="text" name="codigo" class="form-control required" id="codigo"  />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Dependencia</label>
                            <select type="text" name="id_dependencia" class="form-control required" id="id_dependencia">
                                <option value="">. . .</option>
                                <?php foreach ($dependencias as $e) : ?>
                                    <option value="<?= $e->id_dependencia ?>"><?= $e->description ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group register">
                            <label for="nombre">Status</label>
                            <select name="status" class="form-control required" id="status">
                                <option value="">. . .</option>
                                <?php foreach ($status as $e) : ?>
                                    <option value="<?= $e->id_status ?>"><?= $e->description ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary create" onclick="CreateSerie()">CREAR</button>
                <button type="button" class="btn btn-primary update" >ACTUALIZAR</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $("tabla_series").DataTable();
    });

    function Update(id_serie) {
        $("#form")[0].reset();

        $("#descripcion").val($("#desc" + id_serie).text());
        $("#status").val($("#status" + id_serie).attr("val"));
        $("#codigo").val($("#codigo" + id_serie).attr("val"));
        $("#id_dependencia").val($("#id_dependencia" + id_serie).attr("val"));
        $(".update").show();
        $(".create").hide();
        $("#menu_form").modal("show");
        $(".update").attr("onclick", "UpdateSerie(" + id_serie + ")");
    }

    function UpdateSerie(id_serie) {
        var formData = new FormData($('#form')[0]);
        formData.append("id_serie", id_serie);
        $.ajax({
            url: "<?= base_url() ?>Parameters/Serie/C_Serie/UpdateSerie",
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                var obj = jQuery.parseJSON(data);
                if (obj.res == "OK") {
                    swal({
                        title: 'Operacion Exitosa!',
                            text: "Registro Actualizado.",
                        type: 'success'
                    }).then((result) => {
                        $("#content-table").html(obj.tabla);
                        $("#tabla_series").DataTable();
                        $("#menu_form").modal("hide");
                    });
                } else {
                    swal({title: 'Error!', text: obj.res, type: 'error'});
                }
            },
            cache: false,
            contentType: false,
            processData: false
        }).fail(function (error) {
            if(error.status == 200){
                RedirectLogin();
            }else{
                swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
            }
        });
    }

    function Create() {
        $("#form")[0].reset();
        $(".update").hide();
        $(".create").show();
        $("#status").val(1);
        $("#menu_form").modal("show");
    }

    function CreateSerie() {
        var error = false;
        $(".required").each(function () {
            if (!ValidateInput($(this).attr("id"))) {
                error = true;
            }
        });
        if (!error) {
            var formData = new FormData($('#form')[0]);

            $.ajax({
                url: "<?= base_url() ?>Parameters/Serie/C_Serie/CreateSerie",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.res == "OK") {
                        swal({
                            title: 'Operacion Exitosa!',
                            text: "El registro ha sido creado.",
                            type: 'success'
                        }).then((result) => {
                            $("#content-table").html(obj.tabla);
                            $("#tabla_series").DataTable();
                            $("#menu_form").modal("hide");
                        });
                    } else {
                        swal({title: 'Error!', text: obj.res, type: 'error'});
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            }).fail(function (error) {
                if(error.status == 200){
                    RedirectLogin();
                }else{
                    swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
                }
            });
        }
    }

    function Delete(id_serie, titulo) {
        swal({
            title: 'Esta seguro de eliminar el Serie ' + titulo + '!',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!'
        }).then((result) => {
            if (result) {
                $.post("<?= base_url() ?>Parameters/Serie/C_Serie/DeleteSerie", {id_serie: id_serie}, function (data) {
                    if (data.res == "OK") {
                        swal('Operacion Exitosa!', 'El registro ha sido eliminado.', 'success').then((result) => {
                            $("#content-table").html(data.tabla);
                            $("#tabla_series").DataTable();
                        });
                    } else {
                        swal({title: 'Error!', text: data, type: 'error'});
                    }
                }, 'json').fail(function (error) {
                    if(error.status == 200){
                        RedirectLogin();
                    }else{
                        swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
                    }
                });

            }
        }).catch(swal.noop)
    }

</script>