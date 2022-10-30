import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import About from '../pages/About.vue'
import Home from '../pages/Home.vue'
import Login from '../pages/auth/Login.vue'
import Register from '../pages/auth/Register.vue'
import Facilities from '../pages/Facilities.vue'

const routes: RouteRecordRaw[] = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/login', component: Login}
    { path: '/register', component: Register },
    { path: '/facilities', component: Facilities }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
