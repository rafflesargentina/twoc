<template>
  <div>
    <section>
      <!-- Slider main container-->
      <div class="swiper-container detail-slider slider-gallery">
        <!-- Additional required wrapper-->
        <div
          v-if="property.unfeatured_photos"
          class="swiper-wrapper"
        >
          <!-- Slides-->
          <div
            v-for="photo in property.unfeatured_photos"
            class="swiper-slide"
          >
            <a
              :href="photo.url"
              data-toggle="gallery-top"
            ><img
              :src="photo.url"
              alt="..."
              class="img-fluid"
            ></a>
          </div>
        </div>
        <div class="swiper-pagination swiper-pagination-white" />
        <div class="swiper-button-prev swiper-button-white" />
        <div class="swiper-button-next swiper-button-white" />
      </div>
    </section>
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-7">
          <div class="text-block">
            <p class="text-primary">
              <i class="fa fa-map-marker mr-1" /> {{ property.address.location }}
            </p>
            <h1>{{ property.title }}</h1>
            <p
              v-if="property.property_type"
              class="text-muted text-uppercase mb-4"
            >
              {{ property.property_type.name }}
            </p>
            <ul class="list-inline text-sm mb-4">
              <li class="list-inline-item mr-3">
                <i class="fa fa-car mr-1 text-secondary" /> {{ property.parking }} cocheras
              </li>
              <li class="list-inline-item mr-3">
                <i class="fa fa-bed mr-1 text-secondary" /> {{ property.rooms }} habitaciones
              </li>
              <li class="list-inline-item mr-3">
                <i class="fa fa-bath mr-1 text-secondary" /> {{ property.bathrooms }} baños 
              </li>
            </ul>
          </div>
          <div class="text-block">
            <h4 class="mb-0">
              Descripción
            </h4>
            <div
              class="text-muted"
              v-html="property.description || nullMessage"
            />
          </div>
          <div class="text-block">
            <h4 class="mb-0">
              Disponibilidad
            </h4>
            <div
              class="text-muted"
              v-html="property.description || nullMessage"
            />
          </div>
          <div
            v-if="property.amenities"
            class="text-block"
          >
            <h4 class="mb-0">
              Amenities
            </h4>
            <p
              v-if="property.amenities.length === 0"
              class="text-muted"
            >
              {{ nullMessage }}
            </p>
            <ul
              v-if="property.amenities.length > 0"
              class="list-inline"
            >
              <li
                v-for="item in property.amenities"
                class="list-inline-item mb-2"
              >
                <span class="badge badge-pill badge-light p-3 text-muted font-weight-normal">{{ item.name }}</span>
              </li>
            </ul>
          </div>
          <div
            v-if="property.facilities"
            class="text-block"
          >
            <h4 class="mb-0">
              Facilities
            </h4>
            <p
              v-if="property.facilities.length === 0"
              class="text-muted"
            >
              {{ nullMessage }}
            </p>
            <ul
              v-if="property.facilities.length > 0"
              class="list-inline"
            >
              <li
                v-for="item in property.facilities"
                class="list-inline-item mb-2"
              >
                <span class="badge badge-pill badge-light p-3 text-muted font-weight-normal">{{ item.name }}</span>
              </li>
            </ul>
          </div>
          <div
            v-if="property.user"
            class="text-block"
          >
            <div class="media">
              <!--<img
                :src="property.user.avatar.url"
                :alt="property.user.name"
                class="avatar avatar-lg mr-4"
              >-->
              <div class="media-body">
                <!--<p> <span class="text-muted text-uppercase text-sm">Publicado por </span><br><strong>{{ property.user.name }}</strong></p>-->
                <p> <span class="text-muted text-uppercase text-sm">Publicado por </span><br><strong class="h3 text-primary">aptoclick</strong></p>
                <!--<p class="text-muted text-sm mb-2">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.
                <p class="text-sm">
                  <a href="#">See Jack's 3 other listings <i class="fa fa-long-arrow-alt-right ml-2" /></a>
                </p>-->
              </div>
            </div>
          </div>
          <div class="text-block">
            <h5 class="mb-4">
              Ubicación en el mapa
            </h5>
            <div class="map-wrapper-300 mb-3">
              <div
                id="detailMap"
                class="h-100"
              />
            </div>
          </div>
          <div
            v-if="property.unfeatured_photos"
            class="text-block"
          >
            <h5 class="mb-4">
              Galería de fotos
            </h5>
            <div class="row gallery mb-3 ml-n1 mr-n1">
              <div
                v-for="photo in property.unfeatured_photos"
                class="col-lg-4 col-6 px-1 mb-2"
              >
                <a
                  :href="photo.url"
                  data-fancybox="gallery"
                ><img
                  :src="photo.url"
                  alt="..."
                  class="img-fluid"
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div
            style="top:100px;"
            class="p-4 shadow rounded sticky-top"
          >
            <div class="row">
              <div class="col-6">
                <p class="text-muted">
                  <span class="d-block">EN VENTA</span>
                  <span class="d-block text-primary h5">{{ formatMoney(property.sell_price) }}</span>
                </p>
              </div>
              <div class="col-6">
                <p class="text-muted">
                  <span class="d-block">MENSUALIDAD</span>
                  <span class="text-primary h5">{{ formatMoney(property.monthly_price) }}</span><span> / Por mes</span>
                </p>
              </div>
            </div>
            <hr>
            <p class="text-muted">
              <span class="d-block">AÑO 1</span>
              <span class="h5">{{ formatMoney(property.first_year_cost) }} + </span><span class="text-primary">0 de gastos</span> / por mes
            </p>
            <p class="text-muted">
              <span class="d-block">AÑO 2</span>
              <span class="h5">{{ formatMoney(property.second_year_cost) }} + </span><span class="text-primary">0 de gastos</span> / por mes
            </p>
            <p class="text-muted">
              <span class="d-block">AÑO 3</span>
              <span class="h5">{{ formatMoney(property.third_year_cost) }} + </span><span class="text-primary">0 de gastos</span> / por mes
            </p>
            <p class="text-muted">
              <span class="d-block">DESPUÉS DE 3 AÑOS</span>
              <span class="d-block text-center text-primary h4">{{ formatMoney(property.savings) }} acumulado para la compra del inmueble</span>
            </p>
            <hr>
            <p class="text-muted">
              <span class="text-muted">Falta pagar {{ formatMoney(property.remaining_balance) }}</span>
            </p>
            <div class="text-center">
              <button
                type="button"
                class="btn btn-block btn-primary"
                :disabled="isPropertyOwner"
                data-toggle="modal"
                data-target="#interested-modal"
              >
                ¡Estoy interesado!
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <InterestedModal
      :action="'/api/interested/' + $route.params.id"
      :method="'post'"
    />
  </div>
</template>

<script>
import { authComputed } from "@/store/helpers"
import { formatMoney } from "@aptoclick/utilities/helpers"
import { propertiesComputed, propertiesMethods } from "@aptoclick/store/helpers"
import { mapDetail } from "@/utilities/mixins/mapDetail"
import { theme } from "@/utilities/mixins/theme"

export default {

    mixins: [mapDetail, theme],

    data() {
        return {
            nullMessage: "No hay información especificada.",
            prepared: false,
            property: {},
        }
    },

    computed: {
        ...authComputed,
        ...propertiesComputed,

        isPropertyOwner() {
            if (this.isAuthenticated) {
                if (this.user.id === this.property.user_id) {
                    return true
                }
            }

            return false
        },
    },

    watch: {
        "$route" (value) {
            if (value.name === "PropertiesShow" && this.prepared) {
                this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...propertiesMethods,

        formatMoney,

        prepare() {
            var property = this.$store.dispatch("properties/fetchOneProperty", this.$route.params.id)
                .then(value => {
                    if (value) {
                        this.property = value

                        window.$(()=> {
                            this.setSwiper()
                            this.setDetailSlider()
                            this.setGallery()
    
                            this.createDetailMap({
                                circleShow: false,
                                mapId: "detailMap",
                                mapZoom: value.map.zoom,
                                mapCenter: [value.map.lat, value.map.lng],
                                markerShow: true,
                                markerPosition: [value.map.lat, value.map.lng],
                            })
                        })
                    }
                })

            return Promise.all([property])
        },

        setDetailSlider() {
            var detailSlider = new window.Swiper(".detail-slider", {
                slidesPerView: 3,
                spaceBetween: 0,
                centeredSlides: true,
                loop: true,
                breakpoints: {
                    991: {
                        slidesPerView: 4
                    },
                    565: {
                        slidesPerView: 3
                    }
                },
        
                // If we need pagination
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true
                },
        
                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            })
        },

        setGallery() {
            window.$(".slider-gallery").each(function () { // the containers for all your galleries
                window.$(this).magnificPopup({
                    delegate: "a", // the selector for gallery item
                    type: "image",
                    gallery: {
                        enabled: true,
                        tCounter: "" // markup of counter
                    }
                })
            })

            window.$(".gallery").each(function () { // the containers for all your galleries
                window.$(this).magnificPopup({
                    delegate: "a", // the selector for gallery item
                    type: "image",
                    gallery: {
                        enabled: true
                    }
                })
            })
        }
    }
}
</script>
