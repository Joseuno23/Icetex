<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Actualizar</span> Radicado </h1>
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
                    <a href="#" onclick="preview()" class="btn btn-secondary btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Preview">
                        <span>
                            <i class="fe fe-edit"></i>
                        </span>
                    </a>
                </div>
            </div>
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
                            <h3 class="card-title title-rad">Radicado N° <?= $info->codigo ?>.<?= $info->id_radicado ?></h3>
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
        
        var codigo = $('#id_dependencia option:selected').attr('code')+'.'+$('#id_serie option:selected').attr('code')+'.'+$('#id_subserie option:selected').attr('code');

        var datos = {
            field:field,
            valor:valor,
            id_radicado:<?=$info->id_radicado?>,
            codigo: codigo
        }
    
        $.post('<?=base_url()?>Radicado/C_Radicado/UpdateRadicado',datos,function(response){
            if(response.res > 0){
               alertify.success('OK');
               $('.title-rad').html('RADICADO N° '+codigo+'.<?= $info->id_radicado ?>');
            }else{
                swal('Error','Ha ocurrido un error','error');
            }
        },'json');
    }
    
    function NewRadicado(){
        window.location.replace("<?= base_url() ?>Radicados/New");
    }
    
    function listar(){
        window.location.replace("<?= base_url() ?>Radicados");
    }
    
    function preview(){
        window.location.replace("<?= base_url() ?>Radicados/Preview/<?=$idEncript?>/<?=$tokenId?>");
    }

    function loadSeries(dependencia){
        
        if(dependencia == ''){
            $('#id_serie').html('<option value=""  code="">. . .</option>');
            $('#id_subserie').html('<option value=""  code="">. . .</option>');
            return false
        }
        
        $.post('<?=base_url()?>Radicado/C_Radicado/loadSeries',{id_dependencia:dependencia},function(data){
            if(data.series){
                var option = '<option value=""  code="">. . .</option>';
                $.each(data.series, function (e, i) {
                    option += '<option value="' + i.id_serie + '"  code="' + i.codigo + '">' + i.descripcion + '</option>';
                });
                $('#id_serie').html(option);
            }else{
                swal('Error','Ha ocurrido un error','error');
            }
        },'json');
    }

    function loadSubSeries(serie){
        
        if(serie == ''){
            $('#id_subserie').html('<option value=""  code="">. . .</option>');
            return false
        }
        
        $.post('<?=base_url()?>Radicado/C_Radicado/loadSubSeries',{id_serie:serie},function(data){
            if(data.subseries){
                var option = '<option value="">. . .</option>';
                $.each(data.subseries, function (e, i) {
                    option += '<option value="' + i.id_sub_serie + '"  code="' + i.codigo + '">' + i.descripcion + '</option>';
                });
                $('#id_subserie').html(option);
            }else{
                swal('Error','Ha ocurrido un error','error');
            }
        },'json');
    }
    
</script>