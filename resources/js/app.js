require('./bootstrap');
require('moment');
require('./ExternalLibs/owl.carousel.min');
require('@/vanilla/inertia_callbacks/inertia_callback');

import vueDebounce from 'vue-debounce'
import Vue from 'vue';
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue';
import VueTruncate from 'vue-truncate-filter';
import Fragment from 'vue-fragment'
import LoadScript from 'vue-plugin-load-script';
import {InertiaApp} from '@inertiajs/inertia-vue';
import {InertiaForm} from 'laravel-jetstream';
import store from './Store/store';
import moment from 'moment';
const app = document.getElementById('app');

new Vue({
    metaInfo: {
        titleTemplate: (title) => 'Recart'
    },
    store,
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent:name => import(`@/Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);


console.log('app');

Vue.use(VueTruncate)
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(Fragment.Plugin)
Vue.use(VueMeta)
Vue.use(LoadScript)
Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('MM.DD.YYYY')
    }
});
Vue.use(vueDebounce, {
    listenTo: ['input', 'keyup'],
    defaultTime: '1000ms'
})

Vue.mixin({methods: {route}});
