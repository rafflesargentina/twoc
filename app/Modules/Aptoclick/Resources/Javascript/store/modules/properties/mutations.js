import * as types from "../../mutation-types"
import { initialState } from "./properties"

export default {
    [types.PROPERTIES_DELETE_ONE] () {},

    [types.PROPERTIES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROPERTIES_FEATURED] (state, payload) {
        state.featured = payload
    },

    [types.PROPERTIES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROPERTIES_FETCH_ALL_MINE] (state, payload) {
        state.allMine = payload
    },

    [types.PROPERTIES_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.PROPERTIES_FETCH_ALL_MINE_PENDING] (state, payload) {
        state.allMinePending = payload
    },

    [types.PROPERTIES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.PROPERTIES_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.PROPERTIES_NON_FEATURED] (state, payload) {
        state.nonFeatured = payload
    },

    [types.PROPERTIES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
