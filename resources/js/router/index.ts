import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
  
import authRoutes from './routes/auth'
import dashboardRoutes from './routes/dashboard'
import facilityRoutes from './routes/facility'

const routes: RouteRecordRaw[] = [
    ...authRoutes,
    ...dashboardRoutes,
    ...facilityRoutes
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
