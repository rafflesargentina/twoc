import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        allMine: [],
        allPending: true,
        allMinePending: true,
        featured: [],
        nonFeatured: [],
        one: {
            address: {
                country: "",
                floor_number: "",
                locality: "",
                name: "",
                state: "",
                street_name: "",
                street_number: "",
                sublocality: "",
                zip: "",
            },
            bathrooms: 1,
            contact: {
                email: "",
                fax: "",
                mobile: "",
                phone: "",
            },
            covered_surface: 0,
            days_available: "",
            description: "",
            elevator: 0,
            featured: "",
            featured_photo: {},
            floors: 0,
            ground_surface: 0,
            hours_available: "",
            map: {},
            maintenance_expenses: 0,
            parking: 0,
            property_condition: {},
            property_condition_id: "",
            property_type_id: "",
            property_type: {},
            rental_price: 0,
            rooms: 1,
            sell_price: 0,
            slug: "",
            title: "",
            user_id: "",
            years: 0,
        },
        onePending: true,
    }
}

const state = {
    initialState: initialState(),
    ...initialState()
}

export default {
    actions,
    getters,
    mutations,
    state
}
