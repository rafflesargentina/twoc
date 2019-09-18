import * as types from "../../mutation-types"
import { initialState } from "./amenities"

export default {
    [types.AMENITIES_DELETE_ONE] () {},

    [types.AMENITIES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.AMENITIES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.AMENITIES_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.AMENITIES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.AMENITIES_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.AMENITIES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
