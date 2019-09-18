import { filter } from "lodash"
import * as types from "../../mutation-types"

export default {
    deleteOneProperty ({ commit }, id) {
        return window.axios.delete("/api/properties/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.PROPERTIES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.PROPERTIES_ERROR, error)
                return error
            })
    },

    fetchAllProperties ({ commit, dispatch }, params) {
        commit(types.PROPERTIES_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/properties", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.PROPERTIES_FETCH_ALL, all)
                commit(types.PROPERTIES_FETCH_ALL_PENDING, false)
                dispatch("mapPropertiesFeatured", all)
                dispatch("mapPropertiesNonFeatured", all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.PROPERTIES_ERROR, error)
                commit(types.PROPERTIES_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchAllMyProperties ({ commit, dispatch }, params) {
        commit(types.PROPERTIES_FETCH_ALL_MINE_PENDING, true)

        return window.axios.get("/api/my-properties", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.PROPERTIES_FETCH_ALL_MINE, all)
                commit(types.PROPERTIES_FETCH_ALL_MINE_PENDING, false)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.PROPERTIES_ERROR, error)
                commit(types.PROPERTIES_FETCH_ALL_MINE_PENDING, false)
                return error
            })
    },

    fetchOneProperty ({ commit }, id) {
        commit(types.PROPERTIES_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/properties/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROPERTIES_FETCH_ONE, one)
                commit(types.PROPERTIES_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.PROPERTIES_ERROR, error)
                commit(types.PROPERTIES_FETCH_ONE_PENDING, false)
                return error
            })
    },

    mapPropertiesFeatured({ commit, state }, all) {
        const featured = filter(all || state.all, (item)=> item.featured === "1")
        commit(types.PROPERTIES_FEATURED, featured)
        return featured
    },

    mapPropertiesNonFeatured({ commit, state }, all) {
        const nonFeatured = filter(all || state.all, (item)=> item.featured !== "1")
        commit(types.PROPERTIES_NON_FEATURED, nonFeatured)
        return nonFeatured
    },

    reset ({ commit }) {
        commit(types.PROPERTIES_RESET)
        return null
    }
}
