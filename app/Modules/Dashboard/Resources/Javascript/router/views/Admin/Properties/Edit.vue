<template>
  <div>
    <h4>
      Editar Property: {{ strLimit(oneProperty.name) }}
    </h4>
    <PropertyForm 
      :method="'put'" 
      :action="'/api/properties/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { propertiesComputed } from "@/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...propertiesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminPropertiesEdit" && this.prepared) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.prepared = true)
    },

    methods: {
        prepare() {
            var oneProperty = this.$store.dispatch("properties/fetchOneProperty", this.$route.params.id)
            var propertyConditions = this.$store.dispatch("propertyConditions/fetchAllPropertyConditions")
            var propertyTypes = this.$store.dispatch("propertyTypes/fetchAllPropertyTypes")

            return Promise.all([oneProperty, propertyConditions, propertyTypes])
        },

        strLimit,
    }
}
</script>
