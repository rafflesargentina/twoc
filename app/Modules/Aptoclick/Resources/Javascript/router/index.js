import * as middleware from "@/router/middleware"
import { alertInfoMessage } from "@/utilities/helpers"
import multiguard from "vue-router-multiguard"
import router from "@/router"
import store from "@/store"

function fullProfileRequired (to, from, next) {
    var fields = [
        "curp",
        "email",
        "first_name",
        "last_name",
        "rfc",
    ]

    fields.forEach(field => {
        if (!store.state.auth.user[field]) {
            return alertInfoMessage("Atención", "Antes de realizar esta acción es necesario que completes tu perfil de usuario.")
                .then(next({ name: "Account" }))
                .catch(next({ name: "Account" }))
        }
    }) 

    var contactFields = [
        "phone",
        "mobile",
    ]

    contactFields.forEach(field => {
        if (!store.state.auth.user.contact[field]) {
            return alertInfoMessage("Atención", "Antes de realizar esta acción es necesario que completes tu perfil de usuario.")
                .then(next({ name: "Account" }))
                .catch(next({ name: "Account" }))
        }
    })

    return next()
}

router.addRoutes([
    {
        children: [
            {
                beforeEnter: middleware.authRequired,
                name: "Account",
                path: "",
                component: view("Account/PersonalData"),
            },
            {
                beforeEnter: middleware.authRequired,
                name: "MyProperties",
                path: "/my-properties",
                component: view("Account/MyProperties"),
            },
        ],
        component: view("Account/Account"),
        path: "/account"
    },
    {
        component: view("Home"),
        name: "Home",
        path: "/"
    },
    {
        component: view("Contact"),
        name: "Contact",
        path: "/contact"
    },
    {
        component: view("FAQ"),
        name: "FAQ",
        path: "/faq"
    },
    {
        beforeEnter: middleware.authNotRequired,
        component: view("auth/Login"),
        meta: {
            footer: false
        },
        name: "Login",
        path: "/login"
    },
    {
        component: view("Pricing"),
        name: "Pricing",
        path: "/pricing"
    },
    {
        beforeEnter: middleware.authNotRequired,
        component: view("auth/Register"),
        meta: {
            footer: false
        },
        name: "Register",
        path: "/register"
    },
    {
        beforeEnter: middleware.authNotRequired,
        component: view("auth/passwords/Request"),
        meta: {
            footer: false
        },
        name: "PasswordRequest",
        path: "/password/request"
    },
    {
        beforeEnter: middleware.authNotRequired,
        component: view("auth/passwords/Reset"),
        meta: {
            footer: false
        },
        name: "PasswordReset",
        path: "/password/reset/:token"
    },
    {
        component: view("PolicyOfPrivacy"),
        name: "Policy of Privacy",
        path: "/legal/policy-of-privacy",
    },
    {
        component: view("Properties/Index"),
        name: "PropertiesIndex",
        path: "/properties"
    },
    {
        beforeEnter: middleware.authRequired,
        component: view("Properties/Create"),
        name: "PropertiesCreate",
        path: "/properties/create"
    },
    {
        beforeEnter: middleware.authRequired,
        component: view("Properties/Edit"),
        name: "PropertiesEdit",
        path: "/properties/:id/edit",
    },
    {
        component: view("Properties/Show"),
        name: "PropertiesShow",
        path: "/properties/:id"
    },
    {
        component: view("TermsAndConditions"),
        name: "Terms and Conditions",
        path: "/legal/terms-and-conditions"
    },
    {
        component: view("Valorize"),
        name: "Valorize",
        path: "/valorize",
    }
])

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 *
 * @param {string} name The filename (basename) of the view to load.
 */
function view(name) {
    return function(resolve) {
        require(["./views/" + name + ".vue"], resolve)
    }
}
