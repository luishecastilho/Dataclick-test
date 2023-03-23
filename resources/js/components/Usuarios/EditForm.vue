<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column">
            <h2 class="mb-5">Editar - #{{this.usuario.id }} {{this.usuario.name }}</h2>
            <form id="editForm" class="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" email="email" v-model="form.email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" phone="phone" v-model="form.phone">
                </div>
                <button @click="save" type="button" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        props: ['usuario'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    phone: ''
                }
            }
        },
        methods: {
            async save() {
                var response = await axios.put("http://127.0.0.1:8000/usuarios/edit/"+this.usuario.id, {
                    name: this.form.name,
                    email: this.form.email,
                    phone: this.form.phone

                })
                if (response.status == 200){
                    window.location.href = "http://127.0.0.1:8000/usuarios"
                }else{
                    alert("Erro ao salvar o Usuario, tente novamente!")
                }
            }
        },
        mounted() {
            axios.get("http://127.0.0.1:8000/usuarios/"+this.usuario.id)
            .then(response => {
                    this.form = JSON.parse(response.data)
            })
            .catch(error => {
                console.error(error)
            });
        }
    }
</script>
