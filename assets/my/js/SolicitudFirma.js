function enviarSolicitud(){
  const data={
    comisionista: $('#formComi').val(),
    tipo_identificacion: $('#selectTIdentificacion').val(),
    identificacion: $('#formRuc').val(),
    nombre: $('#formNombres').val(),
    direcccion: $('#formDirec').val(),
    telefono: $('#formTele').val(),
    email: $('#fomrEmail').val(),
    tipo_firma: $('#formTipoFirma').val(),
    duracion: $('#formVigencia').val(),
    estado: 'R',
  };
    consultar(`solicitudFirma/`, 'POST', data, localStorage.getItem('token'), 'ws').then(async (value) => {
        if(value.error!= '0'){
            activarToast(value.mensaje);
        }else{
            const resp = await subirDocumentos(value.datos[0].sf_id);
            activarToast(value.mensaje, `${idioma != 'es' ? 'Correcto' : 'Correct'}`, '', 'success');
            if(resp == undefined)
                location.reload();
        }
    }).catch((err) => {
        activarToast(err.mensaje);
        console.log(err);
    });
}

var contenidoDatos = null;
function mostrarDiv() {
    $('#formSubidaDoc').html('');
    let idJunto = '';
    switch($('#formTipoFirma').val()){
        case '1': idJunto = 'formPn'; break;
        case '2': idJunto = 'formPj'; break;
        case '2': idJunto = 'formPjnS'; break;
    }
    consultar(`listaDocumentos/${$('#formTipoFirma').val()}`, 'GET', null, '2023debi0201', 'ws').then((value) => {
        if(value.error != '0')
            activarToast(value.mensaje);
        else{
            contenidoDatos = value.datos;
            let contenido = '';
            for (let index = 0; index < value.datos.length; index++) {
                const c = value.datos[index];
                if(index%2 == 0){
                    contenido += `
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="${idJunto}${index}">${c.dtf_descripcion} </label>
                            <input class="form-control" id="${idJunto}${index}"  type="file" accept="application/pdf, image/*" ${c.dtf_requerido == 'S' ? "required" : ''} />
                        </div>
                    `;
                }else{
                    contenido += `
                        <div class="col mb-3">
                            <label class="form-label" for="${idJunto}${index}">${c.dtf_descripcion}</label>
                            <input class="form-control " id="${idJunto}${index}"  type="file" accept="application/pdf, image/*" ${c.dtf_requerido == 'S' ? "required" : ''} />
                        </div>
                    </div>
                    `;
                }
            }
            if(value.datos.length % 2 != 0)
                contenido += '</div>';
            $('#formSubidaDoc').html(contenido);
        }
    }).catch(error => {
        activarToast(error.mensaje);
        console.log(error);
    });
}

$(document).ready(function(){
    if (selectedForm.length > 0)
        destruirChoise(selectedForm);
    $('#formTipoIdenti option[text="RUC"]').attr("selected", "selected");
    $('#formComi option[text="1091786547001"]').attr("selected", "selected");
    resetWizard();
    $('#identificacion').val('').removeClass('invalidar');
    $('#formRuc').removeClass('invalidar');
    $('#formRuc').removeClass('was-validated');
    selectedForm = crearChoise("selected-firma");  
    mostrarDiv();  
 });

let selectedForm = [];
function ciudadanosLlenado(){
$('#identificacion').val('').removeClass('invalidar');
$('#formRuc').removeClass('invalidar');
$('#formRuc').removeClass('was-validated');
const opcDni = $('#selectTIdentificacion option:selected').text();
const dni = $('#formRuc').val();
if(validarDNI(dni, opcDni)){
    consultar(`ciudadanoConsulta/${dni}`, 'GET', null, localStorage.getItem('token'), 'ws').then(value => {
        if(value.error != '0')
            activarToast(`${value.mensaje}, ingrese todos los datos`, 'Advertencia', 'Se creará registro', 'warning');
        else{
            const c = value.datos;
            $('#formNombres').val(c.nombre);
            $('#fomrEmail').val(c.correo);
            $('#formTele').val(c.telefono);
            $('#formDirec').val(c.direccion);
            if($('#formTipoFirma').val() == 'J'){
                $("#personaJ").show();
                $("#personaN").hide();

            }
        }
    }).catch((err) => {
        console.log(err);
        activarToast(err.mensaje);
    });
}else{
    $('#formRuc').addClass('invalidar');
  }
}

async function subirDocumentos(id){
    let indice = '';
    const valores = $('#direccionTab').html();
    switch($('#formTipoFirma').val()){
        case '1': indice = 'formPn'; break;
        case '2': indice = 'formPj'; break;
        case '2': indice = 'formPjnS'; break;
    };
    const files = {};
    for (let index = 0; index < contenidoDatos.length; index++) {
        const c = contenidoDatos[index];
        var file = $(`#${indice}${index}`).prop('files')[0];
        if(file != undefined){
            files[c.dtf_descripcion] = file;
        }
    }
    $('#direccionTab').html(`
        <div class="position-absolute top-50 start-50 loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
        <br><br>
    `);
    for (const key in files) {
        const file = files[key];
        if(file != undefined){
            const data = {
                file: await encodeFileToBase64(file),
                ruta: $('#formRuc').val(),
                name: `${key}.${file.type.split('/')[1]}`,
            };
            await consultar('subirArchivos', 'POST', data, null, 'ws').then(async (value) => {
                if(value.error != '0'){
                    activarToast(value.mensaje);
                    $('#direccionTab').html(valores);
                    return false;
                }else{
                    const doc ={
                        solicitud: id,
                        descripcion: data.name,
                        archivo: data.name,
                    };
                    await consultar('documentosFirma', 'POST', doc, null, 'ws').then((value) => {
                        if(value.error != '0'){
                            activarToast(value.mensaje);
                            $('#direccionTab').html(valores);
                            return false;
                        }
                    }).catch(error => {
                        activarToast(error.mensaje);
                        $('#direccionTab').html(valores);
                        console.log(error);
                        return false;
                    });
                }
            }).catch(error => {
                activarToast(error.mensaje);
                $('#direccionTab').html(valores);
                console.log(error);
                return false;
            });
        }
    }
}
