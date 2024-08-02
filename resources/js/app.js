import './bootstrap';
import '../css/app.css';
import 'flowbite';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia';
import VueApexCharts from 'vue3-apexcharts';
import { initFlowbite } from 'flowbite';
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';

const appName = import.meta.env.VITE_APP_NAME || 'Projec Kostan';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia();
        pinia.use(piniaPluginPersistedstate);
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            // .use(piniaPluginPersistedstate)
            .use(initFlowbite)
            .use(VueApexCharts)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: 'blue',
    },
});
