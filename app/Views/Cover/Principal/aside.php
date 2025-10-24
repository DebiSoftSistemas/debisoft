<body>
  <button class="btn btn-primary" style="display: none;" id="liveToastBtn" type="button">Show live toast</button>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1056">
      <div class="toast fade" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-primary text-white"><strong class="me-auto">Bootstrap</strong><small>11 mins ago</small>
          <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body text-black">Hello, world! This is a toast message.</div>
      </div>
  </div>
  <script>idioma = <?php if(isset($idioma)) echo json_encode($idioma); else echo json_encode('es');?>;</script>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
      <div class="container"><a class="navbar-brand" href="<?php echo base_url(); ?>cover"><span class="text-white dark__text-white"><img src="<?php echo base_url(); ?>assets/assets/img/icons/spot-illustrations/empresa.png" alt="" width="175" height="60" /></span></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
          <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="documentations"><?php echo lang('Cover.menu.superior.nuestro'); ?></a>
              <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="documentations">
                <div class="bg-white dark__bg-1000 rounded-3 py-2">
                  <a class="dropdown-item link-600 fw-medium" href="<?php echo base_url(); ?>debiconta">DEBICONTA</a>
                  <a class="dropdown-item link-600 fw-medium" href="<?php echo base_url(); ?>debifact">DEBIFACT</a>
                  <a class="dropdown-item link-600 fw-medium" href="<?php echo base_url(); ?>debisijap">SIJAP Y SIJAR</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-primary" href="<?php if(isset($sinAccion)) echo '#'; else echo base_url();?>contactanos"><?php echo lang('Cover.menu.superior.nuestros.contacto'); ?></a>
            </li>
            <!--li class="nav-item dropdown">
              <a class="nav-link text-primary upper" href="<?php echo base_url(); ?>solicitarFirma"><?php echo lang('Cover.menu.superior.nuestros.SolicitarFrima'); ?></a>
            </li-->
          </ul>
          <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
            <!-- BOTON DE TEMA -->
            <li class="nav-item d-none d-sm-block">
              <div class="theme-control-toggle fa-icon-wait">
                <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo lang('App.menu.superior.temaClaro'); ?>"><span class="fas fa-sun fs-0"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo lang('App.menu.superior.temaOscuro'); ?>"><span class="fas fa-moon fs-0"></span></label>
              </div>
            </li>
            <!-- BOTON DE IDIOMA -->
            <li class="nav-item dropdown">
              <!-- Agregar  notification-indicator notification-indicator-primary en class <a> para punto de notificaion -->
              <a class="nav-link px-0 fa-icon-wait text-primary" id="navbarDropdownIdioma" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-language" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
              <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownIdioma">
                <div class="card card-notification shadow-none">
                  <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                      <div class="col-auto">
                        <h6 class="card-header-title mb-0">
                          <?php echo lang('App.menu.superior.idioma'); ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="scrollbar-overlay" style="max-height:19rem">
                    <div class="list-group list-group-flush fw-normal fs--1">
                      <!-- Agregar notificaciones -->
                      <div class="list-group-item">
                        <a id="optionIngles" class="notification notification-flush <?php if ($idioma == 'en') echo 'notification-unread';
                                                                                    else 'notification-read'; ?>" value="en" onclick="changeIdioma('optionIngles', 'en')" style="cursor: pointer">
                          <div class="notification-avatar">
                            <div class="avatar avatar-2xl me-3">
                              <img class="rounded-circle" src="<?php echo base_url(); ?>assets/assets/img/icons/spot-illustrations/eeuu.jpg" alt="" />
                            </div>
                          </div>
                          <div class="notification-body">
                            <p class="mb-1"><strong>English / Inglés - (Estados
                                Unidos)</strong></p>
                          </div>
                        </a>
                        <a id="optionEspanol" class="notification notification-flush <?php if ($idioma == 'es') echo 'notification-unread';
                                                                                      else 'notification-read'; ?>" value="es" onclick="changeIdioma('optionEspanol', 'es')" style="cursor: pointer">
                          <div class="notification-avatar">
                            <div class="avatar avatar-2xl me-3">
                              <img class="rounded-circle" src="<?php echo base_url(); ?>assets/assets/img/icons/spot-illustrations/españa.jpg" alt="" />
                            </div>
                          </div>
                          <div class="notification-body">
                            <p class="mb-1"><strong>Spanish / Español - Español
                                (España)</strong></p>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- ============================================-->
    <!-- <section> begin ============================-->