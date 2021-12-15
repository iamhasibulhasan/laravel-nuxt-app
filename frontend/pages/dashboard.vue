<template>
  <div>
    <default></default>
    <div class="container my-5">
      <div class="row">
        <div class="col-3">
          <div class="card">
            <div class="card-header"><h5>Dashboard</h5></div>
            <div class="card-body">
              <ul>
                <li><nuxt-link :to="{name:'dashboard'}">Dashboard</nuxt-link></li>
                <li><nuxt-link :to="{name:'dashboard-profile'}">Profile</nuxt-link></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-9">
          <nuxt-child/>
        </div>

      </div>
    </div>
  </div>
</template>


<style>

</style>
<script>
export default {

}
</script>

