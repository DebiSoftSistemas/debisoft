/* VARIABLES GENERALES */
let wizardPosicion = 0;
let idioma = 'es';
/* FIN VARIABLES */
/* function generarDocumento(id, listado, nombre = 'ReporteDEBI'){
    switch (id) {
        case 0: exportJSONToExcel(listado, nombre); break;
        case 1: exportJSONtoWord(listado, nombre); break;
        case 2: exportJSONtoPDF(listado, nombre); break;
        case 3: printJSON(listado); break;
    }
} */

/* AL INICIAR DOCUMENTO */
$(function(){
    $('.minusculas').on("input", function() {
        var inputValue = $(this).val();
        $(this).val(inputValue.toLowerCase());
    }).on("cut paste", function(e) {
        setTimeout(function() {
            var inputValue = $('.minusculas').val();
            $('.minusculas').val(inputValue.toLowerCase());
        }, 100); 
    });
    $('.numeric').keypress(function(e) {
        if(isNaN(this.value + String.fromCharCode(e.charCode))) 
            return false;
        if((e.charCode) == 32)
            return false;
    });
    $('.entero').keypress(function(e) {
        if((e.charCode) == 46)
            return false;
    });
    $('.dosDecimas').on("input", function(e) {
        const val = $(this).val();
        const decimalIndex = val.indexOf('.');
        if (decimalIndex !== -1) {
            const decimalPart = val.substring(decimalIndex + 1);
            if (decimalPart.length > 2) {
                $(this).val(val.substring(0, decimalIndex + 3));
            }
        }
    });
    $('.seisDecimas').on("input", function(e) {
        const val = $(this).val();
        const decimalIndex = val.indexOf('.');
        if (decimalIndex !== -1) {
            const decimalPart = val.substring(decimalIndex + 1);
            if (decimalPart.length > 6) {
                $(this).val(val.substring(0, decimalIndex + 7));
            }
        }
    });
    $('img').each(function(){
        if($(this)[0].naturalHeight == 0){
             $(this).attr('src', baseUrl + 'assets/assets/img/generic/noDisponible.jpg');
        }
    });
    $("input").click(function () {
        $(this).select();
    });
});

async function encodeFileToBase64(file) {
    const reader = new FileReader();
    return await new Promise((resolve, reject) => {
        reader.onload = function(event) {
            const base64Data = btoa(event.target.result);
            resolve(base64Data);
        };
        reader.readAsBinaryString(file);
    });
}

function colocarDatos(id, ad){
    $(`#${id}${ad}`).val($(`#${id}`).val());
    $(`#${id}${ad}`).text($(`#${id}`).val());
}

function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
}
  
function formatDate(date) {
    return (
        [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
        ].join('-') +
        ' ' +
        [
        padTo2Digits(date.getHours()),
        padTo2Digits(date.getMinutes()),
        padTo2Digits(date.getSeconds()),
        ].join(':')
    );
}

function formatDateSimple(date) {
    return [
        date.getFullYear(),
        padTo2Digits(date.getMonth() + 1),
        padTo2Digits(date.getDate()),
    ].join('-');
}

function arregloVacioItems(datos = []){
    return {
        key: -1, 
        item: null, 
        selectedForm: [], 
        datos: datos, 
        selected: null,
    };
}

function buscarValor(listado, busqueda, campo){
    for (let index = 0; index < listado.length; index++) {
        const element = listado[index];
        if (element != undefined && element != null && element[campo] == busqueda) {
            return element;
        }
    }
    // return null;
    return {};
}

function crearDataTable(idClass = 'data-generic'){
    var dataTables = $(`.${idClass}`);
    var customDataTable = function customDataTable(elem) {
        elem.find('.pagination').addClass('pagination-sm');
    };
    var listado = [];
    dataTables.length && dataTables.each(function (index, value) {
        var $this = $(value);
        var options = $.extend({
            dom: "<'row mx-0'<'col-md-6'l><'col-md-6'f>>" + "<'table-responsive scrollbar'tr>" + "<'row g-0 align-items-center justify-content-center justify-content-sm-between'<'col-auto mb-2 mb-sm-0 px-3'i><'col-auto px-3'p>>",
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'All']
            ],
        }, {searching:true,responsive:true,pageLength:10,info:true,lengthChange:true, dom:"<'row mx-1'<'col-sm-12 col-md-12'f>><'table-responsive scrollbar'tr><'row no-gutters px-1 pb-3 align-items-center justify-content-center'<'col-sm-1 col-md-1'><'col-sm-11 col-md-5 justify-content-center'l><'col-sm-12 col-md-5 justify-content-center' p>>",language:{lengthMenu: `${idioma == 'es' ? 'Mostrar' : 'Show'} _MENU_ ${idioma == 'es' ? 'elementos' : 'entries'}`, search: `${idioma == 'es' ? 'Buscar' : 'Search'}:`, paginate:{next:"<span class=\"fas fa-chevron-right\"></span>",previous:"<span class=\"fas fa-chevron-left\"></span>"}}});
        listado.push($this.DataTable(options));
        var $wrpper = $this.closest('.dataTables_wrapper');
        customDataTable($wrpper);
        $this.on('draw.dt', function () {
            return customDataTable($wrpper);
        });
    });
    return listado;
}

function destruirChoise(listado) {
    for (const item of listado) {
        try {
            item.destroy();
        } catch (error) {
            console.log(error.message);
        }
    }
}

function crearChoise(idClass) {
    const selectedForm = [];
    for (const item of $(`.${idClass}`)) {
        const userOptions = utils.getData(item, 'options');
        selectedForm.push(new Choices(item, _objectSpread({
            itemSelectText: ''
        }, userOptions)));
    }
    return selectedForm;
}

function mostrarOcultarContrasena(idSpan, idInput) {
    if ($(`#${idSpan}`).attr('class') !== undefined) {
        const arreglo = $(`#${idSpan}`).attr('class').split(' ');
        for (let index = 0; index < arreglo.length; index++) {
            const element = arreglo[index];
            if (element == 'oculto') {
                $(`#${idSpan}`).html('<i class="fa fa-eye"></i>');
                arreglo[index] = 'visible';
                $(`#${idInput}`).attr('type', 'text');
            }
            if (element == 'visible') {
                $(`#${idSpan}`).html('<i class="fa fa-eye-slash"></i>');
                arreglo[index] = 'oculto';
                $(`#${idInput}`).attr('type', 'password');
            }
        }
        $(`#${idSpan}`).attr('class', arreglo.join(' '));
    }
}

function activarToast(mensaje, titulo = 'Error', subtitulo = '', color = 'danger'){
    $('#liveToast').html(`
        <div class="toast-header bg-${color} text-white"><strong class="me-auto">${titulo}</strong><small>${subtitulo}</small>
            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">${mensaje}</div>
    `);
    $('#liveToastBtn').click();
}

function changeIdioma(id, value = null) {
    consultar('idioma', 'POST', { idioma: value ?? $(`#${id}`).val() })
        .then((value) => { 
            if(value.error != '0')
                alert(value.mensaje);
            window.location.reload();
        })
        .catch(error => { 
            alert(error.mensaje);
        });
}

async function consultar(url, tipo = 'GET', datos = null, token = '', rutaEnlace = '') {
    return await new Promise((resolve, reject) => {
        if (rutaEnlace == '') rutaEnlace = baseUrl;
        if (rutaEnlace == 'ws') rutaEnlace = 'http://debisoft.dyndns.org:83/ws_debifact/';
        
        try {
            $.ajax({
                type: tipo,
                url: `${rutaEnlace}${url}`,
                data: datos,
                headers: {
                    "Authorization": token
                },
                success: function (response) {
                    let json = imprimirError('9999', 'Error en la consulta JS');
                    if(typeof response === 'string')
                        json = JSON.parse(response);
                    else
                        json = response;
                    resolve(json);
                },
                error: function( jqXHR, textStatus, errorThrown ) {
                    reject(imprimirError('9999', 'Error en la consulta JS, vuelva a intentar'));
                }
            });
        } catch ({ name, message }) {
            reject(imprimirError('9999', `${name}: ${message}`));
        }
    });
}

function resetWizard() {
    wizardPosicion = 0;
    var tabWizard = document.querySelectorAll('[data-wizard-step]');
    for (var j = 0; j < tabWizard.length; j += 1) {
        tabWizard[j].classList.add('disabled');
        tabWizard[j].classList.remove('done');
    }
    tabWizard[wizardPosicion].classList.remove('disabled');
    tabWizard[wizardPosicion].click();
    var forms = $('form.wizard-form');
    for (const form of forms) {
        form.classList.remove('was-validated');
        for (const element of form) {
            element.classList.remove('invalidar');
        }
    }
    $('.cancelar').show();
    $('.next').show();
    $('.previous').hide();
    $('.guardar').hide();
}

function prevnextWizard(tipo, fGuardar = () => {}) {
    var tabWizard = document.querySelectorAll('[data-wizard-step]');
    /* NAVEGACIÓN ENTRE TAB */
    tabWizard[wizardPosicion].classList.add('disabled');
    if(tipo == 'next' || tipo == 'save') { 
        let valido = true;
        /* VALIDAR FORMULARIO */
        var forms = $('form.wizard-form');
        for (const element of forms[wizardPosicion]) {
            /* VALIDACIONES ESPECIALES */
            const elAtr = element.attributes;
            for (const atr of elAtr) {
                switch (atr.name) {
                    case 'dnival': {
                        if(!validarDNI(element.value, $(`#${atr.value} option:selected`).text())){
                            valido = false;
                            element.classList.add('invalidar');
                        }
                    } break;
                    case 'email': {
                        if(!validarEmail(element.value)){
                            valido = false;
                            element.classList.add('invalidar');
                        }
                    } break;
                    case 'multselect': {
                        $(`#${atr.value}`).html('');
                        if(element.value.length == 0){
                            valido = false;
                            element.classList.add('invalidar');
                            $(`#${atr.value}`).html(`${idioma == 'es' ? 'Seleccione una categoria':'Select a category'}`);
                        }
                    } break;
                }
            }
        }
        if(valido) {
            forms[wizardPosicion].classList.add('was-validated');
            for (const element of forms[wizardPosicion]) {
                if(!(element.validity.valid ?? true)) valido = false;
            }
        }
        if(tipo == 'save' && valido){
            valido = false; fGuardar();
        }
        if(valido) wizardPosicion++;
    } else wizardPosicion--;
    $('.next').show(); $('.previous').show(); $('.cancelar').show(); $('.guardar').show();
    if(wizardPosicion <= 0){
        wizardPosicion = 0;
        $('.previous').hide();
        $('.guardar').hide();
    }
    if(wizardPosicion >= (tabWizard.length - 1)){
        wizardPosicion = (tabWizard.length - 1);
        $('.next').hide();
        $('.cancelar').hide();
    } 
    if(wizardPosicion > 0 && wizardPosicion < (tabWizard.length - 1)){
        $('.cancelar').hide();
        $('.guardar').hide();
    }
    tabWizard[wizardPosicion].classList.remove('disabled');
    tabWizard[wizardPosicion].click();
    /* PROGRESO ENTRE TAB */
    for (var i = 0; i < tabWizard.length; i += 1) {
        tabWizard[i].classList.remove('done');
        if(i < wizardPosicion)
            tabWizard[i].classList.add('done');
    }
}

async function llenadoProvincias(idPais = 66, idCombo = 'selectProvincia', idSelector = -1, textSelector = '', idCanton = -1, textCanton = '') {
    await consultar(`provincia/${idPais}`, 'GET', null, localStorage.getItem('token'), 'ws').then(async (value) => {
        if(value.error!= '0'){
            activarToast(value.mensaje);
            $(`#${idCombo}`).html('');
        }
        else{
            let contenido = '';
            let idProvincia = 1;
            let provincias = value.datos;
            for (const provincia of provincias) {
                if(provincia.pro_nombre == textSelector) idProvincia = provincia.pro_id;
                if(provincia.pro_id == idSelector) idProvincia = provincia.pro_id;
                contenido += `<option value="${provincia.pro_id}" ${provincia.pro_nombre == textSelector ? 'selected' : ''} ${provincia.pro_id == idSelector ? 'selected' : ''}>${provincia.pro_nombre}</option>`;
            }
            $(`#${idCombo}`).html(contenido);
            await llenadoCantones(idProvincia, 'selectCiudad', idCanton, textCanton);
        }
    }).catch((err) => {
        activarToast(err.mensaje);
        console.log(err);
    });
}

async function llenadoCantones(idProvincia = 1, idCombo = 'selectCiudad', idSelector = -1, textSelector = ''){
    await consultar(`canton/${idProvincia}`, 'GET', null, localStorage.getItem('token'), 'ws').then((value) => {
        if(value.error != '0')
            activarToast(value.mensaje);
        else{
            let contenido = '';
            let cantones = value.datos;
            for (const canton of cantones) {
                contenido += `<option value="${canton.can_id}" ${canton.can_nombre == textSelector ? 'selected' : ''} ${canton.can_id == idSelector?'selected' : ''}>${canton.can_nombre}</option>`;
            }
            $(`#${idCombo}`).html(contenido);
        }
    }).catch((err) => {
        activarToast.error(err.message); 
        console.log(err);
    });
}

/* FUNCIONES PARA EXPORTAR */
function exportJSONToExcel(jsonData, filename = 'reporteDEBI'){
    var worksheet = XLSX.utils.json_to_sheet(jsonData);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Reporte");
    var workbookOutput = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
    saveAsExcelFile(workbookOutput, filename + '.xlsx');
}

function saveAsExcelFile(buffer, fileName) {
    var data = new Blob([buffer], { type: 'application/octet-stream' });
    var url = window.URL.createObjectURL(data);
    var link = document.createElement('a');
    link.href = url;
    link.download = fileName;
    link.click();
    setTimeout(function() {
        window.URL.revokeObjectURL(url);
    }, 100);
}

function exportJSONtoWord(jsonData, filename = 'repoteDEBI'){
    var link, blob, url, css;
    css = (
        `<style>
            @page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}
            div.WordSection1 {page: WordSection1;}
            table { 
                width: 100%; 
                border: 1px solid #000; 
            }
            th, td {
                width: 25%;
                text-align: left;
                vertical-align: top;
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 0.3em;
                caption-side: bottom;
            }
            th {
                text-align: center;
                background: #53AFAE;
                color: #fff
            }
         </style>`
    );
    blob = new Blob(['\ufeff', css + jsonTableHtml(jsonData)], {
        type: 'application/msword'
    });
    url = URL.createObjectURL(blob);
    link = document.createElement('A');
    link.href = url;
    link.download = filename;
    document.body.appendChild(link);
    if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, filename + '.doc');
        else link.click();
    document.body.removeChild(link);
}

function jsonTableHtml(jsonData){
    // La estructura es [{id:contenido}]
    let header = ''; let body = '';
    for (const item of jsonData) {
        if(!header.includes('</tr>')) header += '<tr>';
        body += '<tr>';
        for (const key in item) {
            if(!header.includes('</tr>')) header += `<th>${key}</th>`;
            body += `<td>${item[key]}</td>`;
        }
        if(!header.includes('</tr>')) header += '</tr>';
        body += '</tr>';
    }
    return `<table><thead>${header}</thead><tbody>${body}</tbody></table>`;
}

function exportJSONtoPDF(jsonData, filename = 'reporteDEBI'){
    const columns = [];
    if(jsonData.length > 0){
        for (const key in jsonData[0]) {
            columns.push({header: key, dataKey: key});
        }
    }
    var doc = new jsPDF();
    doc.autoTable({
        columns: columns,
        body: jsonData,
    })
    doc.save(filename + '.pdf')
}

function printJSON(jsonData, idButton = 'btnExport') {
    var contenido= jsonTableHtml(jsonData);
    var contenidoOriginal= document.body.innerHTML;
    document.body.innerHTML = contenido;
    window.print();
    document.body.innerHTML = contenidoOriginal;
    if(idButton != '')
        $(`#${idButton}`).click();
}

function imprimirError(error, mensaje, datos = null) {
    if (datos == null) {
        return {
            'error': error,
            'mensaje': mensaje
        };
    } else {
        return {
            'error': error,
            'mensaje': mensaje,
            'datos': datos
        };
    }
}