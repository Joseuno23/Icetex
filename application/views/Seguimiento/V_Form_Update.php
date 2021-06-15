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
                            <h3 class="card-title title-rad">Seguimiento N° <?=$info->id_seguimiento?> - <?=$info->fecha?></h3>
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
        function uploadFile() {
            'use strict';

            var sub = $('#upload_documento').fileupload({
                url: '<?= base_url() ?>Seguimiento/C_Seguimiento/UploadFile',
                maxFileSize: 5000000000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf|xls|xlsx|csv|pptx|docx|doc|zip|rar|7z)$/i,
                multipart: true
            });

        }

        $('#upload_documento').keypress(function (event) {
            if (event.which == '13') {
                event.preventDefault();
                return false;
            }
        });

        uploadFile();
    });
    
    function deleteAdjunto(id,ruta,archivo){
        swal({
            title: 'Confirmar!',
            text: "Eliminar Adjunto",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            reverseButtons: true
        }).then((result) => {
            if (result) {
                $.post('<?= base_url() ?>Seguimiento/C_Seguimiento/Delete/'+ruta+archivo,{
                    id:id,
                    ruta:ruta,
                },function(data){
                    $('.adj-'+id).remove();
                    swal('OK','','success');
                },'json');
            }
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                
            }
        }).catch(swal.noop)
    }
</script>