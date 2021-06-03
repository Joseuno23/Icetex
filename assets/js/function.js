// traduciendo del inglés a español el texto del plugin de busqueda y páginación
$(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#global-loader").show();
    }).ajaxStop(function () {
        $("#global-loader").hide();
    })
});


function UpdatePreferences(campo, valor, url) {
    $.post(url + "C_Panel/UpdatePreferences", {campo: campo, valor: valor}, function (data) {}).fail(function (error) {
        swal({title: 'Error Toma un screem y envialo a sistemas!', text: error.responseText, type: 'error'});
    });
}

function textAreaAdjust(o) {
  o.style.height = (o.scrollHeight)+"px";
}

function ShowDateJS() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!

    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    var today = yyyy + '-' + mm + '-' + dd;
    return today;
}

function ValidateInput(id) {
    if ($("#" + id).val() == "") {
        $("#" + id).addClass("is-invalid").removeClass("is-valid");
        $("#" + id).addClass("is-invalid").removeClass("is-valid");
        return false;
    } else {
        $("#" + id).removeClass("is-invalid");
        $("#" + id).removeClass("is-invalid");
        return true;
    }
}

function validatefield(Nameclass) {
    var error = 0;
    $("." + Nameclass).each(function () {
        var Idinput = $(this).attr("id");
        if (!ValidateInput(Idinput)) {
            error++;
        }
    });
    return (error > 0) ? false : true;
}

function Greater_zero(Control) {
    Control.value = (Control.value <= 0) ? "" : Control.value;
}

function mouseX(evt) {
    if (evt.pageX) {
        return evt.pageX;
    } else if (evt.clientX) {
        return evt.clientX + (document.documentElement.scrollLeft ?
                document.documentElement.scrollLeft :
                document.body.scrollLeft);
    } else {
        return null;
    }
}

function mouseY(evt) {
    if (evt.pageY) {
        return evt.pageY;
    } else if (evt.clientY) {
        return evt.clientY + (document.documentElement.scrollTop ?
                document.documentElement.scrollTop :
                document.body.scrollTop);
    } else {
        return null;
    }
}

function ValNumber(Control) {
    var Numer = parseInt(Control.value);
    if (isNaN(Numer)) {
        Numer = 0;
    }
    Control.value = Numer;
}


function ValidateEmail(email, div) {
    console.log(email);
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false) {
//        $(div).hide().removeClass('hide').slideDown('fast');
        return false;
    } else {
//        $(div).hide().addClass('hide').slideDown('slow');
        return true;
    }
}

function validateSecurity(id) {
    $('#'+id).keyup(function () {
        var pswd = $(this).val();

        if (pswd.length < 8) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }

        if (pswd.match(/[A-z]/)) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if (pswd.match(/[A-Z]/)) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if (pswd.match(/\d/)) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

        //validate caracter
        if (pswd.match(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/)) {
            $('#caracter').removeClass('invalid').addClass('valid');
        } else {
            $('#caracter').removeClass('valid').addClass('invalid');
        }

    }).focus(function () {
        $('#pswd_info').show();
    }).blur(function () {
        $('#pswd_info').hide();
    });
}

function LoadNotifications(base){
    $.ajax({
        url: base+"Notifications",
        type: 'POST',
        data: {},
        async: false,
        success: function (data) {
            var obj = jQuery.parseJSON(data);
            if(obj.res == 'OK'){
                $("#notifications").html(obj.rows);
                if(obj.cont > 0){
                    $("#notifications-count").text(obj.cont);
                }
            }else{
                window.location = base;
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function DeleteNotification(id,base,redirec){
    $.post(base+"C_Main/DeleteNotification",{id:id},function(data){
        window.location = redirec;
    },'json');
}

