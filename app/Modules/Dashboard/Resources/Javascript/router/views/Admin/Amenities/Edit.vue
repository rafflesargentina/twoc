<template>
  <div>
    <h4 class="mb-3">
      Editar Amenity: {{ strLimit(oneAmenity.name) }}
    </h4>
    <AmenityForm
      :action="'/api/amenities/' + $route.params.id"
      :method="'put'"
    />
  </div>
</template>

<script>
import { amenitiesComputed } from "@/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...amenitiesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminCompaniesEdit" && this.prepared=== true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.prepared = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("amenities/fetchOneAmenity", this.$route.params.id)
        },

        strLimit,
    },
}
</script>
