<template>
    <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link> |
      <div v-if="!user">
         <router-link to="/login">Login</router-link> |
        <router-link to="/register">Register</router-link> 
      </div>
      <div v-if="user">
         <a href="javascript:void(0)" @click="handleClick" class="nav-link">Logout</a>
      </div>
      
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
    export default {
        name: 'Nav',
        methods: {
            handleClick() {
                localStorage.removeItem('token')
                this.$store.dispatch('user', null)
                this.$router.push('/')
            }
        },
        computed: {
            ...mapGetters(['user'])
        }
    }
</script>

<style  scoped>

</style>