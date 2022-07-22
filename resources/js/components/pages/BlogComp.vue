<template>
    <div class="container">

        <loader-comp v-if="!posts" />

        <div v-else>

            <div class="row">

               <div class="col-8">
                    <post-comp
                    v-for="post in posts"
                    :key="post.id"
                    :post = "post"
                    />
               </div>

                <sidebar-comp
                :categories = "categories"
                :tags = "tags"
                @getCategory="searchCategory"
                @getTag="searchTag"
                />

                <div v-show="showPagination" class="buttons mt-4">
                    <button :disabled = "pagination.current == 1" @click="getApi(pagination.current - 1)"> &lt;&lt; </button>

                    <button @click="getApi(page)" :disabled ="pagination.current == page" v-for="page in pagination.last" :key="page.current">

                        {{page}}

                    </button>

                    <button :disabled = "pagination.current == pagination.last" @click="getApi(pagination.current + 1)">
                     >>
                    </button>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import LoaderComp from '../partials/LoaderComp.vue';
import PostComp from './PostComp.vue'
import SidebarComp from './SidebarComp.vue';

import {apiUrl} from '../../data/config';

export default {
  components: { LoaderComp, PostComp, SidebarComp },
    name: 'BlogComp',

      data() {
        return {
           apiUrl,
            posts: [],
            categories: [],
            tags: [],

            pagination: {
                current: null,
                last: null
            },
            showPagination: false
        }
    },

    methods: {
        getApi(page) {
            axios.get(this.apiUrl + '?page=' + page)
            .then((r) => {
                this.posts = r.data.posts.data;
                this.categories = r.data.categories;
                this.tags = r.data.tags;
                this.showPagination = true;

                this.pagination = {
                    current: r.data.posts.current_page,
                    last: r.data.posts.last_page
                }
                //console.log(this.posts);
            });
        },

        searchCategory(category){

            axios.get(this.apiUrl + '/category-post/' + category)
            .then((r)=>{

                this.showPagination = false;
                this.posts = r.data.posts
                console.log(r.data);

            })
        },

        searchTag(tag){
            axios.get(this.apiUrl + '/tag-post/' + tag)
             .then((r)=>{

                 this.showPagination = false;
                 this.posts = r.data.posts
                 console.log(this.posts);
            })
        }
    },

    mounted() {
        this.getApi(1);
    }
}
</script>

<style lang="scss" scoped>


</style>
