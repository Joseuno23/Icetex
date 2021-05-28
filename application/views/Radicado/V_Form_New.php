<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Crear</span> Radicado</h1>

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
                            <h3 class="card-title title-rad">Radicado</h3>
                        </div>
                        <div class="card-options">
                            <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="fe fe-more-horizontal fs-20"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#"><i class="fe fe-eye mr-2"></i>View</a></li>
                                <li><a href="#"><i class="fe fe-plus-circle mr-2"></i>Add</a></li>
                                <li><a href="#"><i class="fe fe-trash-2 mr-2"></i>Remove</a></li>
                                <li><a href="#"><i class="fe fe-download-cloud mr-2"></i>Download</a></li>
                                <li><a href="#"><i class="fe fe-settings mr-2"></i>More</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="smartwizard-3">
                            <ul>
                                <li><a href="#step-1">Solicitante</a></li>
                                <li><a href="#step-2">General</a></li>
                                <li><a href="#step-3">Archivos</a></li>
                            </ul>
                            <div>
                                <div id="step-1" class="">
                                    <?=$info_s?>
                                </div>
                                <div id="step-2" class="">
                                    <?=$info_g?>
                                </div>
                                <div id="step-3" class="">
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
        var btnFinish = $('<button></button>').text('Finalizar')
		.addClass('btn btn-success')
		.on('click', function(){ alert('Finish Clicked'); });
	var btnCancel = $('<button></button>').text('Cancelar')
		.addClass('btn btn-danger')
		.on('click', function(){ $('#smartwizard-3').smartWizard("reset"); });
        
        $('#smartwizard-3').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect:'fade',
            showStepURLhash: false,
            toolbarSettings: {
                toolbarExtraButtons: [btnFinish, btnCancel]
            }
	});
        
        function uploadFile() {
            'use strict';

            var sub = $('#upload_documento').fileupload({
                url: '<?= base_url() ?>Radicado/C_Radicado/UploadFile',
                maxFileSize: 5000000000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf|psd|tif|ai)$/i,
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
    
    function saveRadicado(){
        
        var datos = {
            nombre_solicitante:$('#nombre_solicitante').val(),
            telefono_solicitante:$('#telefono_solicitante').val(),
            documento_solicitante:$('#documento_solicitante').val(),
            direccion_solicitante:$('#direccion_solicitante').val(),
            id_dependencia:$('#id_dependencia').val(),
            id_canal:$('#id_canal').val(),
            id_tipo_radicado:$('#id_tipo_radicado').val(),
            id_tipo_documento:$('#id_tipo_documento').val(),
            asunto:$('#asunto').val(),
            descripcion:$('#descripcion').val(),
        }
    
        $.post('<?=base_url()?>Radicado/C_Radicado/SaveRadicado',datos,function(response){
            $('#id_radicado').val(response.res);
            $('.title-rad').html('RADICADO N° '+response.res)
        },'json');
    }

</script>