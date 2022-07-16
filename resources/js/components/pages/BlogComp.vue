<template>
    <div class="container">


        <loader-comp v-if="!posts" />


    <div v-else>
          <div class="d-flex">

          <post-comp
            v-for="post in posts"
            :key="post.id"
            :post = "post"
            />

      </div>

        <div class="buttons mt-4">
                        <button :disabled = "pagination.current == 1" @click="getApi(pagination.current - 1)"> &lt;&lt; </button>

            <button @click="getApi(page)" :disabled ="pagination.current == page" v-for="page in pagination.last" :key="page.current">

                {{page}}

            </button>

            <button :disabled = "pagination.current == pagination.last" @click="getApi(pagination.current + 1)"> >> </button>
        </div>
    </div>

    </div>
</template>

<script>

import LoaderComp from '../partials/LoaderComp.vue';
import PostComp from './PostComp.vue'

import {apiUrl} from '../../data/config';

export default {
  components: { LoaderComp, PostComp },
    name: 'BlogComp',

      data() {
        return {
           apiUrl,
            posts: [],
            pagination: {
                current: null,
                last: null
            }
        }
    },

    methods: {
        getApi(page) {
            axios.get(this.apiUrl + '?page=' + page)
            .then((r) => {
                this.posts = r.data.data;
                this.pagination = {
                    current: r.data.current_page,
                    last: r.data.last_page
                }
                //console.log(this.pagination);
            });
        },
    },

    mounted() {
        this.getApi(1);
    }
}
</script>

<style lang="scss" scoped>


</style>
