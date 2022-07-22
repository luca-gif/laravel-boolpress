<template>
<header class="d-flex justify-content-center">

    <nav class="navbar-expand-lg navbar-light">

    <div class="navbar collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'blog' }">Blog</router-link>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'about' }">About</router-link>
            </li>
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'contacts' }">Contacts</router-link>
            </li>

        </ul>
    </div>
</nav>

</header>
</template>

<script>
export default {
    name: 'HeaderComp',

}
</script>

<style lang="scss" scoped>

</style>
