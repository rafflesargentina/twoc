import Vue from "vue"
import VueRouter from "vue-router"

Vue.use(VueRouter)

const routes = [
    {
        component: view("socialite/ProviderCallback"),
        path: "/auth/:provider/callback",
    },
    {
        component: view("auth/Logout"),
        meta: {
            footer: false,
        },
        name: "Logout",
        path: "/logout"
    },
    {
        name: "InternalServerError",
        path: "/sorry",
        component: view("Errors/InternalServerError"),
    },
    {
        name: "Unauthorized",
        path: "/unauthorized",
        component: view("Errors/Unauthorized"),
    },
    {
        name: "PageNotFound",
        path: "*",
        component: view("Errors/PageNotFound"),
    },
]

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

export default new VueRouter({
    history: true,
    mode: "history",
    routes,
    scrollBehavior(to) {
        if (to.name === "HowItWorks") {
            return document.querySelector("#how-it-works").scrollIntoView({ 
                behavior: "smooth" 
            })
        }

        return { x: 0, y: 0 }
    },
})
