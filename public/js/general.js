function validateForm(id) { // 10 inputs  input
    let validated = true
    let inputs = document.getElementById(id).getElementsByTagName("*")
    for (let input of inputs) {
        if (input.id.slice(-1) == "*" && !input.value) {
            input.classList.add("is-invalid")
            validated = false
        } else {
            input.classList.remove("is-invalid")
        }
    }
    return validated
}

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function checkNum(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /^([0-9]+\.?[0-9]{0,2})$/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function check_digit(e, obj, intsize, deczize) {
    var keycode;

    if (window.event) keycode = window.event.keyCode;
    else if (e) {
        keycode = e.which;
    } else {
        return true;
    }

    var fieldval = (obj.value),
        dots = fieldval.split(".").length;

    if (keycode == 46) {
        return dots <= 1;
    }
    if (keycode == 8 || keycode == 9 || keycode == 46 || keycode == 13) {
        // back space, tab, delete, enter
        return true;
    }
    if ((keycode >= 32 && keycode <= 45) || keycode == 47 || (keycode >= 58 && keycode <= 127)) {
        return false;
    }
    if (fieldval == "0" && keycode == 48) {
        return false;
    }
    if (fieldval.indexOf(".") != -1) {
        if (keycode == 46) {
            return false;
        }
        var splitfield = fieldval.split(".");
        if (splitfield[1].length >= deczize && keycode != 8 && keycode != 0)
            return false;
    } else if (fieldval.length >= intsize && keycode != 46) {
        return false;
    } else {
        return true;
    }
}

const SwalModal = (icon, title, html) => {
    Swal.fire({
        icon,
        title,
        html
    })
}

const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
    Swal.fire({
        icon,
        title,
        html,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText,
        reverseButtons: true,
    }).then(result => {
        if (result.value) {
            return livewire.emit(method, params)
        }

        if (callback) {
            return livewire.emit(callback)
        }
    })
}

const SwalAlert = (icon, title, timeout = 7000) => {
    const Toast = Swal.mixin({
        showConfirmButton: false,
        timer: timeout,
        didOpen: toast => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon,
        title
    })
}

function sweetAlertList(data) {
    let info = data['data'];
    let list = [];
    for (var k in info) {
        list += ('<tr>' + '<td class="table__td">' + info[k]['id'] + '</td>' + '<td class="table__td">' + info[k]['code'] + '</td>' + '<td class="whitespace-nowrap text-gray-500 text-left">' + info[k]['description'] + '</td>' + '</tr>'
        )
    }
    var html =
        '<div class="shadow border-b border-gray-200 sm:rounded-lg mb-5 overflow-auto"> ' +
            '<table class="divide-y divide-gray-400 table-hover"> <thead class="bg-gray-200 border-b border-gray-300"> ' +
                '<tr> ' +
                    '<th scope="col" class="table__th">ID</th>  ' +
                    '<th scope="col" class="table__th">Codigo</th>  ' +
                    '<th scope="col" class="px-1 text-left text-xs font-bold tracking-wider font-semibold border-b border-gray-300 uppercase">Descripcion</th> ' +
                '</tr> ' +
            '</thead>' +
                '<tbody class="bg-white divide-y divide-gray-200"> ' +
                     list+
                '</tbody> ' +
            '</table> ' +
        '</div>';
    var modal_info = document.getElementById("modal_info");
    Swal.fire({
        icon: 'info',
        html: html,
        customClass: 'swal-wide',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
    })
}

document.addEventListener('DOMContentLoaded', () => {

    this.livewire.on('swal:modal', data => {
        SwalModal(data.icon, data.title, data.text)
    })

    this.livewire.on('swal:confirm', data => {
        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
    })

    this.livewire.on('swal:alert', data => {
        SwalAlert(data.icon, data.title, data.timeout)
    })

    this.livewire.on('swal:list', data => {
        sweetAlertList(data)
    })
})
function downloadExcelTypeDte(){
    axios('/tipos-documento-dte', {
        method: 'GET',
        responseType: 'blob',
    }).then(res => {
        const url = window.URL.createObjectURL(new Blob([res.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', 'tipos_documentd_dte.xlsx');
        document.body.appendChild(link);
        link.click();
    })
}
