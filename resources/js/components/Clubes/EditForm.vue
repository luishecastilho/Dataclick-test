<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column">
            <h2 class="mb-5">Editar - #{{this.clube.id }} {{this.clube.name }}</h2>
            <form id="editForm" class="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name">
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">Escudo</label>
                    <input type="text" class="form-control" id="icon" name="icon" v-model="form.icon" aria-describedby="iconHelp">
                    <div id="iconHelp" class="form-text">Coletar URL da imagem do site <a href="https://sofascore.com" target="_blank">Sofascore.com</a></div>
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">País</label>
                    <select class="form-control" id="country" name="country" v-model="form.country">
                        <option value="Brasil">Brasil</option>
                        <option value="Inglaterra">Inglaterra</option>
                        <option value="Espanha">Espanha</option>
                        <option value="França">França</option>
                        <option value="Itália">Itália</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="countryFlag" class="form-label">Bandeira do país</label>
                    <input type="text" class="form-control" id="countryFlag" name="countryFlag" v-model="form.countryFlag" aria-describedby="countryFlagHelp">
                    <div id="countryFlagHelp" class="form-text">Coletar URL da imagem do site <a href="https://sofascore.com" target="_blank">Sofascore.com</a></div>
                </div>
                <button @click="save" type="button" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        props: ['clube'],
        data() {
            return {
                form: this.clube
            }
        },
        methods: {
            async save() {
                var response = await axios.put("http://127.0.0.1:8000/clubes/edit/"+this.clube.id, this.form)
                if (response.status == 200){
                    window.location.href = "http://127.0.0.1:8000/clubes"
                }else{
                    alert("Erro ao salvar o Clube, tente novamente!")
                }
            }
        }
    }
</script>
