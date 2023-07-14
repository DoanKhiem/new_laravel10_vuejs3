const admin = [
    {
        path: "/admin",
        component: () => import("../layouts/admin.vue"),
        children: [
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/index.vue")
            },
            {
                path: "user/create",
                name: "admin-user-create",
                component: () => import("../pages/admin/users/create.vue")
            },
            {
                path: "user/edit/:id",
                name: "admin-user-edit",
                component: () => import("../pages/admin/users/edit.vue")
            },
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/index.vue")
            },
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/index.vue")
            }
        ]
    }
];
export default admin