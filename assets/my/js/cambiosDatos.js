async function ciudadanoConsult(id, opcDni = 'RUC'){
    const w_ruc = $(`#${id}`).val();
    let datos = null;
    $(`#${id}`).removeClass('invalidar');
    if(validarDNI(w_ruc, opcDni)){
        await consultar(`clienteCuidadano/${w_ruc}`, 'GET', null, '', 'ws').then((value) => {
            if(value.error != '0')
                activarToast(`${value.mensaje}, ingrese todos los datos`, 'Advertencia', 'Se creará registro', 'warning');
            else{
                datos = value.datos;
            }
        }).catch(error =>{
            activarToast(`${error.mensaje}, si aún mantiene problemas contáctanos.`);
        });
    }else{
        $(`#${id}`).addClass('invalidar');
        activarToast('Verifique el RUC ingresado, si aún mantiene problemas contáctanos.');
    }
    return datos;
}