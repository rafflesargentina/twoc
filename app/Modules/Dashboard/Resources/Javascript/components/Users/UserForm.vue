<template>
  <div>
    <form 
      :class="[validated ? 'needs-validation' : 'needs-validation']"
      :action="action"
      :method="method"
      novalidate
      @submit.prevent="submitForm" 
      @keydown="form.errors.clear($event.target.name)"
    >
      <ul
        id="developer-pills"
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
            id="assigned-properties-tab"
            aria-controls="assigned-properties"
            aria-selected="false"
            class="nav-link"
            data-toggle="tab"
            href="#assigned-properties"
          >
            Propiedaded asignados
          </a>
        </li>
      </ul>

      <div class="card">
        <div
          id="developer-pills-content"
          class="border-left border-right tab-content"
        >
          <div
            id="main"
            class="card-body tab-pane fade show active"
            role="tabpanel"
            aria-labelledby="main-tab"
          >
            <div class="row">
              <div class="col-md-3 form-group">
                <label
                  for="document_type_id"
                >
                  Tipo
                </label>
                <select
                  v-model="form.document_type_id"
                  :class="{ 'is-invalid': form.errors.has('document_type_id') }"
                  class="form-control"
                  name="document_type_id"
                  required
                >
                  <option
                    value=""
                    :selected="true"
                  >
                    Tipo
                  </option>
                  <option
                    v-for="item in allDocumentTypes"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.name }}
                  </option>
                </select>
                <span
                  v-if="form.errors.has('document_type_id')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('document_type_id')" />
                </span>
              </div>
              <div class="col-md-3">
                <label
                  for="document_number"
                >
                  Número
                </label>
                <input
                  v-model="form.document_number"
                  :class="{ 'is-invalid': form.errors.has('document_number') }"
                  autocomplete="username"
                  class="form-control"
                  name="document_number"
                  placeholder="Número"
                  required
                  type="number"
                >
                <span
                  v-if="form.errors.has('document_number')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('document_number')" />
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 form-group">
                <label for="first_name">
                  Nombre *
                </label>
                <input
                  v-model="form.first_name"
                  :class="{ 'is-invalid': form.errors.has('first_name') }"
                  class="form-control"
                  name="first_name"
                  placeholder="Nombre"
                  type="text"
                >
                <span
                  v-if="form.errors.has('first_name')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('first_name')" />
                </span>
              </div>

              <div class="col-sm-6 form-group">
                <label for="last_name">
                  Apellido
                </label>
                <input
                  v-model="form.last_name"
                  :class="{ 'is-invalid': form.errors.has('last_name') }"
                  class="form-control"
                  name="last_name"
                  placeholder="Apellido"
                  type="text"
                >
                <span
                  v-if="form.errors.has('last_name')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('last_name')" />
                </span>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <div class="form-group">
                  <label for="email">
                    Email *
                  </label>
                  <input
                    v-model="form.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    type="email"
                    @keyup="form.slug = updateSlug($event.target.value)"
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
                  <label for="slug">
                    Identificador amistoso
                  </label>
                  <input
                    v-model="form.slug"
                    v-slugify
                    :class="{ 'is-invalid': form.errors.has('slug') }"
                    class="form-control"
                    name="slug"
                    placeholder="Identificador amistoso"
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

                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="password">
                      Contraseña
                    </label>
                    <input
                      v-model="form.password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                      class="form-control"
                      name="password"
                      placeholder="Contraseña"
                      type="password"
                    >
                    <span
                      v-if="form.errors.has('password')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('password')" />
                    </span>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="password_confirmation">
                      Confirmación de contraseña
                    </label>
                    <input
                      v-model="form.password_confirmation"
                      :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
                      class="form-control"
                      name="password_confirmation"
                      placeholder="Confirmación de contraseña"
                      type="password"
                    >
                    <span
                      v-if="form.errors.has('password_confirmation')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('password_confirmation')" />
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div
            id="assigned-properties"
            class="card-body tab-pane fade"
            role="tabpanel"
            aria-labelledby="assigned-properties-tab"
          >
            <h5>Propiedaded asignados</h5>
            <quick-search
              ref="quickSearch"
              :items="allProperties"
            />

            <div v-if="$refs.quickSearch">
              <dynamic-table
                v-if="$refs.quickSearch.filteredItems.length > 0"
                :columns="columns"
                :items="$refs.quickSearch.filteredItems"
                :per-page="12"
                :sort-direction="'desc'"
                :sort-key="'updated_at'"
              >
                <th
                  slot="th"
                  class="th--acciones"
                >
                  Asignación
                </th>
                <td
                  slot="td"
                  slot-scope="item"
                >
                  <input
                    v-model="assignedProperties"
                    type="checkbox"
                    class="form-check-input"
                    :checked="isPropertyAssigned(item.id)"
                    :value="item.id"
                  >
                  <label
                    class="form-check-label"
                    for="assignedProperties"
                  >
                    Asignado
                  </label>
                </td>
              </dynamic-table>
      
              <div v-if="$refs.quickSearch.filteredItems.length === 0">
                <div class="card-body">
                  <p class="mb-0">
                    No hay resultados para mostrar.
                  </p>
                </div>
              </div>
            </div>
          </div>
      
          <div class="card-footer text-right">
            <RouterLink
              :to="{ name: 'AdminUsersIndex' }"
              class="btn btn-outline-primary mr-2"
            >
              <span class="fa fa-arrow-left pr-2" />Volver
            </RouterLink>
            <button
              :disabled="submitted"
              class="btn btn-primary"
              type="submit"
            >
              <span class="fa fa-check pr-2" />Guardar
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { documentTypesComputed } from "@/store/helpers"
import { propertiesComputed, usersComputed } from "@/store/helpers"
import { previewDzThumbnailFromFile, slugify } from "@/utilities/helpers"
import Form from "@/utilities/Form"

const token = JSON.parse(sessionStorage.getItem("auth.token") || localStorage.getItem("auth.token"))

export default {
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
            assignedProperties: [],
            columns: {
                id: "Id.",
                name: "Nombre",
            },
            form: {},
            submitted: false
        }
    },

    computed: {
        ...documentTypesComputed,
        ...propertiesComputed,
        ...usersComputed,

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.submitted = false
        this.form = new Form(this.oneUser)
        //this.assignedProperties = this.oneUser.properties.map(item => item.d)

        this.$store.watch((state, getters) => state.users.one, (value)=> {
            this.form = new Form(value)
            this.assignedProperties = value.properties.map(item => item.id)
        })
    },

    methods: {
        isPropertyAssigned(propertyId) {
            return this.allProperties[propertyId] !== undefined
        },

        submitForm() {
            this.submitted = true

            var properties = []
            this.assignedProperties.forEach(item => properties.push({ id: item }))
            this.form.properties = properties

            this.form[this.method](this.action)
                .then(response => {
                    let id = response.data[0].id
                    this.$snotify.success("El registro nº " + id + " fue guardado correctamente.")
                    this.$router.push({ name: "AdminUsersIndex" })

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
