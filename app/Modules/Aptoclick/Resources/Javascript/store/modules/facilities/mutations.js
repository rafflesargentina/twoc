import * as types from "../../mutation-types"
import { initialState } from "./facilities"

export default {
    [types.FACILITIES_DELETE_ONE] () {},

    [types.FACILITIES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.FACILITIES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.FACILITIES_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.FACILITIES_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.FACILITIES_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.FACILITIES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
