import { mapActions, mapState } from "vuex"

export const amenitiesComputed = {
    ...mapState(
        "amenities", {
            allAmenities: state => state.all,
            oneAmenity: state => state.one,
        }
    ),
}

export const amenitiesMethods = {
    ...mapActions(
        "amenities", [
            "deleteOneAmenity",
            "fetchAllAmenities",
            "fetchOneAmenity"
        ]
    )
}

export const contentsComputed = {
    ...mapState(
        "contents", {
            allContents: state => state.all,
            oneContent: state => state.one,
        }
    ),
}

export const contentsMethods = {
    ...mapActions(
        "contents", [
            "deleteOneContent",
            "fetchAllContents",
            "fetchOneContent"
        ]
    )
}

export const facilitiesComputed = {
    ...mapState(
        "facilities", {
            allFacilities: state => state.all,
            oneFacility: state => state.one,
        }
    ),
}

export const facilitiesMethods = {
    ...mapActions(
        "facilities", [
            "deleteOneFacility",
            "fetchAllFacilities",
            "fetchOneFacility"
        ]
    )
}

export const propertiesComputed = {
    ...mapState(
        "properties", {
            allMyProperties: state => state.allMine,
            allProperties: state => state.all,
            oneProperty: state => state.one
        }
    ),
}

export const propertiesMethods = {
    ...mapActions(
        "properties", [
            "deleteOneProperty",
            "fetchAllProperties",
            "fetchAllMyProperties",
            "fetchOneProperty"
        ]
    )
}

export const propertyConditionsComputed = {
    ...mapState(
        "propertyConditions", {
            allPropertyConditions: state => state.all,
            propertyConditionsMappedTags: state => state.mappedTags,
            onePropertyType: state => state.one
        }
    ),
}

export const propertyConditionsMethods = {
    ...mapActions(
        "propertyConditions", [
            "fetchAllPropertyConditions",
            "fetchOnePropertyType",
        ]
    )
}

export const propertyTypesComputed = {
    ...mapState(
        "propertyTypes", {
            allPropertyTypes: state => state.all,
            propertyTypesMappedTags: state => state.mappedTags,
            onePropertyType: state => state.one
        }
    ),
}

export const propertyTypesMethods = {
    ...mapActions(
        "propertyTypes", [
            "fetchAllPropertyTypes",
            "fetchOnePropertyType",
        ]
    )
}
