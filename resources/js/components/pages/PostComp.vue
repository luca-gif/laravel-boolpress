<template>

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{post.title}}</h5>
                <small>{{getDate()}}</small>
                </div>
                <p class="mb-1">{{shortMsg}} <router-link :to="{name: 'detail', params: {slug: post.slug}}"> <span>...see all</span> </router-link></p>

                <span>
                    <span class="badge badge-danger" v-if="post.category"> {{post.category.name}}</span>
                </span>

                <span v-for="tag in post.tags" :key="tag.id">
                    <span v-if="post.tags" class="badge badge-warning">{{tag.name}}</span>
                </span>

            </a>
        </div>

</template>

<script>
export default {
    name: 'PostComp',

    props: {
        post: Object
    },

    computed: {
           shortMsg(){

            return this.post.content.substr(0,150);
        },
    },

    methods:{

        getDate(){

            const today  = new Date(this.post.updated_at)

            let day = today.getDate();
            let month = today.getMonth() + 1;
            let year = today.getFullYear();

            if (day < 10) day = '0'+ day;
            if (month < 10) month = '0'+ month;

            return `${day}/${month}/${year}`;

        }
    }

}
</script>

<style lang="scss" scoped>

</style>
