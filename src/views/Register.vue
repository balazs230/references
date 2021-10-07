<template>
  <div class="auth">
    <h1>Register</h1>
    <div class="error"></div>
    <div class="container">
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="name" v-model="name" class="form-control" placeholder="Enter name" id="name">
    </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" v-model="pwd" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary btn-warning">Register</button>
    </form>
    </div>

  </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'Register',
    data() {
        return {
            name: '',
            pwd: ''
        }
    },
    methods: {
       async handleSubmit() {    
          const response = await axios.post('register', {
                name: this.name,
                pwd: this.pwd
            })

            console.log(response)
            this.$router.push('/login') //redirecting
        }
    }
}
</script>
