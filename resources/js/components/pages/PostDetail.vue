<template>
    <div class="container d-flex justify-content-center">


        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b>Titolo:</b> {{post.title}}</h5>
                <p class="card-text"><b>Blog:</b> {{post.content}}</p>
                <p class="card-text"><span v-if="post.category"><b>Categoria:</b> {{post.category.name}}</span></p>

                <router-link :to="{name: 'blog'}" class="btn btn-dark"> Go back </router-link>
            </div>
        </div>

    </div>
</template>

<script>

import {apiUrl} from '../../data/config';

export default {
    name: 'PostDetail',
    data(){
        return{
            apiUrl,
            post: {}
        }
    },
    mounted(){
        this.getApi();
    },
    methods: {
        getApi(){
            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(r=>{
                 this.post = r.data;
                console.log(r.data)
            })
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
