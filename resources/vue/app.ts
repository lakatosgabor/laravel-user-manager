// @ts-nocheck
import { renderSpladeApp, SpladePlugin } from '@protonemedia/laravel-splade'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m'
import { createApp } from 'vue/dist/vue.esm-bundler.js'

// css
import '@protonemedia/laravel-splade/dist/style.css'
import 'element-plus/theme-chalk/dark/css-vars.css'
import 'primeicons/primeicons.css'
import '../assets/scss/base.scss'

// components
import PermissionTable from './components/tables/permissions.vue'
import DarkModeButton from './components/dark-mode.vue'
import UserTable from './components/tables/users.vue'
import RoleTable from './components/tables/roles.vue'
import Pagination from './components/pagination.vue'

const el = document.getElementById('app')

createApp({ render: renderSpladeApp({ el }) })
  .use(SpladePlugin, {
    max_keep_alive: 50,
    transform_anchors: true,
    progress_bar: false,
    components: {
      PermissionTable,
      DarkModeButton,
      Pagination,
      UserTable,
      RoleTable,
    },
  })
  .use(ZiggyVue)
  .mount(el)
