<template>
  <header class="header">
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top shadow navbar-light bg-white">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <RouterLink
            :to="{ name: 'Home' }"
            class="navbar-brand py-1"
          >
            <img
              src="/img/logo_aptoclick.png"
              style="mix-blend-mode:multiply;width:10rem;"
            >
          </RouterLink>
        </div>
        <button
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
          class="navbar-toggler navbar-toggler-right"
        >
          <i class="fa fa-bars" />
        </button>
        <!-- Navbar Collapse -->
        <div
          id="navbarCollapse"
          class="collapse navbar-collapse"
        >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <RouterLink
                :to="{ path: '/#home' }"
                class="nav-link"
              >
                ¿Qué es Aptoclick?
              </RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink
                :to="{ name: 'FAQ' }"
                class="nav-link"
              >
                Preguntas Frecuentes
              </RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink
                :to="{ name: 'Pricing' }"
                class="nav-link"
              >
                Tarifas
              </RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink
                :to="{ name: 'PropertiesIndex' }"
                class="nav-link"
              >
                Buscar Inmuebles
              </RouterLink>
            </li>
            <!--<li class="nav-item">
              <RouterLink
                :to="{ name: 'Contact' }"
                class="nav-link"
              >
                Contacto
              </RouterLink>
            </li>-->
            <li
              v-if="!isAuthenticated"
              class="nav-item"
            >
              <RouterLink
                :to="{ name: 'Login' }"
                class="nav-link"
              >
                Login
              </RouterLink>
            </li>
            <!--<li
              v-if="!isAuthenticated"
              class="nav-item"
            >
              <RouterLink
                :to="{ name: 'Register' }"
                class="nav-link"
              >
                Registro
              </RouterLink>
            </li>-->
            <li
              v-if="isAuthenticated"
              class="nav-item dropdown"
            >
              <a
                id="accountDropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                class="nav-link dropdown-toggle"
                href="#"
              >
                Cuenta
              </a>
              <div
                aria-labelledby="accountDropdownMenuLink"
                class="dropdown-menu dropdown-menu-right"
              >
                <h6 class="dropdown-header font-weight-normal">
                  Cuenta
                </h6>
                <RouterLink
                  :to="{ name: 'Account' }"
                  class="dropdown-item"
                >
                  Cuenta
                </RouterLink>
                <RouterLink
                  :to="{ name: 'Logout' }"
                  class="dropdown-item"
                >
                  Cerrar sesión
                </RouterLink>
                <div class="dropdown-divider" />
              </div>
            </li>
            <li class="nav-item mt-3 mt-lg-0 ml-lg-3 d-lg-none d-xl-inline-block">
              <RouterLink
                :to="{ name: 'PropertiesCreate' }"
                class="btn btn-primary"
              >
                Publica tu inmueble
              </RouterLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /Navbar -->
  </header>
</template>

<script>
import { authComputed } from "@/store/helpers"

export default {

    name: "PageHeader",

    computed: {
        ...authComputed
    },

    mounted() {
        return this.registerEvents()
    },

    methods: {
        registerEvents() {
            document.addEventListener("click", function(e) {
                if (e.target.closest("#navbarCollapse")) return

                window.$("#navbarCollapse").collapse("hide")
            })

            window.onscroll = function(e) {
                return window.$("#navbarCollapse").collapse("hide")
            }
        }
    }
}
</script>
