<template>
  <div class="container">


    <div class="card">

        <div class="pb-2"><b>Date:</b> {{getDate()}}</div>
        <div class="titolo"> <router-link :to="{name: 'detail', params: {slug: post.slug}}"> {{post.title}} </router-link> </div>
        <div class="messaggio"><b>Blog:</b> {{shortMsg()}}</div>
        <span v-if="post.category"><b>Categoria:</b> {{post.category.name}}</span>

    </div>

  </div>
</template>

<script>
export default {
    name: 'PostComp',

    props: {
        post: Object
    },

    computed: {

    },

    methods:{

           shortMsg(){

            return this.post.content.substr(0,60) + '...';
        },

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

.container{
    display: flex;
}
.card{
    margin: 10px 0;
    padding: 10px;
    background-image: linear-gradient(#c2c2c2 10%, #fff) ;
}

.titolo{
    min-height: 100px;
}

.messaggio{
        min-height: 100px;
}

</style>
