import Vue from 'vue';
import Router from 'vue-router';
const Table = () => import(/* webpackChunkName: "ProjectsTable" */ './Pages/Table.vue');
const Edit = () => import(/* webpackChunkName: "ProjectsEdit" */ './Pages/Edit.vue');
const Add = () => import(/* webpackChunkName: "ProjectsAdd" */ './Pages/Add.vue');
const View = () => import(/* webpackChunkName: "ProjectsView" */ './Pages/View.vue');

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
        path: '/books',
        component: Table,
    },
    {
        path: '/books/edit/:id',
        component: Edit,
    },
    {
        path: '/books/show/:id',
        component: View,
    },
    {
        path: '/books/add',
        component: Add,
    },
  ],
});
