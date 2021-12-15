<template>
  <div>
    <div class="card">
      <div class="card-header"><h5>My Profile</h5></div>
      <div class="card-body">
        <form action="" @submit.prevent="updateUser" >
          <div class="form-group">
            <label>Enter Your Name</label>
            <input type="text" class="form-control" v-model="profileUpdate.name" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group mt-4">
            <label>Enter Your Email</label>
            <input type="text" class="form-control" v-model="profileUpdate.email" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group my-4">
            <label>Enter Your Password</label>
            <input type="password" class="form-control" v-model="profileUpdate.password" name="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" >Update Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>


<style>

</style>
<script>
export default {
  auth: 'guest',
  data() {
    return {
      profileUpdate:
        {
          name:'',
          email: '',
          password: ''
        }

    }
  },
  methods: {
    async updateUser() {
      try {
        let data = await this.$axios.$post('/auth/profileUpdate', this.profileUpdate);
        console.log(data);
        await this.$auth.setUserToken(data.access_token);
      } catch (err) {
        console.log(err);
      }
    }
  }
}
</script>

