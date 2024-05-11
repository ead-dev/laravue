import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'

/* Guest Component */
import Login from '@/components/Auth/Login.vue';
import Register from '@/components/Auth/Register.vue';
/* Guest Component */

/* Layouts */
//const DahboardLayout = () => import('@/components/layouts/Default.vue')
/* Layouts */

/* Authenticated Component */
//const Dashboard = () => import('@/components/Dashboard.vue')
/* Authenticated Component */
import Dashboard from '@/components/Member/Dashboard.vue'
import Profil from '@/components/Member/Profil.vue'
import FichesIndex from '@/components/Member/Fiches/Index.vue'
import RapportIndex from '@/components/Member/Rapports/Index.vue'
import DatacentersIndex from '@/components/Member/Datacenters/Index.vue'
import ShowFiche from '@/components/Member/Fiches/Show.vue'
import CreateFiche from '@/components/Member/Fiches/Create.vue'
import Home from '@/components/Front/Home.vue'
import Impact from "@/components/Front/Impact.vue"
import Contact from "@/components/Front/Contact.vue"


const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
        meta: {
            title: `Accueil`
        }
    },
    {
        name: "impact",
        path: "/impact",
        component: Impact,
        meta: {
            title: `Impact environnemental`
        }
    },
    {
        name: "contact",
        path: "/contact",
        component: Contact,
        meta: {
            title: `Impact environnemental`
        }
    },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`
        }
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`
        }
    },
    {
        name: "dashboard",
        path: '/dashboard',
        component: Dashboard,
        meta: {
            title: `Dashboard`,
            middleware: "auth"
        }
    },
    {
        name: "profil",
        path: '/profil',
        component: Profil,
        meta: {
            title: `Profil`,
            middleware: "auth"
        }
    },
    {
        name: "fiches",
        path: '/fiches',
        component: FichesIndex,
        meta: {
            title: `Fiches`,
            middleware: "auth"
        }
    },
    {
        name: "fiche",
        path: '/fiche/:tkn',
        component: ShowFiche,
        props: true,
        meta: {
            title: `Fiche`,
            middleware: "auth"
        }
    },
    {
        name: "create_create",
        path: '/fiche/create',
        component: CreateFiche,
        props: true,
        meta: {
            title: `Nouvelle Fiche`,
            middleware: "auth"
        }
    },
    {
        name: "rapports",
        path: '/rapports',
        component: RapportIndex,
        meta: {
            title: `Rapports`,
            middleware: "auth"
        }
    },
    {
        name: "datacenters",
        path: '/datacenters',
        component: DatacentersIndex,
        meta: {
            title: `Datacenters`,
            middleware: "auth"
        }
    },

   /*  {
        path: "/",
        component: DahboardLayout,
        meta: {
            middleware: "auth"
        },
        children: [
            {
                name: "dashboard",
                path: '/dashboard',
                component: Dashboard,
                meta: {
                    title: `Dashboard`
                }
            }
        ]
    } */
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

router.beforeEach(async(to, from, next) =>{
    document.title = to.meta.title
    //await store.dispatch();
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if(to.meta.middleware=="auth"){
            if (!store.state.auth.authenticated) {
                next({ name: "home" })
            }
            next()
        }
        //console.log(store.state.auth.authenticated)
        /* if (store.state.auth.authenticated) {
            next()
        } else {
            next()
        } */
        next()
    }
})

export default router
