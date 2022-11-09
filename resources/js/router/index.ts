import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import About from '../pages/About.vue'
import Home from '../pages/Home.vue'
import Register from '../pages/auth/Register.vue'

const routes: RouteRecordRaw[] = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/register', component: Register }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
