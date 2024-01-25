import { createRouter, createWebHistory } from "vue-router";
import admin from "./admin";
import InvoiceIndex from '../components/invoice/index.vue';
import NotFound from '../components/NotFound.vue';
const routeInvoice = [
    {
        path: '/',
        component: InvoiceIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound,
    }
]
const routes = [...admin, ...routeInvoice];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
