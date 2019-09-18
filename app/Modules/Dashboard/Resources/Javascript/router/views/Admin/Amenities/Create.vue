<template>
  <div>
    <h4 class="mb-3">
      Nueva Ameninity
    </h4>
    <AmenityForm
      :action="'/api/amenities'"
      :method="'post'"
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
            if (value.name === "AdminAmenitiesCreate" && this.prepared === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.prepared = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("amenities/reset"),

            this.$store.dispatch("amenities/fetchOneAmenity", this.$route.params.id)
        }
    },
}
</script>
