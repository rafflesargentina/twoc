<style lang="scss" scoped>
img.embed-responsive-item {
  object-fit: cover;
}
</style>

<template>
  <div>
    <div class="container-fluid pt-5 pb-3 border-bottom px-lg-5">
      <div class="row">
        <div class="col-xl-8">
          <h1>Busca una propiedad</h1>
        </div>
      </div>
    </div>
    <div class="container-fluid py-5 px-lg-5">
      <div class="row">
        <div class="col-lg-3 pt-3">
          <form
            action="#"
            autocomplete="off"
            class="pr-xl-3"
          >
            <div class="mb-4">
              <label
                for="property_type_id"
                class="form-label"
              >Tipo de propiedad</label>
              <select
                id="property_type_id"
                name="property_type_id"
                data-style="btn-selectpicker"
                class="selectpicker form-control"
              >
                <option
                  value=""
                  :selected="true"
                >
                  Tipo de Propiedad
                </option>
                <option
                  v-for="item in propertyTypes"
                  :key="item.id"
                  :value="item.id"
                >
                  {{ item.name }}
                </option>
              </select>
            </div>
            <div class="mb-4">
              <label
                for="property_condition_id"
                class="form-label"
              >Estado de la propiedad</label>
              <select
                id="property_condition_id"
                name="property_condition_id"
                data-style="btn-selectpicker"
                class="selectpicker form-control"
              >
                <option
                  value=""
                  :selected="true"
                >
                  Estado de la Propiedad
                </option>
                <option
                  v-for="item in propertyConditions"
                  :key="item.id"
                  :value="item.id"
                >
                  {{ item.name }}
                </option>
              </select>
            </div>
            <div class="mb-4">
              <label class="form-label">Rango de precios</label>
              <div
                id="slider-snap"
                class="text-primary"
              />
              <div class="nouislider-values">
                <div class="min">
                  Desde $<span id="slider-snap-value-from" />
                </div>
                <div class="max">
                  Hasta $<span id="slider-snap-value-to" />
                </div>
              </div>
              <input
                id="slider-snap-input-from"
                v-model="form.sell_price_from"
                type="hidden"
                name="sell_price_from"
                value="40"
              >
              <input
                id="slider-snap-input-to"
                v-model="form.sell_price_to"
                type="hidden"
                name="sell_price_to"
                value="110"
              >
            </div>
            <div class="pb-4">
              <div
                id="moreFilters"
                :class="{ 'show': Object.keys($route.query).length > 0 }"
                class="collapse"
              >
                <div class="filter-block">
                  <h6 class="mb-3">
                    Ubicación
                  </h6>
                  <div class="form-group mb-4">
                    <label
                      for="autocomplete"
                      class="form-label"
                    >Ciudad</label>
                    <input
                      id="autocomplete"
                      v-model="form.locality"
                      class="form-control"
                      name="locality"
                      @input="geolocate"
                    >
                  </div>
                </div>
                <div class="filter-block">
                  <h6 class="mb-3">
                    Disposición
                  </h6>
                  <div class="form-group mb-2">
                    <label class="form-label">Habitaciones</label>
                    <div class="d-flex align-items-center">
                      <div
                        class="btn btn-items btn-items-decrease"
                        @click="decreaseRooms"
                      >
                        -
                      </div>
                      <input
                        v-model="form.rooms"
                        type="text"
                        name="rooms"
                        class="form-control input-items"
                      >
                      <div
                        class="btn btn-items btn-items-increase"
                        @click="increaseRooms"
                      >
                        +
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-2">
                    <label class="form-label">Baños</label>
                    <div class="d-flex align-items-center">
                      <div
                        class="btn btn-items btn-items-decrease"
                        @click="decreaseBathrooms"
                      >
                        -
                      </div>
  
                      <input
                        v-model="form.bathrooms"
                        type="text"
                        name="bathrooms"
                        class="form-control input-items"
                      >
                      <div
                        class="btn btn-items btn-items-increase"
                        @click="increaseBathrooms"
                      >
                        +
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-2">
                    <label class="form-label">Cocheras</label>
                    <div class="d-flex align-items-center">
                      <div
                        class="btn btn-items btn-items-decrease"
                        @click="decreaseParking"
                      >
                        -
                      </div>
                      <input
                        v-model="form.parking"
                        type="text"
                        name="parking"
                        class="form-control input-items"
                      >
                      <div
                        class="btn btn-items btn-items-increase"
                        @click="increaseParking"
                      >
                        +
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mb-4">
                <button
                  type="button"
                  data-toggle="collapse"
                  data-target="#moreFilters"
                  :aria-expanded="Object.keys($route.query).length > 0"
                  aria-controls="moreFilters"
                  data-expanded-text="Menos filtros"
                  data-collapsed-text="Más filtros"
                  class="btn btn-link btn-collapse text-secondary pl-0"
                >
                  Más filtros
                </button>
              </div>
              <div class="mb-4">
                <button
                  type="submit"
                  class="btn btn-block btn-primary mb-3"
                >
                  <i class="fa fa-filter mr-1" />Filtrar
                </button>
                <button
                  type="reset"
                  class="btn btn-block btn-primary"
                >
                  <i class="fa fa-times mr-1" />Reestablecer
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-9">
          <div class="d-flex justify-content-between align-items-center flex-column flex-md-row mb-4">
            <div class="mr-3">
              <p class="mb-3 mb-md-0">
                <strong v-if="$refs.pagination">{{ $refs.pagination.paginator.items.length }}</strong> resultados encontrados
              </p>
            </div>
            <div>
              <label
                for="form_sort"
                class="form-label mr-2"
              >Ordenar por</label>
              <select
                id="form_sort"
                name="sort"
                data-style="btn-selectpicker"
                title=""
                class="selectpicker"
              >
                <option value="sortBy_0">
                  Most popular
                </option>
                <option value="sortBy_1">
                  Recommended
                </option>
                <option value="sortBy_2">
                  Newest
                </option>
                <option value="sortBy_3">
                  Oldest
                </option>
                <option value="sortBy_4">
                  Closest
                </option>
              </select>
            </div>
          </div>
          <div
            v-for="(chunk, key) in chunks"
            class="row"
          >
            <!-- place item-->
            <div
              v-for="item in chunk"
              data-marker-id="59c0c8e33b1527bfe2abaf92"
              class="col-sm-6 col-xl-4 mb-5"
            >
              <div class="card h-100 border-0 shadow">
                <div class="card-img-top embed-responsive embed-responsive-4by3 overflow-hidden gradient-overlay">
                  <img
                    :src="item.featured_photo.url"
                    alt="Modern, Well-Appointed Room"
                    class="w-100 embed-responsive-item"
                  ><RouterLink
                    :to="{ name: 'PropertiesShow', params: { id: item.id }}"
                    class="tile-link"
                  />
                  <div
                    v-if="item.user"
                    class="card-img-overlay-bottom z-index-20"
                  >
                    <div class="media text-white text-sm align-items-center">
                      <div
                        class="avatar avatar-border-white bg-primary mr-2"
                      />
                      <div class="media-body">
                        <strong>aptoclick</strong>
                      </div>
                    </div>
                  </div>
                  <div class="card-img-overlay-top text-right">
                    <a
                      href="javascript: void();"
                      class="card-fav-icon position-relative z-index-40"
                    >
                      <svg class="svg-icon text-white">
                        <use xlink:href="#heart-1" />
                      </svg></a>
                  </div>
                </div>
                <div class="card-body d-flex align-items-center">
                  <div class="w-100">
                    <h6 class="card-title">
                      <RouterLink
                        :to="{ name: 'PropertiesShow', params: { id: item.id }}"
                        class="text-decoration-none text-dark"
                      >
                        {{ item.title }}
                      </RouterLink>
                    </h6>
                    <div class="d-flex card-subtitle mb-3">
                      <p class="flex-grow-1 mb-0 text-muted text-sm">
                        {{ item.property_type.name }}
                      </p>
                      <!--<p class="flex-shrink-1 mb-0 card-stars text-xs text-right"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>
                      </p>-->
                    </div>
                    <p class="card-text text-muted">
                      <span class="h4 text-primary">{{ formatMoney(item.sell_price) }}</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pagination -->
          <Pagination
            ref="pagination"
            :items="properties"
            @pagination-items-change="setChunks"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { chunk } from "lodash"
import { amenitiesComputed, amenitiesMethods, facilitiesComputed, facilitiesMethods, propertiesComputed, propertiesMethods, propertyConditionsComputed, propertyConditionsMethods, propertyTypesComputed, propertyTypesMethods } from "@aptoclick/store/helpers"
import { deepClone } from "@/utilities/helpers"
import { formatMoney } from "@aptoclick/utilities/helpers"
import { gmaps } from "@/utilities/mixins/gmaps"
import { theme } from "@/utilities/mixins/theme"

import store from "@/store"
import Form from "@/utilities/Form"

var fields = { locality: "", sublocality: "", sell_price_from: 0, sell_price_to: 60000000, ...deepClone(store.state.properties.initialState.one) }

export default {

    mixins: [theme, gmaps],

    data() {
        return {
            amenities: [],
            chunks: [],
            facilities: [],
            form: new Form(fields),
            prepared: false,
            properties: [],
            propertyConditions: [],
            propertyTypes: [],
        }
    },

    computed: {
        ...amenitiesComputed,
        ...facilitiesComputed,
        ...propertiesComputed,
        ...propertyConditionsComputed,
        ...propertyTypesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "PropertiesIndex" && this.prepared) {
                this.prepare()
            }
        },

        place (value) {
            this.form.locality = value.address_components[0].long_name
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    mounted() {
        return this.initAutocomplete("autocomplete", {types: ["(cities)"], componentRestrictions: {country: "mx"}})
    },

    methods: {
        ...amenitiesMethods,
        ...facilitiesMethods,
        ...propertiesMethods,
        ...propertyConditionsMethods,
        ...propertyTypesMethods,

        formatMoney,

        decreaseBathrooms() {
            if (this.form.bathrooms > 0) {
                this.form.bathrooms--
            }
        },

        increaseBathrooms() {
            if (this.form.bathrooms < 10) {
                this.form.bathrooms++
            }
        },

        decreaseParking() {
            if (this.form.parking > 0) {
                this.form.parking--
            }
        },

        increaseParking() {
            if (this.form.parking < 10) {
                this.form.parking++
            }
        },

        decreaseRooms() {
            if (this.form.rooms > 0) {
                this.form.rooms--
            }
        },

        increaseRooms() {
            if (this.form.rooms < 10) {
                this.form.rooms++
            }
        },

        prepare() {
            var query = this.$route.query

            this.form.bathrooms = query.bathrooms || ""
            //this.form.amenities = query.amenities || []
            //this.form.facilities = query.facilities || []
            this.form.locality = query.locality || ""
            this.form.parking = query.parking || ""
            this.form.property_condition_id = query.property_condition_id || ""
            this.form.property_type_id = query.property_type_id || ""
            this.form.rooms = query.rooms || ""
            this.form.sell_price_from = query.sell_price_from || 0
            this.form.sell_price_to = query.sell_price_to || 60000000
            this.form.sublocality = query.sublocality || ""

            var properties = this.fetchAllProperties(this.$route.query)
                .then(value => {
                    if (value) {
                        this.properties = value

                        window.$(()=> {
                            this.setSliders()
                        })
                    }

                    return value
                })

            var propertyConditions = this.fetchAllPropertyConditions()
                .then(value => {
                    if (value) {
                        this.propertyConditions = value

                        window.$(()=> {
                            window.$("#property_condition_id").selectpicker()
                        })
                    }

                    return value
                })

            var propertyTypes = this.fetchAllPropertyTypes()
                .then(value => {
                    if (value) {
                        this.propertyTypes = value
                    
                        window.$(()=> {
                            return window.$("#property_type_id").selectpicker()
                        })
                    }

                    return value
                })

            var amenities = this.fetchAllAmenities()
                .then(value => {
                    if (value) {
                        this.amenities = value
                    }

                    return value
                })

            var facilities = this.fetchAllFacilities()
                .then(value => {
                    if (value) {
                        this.facilities = value
                    }

                    return value
                })

            return Promise.all([properties, amenities, facilities, propertyConditions, propertyTypes])
        },

        setChunks(items) {
            return this.chunks = chunk(items, 3)
        },

        setSliders() {
            var snapSlider = document.getElementById("slider-snap")

            window.noUiSlider.create(snapSlider, {
                start: [ this.form.sell_price_from, this.form.sell_price_to ],
                snap: false,
                connect: true,
                step: 10000,
                range: {
                    "min": 0,
                    "max": 60000000,
                }
            })

            var snapValues = [
                document.getElementById("slider-snap-value-from"),
                document.getElementById("slider-snap-value-to")
            ]

            var inputValues = [
                document.getElementById("slider-snap-input-from"),
                document.getElementById("slider-snap-input-to")
            ]

            snapSlider.noUiSlider.on("update", function( values, handle ) {
                snapValues[handle].innerHTML = values[handle]
                inputValues[handle].value = values[handle]
            })
        }
    },
}
</script>
