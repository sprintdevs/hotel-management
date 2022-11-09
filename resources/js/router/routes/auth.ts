import { RouteRecordRaw } from 'vue-router'

import Register from '../../pages/auth/Register.vue'
import Login from '../../pages/auth/Login.vue'

const routes: RouteRecordRaw[] = [
    { path: '/register', component: Register },
    { path: '/login', component: Login }
]

export default routes
