import { RouteRecordRaw } from 'vue-router'

import AuthenticatedLayout from '../../components/AuthenticatedLayout.vue'

import Guests from '../../pages/Guests.vue'
import Dashboard from '../../pages/Dashboard.vue'

const childRoutes: RouteRecordRaw[] = [
    { path: '/dashboard', component: Dashboard },
    { path: '/guests', component: Guests }
]

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: AuthenticatedLayout,
        redirect: '/dashboard',
        children: childRoutes
    }
]

export default routes
