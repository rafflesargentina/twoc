<template>
  <form
    class="form-validate"
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    aria-label="Registrate"
    novalidate
    @keydown="form.errors.clear($event.target.name)"
    @submit.prevent="register"
  >
    <div class="form-group">
      <label
        for="first_name"
        class="form-label"
      > Nombre *</label>
      <input
        id="first_name"
        v-model="form.first_name"
        :disabled="submitted"
        :class="{ 'is-invalid': form.errors.has('first_name') }"
        name="first_name"
        type="text"
        placeholder="Nombre"
        required
        class="form-control"
      >
      <span
        v-if="form.errors.has('first_name')"
        class="invalid-feedback"
        role="alert"
      >
        <strong v-text="form.errors.get('first_name')" />
      </span>
    </div>
    <div class="form-group">
      <label
        for="last_name"
        class="form-label"
      > Apellido *</label>
      <input
        id="last_name"
        v-model="form.last_name"
        :disabled="submitted"
        :class="{ 'is-invalid': form.errors.has('last_name') }"
        name="last_name"
        type="text"
        placeholder="Nombre"
        required
        class="form-control"
      >
      <span
        v-if="form.errors.has('last_name')"
        class="invalid-feedback"
        role="alert"
      >
        <strong v-text="form.errors.get('last_name')" />
      </span>
    </div>
    <div class="form-group">
      <label
        for="email"
        class="form-label"
      > Email *</label>
      <input
        id="email"
        v-model="form.email"
        :disabled="submitted"
        :class="{ 'is-invalid': form.errors.has('email') }"
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
    <div class="form-group">
      <label
        for="first_name"
        class="form-label"
      > C.U.R.P. *</label>
      <input
        id="curp"
        v-model="form.curp"
        :disabled="submitted"
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
        :disabled="submitted"
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
    <div class="form-group">
      <label
        for="password"
        class="form-label"
      >Contraseña *</label>
      <input
        id="password"
        v-model="form.password"
        :disabled="submitted"
        :class="{ 'is-invalid': form.errors.has('password') }"
        name="password"
        placeholder="Contraseña"
        type="password"
        required
        class="form-control"
      >
      <span
        v-if="form.errors.has('password')"
        class="invalid-feedback"
        role="alert"
      >
        <strong v-text="form.errors.get('password')" />
      </span>
    </div>
    <div class="form-group mb-4">
      <label
        for="password_confirmation"
        class="form-label"
      >Confirmación de Contraseña</label>
      <input
        id="password_confirmation"
        v-model="form.password_confirmation"
        :disabled="submitted"
        :class="{ 'is-invalid': form.errors.has('password_confirmation') }"
        name="password_confirmation"
        placeholder="Confirmación de Contraseña"
        type="password"
        required
        class="form-control"
      >
      <span
        v-if="form.errors.has('password_confirmation')"
        class="invalid-feedback"
        role="alert"
      >
        <strong v-text="form.errors.get('password_confirmation')" />
      </span>
    </div>
    <button
      :disabled="submitted"
      type="submit"
      class="btn btn-lg btn-block btn-primary"
    >
      Regístrate
    </button>
    <hr
      data-content="OR"
      class="my-3 hr-text letter-spacing-2"
    >
    <a
      :disabled="submitted"
      href="/auth/facebook"
      class="btn btn btn-outline-primary btn-block btn-social mb-3"
    >
      <i class="fa fa-2x fa-facebook-f btn-social-icon" />Conéctate <span class="d-none d-sm-inline">con Facebook</span>
    </a>
    <a
      :disabled="submitted"
      href="/auth/google"
      class="btn btn btn-outline-muted btn-block btn-social mb-3"
    >
      <i class="fa fa-2x fa-google btn-social-icon" />Conéctate <span class="d-none d-sm-inline">con Google</span>
    </a>
    <hr class="my-4">
    <p class="text-sm text-muted">
      Al registrarme declaro que acepto la <a
        href="#"
        data-toggle="modal"
        data-target="#policy-of-privacy-modal"
      >Política de Privacidad</a> y los <a
        href="#"
        data-toggle="modal"
        data-target="#terms-and-conditions-modal"
      >Términos y Condiciones</a>.
    </p>
  </form>
</template>

<script>
import { alertErrorMessage, alertSuccessMessage } from "@/utilities/helpers"
import Form from "@/utilities/Form"

let fields = {
    curp: "",
    email: "",
    first_name: "",
    last_name: "",
    password: "",
    password_confirmation: "",
    rfc: "",
}

export default {

    name: "RegisterForm",

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
        register() {
            this.submitted = true

            var redirect
            this.form[this.method](this.action)
                .then(response => {
                    redirect = response.redirect
                    return this.$store.dispatch("auth/login", response)
                })
                .then(()=> {
                    alertSuccessMessage("Registro", "Fuiste registrado correctamente.")
                    this.$router.push({ path: redirect })
                    return this.submitted = false
                }).catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Registro", "Ocurrió un error con el siguiente mensaje: " + error.data.message)
                    }

                    return this.submitted = false
                })
        },
    },
}
</script>
