var global = false;
jQuery(function($) {
    // Dropdown menu
    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
        }
    });
    //toggle sidebar
    $("#toggle-sidebar").click(function() {
        $(".page-wrapper").toggleClass("toggled");
    });
    $("#close-sidebar").click(function() {
        if (global == false) {
            $(".page-wrapper").toggleClass("toggled");
        } else {
            $(".page-wrapper").addClass("sidebar-hovered");
            global = false;
            $(".page-wrapper").removeClass("pinned");
            $("#sidebar").unbind("hover");
        }
    });
    $("#close-sideba").click(function() {
        $(".page-wrapper").addClass("pinned");
        $("#sidebar").hover()
        if (global == true) {
            $(".page-wrapper").addClass("sidebar-hovered");
            global = false;
            $(".page-wrapper").removeClass("pinned");
            $("#sidebar").unbind("hover");
        } else
        if (global == false) {
            $(".page-wrapper").removeClass("sidebar-hovered");
            global = true;
        }
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").toggleClass("toggled");
    });
    //Pin sidebar
    $("#pin-sidebar").click(function() {
        $(".page-wrapper").addClass("pinned");
        $("#sidebar").hover()
    });
    //toggle sidebar overlay
    $("#overlay").click(function() {
        $(".page-wrapper").toggleClass("toggled");
    });
    //switch between themes 
    var themes = "default-theme legacy-theme chiller-theme ice-theme cool-theme light-theme";
    $('[data-theme]').click(function() {
        $('[data-theme]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(themes);
        $('.page-wrapper').addClass($(this).attr('data-theme'));
    });
    // switch between background images
    var bgs = "bg1 bg2 bg3 bg4";
    $('[data-bg]').click(function() {
        $('[data-bg]').removeClass("selected");
        $(this).addClass("selected");
        $('.page-wrapper').removeClass(bgs);
        $('.page-wrapper').addClass($(this).attr('data-bg'));
    });
    // toggle background image
    $("#toggle-bg").change(function(e) {
        e.preventDefault();
        $('.page-wrapper').toggleClass("sidebar-bg");
    });
    // toggle border radius
    $("#toggle-border-radius").change(function(e) {
        e.preventDefault();
        $('.page-wrapper').toggleClass("boder-radius-on");
    });
    //custom scroll bar is only used on desktop
});

function esconde() {
    if (global == false) {
        var close = document.getElementById("close-sidebar");
        close.style.display = 'none';
    } else {
        var close = document.getElementById("close-sidebar");
        close.style.display = 'block';
    }
}
// desactivar y activar boton
function desactivarboton() {
    if (document.getElementById('nombreperfil').value == "") {
        document.getElementById('botonperfil').disabled = true;
    } else {
        document.getElementById('botonperfil').disabled = false;
    }
}
/*document.querySelector("#buscar").onkeyup = function () {
    $TableFilter("#tabla", this.value);
}*/
$TableFilter = function(id, value) {
    var rows = document.querySelectorAll(id + ' tbody tr');
    for (var i = 0; i < rows.length; i++) {
        var showRow = false;
        var row = rows[i];
        row.style.display = 'none';
        for (var x = 0; x < row.childElementCount; x++) {
            if (row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1) {
                showRow = true;
                break;
            }
        }
        if (showRow) {
            row.style.display = null;
        }
    }
}
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
document.getElementById('file').onchange = function() {
    document.getElementById('fichero').innerHTML = document.getElementById('file').files[0].name;
}
// modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// Js input File
document.querySelector('#image').addEventListener('change', function(e) {
    var boxFile = document.querySelector('.boxFile');
    boxFile.classList.remove('attached');
    boxFile.innerHTML = boxFile.getAttribute("data-text");
    if (this.value != '') {
        var allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png|\.gif\.tiff)$/i;
        if (allowedExtensions.exec(this.value)) {
            boxFile.innerHTML = e.target.files[0].name;
            boxFile.classList.add('attached');
        } else {
            this.value = '';
            alert('El archivo que intentas subir no está permitido.\nLos archivos permitidos son .pdf, .jpg, .jpeg, .png, .gif y .tiff');
            boxFile.classList.remove('attached');
        }
    }
});