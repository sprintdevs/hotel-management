import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import About from '../pages/About.vue'
import Home from '../pages/Home.vue'

const routes: RouteRecordRaw[] = [
    { path: '/', component: Home },
    { path: '/about', component: About }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
