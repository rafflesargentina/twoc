<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .25s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>

<template>
  <section class="py-6">  
    <div class="container-fluid">
      <div class="row px-xl-5">
        <div class="col-lg-2">
          <div
            style="top: 120px;"
            class="sticky-top mb-5"
          >
            <div class="sidebar-block">
              <h6 class="sidebar-heading ml-3">
                Cuenta
              </h6>
              <nav class="nav nav-pills flex-column">
                <RouterLink
                  :to="{ name: 'Account' }"
                  class="nav-link mb-2"
                >
                  Datos Personales
                </RouterLink>
                <RouterLink
                  :to="{ name: 'MyProperties' }"
                  class="nav-link mb-2"
                >
                  Mis Publicaciones
                </RouterLink>
                <RouterLink
                  :to="{ name: 'Logout' }"
                  class="nav-link mb-2"
                >
                  Cerrar sesión
                </RouterLink>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-8 position-relative">
          <RouterView />
        </div>
      </div>
    </div>
  </section>
</template>
