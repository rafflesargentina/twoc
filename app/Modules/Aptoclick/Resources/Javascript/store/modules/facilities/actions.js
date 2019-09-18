import * as types from "../../mutation-types"

export default {
    deleteOneFacility ({ commit }, id) {
        return window.axios.delete("/api/facilities/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.FACILITIES_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.FACILITIES_ERROR, error)
                return error
            })
    },

    fetchAllFacilities ({ commit }) {
        commit(types.FACILITIES_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/facilities")
            .then(response => {
                const all = response.data.data
                commit(types.FACILITIES_FETCH_ALL, all)
                commit(types.FACILITIES_FETCH_ALL_PENDING, false)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.FACILITIES_ERROR, error)
                commit(types.FACILITIES_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchOneFacility ({ commit }, id) {
        commit(types.FACILITIES_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/facilities/" + id)
            .then(response => {
                const one = response.data
                commit(types.FACILITIES_FETCH_ONE, one)
                commit(types.FACILITIES_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.FACILITIES_ERROR, error)
                commit(types.FACILITIES_FETCH_ONE_PENDING, false)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.FACILITIES_RESET)
        return null
    }
}
