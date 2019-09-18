<template>
  <div>
    <h5 class="text-uppercase mb-4">
      Mis Publicaciones
    </h5>
    <div class="row">
      <div
        v-for="item in properties"
        class="col-sm-6 col-xl-4 mb-5"
      >
        <div class="card h-100 border-0 shadow">
          <div class="card-img-top embed-responsive embed-responsive-4by3 overflow-hidden gradient-overlay">
            <img
              alt="Foto destacada"
              class="w-100 embed-responsive-item"
              :src="item.featured_photo.url"
            ><RouterLink
              :to="{ name: 'PropertiesShow', params: { id: item.id }}"
              class="tile-link"
            />
            <div
              v-if="item.user"
              class="card-img-overlay-bottom z-index-20"
            >
              <div class="media text-white text-sm align-items-center">
                <img
                  :src="item.user.avatar.url"
                  :alt="item.user.name"
                  class="avatar avatar-border-white mr-2"
                >
                <div class="media-body">
                  {{ item.user.first_name }}
                </div>
              </div>
            </div>
            <div class="card-img-overlay-top text-right">
              <a
                href="javascript: void();"
                class="card-fav-icon position-relative z-index-40"
              >
                <svg class="svg-icon text-white">
                  <use xlink:href="#heart-1" />
                </svg></a>
            </div>
          </div>
          <div class="card-body d-flex align-items-center">
            <div class="w-100">
              <h6 class="card-title">
                <RouterLink
                  :to="{ name: 'PropertiesShow', params: { id: item.id }}"
                  class="text-decoration-none text-dark"
                >
                  {{ item.title }}
                </RouterLink>
              </h6>
              <div class="d-flex card-subtitle mb-3">
                <p class="flex-grow-1 mb-0 text-muted text-sm">
                  {{ item.property_type.name }}
                </p>
              </div>
              <p class="card-text text-muted">
                <span class="h4 text-primary">{{ formatMoney(item.sell_price) }}</span>
              </p>

              <RouterLink
                :to="{ name: 'PropertiesEdit', params: { id: item.id }}"
                class="btn btn-primary"
              >
                Editar
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { formatMoney } from "@aptoclick/utilities/helpers"
import { propertiesComputed, propertiesMethods } from "@aptoclick/store/helpers"

import chunk from "lodash"

export default {
    data() {
        return {
            chunks: [],
            prepared: false,
            properties: [],
        }
    },

    computed: {
        ...propertiesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "MyProperties" && this.prepared) {
                this.prepare()
            }
        }
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...propertiesMethods,

        formatMoney,

        prepare() {
            var properties = this.fetchAllMyProperties()
                .then(value => {
                    if (value) {
                        this.properties = value
                    }
                })

            return Promise.all([properties])
        },

        setChunks(items) {
            return this.chunks = chunk(items, 3)
        },
    }
}
</script>
