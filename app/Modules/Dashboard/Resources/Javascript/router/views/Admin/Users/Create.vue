<template>
  <div>
    <h4 class="mb-3">
      Nuevo Inversor
    </h4>
    <InvestorForm 
      :method="'post'" 
      :action="'/api/investors'"
    />
  </div>
</template>

<script>
export default {
    data() {
        return {
            alreadyCreated: false,
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminInvestorsCreate" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("investors/reset"),
            this.$store.dispatch("documentTypes/fetchAllDocumentTypes"),
            this.$store.dispatch("investments/fetchAllInvestments")
        },
    }
}
</script>
