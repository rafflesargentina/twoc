import * as types from "../../mutation-types"
import { initialState } from "./contents"

export default {
    [types.CONTENTS_DELETE_ONE] () {},

    [types.CONTENTS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.CONTENTS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.CONTENTS_FETCH_ALL_PENDING] (state, payload) {
        state.allPending = payload
    },

    [types.CONTENTS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.CONTENTS_FETCH_ONE_PENDING] (state, payload) {
        state.onePending = payload
    },

    [types.CONTENTS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
