<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Registro De</span> Seguimiento</h1>
            <div class="ml-auto">
                <div class="input-group">
                    <a href="#" onclick="saveData()" class="btn btn-info btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Guardar">
                        <span>
                            <i class="fe fe-save"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad">Seguimiento</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $form_file ?>
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
    

    function saveData() {
        if(validatefield('req-upload')){
            swal({
                title: 'Confirma la creación del seguimiento?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar!'
            }).then((result) => {
                if (result) {
                    var datos = {
                        id_radicado:$("#id_radicado").val(),
                        id_tipo_seguimiento:$("#id_tipo_seguimiento").val(),
                        titulo:$("#titulo").val(),
                        descripcion:$("#descripcion").val(),
                    }

                    $.post('<?= base_url() ?>Seguimiento/C_Seguimiento/validateId',datos, function (response) {
                        if (response.res != 'OK') {
                            alertify.error('Numero de radicado invalido ('+$("#id_radicado").val()+')');
                        }else{
                            swal('','OK','success').then((result) => {
                                window.location.replace("<?= base_url() ?>Seguimientos/Edit/"+response.id+"/"+response.token);
                            });
                        }
                    }, 'json');
                }
            }).catch(swal.noop)
        }
    }

</script>