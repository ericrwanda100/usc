<template>
  <div class="Restaurent">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <Jumbotron :text="'RESTAURANTS'" :img="'banner-coffee.png'" />
      <div class="separator"></div>
      <div class="hotels">
        <h4 class="checkin-title"></h4>
        <div class="body">
          <router-link :to="'viewRestaurant/'+restaurant.id"  class="body-item" v-for="restaurant in restaurants" :key="restaurant.id">
            <img :src="'/assets/uploaded/'+restaurant.image" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">{{restaurant.name}}</label>
              <label class="label">{{restaurant.address}}</label>
              <label class="label">{{restaurant.email}}</label>
              <label class="label">Phone : {{restaurant.phone}}</label>
              <div class="starts">
                <div class="d-flex flex-btn">
                <router-link :to="'bookRestaurant/'+restaurant.id" class="book">Book Now</router-link>
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
  name: "Restaurants",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      restaurants: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_RESTAURANTS").then((response) => {
        this.restaurants = response.data;
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
