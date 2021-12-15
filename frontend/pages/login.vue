<template>
  <div>
    <default></default>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h2>Login Page</h2>
            </div>
            <div class="card-body">
              <form action="" @submit.prevent="userLogin" >
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group my-4">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password">
                </div>
                  <div class="form-group d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-success" >Login</button>
                    <nuxt-link :to="{name : 'register'}">Don't have account? Sign up.</nuxt-link>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      login: {
        email: 'mdhasibulhasan.dev@gmail.com',
        password: 'asdfghjkl'
      }
    }
  },
  methods: {
    async userLogin() {
      // console.log({data:this.login})
      try {
        let response = await this.$auth.loginWith('local', { data: this.login });
        console.log(response);
      } catch (err) {
        console.log(err);
      }
    }
  }
}
</script>
<style>

</style>
