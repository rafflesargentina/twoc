<template>
  <div>
    <h4>
      Editar Ususario: {{ strLimit(oneUser.name) }}
    </h4>
    <UserForm 
      :method="'put'" 
      :action="'/api/users/' + this.$route.params.id"
    />
  </div>
</template>

<script>
import { usersComputed } from "@/store/helpers"
import { strLimit } from "@/utilities/helpers"

export default {
    data() {
        return {
            prepared: false,
        }
    },

    computed: {
        ...usersComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminUsersEdit" && this.prepared) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.prepared = true)
    },

    methods: {
        prepare() {
            return this.$store.dispatch("users/fetchOneUser", this.$route.params.id),
            this.$store.dispatch("documentTypes/fetchAllDocumentTypes"),
            this.$store.dispatch("properties/fetchAllProperties")
        },

        strLimit,
    }
}
</script>
