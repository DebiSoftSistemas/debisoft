<br>
<div class="mb-3 mt-7">
  <div class="">
    <div class="row justify-content-center">
      <div class="col-12 text-center">
        <h5 class="card-title">Usted puede realizar un depósito o transferencia a una de las siguientes cuentas bancarias:</h5>
      </div>
      <?php
      if (isset($cBancarias)) {
        foreach ($cBancarias as $key => $value) { ?>
          <div class="col-12 text-center">
            <span class="form-label upper">
              <?php echo $value->dec_nombre . ' CTA. ' . $value->tipoCuenta . ' # ' . $value->cb_numero_cuenta; ?>
            </span>
          </div>
      <?php }
      }
      ?>
    </div>
  </div>
</div>
<br>
<div class="row justify-content-center">
  <div class="col-sm-10 col-lg-7 col-xxl-5  ">
    <div class="p-4 py-0  ">
      <div class="theme-wizard h-100 mb-5  ">
        <div class="card-header bg-light pt-3 pb-2">
          <ul class="nav justify-content-between nav-wizard">
            <li class="nav-item">
              <a class="nav-link active fw-semi-bold disabled" href="#datosGeneralesTab" data-bs-toggle="tab" data-wizard-step="data-wizard-step">
                <span class="nav-item-circle-parent">
                  <span class="nav-item-circle">
                    <span class="fas fa-user"></span>
                  </span>
                </span>
                <span class="d-none d-md-block mt-1 fs--1 text-dark">
                  <?php echo lang('Debi.lang_datosGe'); ?>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-semi-bold disabled" href="#direccionTab" data-bs-toggle="tab" data-wizard-step="data-wizard-step">
                <span class="nav-item-circle-parent">
                  <span class="nav-item-circle">
                    <span class="fas fa-file-alt"></span>
                  </span>
                </span>
                <span class="d-none d-md-block mt-1 fs--1 text-dark">
                  <?php echo lang('Debi.lang_documen'); ?>
                </span>
              </a>
            </li>
          </ul>
        </div>
        <!-- modal datos personales -->
        <div class="card-body py-4" id="wizard-controller">
          <div class="tab-content">
            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="datosGeneralesTab" id="datosGeneralesTab">
              <form class="wizard-form">
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label" for="formComi"><?php echo lang('Debi.lang_Comisio'); ?>
                      <span class="req">*</span></label>
                    <select class="form-select selected-firma " id="formComi" size="1" data-options='{"placeholder":true}'>
                      <?php
                      if (isset($comisionistas)) {
                        foreach ($comisionistas as $key => $value) { 
                          $selected = ($value->com_ruc === '1091786547001') ? 'selected' : '';
                          ?>
                          <option value="<?php echo $value->com_ruc; ?>" <?php echo $selected; ?>><?php echo $value->com_razon_social ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col mb-3">
                    <label class="form-label" for="formTipoFirma"><?php echo lang('Debi.lang_tFirma'); ?>
                      <span class="req">*</span></label>
                    <select class="form-select selected-firma" onchange="mostrarDiv();" id="formTipoFirma" size="1" data-options='{"placeholder":true}'>
                      <?php
                      if (isset($tFirma)) {
                        foreach ($tFirma as $key => $value) { ?>
                          <option value="<?php echo $value->tf_id; ?>"><?php echo $value->tf_descripcion ?></option>
                      <?php }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label" for="selectTIdentificacion"><?php echo lang('Ventas.tIdentificacion'); ?>
                      <span class="req">*</span></label>
                    <select class="form-select selected-firma" id="selectTIdentificacion" size="1" data-options='{"placeholder":true}' required="required">
                      <?php
                      if (isset($tIdentificacion)) {
                        foreach ($tIdentificacion as $key => $value) {
                          echo '<option value="' . $value->ti_codigo . '">' . $value->ti_nombre . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col mb-3">
                    <label class="form-label" for="formRuc"><?php echo lang('Debi.lang_ruc'); ?>
                      <span class="req">*</span></label>
                    <input class="form-control numeric entero" id="formRuc" type="text" maxlength="13" onBlur="ciudadanosLlenado();" dniVal="selectTIdentificacion" required />
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label" for="formNombres"><?php echo lang('Debi.lang_nomCom'); ?> <span class="req">*</span></label>
                    <input class="form-control upper " id="formNombres" maxlength="10" type="text" required />
                  </div>
                  <div class="col mb-3">
                    <label class="form-label" for="formDirec"><?php echo lang('Debi.lang_direc'); ?></label>
                    <input class="form-control upper" id="formDirec" maxlength="10" type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <label class="form-label" for="formTele"><?php echo lang('Debi.lang_telefono'); ?> <span class="req">*</span></label>
                    <input class="form-control numeric entero" id="formTele" maxlength="10" type="text" required />
                  </div>
                  <div class="col mb-3">
                    <label class="form-label" for="fomrEmail"><?php echo lang('Debi.lang_email'); ?></label>
                    <input class="form-control" id="fomrEmail" maxlength="10" type="text" required />
                  </div>
                </div>
                <div class="row">
                  <div class="col-6 mb-3">
                    <label class="form-label" for="formVigencia"><?php echo lang('Debi.lang_tipoVivengias'); ?>
                      <span class="req">*</span></label>
                    <select class="form-select selected-firma" id="formVigencia" size="1" data-options='{"placeholder":true}' required="required">
                      <?php
                      if (isset($vigencia)) {
                        foreach ($vigencia as $key => $value) {
                          echo '<option value="' . $value->dec_id . '">' . $value->dec_nombre . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <!-- Subir Documentos -->
            <div class="tab-pane  px-sm-3 px-md-5" role="tabpanel" aria-labelledby="direccionTab" id="direccionTab">

              <form class="wizard-form" id="formSubidaDoc">
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer bg-light">
          <div class="px-sm-3 px-md-5">
            <ul class="pager wizard list-inline mb-0">
              <li class="cancelar">
                <button class="btn btn-outline-danger" type="button" onclick="location.href='<?php echo base_url(); ?>';">
                  <span class="fas fa-times ms-2" data-fa-transform="shrink-3"></span>
                  <?php echo lang('App.general.cancelar'); ?>
                </button>
              </li>
              <li class="previous">
                <button class="btn btn-outline-warning" type="button" onclick="prevnextWizard('prev')"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span><?php echo lang('App.general.anterior'); ?></button>
              </li>
              <li class="next">
                <button class="btn btn-outline-primary" type="submit" onclick="prevnextWizard('next')"><?php echo lang('App.general.siguiente'); ?><span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3">
                  </span></button>
              </li>
              <li class="guardar">
                <button class="btn btn-outline-primary" type="submit" onclick="prevnextWizard('save', enviarSolicitud)"><?php echo lang('App.general.guardar'); ?><span class="fas fa-save ms-2" data-fa-transform="shrink-3">
                  </span></button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row justify-content-end text-end">
        <div class="col mb-3">
          <label class="form-label upper ps-3 text-dark"><?php echo lang('Debi.lang_consulta'); ?></label>
            <a href="https://api.whatsapp.com/send/?phone=593992395327&text=Hola%2C+me+gustar%C3%ADa+obtener+m%C3%A1s+informaci%C3%B3n+acerca+de+un+producto.&app_absent=0" class="ps-2"><span class="fab fa-whatsapp text-success fs-8"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url(); ?>assets/my/js/SolicitudFirma.js"></script>

<script src="<?php echo base_url(); ?>assets/vendors/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/anchorjs/anchor.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/is/is.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/swiper/swiper-bundle.min.js"> </script>
<script src="<?php echo base_url(); ?>assets/vendors/typed.js/typed.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/fontawesome/all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/lodash/lodash.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="<?php echo base_url(); ?>assets/vendors/list.js/list.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/theme.js"></script>
<script src="<?php echo base_url(); ?>assets/my/js/validaciones.js"></script>
<script src="<?php echo base_url(); ?>assets/my/js/general.js"></script>
<script src="<?php echo base_url(); ?>assets/my/js/portada/portada.js"></script>

<script src="<?php echo base_url(); ?>assets/vendors/chart/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/countup/countUp.umd.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/echarts/echarts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/data/world.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/lodash/lodash.min.js"></script>