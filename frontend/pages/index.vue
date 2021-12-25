<template>
  <div>
    <default></default>
    <div class="container my-5">
      <div class="card mb-4">
        <div class="card-header">
          <h2 v-if="loggedIn">Welcome , {{ user.name }}</h2>
        </div>
        <div class="card-body">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <nuxt-link class="btn btn-danger" :to="{name : 'dashboard'}">Dashboard</nuxt-link>
          <nuxt-link class="btn btn-primary" :to="{name : 'register'}">Sign Up</nuxt-link>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-4 g-4">

        <div v-for="mountain of mountains" class="col">
          <div class="card">
            <img :src="baseURL +mountain.image" class="card-img-top">
            <div class="card-body">
              <h5>{{ mountain.name.substring(0, 25) }}</h5>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between align-items-center">
                  <div>
                    Price : ${{JSON.parse(mountain.info).sale_price}}
                  </div>
                  <div>
                    <button class="btn btn-success btn-sm">Add to Cart</button>
                  </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</template>


<style>

</style>
<script>

let path="";
export default {
  async fetch() {
    let products = await fetch(
      'http://127.0.0.1:8000/api/products'
    ).then(res => res.json())

    this.mountains = products.products;
    console.log(products.products);
    this.path = products.imagepath;
    console.log(path);
  },
  computed:{
    loggedIn(){
      return this.$store.state.auth.loggedIn;
    },
    user(){
      return this.$store.state.auth.user;
    },
  },
  data() {
    return {
      mountains: [],
      path: path,
      baseURL: 'http://127.0.0.1:8000/'
    }
  },


}

</script>

