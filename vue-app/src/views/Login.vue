<template>
  <div class="auth">
    <h1>Login</h1>

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
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>

  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Login',
  data() {
    return {
      name: '',
      pwd: ''
    }
  },
  methods: {
    async handleSubmit() {
      const response = await axios.post('login', {
        name: this.name,
        pwd: this.pwd
      })

      localStorage.setItem('token', response.data.token)
      this.$store.dispatch('user', response.data.user)
      this.$router.push('/')
    }
  }
}
</script>
