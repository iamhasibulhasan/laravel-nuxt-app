<template>
  <div>
    <div class="card">
      <div class="card-header"><h5>My Profile</h5></div>
      <div class="card-body">
        <form action="" @submit.prevent="updateUser" >
          <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text" class="form-control" v-model="profileUpdate.name" name="email" placeholder="Enter Email">
            <div v-if="profileUpdate.errors.has('name')" v-html="profileUpdate.errors.get('name')" />
          </div>
          <div class="form-group mt-4">
            <label>Enter Your Email</label>
            <input type="text" class="form-control" v-model="profileUpdate.email" name="email" placeholder="Enter Email">
            <div v-if="profileUpdate.errors.has('email')" v-html="profileUpdate.errors.get('email')" />
          </div>
          <div class="form-group my-4">
            <label>Enter Your Password</label>
            <input type="password" class="form-control" v-model="profileUpdate.password" name="password" placeholder="Enter Password">
            <div v-if="profileUpdate.errors.has('password')" v-html="profileUpdate.errors.get('password')" />
          </div>
          <div class="form-group">
            <button type="submit" :disabled="profileUpdate.busy" class="btn btn-success">
              Update profile
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>


<style>

</style>
<script>
import Form from 'vform';
export default {

  data() {
    return {
      profileUpdate:new Form(
        {
          name:'',
          email: '',
          password: ''
        }
      )


    }
  },
  methods: {
    async updateUser() {
      try {
        // let data = await this.$axios.$post('/auth/profileUpdate', this.profileUpdate);
        let data = await this.profileUpdate.post('/auth/profile',);
        console.log(data);

        // this.profileUpdate.password = '';
        await this.$auth.fetchUser()
      } catch (err) {
        console.log(err);
      }
    },
    getUser(){
      let user = this.$store.state.auth.user;
      console.log(user.name);
      this.profileUpdate.name = user.name;
      this.profileUpdate.email = user.email;
    }

  },
  mounted() {
    this.getUser();
  }
}
</script>

