<template>
  <div>
    <!-- Hero Section-->
    <section class="hero py-6 py-lg-7 text-white dark-overlay">
      <img
        src="img/photo/photo-1522143049013-2519756a52d4.jpg"
        alt="¿Cómo podemos ayudarte hoy?"
        class="bg-image"
      >
      <div class="container overlay-content">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb text-white justify-content-center no-border mb-0">
          <li class="breadcrumb-item">
            <RouterLink :to="{ name: 'Home' }">
              Home
            </RouterLink>
          </li>
          <li class="breadcrumb-item active">
            Contacto
          </li>
        </ol>
        <h1 class="hero-heading">
          ¿Cómo podemos ayudarte hoy?
        </h1>
      </div>
    </section>
    <section class="py-6">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center text-md-left mb-4 mb-md-0">
            <div class="icon-rounded mb-4 bg-primary-light">
              <svg class="svg-icon w-2rem h-2rem text-primary">
                <use xlink:href="#map-location-1" />
              </svg>
            </div>
            <h3 class="h5">
              Dirección
            </h3>
            <p class="text-muted">
              Av. Presidente Masaryk 61 int. 901-B, Col. Polanco, Miguel Hidalgo, Ciudad de México, CP 11560
            </p>
          </div>
          <div class="col-md-4 text-center text-md-left mb-4 mb-md-0">
            <div class="icon-rounded mb-4 bg-primary-light">
              <svg class="svg-icon w-2rem h-2rem text-primary">
                <use xlink:href="#landline-1" />
              </svg>
            </div>
            <h3 class="h5">
              Teléfono
            </h3>
            <p class="text-muted">
              <strong>+55 023-2006</strong>
            </p>
          </div>
          <div class="col-md-4 text-center text-md-left mb-4 mb-md-0">
            <div class="icon-rounded mb-4 bg-primary-light">
              <svg class="svg-icon w-2rem h-2rem text-primary">
                <use xlink:href="#mail-1" />
              </svg>
            </div>
            <h3 class="h5">
              Correo electrónico
            </h3>
            <ul class="list-unstyled text-muted">
              <li>aptoclick@gmail.com</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6 bg-gray-100">
      <div class="container">
        <h2 class="h4 mb-5">
          Formulario
        </h2>
        <div class="row">
          <div class="col-md-7 mb-5 mb-md-0">
            <ContactForm
              :action="'/contact'"
              :method="'post'"
            />
          </div>
          <div class="col-md-5" />
        </div>
      </div>
    </section>
    <div class="map-wrapper-300">
      <div
        id="detailMap"
        class="h-100"
      />
    </div>
  </div>
</template>

<script>
import { mapDetail } from "@/utilities/mixins/mapDetail"

export default {
    mixins: [mapDetail],

    mounted() {
        this.createDetailMap({
            mapId: "detailMap",
            mapCenter: [19.4316206, -99.1858359],
            markerShow: true,
            markerPosition: [19.4316206, -99.1858359],
            markerPath: "img/marker.svg",
        })
    }
}
</script>
