import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    fetchAllPropertyTypes ({ commit, dispatch }, params) {
        commit(types.PROPERTY_TYPES_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/property-types", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.PROPERTY_TYPES_FETCH_ALL, all)
                commit(types.PROPERTY_TYPES_FETCH_ALL_PENDING, false)
                dispatch("mapPropertyTypeTags", all)
                return all
            })
            .catch(error => {
                commit(types.PROPERTY_TYPES_ERROR, error)
                commit(types.PROPERTY_TYPES_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchOnePropertyType ({ commit }, id) {
        commit(types.PROPERTY_TYPES_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/property-types/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROPERTY_TYPES_FETCH_ONE, one)
                commit(types.PROPERTY_TYPES_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.PROPERTY_TYPES_ERROR, error)
                commit(types.PROPERTY_TYPES_FETCH_ONE_PENDING, false)
                return error
            })
    },

    mapPropertyTypeTags ({ commit, state }, all) {
        const tags = mapTags(all || state.all)
        commit(types.PROPERTY_TYPES_MAPPED_TAGS, tags)
        return tags
    },

    reset ({ commit }) {
        commit(types.PROPERTY_TYPES_RESET)
        return null
    }
}
