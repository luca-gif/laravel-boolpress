<template>
    <div class="container d-flex justify-content-center">

        <div class="card" style="width: 26rem;">
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>

                <div class="card-text badge badge-danger"><span v-if="post.category"> {{post.category.name}}</span></div>

                <div v-for="tag in post.tags" :key="tag.id">
                    <span v-if="post.tags" class="badge badge-warning">{{tag.name}}</span>
                </div>

                <div>
                    <router-link :to="{name: 'blog'}" class="btn btn-dark my-2"> Go back </router-link>
                </div>
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
            post: { }
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
