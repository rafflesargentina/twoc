<template>
  <div>
    <h4 class="mb-3">
      Usuarios
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allUsers"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <RouterLink
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminUsersCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nuevo Usuario
            </RouterLink>
          </div>
        </div>
      </div>
      <div v-if="$refs.quickSearch">
        <dynamic-table
          v-if="$refs.quickSearch.filteredItems.length > 0"
          :columns="columns"
          :items="$refs.quickSearch.filteredItems"
          :per-page="12"
          :sort-direction="'desc'"
          :sort-key="'updated_at'"
        >
          <th 
            slot="th" 
            class="th--acciones"
          >
            Acciones
          </th>
          <td 
            slot="td" 
            slot-scope="item"
          >
            <RouterLink 
              :to="{ name: 'AdminUsersEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </RouterLink>
            <a 
              href="#" 
              @click="destroyRecord('/api/users/' + item.id, item.id)"
            >
              <span class="fa fa-trash pr-1" />Borrar
            </a>
          </td>
        </dynamic-table>

        <div v-if="$refs.quickSearch.filteredItems.length === 0">
          <div class="card-body">
            <p class="mb-0">
              No hay resultados para mostrar.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { destroyRecordConfirmation } from "@dashboard/utilities/helpers"
import { usersComputed, usersMethods } from "@/store/helpers"

export default {
    data() {
        return {
            columns: {
                id: "Id.",
                name: "Nombre",
                email: "Email",
                created_at: "Registro",
                updated_at: "Actualización"
            }
        }
    },

    computed: {
        ...usersComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminUsersIndex") {
                return this.prepare(),
                this.$refs.quickSearch.search = ""
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        ...usersMethods,

        destroyRecord(url, id) {
            return destroyRecordConfirmation(url, id).then(() => this.fetchAllUsers())
        },

        prepare() {
            return this.$store.dispatch("users/fetchAllUsers")
        }
    }
}
</script>
