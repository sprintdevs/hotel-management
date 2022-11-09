import { RouteRecordRaw } from 'vue-router'

import AuthenticatedLayout from '../../components/AuthenticatedLayout.vue'

import Facilities from '../../pages/Facilities.vue'
import Form from '../../components/facilities/Form.vue'

const childRoutes: RouteRecordRaw[] = [
    {
        path: '/facilities', 
        component: Facilities, 
        children: [
            { path: 'create', component: Form }
        ] 
    }
]

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: AuthenticatedLayout,
        redirect: '/facilities',
        children: childRoutes
    }
]

export default routes
