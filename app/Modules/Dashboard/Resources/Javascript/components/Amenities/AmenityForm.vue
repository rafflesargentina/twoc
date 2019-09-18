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
      id="amenity-pills"
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
          id="description-tab"
          aria-controls="description"
          aria-selected="true"
          class="nav-link"
          data-toggle="tab"
          href="#description"
        >
          Descripción
        </a>
      </li>
    </ul>

    <div class="card">
      <div
        id="amenity-pills-content"
        class="border-left border-right tab-content"
      >
        <div
          id="main"
          class="card-body tab-pane fade show active"
          role="tabpanel"
          aria-labelledby="main-tab"
        >
          <h5
            class="mb-2"
          >
            Principal
          </h5>
          <div class="form-group">
            <label for="name">
              Nombre *
            </label>
            <input
              v-model="form.name"
              :class="{ 'is-invalid': form.errors.has('name') }"
              class="form-control"
              name="name"
              placeholder="Nombre"
              required
              type="text"
              @keyup="form.slug = updateSlug($event.target.value)"
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
            <label for="slug">
              Identificador amistoso *
            </label>
            <input
              v-model="form.slug"
              v-slugify
              :class="{ 'is-invalid': form.errors.has('slug') }"
              class="form-control"
              name="slug"
              placeholder="Identificador amistoso"
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

        <div
          id="description"
          class="card-header tab-pane fade show"
          role="tabpanel"
          aria-labelledby="description-tab"
        >
          <h5 class="mb-2">
            Descripción
          </h5>
          <div class="form-group">
            <label
              class="sr-only"
              for="description"
            >
              Producto
            </label>
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
      </div>

      <div class="card-footer text-right">
        <router-link 
          :to="{ name: 'AdminAmenitiesIndex' }" 
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
import { amenitiesComputed } from "../../store/helpers"
import { slugify } from "@/utilities/helpers"
import Form from "@/utilities/Form"

export default {

    name: "AmenityForm",

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
            form: {},
            submitted: false,
        }
    },

    computed: {
        ...amenitiesComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.form = new Form(this.oneAmenity),

        this.$store.watch(state => state.amenities.one, (value)=> {
            this.form = new Form(value)
        })
    },

    methods: {
        submitForm() {
            this.submitted = true

            this.form.featured_photo = {}

            this.form[this.method](this.action)
                .then(response => {
                    this.$snotify.success("El registro nº " + response.data[0].id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminAmenitiesIndex" })
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
