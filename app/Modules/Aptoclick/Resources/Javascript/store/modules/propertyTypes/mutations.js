import * as types from "../../mutation-types"
import { initialState } from "./propertyTypes"

export default {
    [types.PROPERTY_TYPES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROPERTY_TYPES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROPERTY_TYPES_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.PROPERTY_TYPES_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.PROPERTY_TYPES_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.PROPERTY_TYPES_MAPPED_TAGS] (state, payload) {
        state.mappedTags = payload
    },

    [types.PROPERTY_TYPES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
