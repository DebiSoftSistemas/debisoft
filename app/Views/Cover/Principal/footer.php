<section class="bg-dark pt-8 pb-4" data-bs-theme="light">
  <div class="container">
    <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner" data-bs-offset-top="0">
        <span class="fas fa-chevron-up" data-fa-transform="rotate-45">
        </span>
      </a>
    </div>
    <div class="row">
      <div class="col ps-lg-6 ps-xl-8">
        <div class="row mt-5 mt-lg-0">
          <div class="col-6 col-md-3">
            <h5 class="text-uppercase text-white opacity-85 mb-3"><?php echo lang('Cover.footer.inferior.paginal'); ?></h5>
            <ul class="list-unstyled">
              <li class="mb-1"><a class="link-600" href="<?php echo base_url(); ?>politicas"><?php echo lang('Cover.footer.inferior.terminos'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="<?php echo base_url(); ?>politicas"><?php echo lang('Cover.footer.inferior.politica'); ?></a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h5 class="text-uppercase text-white opacity-85 mb-3"><?php echo lang('App.general.empresa'); ?></h5>
            <ul class="list-unstyled">
              <li class="mb-1"><a class="link-600" href="#banner"><?php echo lang('Cover.footer.inferior.inicio'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="#nuestroso"><?php echo lang('Cover.menu.superior.nuestros'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="#optimiza"><?php echo lang('Cover.menu.superior.nuestros.optimizae'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="#historia"><?php echo lang('Cover.menu.superior.nuestros.historiae'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="#contactanos"><?php echo lang('Cover.menu.superior.nuestros.contacto'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="#ubicanos"><?php echo lang('Cover.menu.superior.nuestros.ubicanos'); ?></a></li>
            </ul>
          </div>
          <div class="col mt-5 mt-md-0">
            <h5 class="text-uppercase text-white opacity-85 mb-3"><?php echo lang('Cover.footer.inferior.recursot'); ?></h5>
            <ul class="list-unstyled">
              <li class="mb-1"><a class="link-600" href="#!"><?php echo lang('Cover.footer.inferior.producto'); ?></a></li>
              <li class="mb-1"><a class="link-600" href="https://www.youtube.com/channel/UCh7r497E2N2ZfJr8EMCCdVg"><?php echo lang('Cover.footer.inferior.canaly'); ?></a></li>
            </ul>
          </div>
          <div class="col mt-5 mt-md-0">
            <div class="icon-group">
              <a class="icon-item bg-white text-facebook" href="https://www.facebook.com/debisoft.ec"><span class="fab fa-facebook-f"></span></a>
              <a class="icon-item bg-white text-youtube" href="https://www.youtube.com/channel/UCh7r497E2N2ZfJr8EMCCdVg"><span class="fab fa-youtube"></span></a>
              <a class="icon-item bg-white text-success text-whatsapp" href="https://api.whatsapp.com/send/?phone=593992395327&text=Hola%2C+me+gustar%C3%ADa+obtener+m%C3%A1s+informaci%C3%B3n+acerca+de+un+producto.&type=phone_number&app_absent=0"><span class="fab fa-whatsapp"></span></a>
              <a class="icon-item bg-white text-tiktok" href="https://www.tiktok.com/@debisoft.contadores"><span class="fab fa-tiktok"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->
<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 bg-dark" data-bs-theme="light">
  <hr class="my-0 text-600 opacity-25" />
  <div class="container">
    <div class="row">
      <div class="row mt-5 mt-lg-0">
        <div class="col-2 col-md-9 icon-group">
          <p class="mb-0 text-600"><?php echo lang('Cover.footer.inferior.copyr'); ?><span class="d-noned-sm-inline-block">|
        </div>
      </div>
    </div>
  </div>
  <!-- end of .container-->
</section>
<!-- <section> close ============================-->
<!-- ============================================-->
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

<div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
  <div class="offcanvas-header settings-panel-header bg-shape">
    <div class="z-1 py-1" data-bs-theme="light">
      <div class="d-flex justify-content-between align-items-center mb-1">
        <h5 class="text-white mb-0 me-2"><span class="fas fa-palette me-2 fs-0"></span><?php echo lang('App.personalizacion.cabecera.config'); ?>
        </h5>
        <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset" style="font-size:12px"> <span class="fas fa-redo-alt me-1" data-fa-transform="shrink-3"></span><?php echo lang('App.personalizacion.cabecera.reiniciar'); ?></button>
      </div>
      <p class="mb-0 fs--1 text-white opacity-75">
        <?php echo lang('App.personalizacion.cabecera.descripcion'); ?></p>
    </div>
    <button class="btn-close btn-close-white z-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body scrollbar-overlay px-x1 h-100" id="themeController">
    <h5 class="fs-0"><?php echo lang('App.personalizacion.esquema.titulo'); ?></h5>
    <p class="fs--1"><?php echo lang('App.personalizacion.esquema.descripcion'); ?></p>
    <div class="btn-group d-block w-100 btn-group-navbar-style">
      <div class="row gx-2">
        <div class="col-6">
          <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
          <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="<?php echo base_url(); ?>assets/assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span class="label-text"><?php echo lang('App.personalizacion.esquema.claro'); ?></span></label>
        </div>
        <div class="col-6">
          <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
          <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="<?php echo base_url(); ?>assets/assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span class="label-text">
              <?php echo lang('App.personalizacion.esquema.oscuro'); ?></span></label>
        </div>
      </div>
    </div>
    <hr />
    <div class="d-flex justify-content-between">
      <div class="d-flex align-items-start"><img class="me-2" src="<?php echo base_url(); ?>assets/assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
        <div class="flex-1">
          <h5 class="fs-0"><?php echo lang('App.personalizacion.modoRTL.titulo'); ?></h5>
          <p class="fs--1 mb-0"><?php echo lang('App.personalizacion.modoRTL.descripcion'); ?></p>
        </div>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
      </div>
    </div>
    <hr />
    <div class="d-flex justify-content-between">
      <div class="d-flex align-items-start"><img class="me-2" src="<?php echo base_url(); ?>assets/assets/img/icons/arrows-h.svg" width="20" alt="" />
        <div class="flex-1">
          <h5 class="fs-0"><?php echo lang('App.personalizacion.diseño.titulo'); ?></h5>
          <p class="fs--1 mb-0"><?php echo lang('App.personalizacion.diseño.descripcion'); ?></p>
        </div>
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
      </div>
    </div>
    <hr />
    <h5 class="fs-0 d-flex align-items-center"><?php echo lang('App.personalizacion.estilo.titulo'); ?></h5>
    <p class="fs--1 mb-0"><?php echo lang('App.personalizacion.estilo.descripcion'); ?></p>
    <div class="btn-group d-block w-100 btn-group-navbar-style">
      <div class="row gx-2">
        <div class="col-6">
          <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
          <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="<?php echo base_url(); ?>assets/assets/img/generic/default.png" alt="" /><span class="label-text">
              <?php echo lang('App.personalizacion.estilo.transparente'); ?></span></label>
        </div>
        <div class="col-6">
          <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
          <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="<?php echo base_url(); ?>assets/assets/img/generic/inverted.png" alt="" /><span class="label-text">
              <?php echo lang('App.personalizacion.estilo.oscuro'); ?></span></label>
        </div>
        <div class="col-6">
          <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
          <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="<?php echo base_url(); ?>assets/assets/img/generic/card.png" alt="" /><span class="label-text">
              <?php echo lang('App.personalizacion.estilo.claro'); ?></span></label>
        </div>
        <div class="col-6">
          <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
          <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="<?php echo base_url(); ?>assets/assets/img/generic/vibrant.png" alt="" /><span class="label-text"> <?php echo lang('App.personalizacion.estilo.azul'); ?></span></label>
        </div>
      </div>
    </div>
  </div>
</div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
  <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
    <div class="bg-primary-subtle position-relative rounded-start" style="height:34px;width:28px">
      <div class="settings-popover">
        <span class="ripple">
          <span class="fa-spin position-absolute all-0 d-flex flex-center">
            <span class="icon-spin position-absolute all-0 d-flex flex-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#32a4a4"></path>
              </svg>
            </span>
          </span>
        </span>
      </div>
    </div>
    <small class="text-uppercase text-primary fw-bold bg-primary-subtle py-2 pe-2 ps-1 rounded-end"><?php echo lang('App.personalizacion.boton'); ?></small>
  </div>
</a>


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
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



</body>

</html>