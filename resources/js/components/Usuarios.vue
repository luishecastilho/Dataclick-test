<template>
    <div id="home" class="container d-flex justify-content-around">
        <div class="card">
            <img class="card-img-top" src="https://dataclick.com.br/assets/img/testimonials-bg.jpg" alt="Clubes">
            <div class="card-body">
                <h5 class="card-title">Clubes</h5>
                <p class="card-text">Hoje há X clubes em parceria.</p>
                <a href="/clubes" class="btn btn-primary">Detalhes</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="https://dataclick.com.br/assets/img/bg_clicker.jpg" alt="Usuarios">
            <div class="card-body">
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">Hoje há X usuários vinculados à plataforma.</p>
                <a href="/usuarios" class="btn btn-primary">Detalhes</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['clubes', 'usuarios']
    }
</script>
