<div class="app-content toggle-content">
    <div class="side-app">

        <!-- page-header -->
        <div class="page-header">
            <h1 class="page-title"><span class="subpage-title">Modulo</span> Usarios</h1>
            <div class="ml-auto">

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
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#" onclick="Create()" data-toggle="modal" data-target="#menu_form"><i class="fe fe-plus-circle mr-2"></i>Add</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="content-table">
                            <?= $table ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="menu_form" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">DATOS USUARIO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombres / Apellidos</label>
                                <input type="text" name="name" class="form-control required" id="name" placeholder="Nombres / Apellidos"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="nombre">Documento</label>
                                <input type="text" name="cc" class="form-control required" id="cc"  placeholder="Documento"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="nombre">Usuario</label>
                                <input type="text" name="user" class="form-control required" id="user"  placeholder="Usuario"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="nombre">Contraseña</label>
                                <input type="password" name="password" class="form-control required" id="password"  placeholder="Contraseña"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="nombre">Repetir Contraseña</label>
                                <input type="password" name="passworvalida" class="form-control required" id="passworvalida" placeholder="Repetir Contraseña"  />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register form-email">
                                <label for="nombre">Correo</label>
                                <input type="text" name="email" class="form-control required" id="email"  placeholder="E-mail" onchange="validacorreo()"/>
                                <span id="emailOK" style="font-size: 15px;color: red;"  ></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="rol">Rol</label>
                                <select name="rol" class="form-control required" id="rol">
                                    <option value="">. . .</option>
                                    <?php foreach ($rol as $r) : ?>
                                        <option value="<?= $r->id_roles ?>"><?= $r->rol ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="rol">Dependencia</label>
                                <select name="id_dependencia" class="form-control required" id="id_dependencia">
                                    <option value="">. . .</option>
                                    <?php foreach ($areas as $r) : ?>
                                        <option value="<?= $r->id_dependencia ?>"><?= $r->descripcion ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group register">
                                <label for="avatar"> Seleccionar Avatar</label>
                                <select name="avatar" class="form-control required" id="avatar" onchange="validaavatar()" >
                                    <option value="SAvatar.png">. . .</option>
                                    <option value="avatar2.png">Avatar Girl</option>
                                    <option value="avatar3.png">Avatar Girl</option>  
                                    <option value="avatar_girl.png">Avatar Girl</option>
                                    <option value="avatar_morena.png">Avatar Girl</option>
                                    <option value="avatar_senora.png">Avatar Girl</option>
                                    <option value="avatar.png">Avatar Man</option>  
                                    <option value="avatar04.png">Avatar Man</option>
                                    <option value="avatar5.png">Avatar Man</option>
                                    <option value="avatar_senor_moreno.png">Avatar Man</option>
                                    <option value="avatar_barba_blanco.jpg">Avatar Man</option>
                                    <option value="avatar10.jpg">Avatar Man</option>
                                    <option value="avatarcalvo.jpg">Avatar Man</option>
                                    <option value="avatar9.png">Avatar Man</option>
                                    <option value="avatar_gordo.png">Avatar Man</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div cclass="box-body" id="div-img-avatar">
                                <div class="box-body box-profile">
                                    <img src="<?= base_url() ?>assets/images/users/SAvatar.png" id="pngavatar" name="pngavatar">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary create" onclick="CreateUser()">CREAR</button>
                <button type="button" class="btn btn-primary update" >ACTUALIZAR</button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(function () {
        Cargar_Tabla();
    });
    
    function Cargar_Tabla() {
        var oTable = $('#tabla_user').DataTable();
    }
    
    function validacorreo() {
        var correo = event.target;
        valido = document.getElementById('emailOK');
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        //Se muestra un texto a modo de ejemplo, luego va a ser un icono
        if (emailRegex.test(correo.value)) {
            var data = new FormData();
            data.append('email', correo);
            $.ajax({
                url: "<?= base_url() ?>Parameters/User/C_User/ValidaCorreo",
                type: 'POST',
                data: data,
                async: false,
                success: function (data) {
                    var obj = jQuery.parseJSON(data);
                    if (obj.res != "OK") {
                        $(".form-email").addClass("has-error").removeClass("has-success");
                        valido.innerText = "incorrecto";

                    } else {
                        $(".form-email").addClass("has-success").removeClass("has-error");

                    }
                },
                cache: false,
                contentType: false,
                processData: false
            }).fail(function (error) {
                swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});

            });
            //valido.innerText = "";
        } else {
            valido.innerText = "incorrecto";
            $(".form-email").addClass("has-error").removeClass("has-success");
        }


    }
    
    function Update(id_users) {
        window.location = '<?= base_url(); ?>User/Edit/' + id_users;
    }
    
    function Create() {
        $("#form")[0].reset();
        $(".update").hide();
        $(".create").show();
        $("#menu_form").modal("show");
    }

    function CreateUser() {
        if ($(".form-email").hasClass("has-error")) {
            alertify.error("FAVOR A REVISAR CORREO")
            $("#email").focus();
            return false
        }

        var error = false;
        $(".required").each(function () {
            if (!ValidateInput($(this).attr("id"))) {
                error = true;
            }
        });
        if (!error) {
            var password = $("#password").val();
            var passworvalida = $("#passworvalida").val();
            if (password != passworvalida) {
                var notification = alertify.notify('POR FAVOR REVISAR LAS CONTASEÑAS NO COINCIDEN', 'error', 5,
                        function () {
                            console.log('POR FAVOR REVISAR LAS CONTASEÑAS NO COINCIDEN');
                        });
                return false
            }

            var formData = new FormData($('#form')[0]);
            $.ajax({
                url: "<?= base_url() ?>Parameters/User/C_User/CreateUser",
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
                            Cargar_Tabla();
                            $(".dt-buttons").append('<label style="margin-left: 5px;"><a onclick="Create()" class="btn btn-default btn-sm buttons-excel buttons-html5" tabindex="0" aria-controls="tabla_user" href="#"><span><i class="fa fa-user-plus"></i> Crear</span></a></label>');
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
                swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
            });
        }
    }
    
    function ResetPass(id_user,titulo){
        swal({
            title: 'Esta seguro de resetear la clave del usuario ' + titulo + '!',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ACEPTAR!'
        }).then((result) => {
            if (result) {
                $.post("<?= base_url() ?>Parameters/User/C_User/ResetPass", {id_user: id_user}, function (data) {
                    if (data.res == "OK") {
                        swal('Operacion Exitosa!', '', 'success').then((result) => {
                        });
                    } else {
                        swal({title: 'Error!', text: data, type: 'error'});
                    }
                }, 'json');
            }
        }).catch(swal.noop)
    }

    function Changestatus(id_user, titulo, status) {
        var txt = '';
        if(status != 1){
            var txt = 'In';
        }
        
        swal({
            title: 'Esta seguro de '+txt+'activar el Usuario ' + titulo + '!',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ACEPTAR!'
        }).then((result) => {
            if (result) {
                $.post("<?= base_url() ?>Parameters/User/C_User/Changestatus", {id_user: id_user,status:status}, function (data) {
                    if (data.res == "OK") {
                        swal('Operacion Exitosa!', 'El Usuario ha sido '+txt+'activado.', 'success').then((result) => {
                            $("#content-table").html(data.tabla);
                            Cargar_Tabla();
        $(".dt-buttons").append('<label style="margin-left: 5px;"><a onclick="Create()" class="btn btn-default btn-sm buttons-excel buttons-html5" tabindex="0" aria-controls="tabla_user" href="#"><span><i class="fa fa-user-plus"></i> Crear</span></a></label>');
                        });
                    } else {
                        swal({title: 'Error!', text: data, type: 'error'});
                    }
                }, 'json').fail(function (error) {
                    swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
                });
            }
        }).catch(swal.noop)
    }

    function validaavatar() {
        var avatarpng = $("#avatar").val();
        $("#div-img-avatar").html('<img src="<?= base_url() ?>assets/images/users/' + avatarpng + '">');

    }
</script>