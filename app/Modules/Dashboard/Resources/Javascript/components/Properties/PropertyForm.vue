<style>
.vue-map-container {
  height: 32rem;
}
</style>

<template>
  <form 
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    novalidate
    @submit.prevent="submitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <ul
      id="property-pills"
      class="nav nav-pills mb-3"
      role="tablist"
    >
      <li class="nav-item">
        <a
          id="main-tab"
          aria-controls="main"
          aria-selected="true"
          class="nav-link active"
          data-toggle="tab"
          href="#main"
        >
          Principal
        </a>
      </li>
      <li class="nav-item">
        <a
          id="featured-photo-tab"
          aria-controls="featured-photo"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#featured-photo"
        >
          Foto destacada
        </a>
      </li>
      <li class="nav-item">
        <a
          id="photos-gallery-tab"
          aria-controls="photos-gallery"
          aria-selected="false"
          class="nav-link"
          data-toggle="tab"
          href="#photos-gallery"
        >
          Galería de fotos
        </a>
      </li>
    </ul>

    <div class="card shadow">
      <div
        id="project-pills-content"
        class="border-left border-right tab-content"
      >
        <div
          id="main"
          class="tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Información principal
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label class="col-6 col-form-label text-muted">
                  Título *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.title"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                    class="form-control"
                    name="title"
                    placeholder="Título"
                    required
                    type="text"
                    @keyup="form.slug = updateSlug($event.target.value)"
                  >
                  <span
                    v-if="form.errors.has('title')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('title')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label class="col-6 col-form-label text-muted">
                  Identificador URI *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.slug"
                    v-slugify
                    :class="{ 'is-invalid': form.errors.has('slug') }"
                    class="form-control"
                    name="slug"
                    placeholder="Identificador URI"
                    required
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('slug')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('slug')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label class="col-6 col-form-label text-muted">
                  Tipo de Propiedad
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.property_type_id"
                    :class="{ 'is-invalid': form.errors.has('form.property_type_id') }"
                    class="form-control"
                    name="property_type_id"
                    required
                  >
                    <option :value="0">
                      Tipo de Propiedad
                    </option>
                    <option
                      v-for="item in allPropertyTypes"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
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
              </div>
            </li>
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <label class="col-6 col-form-label text-muted">
                  Condición de la Propiedad
                </label>
                <div class="col-6 col-lg-4">
                  <select
                    v-model="form.property_type_id"
                    :class="{ 'is-invalid': form.errors.has('form.property_condition_id') }"
                    class="form-control"
                    name="property_condition_id"
                    required
                  >
                    <option :value="0">
                      Condición de la Propiedad
                    </option>
                    <option
                      v-for="item in allPropertyConditions"
                      :key="item.id"
                      :value="item.id"
                    >
                      {{ item.name }}
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
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Descripción
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col-12">
                  <VueEditor
                    v-model="form.description"
                    :class="{ 'is-invalid': form.errors.has('description') }"
                    class="bg-white"
                    name="description"
                    placeholder="Descripción"
                  />
                  <span
                    v-if="form.errors.has('description')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('description')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Amenities
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col-12">
                  <span
                    v-if="form.errors.has('amenities')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('amenities')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>

          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Facilities
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col-12">
                  <span
                    v-if="form.errors.has('facilities')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('facilities')" />
                  </span>
                </div>
              </div>
            </li>
          </ul>
         
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Ubicación
            </h5>
          </div> 
          <ul class="list-group list-group-flush"> 
            <li class="list-group-item">
              <div class="form-group row mb-3">
                <label class="col-6 col-form-label text-muted"> 
                  Dirección *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    id="autocomplete"
                    class="form-control"
                    placeholder="Dirección"
                    required
                    type="text"
                    @input="geolocate"
                  >
                  <span
                    v-if="form.errors.has('autocomplete')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('autocomplete')" />
                  </span>
                  <input
                    v-model="form.address.street_name"
                    type="hidden"
                    name="street_name"
                  >
                  <input
                    v-model="form.address.street_number"
                    type="hidden"
                    name="street_number"
                  >
                  <input
                    v-model="form.address.zip"
                    type="hidden"
                    name="zip"
                  >
                  <input
                    v-model="form.address.locality"
                    type="hidden"
                    name="locality"
                  >
                  <input
                    v-model="form.address.sublocality"
                    type="hidden"
                    name="sublocality"
                  >
                  <input
                    v-model="form.address.state"
                    type="hidden"
                    name="state"
                  >
                  <input
                    v-model="form.address.country"
                    type="hidden"
                    name="country"
                  >
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-3">
                <label class="col-6 col-form-label text-muted">
                  Latitud *
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.lat"
                    :class="{ 'is-invalid': form.errors.has('map.lat') }"
                    class="form-control"
                    name="map.lat"
                    placeholder="Latitud"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('map.lat')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.lat')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-3">
                <label class="col-6 col-form-label text-muted">
                  Longitud
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.lng"
                    :class="{ 'is-invalid': form.errors.has('map.lng') }"
                    class="form-control"
                    name="map.lng"
                    placeholder="Longitud"
                    type="text"
                  >
                  <span
                    v-if="form.errors.has('map.lng')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.lng')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <div class="form-group row mb-3">
                <label class="col-6 col-form-label text-muted">
                  Zoom del mapa
                </label>
                <div class="col-6 col-lg-4">
                  <input
                    v-model="form.map.zoom"
                    :class="{ 'is-invalid': form.errors.has('map.zoom') }"
                    class="form-control"
                    min="1"
                    max="22"
                    name="map.zoom"
                    placeholder="Zoom"
                    type="number"
                  >
                  <span
                    v-if="form.errors.has('map.zoom')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="form.errors.get('map.zoom')" />
                  </span>
                </div>
              </div>
            </li>

            <li class="list-group-item">
              <gmap-map
                ref="map"
                :center="center"
                :zoom="form.map.zoom"
                @zoom_changed="form.map.zoom = $event"
              >
                <gmap-marker
                  ref="marker"
                  :draggable="true"
                  :position="center"
                  @dragend="setMapPositionFromMarker"
                />
              </gmap-map>
            </li>
          </ul>
        </div>

        <div
          id="featured-photo"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="featured-photo-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Foto destacada
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col-12">
                  <VueDropzone
                    id="dzFeaturedPhoto"
                    ref="dzFeaturedPhoto"
                    :options="dzFeaturedPhotoOptions"
                    @vdropzone-error="dzFeaturedPhotoFail"
                    @vdropzone-files-added="dzFeaturedPhotoAddOrRemoveFiles"
                    @vdropzone-removed-file="dzFeaturedPhotoRemoveFile"
                    @vdropzone-processing="dzFeaturedPhotoSetUrl"
                    @vdropzone-success-multiple="dzFeaturedPhotoSucceed"
                  />
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div
          id="photos-gallery"
          class="tab-pane fade show"
          role="tabpanel"
          aria-labelledby="photos-gallery-tab"
        >
          <div class="card-header bg-white p-2 p-md-4">
            <h5 class="text-primary m-0">
              Foto destacada
            </h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="form-group row mb-0">
                <div class="col-12">
                  <VueDropzone
                    id="dzUnfeaturedPhotos"
                    ref="dzUnfeaturedPhotos"
                    :options="dzUnfeaturedPhotosOptions"
                    @vdropzone-error="dzUnfeaturedPhotosFail"
                    @vdropzone-files-added="dzUnfeaturedPhotosAddOrRemoveFiles"
                    @vdropzone-removed-file="dzUnfeaturedPhotosRemoveFile"
                    @vdropzone-processing="dzUnfeaturedPhotosSetUrl"
                    @vdropzone-success-multiple="dzUnfeaturedPhotosSucceed"
                  />
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div class="card-footer text-right">
        <router-link 
          :to="{ name: 'AdminPropertiesIndex' }" 
          class="btn btn-outline-primary mr-2"
        >
          <span class="fa fa-arrow-left pr-2" />Volver
        </router-link>
        <button
          :disabled="submitted"
          class="btn btn-primary"
          type="submit"
        >
          <span class="fa fa-check pr-2" />Guardar
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import * as VueGoogleMaps from "vue2-google-maps"
import { dz } from "@/utilities/mixins/dz"
import { places } from "@/utilities/mixins/places"
import { VueEditor } from "vue2-editor"
import { getSavedState, slugify } from "@/utilities/helpers"
import { propertiesComputed, propertyConditionsComputed, propertyTypesComputed } from "@/store/helpers"
import { photosMethods } from "@/store/helpers"
import { pick } from "lodash"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

export default {

    name: "PropertyForm",

    components: {
        VueDropzone: vue2Dropzone,
        VueEditor
    },

    mixins: [dz, places],

    props: {
        action: {
            type: String,
            required: true
        },

        method: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            center: {},
            dzFeaturedPhotoOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 1,
                maxFilesize: 0.4,
                method: "put",
                paramName: "featured_photo",
                uploadMultiple: true,
                url: "/api/properties/1",
            },
            dzUnfeaturedPhotosOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una o más fotos hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 8,
                maxFilesize: 0.4,
                method: "put",
                parallelUploads: 8,
                paramName: "unfeatured_photos",
                uploadMultiple: true,
                url: "/api/properties/1",
            },
            form: {},
            marker: {},
            submitted: false,
            tab: "main",
            url: "/api/properties",
        }
    },

    computed: {
        ...propertiesComputed,
        ...propertyConditionsComputed,
        ...propertyTypesComputed,

        gmapApi: VueGoogleMaps.gmapApi,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.form = new Form(this.oneProperty),
        this.center = pick(this.oneProperty.map, ["lat","lng"])

        this.$store.watch(state => state.properties.one, (value)=> {
            this.isDestroying = false
            this.form = new Form(value)
            this.center = pick(value.map, ["lat","lng"])

            this.dzFeaturedPhotoMounted(value.featured_photo)
            this.dzUnfeaturedPhotosMounted(value.unfeatured_photos)
        })
    },

    mounted() {
        this.initAutocomplete()
    },

    beforeDestroy() {
        return this.isDestroying = true
    },

    mounted() {
        return this.setMap()
    },

    methods: {
        ...photosMethods, 

        setMap: function() {
            if (this.gmapApi) {
                var maps = this.gmapApi.maps
                this.$refs.map.$mapPromise.then(map => {
                    this.bounds = new maps.LatLngBounds()
                    this.bounds.extend(this.center)

                    //map.fitBounds(this.bounds)
                    map.panToBounds(this.bounds)

                    return maps.event.trigger(map, "resize")
                })
                    .catch(map => {
                        console.error(map)
                    })
            }
        },

        setMapPositionFromMarker(marker) {
            this.form.map["lat"] = marker.latLng.lat()
            this.form.map["lng"] = marker.latLng.lng()
        },

        submitForm() {
            this.submitted = true

            delete this.form.address.location
            this.form.featured_photo = {}
            this.form.unfeatured_photos = []

            var id
            this.form[this.method](this.action)
                .then(response => {
                    id = response.data[0].id
                    this.url = "/api/properties/" + this.$route.params.id
                    return this.dzFeaturedPhotoProcessQueue()
                })
                .then(() => {
                    return this.dzUnfeaturedPhotosProcessQueue()
                })
                .then(() => {
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminPropertiesIndex" })
                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        },

        updateSlug(value) {
            return this.form.slug = slugify(value)
        }
    }
}
</script>
