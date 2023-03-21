<template>
    <div class="container d-flex">
        <form class="bg-light p-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ cluube }}</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        props: [cluube],
        /*data() {
            return {
                clube: {}
            };
        },
        mounted() {
            console.log(this.clube_id);
            axios.get("http://127.0.0.1:8000/clubes/show/"+this.clube_id)
            .then(response => {
                this.clube = JSON.parse(response.data);
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
        }*/
    }
</script>
