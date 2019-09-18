import * as types from "../../mutation-types"
import { initialState } from "./propertyConditions"

export default {
    [types.PROPERTY_CONDITIONS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROPERTY_CONDITIONS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROPERTY_CONDITIONS_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.PROPERTY_CONDITIONS_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.PROPERTY_CONDITIONS_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.PROPERTY_CONDITIONS_MAPPED_TAGS] (state, payload) {
        state.mappedTags = payload
    },

    [types.PROPERTY_CONDITIONS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
