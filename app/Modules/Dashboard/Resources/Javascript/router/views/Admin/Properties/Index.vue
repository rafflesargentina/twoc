<template>
  <div>
    <h4 class="mb-3">
      Propiedades
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allProperties"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <RouterLink
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminPropertiesCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nueva Propiedad
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
              :to="{ name: 'AdminPropertiesEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </RouterLink>
            <a 
              href="#" 
              @click="destroyRecord('/api/properties/' + item.id, item.id)"
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
import { propertiesComputed, propertiesMethods } from "@/store/helpers"

export default {
    data() {
        return {
            columns: {
                id: "Id.",
                title: "Titulo",
                location: "Ubicación",
                updated_at: "Actualización"
            }
        }
    },

    computed: {
        ...propertiesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminPropertiesIndex") {
                return this.prepare(),
                this.$refs.quickSearch.search = ""
            }
        }
    },

    created() {
        return this.prepare()
    },

    methods: {
        ...propertiesMethods,

        destroyRecord(url, id) {
            return destroyRecordConfirmation(url, id).then(() => this.fetchAllProperties())
        },

        prepare() {
            return this.$store.dispatch("properties/fetchAllProperties")
        }
    }
}
</script>
