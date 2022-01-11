<template>
  <div class="viewClub">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content" v-if="club">
      <Jumbotron :text="club.name" :img="club.image"/>
      <div class="separator"></div>
      <div class="hotels">
        <div class="body">
          <div class="body-item" v-for="club in club.products" :key="club.id">
            <img
              :src="'/assets/uploaded/' + club.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <div class="d-flex flex-btn">
                <label for="">{{ club.name }}</label>
                <label for="" class="money">{{ club.price }} Rwf</label>
              </div>
              <div class="d-flex flex-btn">
                <div class="d-flex dir-col">
                  <router-link :to="'/bookClubs/' + club.id" class="book"
                    >Order Now</router-link
                  >
                </div>
                <label for="phone">{{club.phone}}</label>
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
  name: "viewClub",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      club: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_SINGLE_CLUB", this.$route.params.id).then((response) => {
        this.club = response.data;
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
