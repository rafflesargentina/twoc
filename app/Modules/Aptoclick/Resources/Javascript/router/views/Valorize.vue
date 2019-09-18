<template>
  <div>
    <section class="hero py-5 py-lg-7">
      <div class="container position-relative">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb pl-0  justify-content-center">
          <li class="breadcrumb-item">
            <RouterLink :to="{ name: 'Home' }">
              Home
            </RouterLink>
          </li>
          <li class="breadcrumb-item active">
            Estima el Valor de tu Propiedad
          </li>
        </ol>
        <h1 class="hero-heading">
          Valora tu inmueble
        </h1>
      </div>
    </section>

    <section class="py-6">
      <div class="container">
        <form
          :class="[validated ? 'needs-validation' : 'needs-validation']"
          action="/api/tinsa"
          method="post"
          class="form"
          novalidate
          @submit.prevent="handleSubmitForm"
          @keydown="errors.clear($event.target.name)"
        >
          <div class="row form-block border-top-0 pt-0">
            <div class="col-lg-4">
              <h4>Contacto</h4>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <label
                  for="name"
                  class="form-label"
                >Nombre completo *</label>
                <input
                  id="name"
                  v-model="form.name"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                  type="text"
                  name="name"
                  class="form-control"
                >
                <span
                  v-if="form.errors.has('name')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('name')" />
                </span>
              </div>

              <div class="form-group">
                <label
                  for="email"
                  class="form-label"
                >Email *</label>
                <input
                  id="email"
                  v-model="form.email"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  type="email"
                  name="email"
                  class="form-control"
                >
                <span
                  v-if="form.errors.has('email')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('email')" />
                </span>
              </div>

              <div class="form-group">
                <label
                  for="last_name"
                  class="form-label"
                >Teléfono *</label>
                <input
                  id="phone"
                  v-model="form.phone"
                  :class="{ 'is-invalid': form.errors.has('phone') }"
                  type="text"
                  name="phone"
                  class="form-control"
                >
                <span
                  v-if="form.errors.has('phone')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('phone')" />
                </span>
              </div>
            </div>
          </div>

          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Descripción</h4>
              <!--<p class="text-muted text-sm">
                Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.
              </p>-->
            </div>
            <div class="col-lg-7 ml-auto">
              <div
                :class="{ 'has-error': form.errors.has('property_type_id') }"
                class="form-group"
              >
                <label
                  for="property_type_id"
                  class="form-label"
                >Tipo de inmueble</label>
                <select
                  id="property_type_id"
                  v-model="form.property_type_id"
                  :class="{ 'is-invalid': form.errors.has('property_type_id') }"
                  name="property_type_id"
                  class="form-control"
                >
                  <option value="">
                    Tipo de inmueble
                  </option>
                  <option
                    v-for="item in propertyTypesMappedTags"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.text }}
                  </option>
                </select>
                <span
                  v-if="form.errors.has('property_type_id')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('property_type_id')" />
                </span>
              </div>
              <div
                :class="{ 'has-error': form.errors.has('property_condition_id') }"
                class="form-group"
              >
                <label
                  for="property_condition_id"
                  class="form-label"
                >Estado de la propiedad</label>
                <select
                  id="property_condition_id"
                  v-model="form.property_condition_id"
                  :class="{ 'is-invalid': form.errors.has('property_condition_id') }"
                  name="property_condition_id"
                  class="form-control"
                >
                  <option value="">
                    Estado de la propiedad
                  </option>
                  <option
                    v-for="item in propertyConditionsMappedTags"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.text }}
                  </option>
                </select>
                <span
                  v-if="form.errors.has('property_condition_id')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('property_condition_id')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="years"
                  class="form-label"
                >Antigüedad de la propiedad</label>
                <input
                  id="years"
                  v-model="form.years"
                  :class="{ 'is-invalid': form.errors.has('years') }"
                  type="number"
                  name="years"
                  class="form-control"
                >
                <small class="form-text text-muted mt-2">(En años)</small>
                <span
                  v-if="form.errors.has('years')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('years')" />
                </span>
              </div>
            </div>
          </div>

          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Ubicación</h4>
              <!--<p class="text-muted text-sm">
                Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.
              </p>-->
            </div>
            <div class="col-lg-7 ml-auto">
              <!-- Country-->
              <div class="form-group">
                <label
                  for="autocomplete"
                  class="form-label"
                >Ingrese una dirección *</label>
                <input
                  id="autocomplete"
                  v-validate.disabled="'required'"
                  name="autocomplete"
                  class="form-control"
                  @input="geolocate"
                >
              </div>
              <div class="form-group">
                <label
                  for="address.country"
                  class="form-label"
                >País</label>
                <input
                  id="country"
                  v-model="form.address.country"
                  :class="{ 'is-invalid': form.errors.has('address.country') }"
                  name="address.country"
                  class="form-control"
                >
                <span
                  v-if="form.errors.has('address.country')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('address.country')" />
                </span>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <!-- Street-->
                  <div class="form-group">
                    <label
                      for="address.street_name"
                      class="form-label"
                    >Calle</label>
                    <input
                      id="route"
                      v-model="form.address.street_name"
                      :class="{ 'is-invalid': form.errors.has('address.street_name') }"
                      name="address.street_name"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.street_name')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.street_name')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- Street number-->
                  <div class="form-group">
                    <label
                      for="address.street_number"
                      class="form-label"
                    >Número</label>
                    <input
                      id="street_number"
                      v-model="form.address.street_number"
                      :class="{ 'is-invalid': form.errors.has('address.street_number') }"
                      name="address.street_number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.street_number')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.street_number')" />
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <!-- Floor number -->
                  <div class="form-group">
                    <label
                      for="address.floor_number"
                      class="form-label"
                    >Nº de piso o planta</label>
                    <input
                      id="floor_number"
                      v-model="form.address.floor_number"
                      :class="{ 'is-invalid': form.errors.has('address.floor_number') }"
                      name="address.floor_number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.floor_number')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.floor_number')" />
                    </span>
                  </div>
                </div>
              </div>
              <!-- City + State-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.locality"
                      class="form-label"
                    >Ciudad</label>
                    <input
                      id="locality"
                      v-model="form.address.locality"
                      :class="{ 'is-invalid': form.errors.has('address.locality') }"
                      name="locality"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.locality')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.locality')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.state"
                      class="form-label"
                    >Estado</label>
                    <input
                      id="administrative_area_level_1"
                      v-model="form.address.state"
                      :class="{ 'is-invalid': form.errors.has('address.state') }"
                      name="state"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.state')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.state')" />
                    </span>
                  </div>
                </div>
              </div>
              <!-- ZIP Code-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.zip"
                      class="form-label"
                    >Código postal</label>
                    <input
                      id="postal_code"
                      v-model="form.address.zip"
                      :class="{ 'is-invalid': form.errors.has('address.zip') }"
                      name="address.zip"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.zip')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.zip')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.sublocality"
                      class="form-label"
                    >Localidad / Municipio</label>
                    <input
                      id="sublocality_level_1"
                      v-model="form.address.sublocality"
                      :class="{ 'is-invalid': form.errors.has('address.sublocality') }"
                      name="address.sublocality"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('address.sublocality')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('address.sublocality')" />
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Disposición del espacio</h4>
              <p class="text-muted text-sm">
                La cantidad de recámaras que tiene su propiedad.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="ground_surface"
                      class="form-label"
                    >Sup. terreno</label>
                    <input
                      v-model="form.ground_surface"
                      :class="{ 'is-invalid': form.errors.has('ground_surface') }"
                      min="0"
                      name="ground_surface"
                      type="number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('ground_surface')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('ground_surface')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="covered_surface"
                      class="form-label"
                    >Sup. construida</label>
                    <input
                      v-model="form.covered_surface"
                      :class="{ 'is-invalid': form.errors.has('covered_surface') }"
                      name="covered_surface"
                      min="0"
                      type="number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('covered_surface')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('covered_surface')" />
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
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
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseRooms"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="form.errors.has('rooms')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('rooms')" />
                  </span>
                </div>
                <div class="col-lg-4">
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
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseBathrooms"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="form.errors.has('bathrooms')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('bathrooms')" />
                  </span>
                </div>
                <div class="col-lg-4">
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
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseParking"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="form.errors.has('parking')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('parking')" />
                  </span>
                </div>
              </div>
              <div class="filter-block">
                <h6 class="mb-3">
                  Elevador
                </h6>
                <div class="form-group mb-0">
                  <div class="custom-control custom-switch mb-2">
                    <input
                      id="elevator"
                      v-model="form.elevator"
                      type="checkbox"
                      name="elevator"
                      class="custom-control-input"
                    >
                    <label
                      for="elevator"
                      class="custom-control-label"
                    ><span class="text-sm">Tiene ascensor</span></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-block flex-column flex-sm-row">
            <div class="col text-center text-sm-left">
              <div class="custom-control custom-checkbox form-group">
                <input
                  id="accepted"
                  v-model="form.accepted"
                  type="checkbox"
                  :class="{ 'is-invalid': form.errors.has('accepted') }"
                  class="custom-control-input"
                >
                <label
                  for="accepted"
                  class="custom-control-label text-muted"
                > <span class="text-sm">Al enviar estos datos declaro que he leído la "Política de Privacidad" y los "Términos y Condiciones"</span></label>
                <span
                  v-if="form.errors.has('accepted')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('accepted')" />
                </span>
              </div>
            </div>
            <div class="col text-center text-sm-right">
              <button
                :disabled="submitted"
                type="submit"
                class="btn btn-primary px-3"
              >
                Valora tu propiedad ahora
              </button>
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</template>

<script>
import { alertErrorMessage, alertSuccessMessage } from "@/utilities/helpers"
import { propertiesComputed, propertyConditionsComputed, propertyTypesComputed } from "@aptoclick/store/helpers"
import { gmaps } from "@/utilities/mixins/gmaps"

import store from "@/store"
import Form from "@/utilities/Form"

var contactFields = {
    email: "",
    name: "",
    phone: "",
}

var fields = JSON.parse(JSON.stringify({ accepted: "", ...contactFields, ...store.state.properties.initialState.one }))

export default {

    mixins: [gmaps],

    data() {
        return {
            form: new Form(fields),
            prepared: false,
            submitted: false,
        }
    },

    computed: {
        ...propertiesComputed,
        ...propertyConditionsComputed,
        ...propertyTypesComputed,

        validated() {
            return this.$validator.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "Valorize" && this.prepared) {
                this.prepare()
            }
        }
    },

    mounted() {
        return this.initAutocomplete("autocomplete", {types: ["geocode"], componentRestrictions: {country: "mx"}})
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
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
            var propertyConditions = this.$store.dispatch("propertyConditions/fetchAllPropertyConditions")
            var propertyTypes = this.$store.dispatch("propertyTypes/fetchAllPropertyTypes")

            window.$(()=> {
                propertyConditions.then(value => {
                    if (value.length > 0) window.$("#property_condition_id").selectpicker()
                })

                propertyTypes.then(value => {
                    if (value.length > 0) window.$("#property_type_id").selectpicker()
                })
            })

            return Promise.all([propertyConditions, propertyTypes])
        },

        handleSubmitForm() {
            this.submitted = true

            this.form.post("/api/valorize")
                .then(()=> {
                    this.submitted = false
                    alertSuccessMessage("Tu solicitud fue enviada. Te responderemos en las siguientes 24/48 hs.")
                    return this.$router.push({ path: "/" })
                }).catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        }
    }
}
</script>
