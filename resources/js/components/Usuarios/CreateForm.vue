<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column">
            <h2 class="mb-5">Cadastrar - Usuario</h2>
            <form id="editForm" class="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" v-model="form.email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="phone" name="phone" v-model="form.phone">
                </div>
                <button @click="save" type="button" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
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
                var response = await axios.post("http://127.0.0.1:8000/usuarios/create", {
                    name: this.form.name,
                    email: this.form.email,
                    phone: this.form.phone

                }).then(response =>
                    window.location.href = "http://127.0.0.1:8000/usuarios"
                )
            }
        }
    }
</script>
