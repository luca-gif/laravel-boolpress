// importo Vue e VueRouter
import Vue from "vue";
import VueRouter from "vue-router";

// dico a Vue di usare VueRouter
Vue.use(VueRouter);

// importo i componenti

import HomeComp from "./components/pages/HomeComp";
import BlogComp from "./components/pages/BlogComp";
import ContactsComp from "./components/pages/ContactsComp";
import AboutComp from "./components/pages/AboutComp";
import PostDetail from "./components/pages/PostDetail";

const router = new VueRouter({
    mode: "history",
    routes: [{
            path: "/",
            name: "home",
            component: HomeComp,
        },
        {
            path: "/blog",
            name: "blog",
            component: BlogComp,
        },
        {
            path: "/contatti",
            name: "contacts",
            component: ContactsComp,
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: AboutComp,
        },
        {
            path: "/dettagli-post/:slug",
            name: "detail",
            component: PostDetail,
        },
    ],
});

export default router;