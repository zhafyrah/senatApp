import routes from "./routes";
import {
    createRouter,
    createWebHistory
} from "vue-router";
import { useUserSession } from "../store/auth-store"

const router = createRouter({
    history: createWebHistory(),
    routes,
    linkActiveClass: "active",
});

router.beforeEach((to, from, next) => {
    const publicPages = [
        '/auth/login',
    ];

    const authRequired = !publicPages.includes(to.name);

    if (authRequired && !useUserSession())
    {
        next({
            path: '/auth/login',
            replace: true
        })
    } else
    {
        next()
    }
})

export default router;