<template>
  <div
    id="interested-modal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="interested-modal-title"
    class="modal fade"
    aria-modal="true"
  >
    <div
      role="document"
      class="modal-dialog modal-lg"
    >
      <div class="modal-content">
        <form
          class="form-validate"
          :action="action"
          :class="[validated ? 'needs-validation' : 'needs-validation']"
          :method="method"
          aria-label="¡Estoy interesado!"
          novalidate
          @keydown="form.errors.clear($event.target.name)"
          @submit.prevent="handleSubmitForm"
        >
          <div class="modal-body">
            <button
              type="button"
              data-dismiss="modal"
              aria-label="Close"
              class="close"
            >
              <span aria-hidden="true">× </span>
            </button>
            <h2
              id="interested-modal-title"
              class="modal-title mb-3"
            >
              ¡Estoy interesado!
            </h2>
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
                  :disabled="submitted"
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
                  Apellido
                </label>
        
                <input
                  v-model="form.last_name"
                  :class="{ 'is-invalid': form.errors.has('last_name') }"
                  :disabled="submitted"
                  type="text"
                  class="form-control"
                  name="last_name"
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
            <div class="row">
              <div class="col-sm-6 form-group">
                <label
                  for="email"
                  class="form-label"
                > Email *</label>
                <input
                  id="email"
                  v-model="form.email"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  :disabled="submitted"
                  name="email"
                  type="email"
                  placeholder="Email"
                  autocomplete="off"
                  required
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
              <div class="col-sm-6 form-group">
                <label
                  for="phone"
                  class="form-label"
                > Teléfono válido de México *</label>
                <input
                  id="phone"
                  v-model="form.phone"
                  :class="{ 'is-invalid': form.errors.has('phone') }"
                  :disabled="submitted"
                  name="phone"
                  type="text"
                  placeholder="Teléfono válido de México"
                  autocomplete="off"
                  required
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
            <div class="row">
              <div class="col-sm-6 form-group">
                <label
                  for="birth_date"
                  class="form-label"
                >Fecha de Nacimiento *</label>
                <input
                  id="birth_date"
                  v-model="form.birth_date"
                  :class="{ 'is-invalid': form.errors.has('birth_date') }"
                  :disabled="submitted"
                  name="birth_date"
                  placeholder="Fecha de Nacimiento"
                  type="date"
                  required
                  class="form-control"
                >
                <span
                  v-if="form.errors.has('birth_date')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="form.errors.get('birth_date')" />
                </span>
              </div>
              <div class="form-group col-sm-6">
                <label
                  for="rfc"
                  class="form-label"
                >RFC *</label>
                <input
                  id="rfc"
                  v-model="form.rfc"
                  :class="{ 'is-invalid': form.errors.has('rfc') }"
                  :disabled="submitted"
                  name="rfc"
                  placeholder="RFC"
                  type="text"
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
            <div class="custom-control custom-checkbox form-group">
              <input
                id="accepted"
                v-model="form.accepted"
                type="checkbox"
                :class="{ 'is-invalid': form.errors.has('accepted') }"
                :disabled="submitted"
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
            <div class="modal-footer justify-content-end">
              <button
                type="submit"
                class="btn btn-lg btn-primary"
                :disabled="submitted"
              >
                Enviar mensaje
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { alertErrorMessage, alertSuccessMessage } from "@/utilities/helpers"

import Form from "@/utilities/Form"

let fields = {
    accepted: "",
    birth_date: "",
    email: "",
    phone: "",
    first_name: "",
    last_name: "",
    rfc: "",
}

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
            form: new Form(fields),
            submitted: false
        }
    },

    computed: {
        validated() {
            return this.form.errors.any()
        }
    },

    methods: {
        handleSubmitForm() {
            this.submitted = true

            this.form[this.method](this.action).then(()=> {
                window.$("#interested-modal").modal("hide")
                this.form.reset()

                alertSuccessMessage("Estoy interesado", "Tu mensaje fue enviado correctamente.")

                return this.submitted = false
            }).catch(error => {
                if (error.status > 422) {
                    alertErrorMessage("Ocurrió un error con el siguiente mensaje: " + error.data.message)
                }

                return this.submitted = false
            })
        },
    },
}
</script>
