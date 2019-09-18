<template>
  <form
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    novalidate
    aria-label="Datos Personales"
    @submit.prevent="submitForm"
    @keydown="form.errors.clear($event.target.name)"
  >
    <div
      id="accordion"
      role="tablist"
    >
      <div class="card border-0 shadow mb-3">
        <div
          id="headingOne"
          role="tab"
          class="card-header bg-primary-100 border-0 py-0"
        >
          <a
            data-toggle="collapse"
            href="#collapseOne"
            aria-expanded="true"
            aria-controls="collapseOne"
            class="accordion-link collapsed"
          >Identidad</a>
        </div>
        <div
          id="collapseOne"
          role="tabpanel"
          aria-labelledby="headingOne"
          data-parent="#accordion"
          class="collapse show"
        >
          <div class="card-body py-3">
            <div class="row">
              <div class="col-sm-6 form-group">
                <label
                  for="first_name"
                >
                  Nombre *
                </label>
                <input
                  v-model="form.first_name"
                  :class="{ 'is-invalid': form.errors.has('first_name') }"
                  type="text"
                  class="form-control"
                  name="first_name"
                  required
                  autofocus
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
                <label
                  for="last_name"
                >
                  Apellido *
                </label>
          
                <input
                  v-model="form.last_name"
                  :class="{ 'is-invalid': form.errors.has('last_name') }"
                  type="text"
                  class="form-control"
                  name="last_name"
                  required
                  autofocus
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
          
            <div class="form-group">
              <label
                for="email"
              >
                E-Mail *
              </label>
          
              <input
                v-model="form.email"
                :class="{ 'is-invalid': form.errors.has('email') }"
                autocomplete="username"
                type="email"
                class="form-control"
                name="email"
                required
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
                for="first_name"
                class="form-label"
              > C.U.R.P. *</label>
              <input
                id="curp"
                v-model="form.curp"
                :class="{ 'is-invalid': form.errors.has('curp') }"
                name="curp"
                type="text"
                placeholder="C.U.R.P."
                required
                class="form-control"
              >
              <span
                v-if="form.errors.has('curp')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('curp')" />
              </span>
            </div>
            <div class="form-group">
              <label
                for="rfc"
                class="form-label"
              > RFC *</label>
              <input
                id="rfc"
                v-model="form.rfc"
                :class="{ 'is-invalid': form.errors.has('rfc') }"
                name="rfc"
                type="text"
                placeholder="RFC"
                required
                class="form-control"
              >
              <span
                v-if="form.errors.has('rfc')"
                class="invalid-feedback"
                role="alert"
              >
                <strong v-text="form.errors.get('rfc')" />
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow mb-3">
      <div
        id="headingTwo"
        role="tab"
        class="card-header bg-primary-100 border-0 py-0"
      >
        <a
          data-toggle="collapse"
          href="#collapseTwo"
          aria-expanded="true"
          aria-controls="collapseTwo"
          class="accordion-link collapsed"
        >Contacto</a>
      </div>
      <div
        id="collapseTwo"
        role="tabpanel"
        aria-labelledby="headingTwo"
        data-parent="#accordion"
        class="collapse show"
      >
        <div class="card-body py-3">
          <div class="form-group">
            <label
              for="contact.phone"
              class="form-label"
            >Teléfono de línea *</label>
            <input
              v-model="form.contact.phone"
              v-validate.disabled="'required'"
              :class="{ 'is-invalid': form.errors.has('contact.phone') }"
              name="contact.phone"
              class="form-control"
            >
            <span
              v-if="form.errors.has('contact.phone')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('contact.phone')" />
            </span>
          </div>
          <div class="form-group">
            <label
              for="contact.mobile"
              class="form-label"
            >Teléfono móvil *</label>
            <input
              v-model="form.contact.mobile"
              :class="{ 'is-invalid': form.errors.has('contact.mobile') }"
              name="contact.mobile"
              class="form-control"
            >
            <span
              v-if="form.errors.has('contact.mobile')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('contact.mobile')" />
            </span>
          </div>
          <div class="form-group">
            <label
              for="contact.fax"
              class="form-label"
            >Teléfono alternativo</label>
            <input
              :class="{ 'is-invalid': errors.first('contact.fax') }"
              name="contact.fax"
              class="form-control"
            >
            <span
              v-if="errors.first('contact.fax')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="errors.first('contact.fax')" />
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow mb-3">
      <div
        id="headingThree"
        role="tab"
        class="card-header bg-primary-100 border-0 py-0"
      >
        <a
          data-toggle="collapse"
          href="#collapseThree"
          aria-expanded="true"
          aria-controls="collapseThree"
          class="accordion-link collapsed"
        >Contraseña</a>
      </div>

      <div
        id="collapseThree"
        role="tabpanel"
        aria-labelledby="headingThree"
        data-parent="#accordion"
        class="collapse show"
      >
        <div class="card-body py-3">
          <div class="form-group">
            <label
              for="password"
            >
              Contraseña
            </label>
  
            <input
              v-model="form.password"
              :class="{ 'is-invalid': form.errors.has('password') }"
              autocomplete="current-password"
              type="password"
              class="form-control"
              name="password"
              required
            >
  
            <span
              v-if="form.errors.has('password')"
              class="invalid-feedback"
              role="alert"
            >
              <strong v-text="form.errors.get('password')" />
            </span>
          </div>
  
          <div class="form-group">
            <label
              for="password-confirmation"
            >
              Confirmación de contraseña
            </label>
  
            <input
              v-model="form.password_confirmation"
              :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
              autocomplete="current-password"
              type="password"
              class="form-control"
              name="password_confirmation"
              required
            >
          </div>
        </div>
      </div>
    </div>

    <button
      type="submit"
      class="btn btn-primary"
    >
      <span class="fa fa-check pr-2" />Actualizar datos
    </button>

    <div
      id="modalChangeAvatar"
      aria-hidden="true"
      aria-labelledby="modalTitleChangeAvatar" 
      class="modal fade"
      tabindex="-1"
      role="dialog"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 
              id="modalTitleChangeAvatar" 
              class="modal-title"
            >
              Cambiar foto
            </h5>
            <button 
              type="button" 
              class="close" 
              data-dismiss="modal" 
              aria-label="Close"
            >
              <span aria-hidden="true">
                &times;
              </span>
            </button>
          </div>
          <VueDropzone 
            id="dzAvatar"
            ref="dzAvatar"
            :options="dzOptions"
            @vdropzone-error="dzError"
            @vdropzone-files-added="dzAddOrRemoveFiles" 
            @vdropzone-mounted="dzMounted"
            @vdropzone-removed-file="dzAddOrRemoveFiles" 
            @vdropzone-processing="dzSetUrl"
            @vdropzone-queue-complete="dzAccept"
          />
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6 mb-2 mb-sm-0">
                <button
                  :disabled="!dzHasAcceptedFiles"
                  class="btn btn-block btn-outline-primary"
                  type="button"
                  @click="dzProcessQueue"
                >
                  <span class="fa fa-check pr-2" />Aceptar
                </button>
              </div>
              <div class="col-sm-6">
                <button
                  class="btn btn-block btn-outline-primary"
                  type="button"
                  @click="dzCancel"
                >
                  <span class="fa fa-times pr-2" />Cancelar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { authComputed } from "@/store/helpers"
import { getSavedState, mapDzMockFile,  previewDzThumbnailFromFile } from "@/utilities/helpers"
import vue2Dropzone from "vue2-dropzone"
import Form from "@/utilities/Form"

import "vue2-dropzone/dist/vue2Dropzone.min.css"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

export default {

    name: "PersonalData",

    components: {
        VueDropzone: vue2Dropzone
    },

    data() {
        return {
            dzHasError: false,
            dzOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 1,
                maxFilesize: 0.2,
                method: "put",
                paramName: "avatar",
                uploadMultiple: true,
                url: "/api/avatars"
            },
            dzHasAcceptedFiles: false,
            form: {}
        }
    },

    computed: {
        ...authComputed,

        action() {
            return "/api/account"
        },

        dzAvatar() {
            return this.$refs.dzAvatar
        },

        dzUrl() {
            return "/api/avatars/" + this.user.id
        },

        method() {
            return "put"
        },

        validated() {
            return this.form.errors.any()
        }
    },

    created() {
        this.form = new Form(this.user)

        this.$store.watch(state => state.auth.user, value => {
            this.form = new Form({ contact: {}, ...value})
        })
    },

    destroyed() {
        let modal = document.querySelector("#modalChangeAvatar")
        modal.parentNode.removeChild(modal)
    },

    mounted() {
        let modal = document.querySelector("#modalChangeAvatar")
        document.querySelector("body").appendChild(modal)
    },

    methods: {
        dzAccept() {
            if (!this.dzHasError) {
                window.$("#modalChangeAvatar").modal("hide")
                return this.$store.dispatch("auth/validate")
            }
        },

        dzAddOrRemoveFiles() {
            return this.dzHasAcceptedFiles = this.dzAvatar.getAcceptedFiles().length > 0
        },

        dzCancel() {
            window.$("#modalChangeAvatar").modal("hide")

            if (this.dzAvatar.getQueuedFiles().length > 0) {
                this.dzAvatar.removeAllFiles()
                return this.dzMounted()
            }

            if (this.dzAvatar.getAcceptedFiles().length === 0) {
                return this.dzMounted()
            }

            return
        },

        dzError() {
            return this.dzHasError = true
        },

        dzMounted() {
            if (this.user.avatar) {
                return previewDzThumbnailFromFile(this.dzAvatar.dropzone, mapDzMockFile(this.user.avatar))
            }
        },

        dzProcessQueue() {
            if (this.dzAvatar) {
                this.dzHasError = false
                return this.dzAvatar.processQueue()
            }
        },

        dzSetUrl() {
            if (this.dzAvatar) {
                return this.dzAvatar.setOption("url", this.dzUrl)
            }
        },

        submitForm() {
            this.submitted = true

            this.form[this.method](this.action)
                .then(()=> {
                    this.$store.dispatch("auth/validate")

                    return this.$snotify.success("Los datos de tu cuenta fueron actualizados.")
                }).catch(error => {
                    if (error.status > 422) {
                        this.$snotify.error("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        }
    }
}
</script>
