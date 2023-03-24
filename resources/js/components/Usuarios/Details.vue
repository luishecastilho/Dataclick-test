<template>
    <div class="container d-flex">
        <div class="form-box bg-light p-5 d-flex flex-column">
            <div class="modal" id="faturasModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header d-flex flex-row justify-content-between">
                            <h5 class="modal-title">Faturas - {{ modal.name }}</h5>
                             <img sa :src="modal.icon" :alt="modal.name" class="clube_icon">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex flex-row justify-content-between " v-for="fatura in this.modal.faturas.data" :key="fatura.id">
                                    <div class="icon-name d-flex flex-row align-items-center">
                                        {{ formatDate(fatura.expiry_date) }}
                                    </div>
                                    <div class="faturas d-flex flex-row align-items-center">
                                        <span v-if="fatura.paid">
                                            Pago <i class='fa fa-check-circle' aria-hidden='true' style='color: green'></i>
                                        </span>
                                        <span v-else-if="!fatura.paid && new Date(fatura.expiry_date) > Date.now()">
                                            Em dia
                                        </span>
                                        <span v-else>
                                            Inadimplente <i class='fa fa-ban' aria-hidden='true' style='color: red'></i>
                                        </span>
                                        <button type="button" class="btn btn-outline-primary" @click="payment(fatura)" v-if="!fatura.paid">Pagar</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mb-5">Detalhes - #{{this.usuario.id }} {{this.usuario.name }}</h2>
            <div id="detalhes" class="d-flex flex-row justify-content-between">
                <div id="info">
                    <h4 class="mb-3">Dados Pessoais:</h4>
                    <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="this.usuario.name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" email="email" v-model="this.usuario.email" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="phone" phone="phone" v-model="this.usuario.phone" disabled>
                    </div>
                    <a :href="`http://127.0.0.1:8000/usuarios/edit/${this.usuario.id}`"><button type="button" class="btn btn-outline-secondary">Ir para edição</button></a>
                </div>
                <div id="clubes">
                    <h4 class="mb-3">Clubes relacionados:</h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex flex-row justify-content-between " v-for="clube in this.relationedClubs" :key="clube.id">
                            <div class="icon-name d-flex flex-row align-items-center">
                                <img :src="clube.icon" :alt="clube.name">{{ clube.name }}
                            </div>
                            <div class="faturas d-flex flex-row align-items-center">
                                <span v-if="clube.status === 'Ativo'">
                                    Ativo <i class='fa fa-check-circle' aria-hidden='true' style='color: green'></i>
                                </span>
                                <span v-else-if="clube.status === 'Inadimplente'">
                                    Inadimplente <i class='fa fa-ban' aria-hidden='true' style='color: red'></i>
                                </span>
                                <span v-else>
                                    Inativo <i class='fa fa-close' aria-hidden='true'></i>
                                </span>
                                <button
                                    class="btn-faturas btn btn-outline-primary"
                                    type="button"
                                    data-bs-target="#faturasModal"
                                    data-bs-toggle="modal"
                                    @click="showModal(clube, this.usuario.id)"
                                >Faturas</button>
                            </div>
                        </li>

                        <li id="lastClubRow" class="list-group-item d-flex flex-row justify-content-between align-items-center text-secondary" v-if="joinClubForm === false">
                            Adicionar um clube <button type="button" class="btn btn-outline-primary" @click="showJoinClubForm"><i class='fa fa-plus' aria-hidden='true'></i></button>
                        </li>
                        <li class="list-group-item d-flex flex-row justify-content-between align-items-center" v-else>
                            <form id="joinClubForm" action="POST" class="d-flex flex-row align-items-center m-0">
                                <select class="form-select" name="clube_id" v-model="form.clube_id">
                                    <option value="0" disabled>-- Selecione --</option>
                                    <option
                                    :key="clubeForm.id"
                                    :value="clubeForm.id"
                                    v-for="clubeForm in clubesForm"
                                    >{{ clubeForm.name }}</option>
                                </select>
                                <button type="button" class="btn btn-outline-primary" @click="joinClub">Adicionar</button>
                            </form>
                            <button type="button" class="btn btn-outline-danger" @click="showJoinClubForm"><i class='fa fa-close' aria-hidden='true'></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        props: ['usuario', 'clubes'],
        data() {
            return {
                relationedClubs: {},
                joinClubForm: false,
                clubesForm: {},
                form: {
                    clube_id: 0
                },
                modal: {
                    name: '',
                    icon: '',
                    faturas: {},
                }
            }
        },
        mounted() {
            this.relationedClubs = this.clubes;
        },
        methods: {
            async showJoinClubForm() {
                if(!this.joinClubForm){
                    this.joinClubForm = true;
                    axios.get(`http://127.0.0.1:8000/clubes/exceptions/${this.usuario.id}`)
                    .then(response => {
                        this.clubesForm = response.data;
                    })
                    .catch(error => {
                        console.error(error)
                    });
                }else{
                    this.joinClubForm = false;
                    this.clubesForm = {};
                    this.form.clube_id = 0;
                }
            },
            async joinClub() {
                var response = await axios.post(`http://127.0.0.1:8000/usuarios/joinclube/${this.usuario.id}/${this.form.clube_id}`)
                if (response.status == 200){
                    this.relationedClubs = response.data;
                    this.showJoinClubForm();
                }else{
                    alert("Erro ao adicionar o Clube escolhido, tente novamente!")
                }
            },
            async showModal(clube, usuario_id) {
                this.modal.faturas = await axios.get(`http://127.0.0.1:8000/faturas/${usuario_id}/${clube.id}`)
                this.modal.name = clube.name
                this.modal.icon = clube.icon
            },
            async payment(fatura) {
                var response = await axios.put(`http://127.0.0.1:8000/faturas/payment/${fatura.id}`)
                if (response.status == 200){
                    fatura.paid = 1;
                }else{
                    alert("Erro ao pagar a Fatura, tente novamente!")
                }
            },
            formatDate(date) {
                var dataa = new Date(date);
                return `${dataa.getDate()}/${dataa.getMonth()+1}/${dataa.getFullYear()}`;
            }
        }
    }
</script>
