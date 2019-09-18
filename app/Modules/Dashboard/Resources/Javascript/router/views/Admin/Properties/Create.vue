<template>
  <div>
    <h4 class="mb-3">
      Nueva Propiedad
    </h4>
    <PropertyForm 
      :method="'post'" 
      :action="'/api/properties'"
    />
  </div>
</template>

<script>
export default {
    data() {
        return {
            prepared: false,
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminPropertysCreate" && this.prepared === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.prepared = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("properties/reset")
        },
    }
}
</script>
