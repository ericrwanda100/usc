<template>
  <div class="Clubs">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <Jumbotron :text="'NIGHTS CLUB'" :img="'banner-club.png'" />
      <div class="separator"></div>
      <div class="hotels">
        <div class="body">
          <router-link
            :to="'/viewClub/' + club.id"
            class="body-item"
            v-for="club in clubs"
            :key="club.id"
          >
            <img
              :src="'/assets/uploaded/' + club.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <div class="d-flex flex-btn">
                <label class="label">{{ club.name }}</label>
                <router-link to="/" class="book">Entry&nbsp;Fee</router-link>
              </div>
              <div class="d-flex flex-btn">
                <div class="d-flex dir-col">
                  <label class="label">{{ club.address }}</label>
                  <label class="label">{{ club.phone }}</label>
                </div>
                <label for="" class="money">{{ club.entry }} Rwf</label>
              </div>
              <div class="starts">
                <div class="d-flex flex-btn">
                  <div class="likes">
                    <i class="fa fa-heart love" aria-hidden="true"></i>
                    <label class="like">{{ club.likes }} Likes</label>
                  </div>
                  <router-link :to="'/bookClubs/' + club.id" class="book"
                    >Book Now</router-link
                  >
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
  name: "Clubs",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      clubs: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_CLUBS").then((response) => {
        this.clubs = response.data;
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
