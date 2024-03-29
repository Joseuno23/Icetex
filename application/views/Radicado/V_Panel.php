<!-- app-content-->
<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Lista</span> Radicados</h1>
             <div class="ml-auto">
                <div class="input-group">
                    <?php if(isset($BtnAddRadicado)): ?>
                    <a href="#" onclick="NewRadicado()" class="btn btn-info btn-icon mr-2" data-toggle="tooltip" title="" data-placement="bottom" data-original-title="Nuevo">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- End page-header -->

        <!-- Row -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">Lista De Usuarios</h3>
                        </div>
                        <div class="card-options">
                            <a href="" class="mr-4 text-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="fe fe-more-horizontal fs-20"></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="content-table">
                            <table id="table_radicados" class="table table-bordered table-striped table-condensed ">
                                <thead>
                                    <tr>
                                        <th style="text-align:center"></th>
                                        <th style="text-align:center">N°</th>
                                        <!--<th style="text-align:center">Fecha</th>-->
                                        <th style="text-align:center">Dependencia</th>
                                        <th style="text-align:center">Serie</th>
                                        <th style="text-align:center">SubSerie</th>
                                        <th style="text-align:center">Canal</th>
                                        <th style="text-align:center;">Usuario</th>
                                        <th style="text-align:center"></th>
                                    </tr>
                                </thead>
                            </table>
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
        Cargar_Tabla();
    });
    
    function Cargar_Tabla() {
        
        var id = "all";
        var fecha_ini = "all";
        var fecha_fin = "all";
       
        var oTable = $('#table_radicados').DataTable({
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "ordering": false,
            "ajax": {
                "url": "<?= base_url() ?>Radicado/C_Radicado/GetListTable/" + id+ '/' + fecha_ini + '/' + fecha_fin,
                "dataSrc": "datos"
            },
            "language": {
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                }
            }, columnDefs: [
                {className: "text-center ", targets: [0], width: '60px'},
                {className: "text-center ", targets: [1], width: '80px'},
//                {className: "text-center ", targets: [1], width: '60px'},
//                {className: "text-center", targets: [7]},
                {className: "text-center td-estado", targets: [7],width: '130px'}
            ],
        });
    }

    
    
    function EditRadicado(id){
        window.location.replace("<?= base_url() ?>Radicados/Edit/" + id);
    }
    
    function NewRadicado(){
        window.location.replace("<?= base_url() ?>Radicados/New");
    }
    
    function Anule(id,estado,code){
        swal({
            title: 'Confirma la anulación del radicado '+code+'.'+id+'?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            reverseButtons: true
        }).then((result) => {
            if (result) {
                $.post('<?= base_url() ?>Radicado/C_Radicado/Anule',{id_radicado:id,status:'4'},function(data){
                    if(data.res == 'OK'){
                        $('.btn1-'+id).attr('class','btn btn-default btn-xs btn-left').html('ANULADO');
                        $('.btn2-'+id).attr('class','btn btn-default btn-xs dropdown-toggle');
                        alertify.success('OK');
                    }else{
                        swal({title: 'Error!', text: data.res, type: 'error'});
                    }
                },'json');
            }
        }, function (dismiss) {
            
        }).catch(swal.noop)
    }
    
    function EditRadicado(idEncript, tokenId){
        window.location.replace("<?= base_url() ?>Radicados/Edit/"+idEncript+"/"+tokenId);
    }
    
    function previewRadicado(idEncript, tokenId){
        window.location.replace("<?= base_url() ?>Radicados/Preview/"+idEncript+"/"+tokenId);
    }
</script>