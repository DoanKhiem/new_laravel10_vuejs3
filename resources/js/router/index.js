import {createRouter, createWebHistory} from "vue-router";
import admin from "./admin";
import InvoiceIndex from '../components/invoice/index.vue';
import NotFound from '../components/NotFound.vue';
import invoiceNew from '../components/invoice/new.vue'
import invoiceShow from '../components/invoice/show.vue'
const routeInvoice = [
    {
        path: '/',
        component: InvoiceIndex
    },
    {
        path: '/invoice/new',
        component: invoiceNew
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound,
    },
    {
        path: '/invoice/show/:id',
        component: invoiceShow,
        props: true
    }

]
const routes = [...admin, ...routeInvoice];

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
