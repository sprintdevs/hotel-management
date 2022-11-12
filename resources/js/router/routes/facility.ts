import { RouteRecordRaw } from 'vue-router'

import AuthenticatedLayout from '../../components/AuthenticatedLayout.vue'

import Facilities from '../../pages/Facilities.vue'
import Form from '../../components/facilities/Form.vue'
import GridList from '../../components/facilities/GridList.vue'

const childRoutes: RouteRecordRaw[] = [
    { path: '/facilities', component: Facilities },
    { path: '/facilities', component: GridList },
    { path: '/facilities/create', component: Form }
]

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        component: AuthenticatedLayout,
        children: childRoutes
    }
]

export default routes
