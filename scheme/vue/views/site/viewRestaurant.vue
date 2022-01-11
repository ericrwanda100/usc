<template>
  <div class="viewRestaurant">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <Jumbotron :text="restaurant.name" :img="restaurant.image" />
      <div class="separator"></div>
      <div class="hotels">
        <div class="body">
          <div class="body-item" v-for="item in items" :key="item.id">
            <img
              :src="'/assets/uploaded/'+item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <div class="d-flex flex-btn">
                <label for="">{{item.name}}</label>
                <label for="" class="money">{{item.price}} Rwf</label>
              </div>
              <div class="d-flex flex-btn">
                <div class="d-flex dir-col">
                  <router-link :to="'/bookRestaurant/'" class="book"
                    >Order Now</router-link
                  >
                </div>
                <img src="/assets/images/cart.png" alt="" srcset="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "viewRestaurant",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      item: [],
      restaurant: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store
        .dispatch("GET_RESTAURANT_PRODUCTS", this.$route.params.id)
        .then((response) => {
          this.items = response.data["products"];
          this.restaurant = response.data["restaurant"];
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
