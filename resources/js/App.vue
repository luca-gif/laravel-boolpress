<template>
<div>

    <header-comp/>
    <router-view> </router-view>


</div>

</template>

<script>
import HeaderComp from './components/partials/HeaderComp.vue';
export default {
  components: { HeaderComp },

}
</script>

<style>

@import'~bootstrap/dist/css/bootstrap.css';

ul{
    list-style: none;
}

.card{
    background-image: linear-gradient(#c2c2c2 10%, #fff) ;
}
</style>
