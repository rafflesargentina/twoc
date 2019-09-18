import * as types from "../../mutation-types"

export default {
    deleteOneAmenity ({ commit }, id) {
        return window.axios.delete("/api/amenities/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.AMENITIES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.AMENITIES_ERROR, error)
                return error
            })
    },

    fetchAllAmenities ({ commit }, params) {
        commit(types.AMENITIES_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/amenities", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.AMENITIES_FETCH_ALL, all)
                commit(types.AMENITIES_FETCH_ALL_PENDING, false)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.AMENITIES_ERROR, error)
                commit(types.AMENITIES_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchOneAmenity ({ commit }, id) {
        commit(types.AMENITIES_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/amenities/" + id)
            .then(response => {
                const one = response.data
                commit(types.AMENITIES_FETCH_ONE, one)
                commit(types.AMENITIES_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.AMENITIES_ERROR, error)
                commit(types.AMENITIES_FETCH_ONE_PENDING, false)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.AMENITIES_RESET)
        return null
    }
}
