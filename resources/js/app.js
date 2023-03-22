import './bootstrap';
import { createApp } from 'vue';

import Home from './components/Home.vue';
import ClubesList from './components/Clubes/List.vue';
import ClubesEditForm from './components/Clubes/EditForm.vue';
import ClubesCreateForm from './components/Clubes/CreateForm.vue';

const app = createApp();

app.component('home', Home)
app.component('clubeslist', ClubesList)
app.component('clubeseditform', ClubesEditForm)
app.component('Clubescreateform', ClubesCreateForm)

app.mount('#app');
