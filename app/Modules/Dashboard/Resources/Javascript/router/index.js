import * as middleware from "@/router/middleware"
import { canAccessDashboard } from "./middleware"
import multiguard from "vue-router-multiguard"
import router from "@/router"

router.addRoutes(
    [
        {
            children: [
                {
                    beforeEnter: multiguard([middleware.authRequired, canAccessDashboard]),
                    meta: {
                        footer: false
                    },
                    name: "Dashboard",
                    path: "",
                    component: view("Admin/Dashboard"),
                },
                {
                    component: require("./views/Admin/Articles/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesIndex",
                    path: "/admin/articles",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Articles/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesCreate",
                    path: "/admin/articles/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Articles/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminArticlesEdit",
                    path: "/admin/articles/:id/edit",
                },
                {
                    component: require("./views/Admin/Properties/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminPropertiesIndex",
                    path: "/admin/properties",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Properties/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminPropertiesCreate",
                    path: "/admin/properties/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Properties/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminPropertiesEdit",
                    path: "/admin/properties/:id/edit",
                },
                {
                    component: require("./views/Admin/Users/Index.vue"),
                    beforeEnter: middleware.authRequired,
                    meta: {
                        footer: false,
                    },
                    name: "AdminUsersIndex",
                    path: "/admin/users",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Users/Create.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminUsersCreate",
                    path: "/admin/users/create",
                },
                {
                    beforeEnter: middleware.authRequired,
                    component: require("./views/Admin/Users/Edit.vue"),
                    meta: {
                        footer: false,
                    },
                    name: "AdminUsersEdit",
                    path: "/admin/users/:id/edit",
                },
            ],
            component: view("Admin/Admin"),
            meta: { footer: false },
            path: "/admin"
        },
    ]
)

/**
 * Asynchronously load view (Webpack Lazy loading compatible)
 * @param {string} name The filename (basename) of the view to load.
 */
function view(name) {
    return function(resolve) {
        require(["./views/" + name + ".vue"], resolve)
    }
}
