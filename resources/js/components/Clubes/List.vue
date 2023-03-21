<template>
    <div class="container d-flex">
        <table class="table table-light table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th class="text-center" scope="col">Relações</th>
                    <th class="text-center" scope="col">País</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle" v-for="clube, key in this.clubes" :key="clube.id">
                    <th class="text-center" scope="row">
                        <img :src="clube.icon" :alt="clube.name" style="width: 50px; height: 100%;">
                    </th>
                    <td>
                        <span>{{ clube.name }}</span>
                    </td>
                    <td class="text-center">
                        <span>{{ clube.count }} usuários</span>
                    </td>
                    <td class="text-center">
                        <img :src="clube.countryFlag" :alt="clube.country" style="width: 25px; height: 25px;">
                        &nbsp;&nbsp;
                        <span>{{ clube.country }}</span>
                    </td>
                    <td class="text-center">
                        <a :href="`/clubes/edit/${clube.id}`">
                            <button type="button" class="btn btn-outline-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </a>&nbsp;&nbsp;
                        <button type="button" class="delete-button btn btn-outline-danger" @click="delete(key, clube)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                clubes: {}
            };
        },
        mounted() {
            axios.get("http://127.0.0.1:8000/clubes")
            .then(response => {
                this.clubes = JSON.parse(response.data);
            })
            .catch(error => {
                console.error(error)
            });
        },
        methods: {
            async delete(key, clube) {
                if(confirm("Você realmente deseja deletar o clube "+clube.name+"?\nIsso irá apagar todas as relações dele!!! Total: "+clube.count)){
                    await axios.post("http://127.0.0.1:8000/clubes/delete/"+clube.id)
                    .then(
                        this.clubes.splice(key, 1)
                    );
                }
            }
        }
    }
</script>
