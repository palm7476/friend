import Vue from 'vue'
import VueRouter from 'vue-router'

import Create from '../page/create.vue'
import Edit from '../page/edit.vue'
import Search from '../page/search.vue'

import ProductCreate from '../product/create.vue'
import ProductEdit from '../product/edit.vue'
import ProductSearch from '../product/search.vue'

import Item from '../item/index.vue'

import User from '../user/index.vue'


Vue.use(VueRouter)

export default new VueRouter({
    routes:[
        {path: '/create' ,name: 'Create' , component: Create },
        {path: '/edit' ,name: 'Edit' , component: Edit },
        {path: '/search',name: 'Search' , component: Search},

        {path: '/productcreate' ,name: 'ProductCreate' ,component: ProductCreate},
        {path: '/productedit',name: 'ProductEdit' ,component: ProductEdit},
        {path: '/productsearch',name: 'ProductSearch' ,component: ProductSearch},

        {path: '/item',name: 'Item' , component: Item},
        {path: '/user',name: 'User' , component: User}
    ]
});