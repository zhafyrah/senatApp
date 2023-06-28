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

    const session = useUserSession();

    if (!publicPages.includes(to.path) && Object.keys(session).length === 0)
    {
        next({
            path: '/auth/login',
            replace: true
        })
    } else
    {
        if (to.path === '/auth/login' && Object.keys(session).length > 0)
        {
            next({
                path: '/'
            })
        } else
        {
            next()
        }
    }
})

export default router;