import './bootstrap';

import { createApp } from 'vue';
import ProductEvents from './components/ProductEvents.vue';

const app = createApp({});
app.component('product-events', ProductEvents);
app.mount('#app');
