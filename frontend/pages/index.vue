<template>
  <div>
    <default></default>
    <div class="container my-5">
      <div class="card">
        <div class="card-header">
          <h2 v-if="loggedIn">Welcome , {{ user.name }}</h2>
        </div>
        <div class="card-body">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <nuxt-link class="btn btn-danger" :to="{name : 'dashboard'}">Dashboard</nuxt-link>
          <nuxt-link class="btn btn-primary" :to="{name : 'register'}">Sign Up</nuxt-link>
        </div>
      </div>
    </div>
  </div>
</template>


<style>

</style>
<script>
export default {
  computed:{
    loggedIn(){
      return this.$store.state.auth.loggedIn;
    },
    user(){
      return this.$store.state.auth.user;
    }
  }
}
</script>

