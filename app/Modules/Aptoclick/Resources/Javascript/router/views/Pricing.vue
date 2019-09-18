<template>
  <div>
    <section class="hero py-5">
      <div class="container position-relative">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb pl-0  justify-content-center">
          <li class="breadcrumb-item">
            <RouterLink :to="{ name: 'Home' }">
              Home
            </RouterLink>
          </li>
          <li class="breadcrumb-item active">
            Tarifas
          </li>
        </ol>
        <h1 class="hero-heading">
          Tarifas
        </h1>
        <RouterLink
          :to="{ name: 'ProperiesCreate' }"
          class="btn btn-primary mr-4"
        >
          Comienza ahora
        </RouterLink>
        <RouterLink
          :to="{ name: 'Contact' }"
          class="btn btn-outline-primary"
        >
          Contáctanos
        </RouterLink>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4" />
          <div class="col-md-4">
            <!-- pricing card-->
            <div class="card mb-5 mb-lg-0 border-0 card-highlight shadow-lg">
              <div class="card-status bg-primary" />
              <div class="card-body">
                <p class="text-muted text-center">
                  <span class="d-block h1 text-dark">2 Meses de Alquiler</span><span class="d-block ml-2">+ 5% del Monto de la Renta Mensual</span>
                </p>
                <hr>
                <ul class="fa-ul my-4">
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Avalúo Certificado del Inmueble
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Publicación en portales inmobiliarios
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Anuncio destacado
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Filtrado de interesados
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Soporte profesional (Call Center)
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Asesoría/ Protección Jurídica completa
                  </li>
                  <li class="mb-3">
                    <span class="fa-li text-primary"><i class="fa fa-check" /></span>Protección completa para evitar riesgos de impagos
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-4" />
        </div>
        <small class="d-block mt-4">*Cobramos 2 comisiones al Propietario: 1) Cuota de éxito de arrendamiento que corresponde a 2 meses de  Esta comisión se cobra en una sola exhibición el primer mes de renta por concepto de caso de éxito al conseguir al inquilino para el inmueble. Este se descuenta automáticamente del pago de renta del inquilino. 2) Comisión de Servicios de Arrendadores: 5% (cinco por ciento) del monto de la Renta Mensual. Esta comisión se cobra mensualmente por concepto de servicios de cobranza.</small>
      </div>
    </section>
  </div>
</template>
