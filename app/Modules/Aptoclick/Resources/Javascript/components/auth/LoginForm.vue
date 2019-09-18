<template>
  <form
    :action="action"
    :class="[validated ? 'needs-validation' : 'needs-validation']"
    :method="method"
    aria-label="Ingresá"
    novalidate
    @keydown="form.errors.clear($event.target.name)"
    @submit.prevent="login"
  >
    <div class="form-group">
      <label
        for="email"
        class="form-label"
      >Email</label>
      <input
        id="email"
        v-model="form.email"
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
    <div class="form-group mb-4">
      <div class="row">
        <div class="col">
          <label
            for="password"
            class="form-label"
          >Contraseña</label>
        </div>
        <div class="col-auto">
          <RouterLink
            :to="{ name: 'PasswordRequest' }"
            class="form-text small"
          >
            ¿Olvidaste tu contraseña?
          </RouterLink>
        </div>
      </div>
      <input
        id="password"
        v-model="form.password"
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
      <div class="custom-control custom-checkbox">
        <input
          id="remember"
          :class="{ 'is-invalid': form.errors.has('remember') }"
          type="checkbox"
          class="custom-control-input"
        >
        <label
          for="remember"
          class="custom-control-label text-muted"
        > <span class="text-sm">Quiero mantener mi sesión conectada.</span></label>
      </div>
    </div>
    <!-- Submit-->
    <button
      :disabled="submitted"
      class="btn btn-lg btn-block btn-primary"
      type="submit"
    >
      Ingresa
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
    <p class="text-center">
      <small class="text-muted text-center">¿Aún no tienes una cuenta? <RouterLink :to="{ name: 'Register' }">Regístrate</RouterLink></small>
    </p>
  </form>
</template>

<script>
import Form from "@/utilities/Form"

let fields = {
    email: "",
    password: "",
    remember: "",
}

export default {

    name: "LoginForm",

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
        login() {
            this.submitted = true

            this.form[this.method](this.action)
                .then(response => {
                    return this.$store.dispatch("auth/login", response)
                })
                .then(response => {
                    let intended = this.$route.query.intended
                    let redirect = intended || response.redirect
                    return this.$router.push({ path: redirect })
                })
                .catch(()=> {
                    this.submitted = false
                })
        }
    }
}
</script>
