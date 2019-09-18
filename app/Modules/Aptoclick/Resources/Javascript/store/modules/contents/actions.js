import * as types from "../../mutation-types"

export default {
    deleteOneContent ({ commit }, id) {
        return window.axios.delete("/api/contents/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.CONTENTS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.CONTENTS_ERROR, error)
                return error
            })
    },

    fetchAllContents ({ commit }, params) {
        commit(types.CONTENTS_FETCH_ALL_PENDING, true)

        return window.axios.get("/api/contents", { params: params })
            .then(response => {
                const all = response.data.data
                commit(types.CONTENTS_FETCH_ALL, all)
                commit(types.CONTENTS_FETCH_ALL_PENDING, false)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.CONTENTS_ERROR, error)
                commit(types.CONTENTS_FETCH_ALL_PENDING, false)
                return error
            })
    },

    fetchOneContent ({ commit }, id) {
        commit(types.CONTENTS_FETCH_ONE_PENDING, true)

        return window.axios.get("/api/contents/" + id)
            .then(response => {
                const one = response.data
                commit(types.CONTENTS_FETCH_ONE, one)
                commit(types.CONTENTS_FETCH_ONE_PENDING, false)
                return one
            })
            .catch(error => {
                commit(types.CONTENTS_ERROR, error)
                commit(types.CONTENTS_FETCH_ONE_PENDING, false)
                return error
            })
    },

    reset ({ commit }) {
        commit(types.CONTENTS_RESET)
        return null
    }
}
