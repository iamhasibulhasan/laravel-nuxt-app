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
              <div class="alert alert-danger" v-if="login.errors.errors.account">
                {{ login.errors.errors.account[0] }}
              </div>
              <form action="" @submit.prevent="userLogin" >
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" v-model="login.email" name="email" placeholder="Enter Email">
                  <div v-if="login.errors.has('email')" v-html="login.errors.get('email')" />
                </div>
                <div class="form-group my-4">
                  <label>Password</label>
                  <input type="password" class="form-control" v-model="login.password" name="password" placeholder="Enter Password">
                  <div v-if="login.errors.has('password')" v-html="login.errors.get('password')" />
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
import Form from 'vform';
export default {

  auth: 'guest',
  data() {
    return {
      login: new Form({
        email: 'mdhasibulhasan.dev@gmail.com',
        password: 'asdfghjkl'
      })
    }
  },
  methods: {
    async userLogin() {
      // console.log({data:this.login})
      try {
        // let response = await this.$auth.loginWith('local', { data: this.login });
        let data = await this.login.post('/auth/login',);
        await this.$auth.setUserToken(data.data.access_token);

        this.$toast.success({
          title: 'Success!',
          message: 'Welcome to our app',
        })

      } catch (err) {
        console.log(err);
      }
    }
  }
}
</script>
<style>

</style>
