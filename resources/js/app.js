import './bootstrap';
import { createApp } from 'vue';

import Home from './components/Home.vue';
import ClubesList from './components/Clubes/List.vue';
import ClubesEditForm from './components/Clubes/EditForm.vue';
import ClubesCreateForm from './components/Clubes/CreateForm.vue';
import UsuariosList from './components/Usuarios/List.vue';
import UsuariosEditForm from './components/Usuarios/EditForm.vue';
import UsuariosCreateForm from './components/Usuarios/CreateForm.vue';
import UsuariosDetails from './components/Usuarios/Details.vue';

const app = createApp();

app.component('home', Home)
app.component('clubeslist', ClubesList)
app.component('clubeseditform', ClubesEditForm)
app.component('Clubescreateform', ClubesCreateForm)

app.component('usuarioslist', UsuariosList)
app.component('usuarioseditform', UsuariosEditForm)
app.component('usuarioscreateform', UsuariosCreateForm)
app.component('usuariosdetails', UsuariosDetails)

app.mount('#app');
