<template>
  <div class="container">

    <ul>
        <li v-for="category in categories"
         :key="category.id">

            {{category.name}}

        </li>
    </ul>

    <ul>
        <li v-for="tag in tags" :key="tag.id">
            {{tag.name}}
        </li>
    </ul>

  </div>
</template>

<script>
export default {
    name: 'SidebarComp',
    props: {
        categories: Array,
        tags: Array
    }

}
</script>

<style lang="scss" scoped>

ul{
    li{
        cursor: pointer;
    }
}

</style>
