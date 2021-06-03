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
    
    var id, token;
    
    $(function () {
        
        
        
        var btnFinish = $('<button disabled></button>').text('Finalizar').addClass('btn btn-success btn-finish').on('click', function(){ 
            if($('.start').length > 0){
                swal('Warning','Hay archivos pendientes por subir','warning');
            }else{
                swal('','Se genero el radicado n°'+$('#id_radicado').val(),'success').then((result) => {
                    window.location.replace("<?= base_url() ?>Radicados/Preview/"+id+"/"+token);
                });
            }
        });
	var btnCancel = $('<button></button>').text('Cancelar')
		.addClass('btn btn-danger btn-cancel')
		.on('click', function(){ 
                    $('.req-0, .req-1').val(""); 
                    $('#smartwizard-3').smartWizard("reset"); 
                });
        
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
            if(response.res > 0){
                $('#id_radicado').val(response.res);
                id = response.idEncrip;
                token = response.idToken;
                $('.btn-cancel').attr('disabled',true);
                $('.title-rad').html('RADICADO N° '+response.res);
            }else{
                swal('Error','Ha ocurrido un error','error');
            }
        },'json');
    }

</script>