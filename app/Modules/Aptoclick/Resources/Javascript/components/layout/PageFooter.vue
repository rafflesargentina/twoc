<template>
  <!-- Footer-->
  <footer class="position-relative z-index-10">
    <!-- Main block - menus, subscribe form-->
    <div class="py-6 bg-gray-200 text-muted">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="font-weight-bold text-uppercase text-dark mb-3">
              <img
                src="/img/logo_aptoclick.png"
                style="mix-blend-mode:multiply;width:10rem;"
              >
            </div>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>-->
            <ul class="list-inline">
              <li class="list-inline-item">
                <a
                  href="#"
                  target="_blank"
                  title="twitter"
                  class="text-muted text-hover-primary"
                ><i class="fa fa-twitter" /></a>
              </li>
              <li class="list-inline-item">
                <a
                  href="#"
                  target="_blank"
                  title="facebook"
                  class="text-muted text-hover-primary"
                ><i class="fa fa-facebook" /></a>
              </li>
              <li class="list-inline-item">
                <a
                  href="#"
                  target="_blank"
                  title="instagram"
                  class="text-muted text-hover-primary"
                ><i class="fa fa-instagram" /></a>
              </li>
              <li class="list-inline-item">
                <a
                  href="#"
                  target="_blank"
                  title="pinterest"
                  class="text-muted text-hover-primary"
                ><i class="fa fa-pinterest" /></a>
              </li>
              <li class="list-inline-item">
                <a
                  href="#"
                  target="_blank"
                  title="vimeo"
                  class="text-muted text-hover-primary"
                ><i class="fa fa-vimeo" /></a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h6 class="text-uppercase text-dark mb-3">
              Enlaces útiles
            </h6>
            <ul class="list-unstyled">
              <li>
                <RouterLink
                  :to="{ name: 'Valorize' }"
                  class="text-muted"
                >
                  Estima el Valor de tu Propiedad
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  :to="{ name: 'Policy of Privacy' }"
                  class="text-muted"
                >
                  Política de Privacidad
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  :to="{ name: 'Terms and Conditions' }"
                  class="text-muted"
                >
                  Términos y Condiciones
                </RouterLink>
              </li>
              <li>
                <RouterLink
                  :to="{ name: 'Contact' }"
                  class="text-muted"
                >
                  Contacto
                </RouterLink>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h6 class="text-uppercase text-dark mb-3">
              Contacto
            </h6>
            <ul class="list-unstyled">
              <li>
                Av. Presidente Masaryk 61 int. 901-B,
              </li>
              <li>
                Col. Polanco, Miguel Hidalgo, Ciudad de México, CP 11560
              </li>
              <li>
                Teléfono: <a href="tel:+55 023-2006">+55 023-2006</a>
              </li>
              <li>
                E-mail: <a href="mailto:aptoclick@gmail.com">aptoclick@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright section of the footer-->
    <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-left">
            <p class="text-sm mb-md-0">
              &copy; 2019 Aptoclick. Todos los derechos reservados.
            </p>
          </div>
          <div class="col-md-6" />
        </div>
      </div>
    </div>
  </footer>
  <!-- /Footer end-->
</template>

<script>
export default {
    name: "PageFooter",
}
</script>
