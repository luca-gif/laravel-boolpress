<template>
  <div class="container">


    <div class="card">

        <div class="pb-2"> {{getDate()}}</div>

        <h5 class="titolo">{{post.title}}</h5>

        <div class="messaggio">
            <p>{{shortMsg}} <router-link :to="{name: 'detail', params: {slug: post.slug}}"><span>...see all</span></router-link> </p>
        </div>


      <div class="d-flex justify-content-center">

        <div>
            <span v-if="post.category" class="badge badge-danger mr-2">{{post.category.name}}</span>
        </div>

        <div v-for="tag in post.tags" :key="tag.id">
            <span v-if="post.tags" class="badge badge-warning">{{tag.name}}</span>
        </div>

      </div>

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

.card{
    margin: 10px 0;
    padding: 10px;
    background-image: linear-gradient(#c2c2c2 10%, #fff) ;
}

.titolo{
    min-height: 90px;
}

.messaggio{
        height: 160px;
}

a{
    color: blue;
    text-decoration: none;
    &:hover{
        color: rgba(0, 0, 255, .7);
    }
}

</style>
