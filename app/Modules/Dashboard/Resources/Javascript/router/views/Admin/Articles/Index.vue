<template>
  <div>
    <h4 class="mb-3">
      Noticias
    </h4>

    <div class="card">
      <div class="card-header bg-white">
        <div class="row">
          <div class="col-md-5">
            <quick-search
              ref="quickSearch"
              :items="allArticles"
            />
          </div>
          <div class="col-md-3 offset-md-4">
            <router-link
              class="btn btn-block btn-primary text-white"
              :to="{ name: 'AdminArticlesCreate' }"
            >
              <span class="fa fa-plus pr-2" />Nueva Noticia
            </router-link>
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
            <router-link 
              :to="{ name: 'AdminArticlesEdit', params: { id: item.id } }" 
              class="mr-2"
            >
              <span class="fa fa-pencil pr-1" />Editar
            </router-link>
            <a 
              href="#" 
              @click="destroyRecord('/api/articles/' + item.id, item.id)"
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
import { articlesComputed, articlesMethods } from "@/store/helpers"

export default {
    data() {
        return {
            alreadyCreated: false,
            columns: {
                id: "Id.",
                name: "Título",
                location: "Autor",
                published_at: "Publicación",
            }
        }
    },

    computed: {
        ...articlesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "AdminArticlesIndex" && this.alreadyCreated === true) {
                return this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(() => this.alreadyCreated = true)
    },

    methods: {
        ...articlesMethods,

        destroyRecord(url, id) {
            return destroyRecordConfirmation(url, id).then(() => this.fetchAllArticles())
        },

        prepare() {
            return this.$store.dispatch("articles/fetchAllArticles")
        }
    }
}
</script>
