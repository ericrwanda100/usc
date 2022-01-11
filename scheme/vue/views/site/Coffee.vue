<template>
  <div class="Coffee">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
        <Jumbotron :text="'COFFEE SHOPS'" :img="'banner-coffee.png'"/>
      <div class="separator"></div>
      <div class="hotels">
        <h4 class="checkin-title"></h4>
        <div class="body">
          <router-link :to="'viewCoffee/'+shop.id"  class="body-item" v-for="shop in shops" :key="shop.id">
            <img :src="'/assets/uploaded/'+shop.image" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">{{shop.name}}</label>
              <label class="label">{{shop.address}}</label>
              <label class="label">{{shop.email}}</label>
              <label class="label">Phone : {{shop.phone}}</label>
              <div class="starts">
                <div class="d-flex flex-btn">
                <router-link :to="'viewCoffee/'+shop.id" class="book">Book Now</router-link>
                </div>
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "Coffee",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      shops: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_COFFEE").then((response) => {
        this.shops = response.data;
        this.isLoading = false;
      });
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>

<style></style>
