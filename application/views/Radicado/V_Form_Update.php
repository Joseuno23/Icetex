<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Actualizar</span> Radicado</h1>
            
        </div>
        <!-- End page-header -->
        <?php if (!isset($BtnAddRadicado)): ?>
            <div class="alert alert-warning" role="alert">
                <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
                <span class="alert-inner--text"><strong>Warning!</strong> Usted no tiene Permisos para crear Radicados!</span>
            </div>
        <?php endif; ?>
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title title-rad">Radicado N°<?=$info->id_radicado?></h3>
                        </div>
                        <div class="card-options">
                                <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="fe fe-more-horizontal fs-20"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(490px, 41px, 0px);">
                                    <li><a href="<?= base_url() ?>Radicados/Preview/<?=$idEncript?>/<?=$tokenId?>"><i class="fe fe-eye mr-2"></i>Preview</a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard-3">
                            <ul>
                                <li><a href="#step-1">Información Del Solicitante</a></li>
                                <li><a href="#step-2">Información General</a></li>
                                <li><a href="#step-3">Adjuntar Documentos</a></li>
                            </ul>
                            <div>
                                <div id="step-1" class="done">
                                    <?=$info_s?>
                                </div>
                                <div id="step-2" class="done">
                                    <?=$info_g?>
                                </div>
                                <div id="step-3" class="done">
                                    <?=$form_file?>
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
        
        $('.req-0, .req-1').change(function(){
            saveRadicado(this.id,this.value)
        });
        
        $('#smartwizard-3').smartWizard({
            theme: 'dots',
            selected:2, // Initial selected step, 0 = first step
            keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            autoAdjustHeight: false, // Automatically adjust content height
            cycleSteps: true, // Allows to cycle the navigation of steps
            backButtonSupport: false, // Enable the back button support
            useURLhash: false, // Enable selection of the step based on url hash
            showStepURLhash: true, // Show url hash based on step
            
            toolbarSettings: {
                showNextButton: false, // show/hide a Next button
                showPreviousButton: false, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
	});
        
        

        $('#upload_documento').keypress(function (event) {
            if (event.which == '13') {
                event.preventDefault();
                return false;
            }
        });

        uploadFile();
    });
    
    function uploadFile() {
//        'use strict';

        var sub = $('#upload_documento').fileupload({
            url: '<?= base_url() ?>Radicado/C_Radicado/UploadFile',
            maxFileSize: 5000000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf|xls|xlsx|csv|pptx|docx|doc|zip|rar|7z)$/i,
            multipart: true
        });

    }
    
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
                $.post('<?= base_url() ?>Radicado/C_Radicado/Delete/'+ruta+archivo,{
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
    
    function saveRadicado(field,valor){
        
        var datos = {
            field:field,
            valor:valor,
            id_radicado:<?=$info->id_radicado?>
        }
    
        $.post('<?=base_url()?>Radicado/C_Radicado/UpdateRadicado',datos,function(response){
            if(response.res > 0){
               alertify.success('OK');
            }else{
                swal('Error','Ha ocurrido un error','error');
            }
        },'json');
    }

</script>