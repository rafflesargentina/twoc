import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    fetchAllPropertyConditions ({ commit, dispatch }, params) {
        commit(types.PROPERTY_CONDITIONS_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/property-conditions", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.PROPERTY_CONDITIONS_FETCH_ALL, all)
                commit(types.PROPERTY_CONDITIONS_FETCH_ALL_PENDING, false)
                dispatch("mapPropertyConditionTags", all)
                return all
            })
            .catch(error => {
                commit(types.PROPERTY_CONDITIONS_ERROR, error)
                commit(types.PROPERTY_CONDITIONS_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchOnePropertyCondition ({ commit }, id) {
        commit(types.PROPERTY_CONDITIONS_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/property-conditions/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROPERTY_CONDITIONS_FETCH_ONE, one)
                commit(types.PROPERTY_CONDITIONS_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.PROPERTY_CONDITIONS_ERROR, error)
                commit(types.PROPERTY_CONDITIONS_FETCH_ONE_PENDING, false)
                return error
            })
    },

    mapPropertyConditionTags ({ commit, state }, all) {
        const tags = mapTags(all || state.all)
        commit(types.PROPERTY_CONDITIONS_MAPPED_TAGS, tags)
        return tags
    },

    reset ({ commit }) {
        commit(types.PROPERTY_CONDITIONS_RESET)
        return null
    }
}
