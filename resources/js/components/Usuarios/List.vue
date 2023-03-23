<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column mb-5">
            <div style="width: 100%" class="d-flex d-row justify-content-between">
                <h2>Usuarios</h2>
                <a href="/usuarios/create"><button type="button" class="btn btn-success">Cadastrar</button></a>
            </div>
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col">Telefone</th>
                        <th class="text-center" scope="col">Relações</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle" v-for="usuario, key in this.usuarios" :key="usuario.id">
                        <td>
                            <span>{{ usuario.name }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ usuario.email }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ usuario.phone }}</span>
                        </td>
                        <td class="text-center">
                            <span>{{ usuario.count }} clubes</span>
                        </td>
                        <td class="text-center">
                            <a :href="`/usuarios/details/${usuario.id}`">
                                <button type="button" class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            </a>
                            &nbsp;&nbsp;
                            <a :href="`/usuarios/edit/${usuario.id}`">
                                <button type="button" class="btn btn-outline-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            </a>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-outline-danger" @click="deleteUsuario(key, usuario)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                usuarios: {}
            };
        },
        mounted() {
            axios.get("http://127.0.0.1:8000/usuarios")
            .then(response => {
                this.usuarios = JSON.parse(response.data);
            })
            .catch(error => {
                console.error(error)
            });
        },
        methods: {
            async deleteUsuario(key, usuario) {
                if(confirm("Você realmente deseja deletar o usuario "+usuario.name+"?\nIsso irá apagar todas as relações dele!!! Total: "+usuario.count)){
                    await axios.delete("http://127.0.0.1:8000/usuarios/"+usuario.id)
                    .then(
                        this.usuarios.splice(key, 1)
                    );
                }
            }
        }
    }
</script>
