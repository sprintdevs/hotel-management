import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import About from '../pages/About.vue'
import Home from '../pages/Home.vue'
import Signup from '../pages/Signup.vue'
import Login from '../pages/Login.vue'

const routes: RouteRecordRaw[] = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/signup', component: Signup },
    { path: '/login', component: Login}
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
