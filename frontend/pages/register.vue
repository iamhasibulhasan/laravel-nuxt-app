<template>
  <div>
    <default></default>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h2>Create an account</h2>
            </div>
            <div class="card-body">
              <form action="" @submit.prevent="registerUser" @keydown="registerForm.onKeydown($event)">
                <div class="form-group">
                  <label>Enter Your Name</label>
                  <input type="text" class="form-control" v-model="registerForm.name" name="name" placeholder="Enter Name" :class="{ 'is-invalid': registerForm.errors.has('name') }">
                  <has-error :form="registerForm" field="name"></has-error>
                </div>
                <div class="form-group mt-4">
                  <label>Enter Your Email</label>
                  <input type="text" class="form-control" v-model="registerForm.email" name="email" placeholder="Enter Email" :class="{ 'is-invalid': registerForm.errors.has('email') }">
                  <has-error :form="registerForm" field="email"></has-error>
                </div>
                <div class="form-group my-4">
                  <label>Enter Your Password</label>
                  <input type="password" class="form-control" v-model="registerForm.password" name="password" placeholder="Enter Password" :class="{ 'is-invalid': registerForm.errors.has('password') }">
                  <has-error :form="registerForm" field="password"></has-error>
                </div>
                <div class="form-group d-flex justify-content-between align-items-center">
                  <button type="submit" class="btn btn-success" >Register</button>
                  <nuxt-link :to="{name : 'login'}">Already have an account? Login.</nuxt-link>
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
  auth: 'guest',
  data() {
    return {
      registerForm: this.$vform(
        {
          name:'',
          email: '',
          password: ''
        }
      )
    }
  },
  methods: {
    async registerUser() {
      try {
        let data = await this.$axios.$post('/auth/register', this.registerForm);
        console.log(data);
        await this.$auth.setUserToken(data.access_token);
      } catch (err) {
        console.log(err);
      }
    }
  }
}
</script>
<style>

</style>
