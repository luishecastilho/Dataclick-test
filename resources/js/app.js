import './bootstrap';
import { createApp } from 'vue';

import Home from './components/Home.vue';
import ClubesList from './components/Clubes/List.vue';
import ClubesForm from './components/Clubes/Form.vue';

const app = createApp();

app.component('home', Home)
app.component('clubeslist', ClubesList)
app.component('clubesform', ClubesForm)

app.mount('#app');
