<template>
  <div>
    <h1>Home page</h1>
    <p v-if="user">Hi, {{ user.name }}</p>
    <p v-if="!user">You are not logged in</p>
  </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  name: "HelloWorld",
  computed: {
    ...mapGetters(['user'])
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
