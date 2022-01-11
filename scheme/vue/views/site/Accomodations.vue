<template>
  <div class="Accomodations">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <Jumbotron :text="'Accomodations'" :img="'banner-acc.png'" />
      <div class="separator"></div>
      <div class="hotel-sliders" v-if="hotels.length > 0">
        <h4 class="checkin-title">Hotels</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in hotels" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link>
          </slide>
          <hooper-navigation slot="hooper-addons"></hooper-navigation>
        </hooper>
      </div>
      <div class="hotel-sliders" v-if="Guest_House.length > 0">
        <h4 class="checkin-title">Guest Houses</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in Guest_House" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link></slide>
          <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
        </hooper>
      </div>
      <div class="hotel-sliders" v-if="apartments.length > 0">
        <h4 class="checkin-title">Apartments</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in apartments" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link></slide>
          <hooper-navigation slot="hooper-addons"></hooper-navigation>
        </hooper>
      </div>
      <div class="hotel-sliders" v-if="motels.length > 0">
        <h4 class="checkin-title">Motels</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in motels" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link></slide>
          <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
        </hooper>
      </div>
      <div class="hotel-sliders" v-if="resorts.length > 0">
        <h4 class="checkin-title">Resorts</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in resorts" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link></slide>
          <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
        </hooper>
      </div>
      <div class="hotel-sliders" v-if="campsites.length > 0">
        <h4 class="checkin-title">Campsites</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in campsites" :key="item.id">
          <router-link :to="'/viewHotel/' + item.id">
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img"
              alt=""
              srcset=""
            />
            <div class="foot">
              <label class="label">{{ item.name }}</label>
              <label class="label">{{ item.address }}</label>
              <label class="label">{{ item.phone }}</label>
              <label class="label">{{ item.email }}</label>
              <div class="stars">
                <img src="/assets/images/stars.png" alt="" />
                <router-link :to="'/viewHotel/' + item.id" class="book"
                  >Book Now</router-link
                >
              </div>
            </div>
            </router-link></slide>
          <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
        </hooper>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "Accomodations",
  data() {
    return {
      isLoading: false,
      color: "#072e4d",
      fullPage: true,
      hooperSettings: {
        itemsToShow: 2.1,
        centerMode: false,
        autoPlay: false,
        wheelControl: false,
        trimWhiteSpace: true,
        infiniteScroll: false,
        playSpeed: 4000,
        transition: 1000,
        hoverPause: false,
        breakpoints: {
          400: {
            itemsToShow: 2.1,
          },
          800: {
            itemsToShow: 3.1,
          },
          1000: {
            itemsToShow: 4.1,
          },
          1300: {
            itemsToShow: 5.1,
          },
          1600: {
            itemsToShow: 6.1,
          },
        },
      },
      hotels: [],
      apartments: [],
      motels: [],
      resorts: [],
      campsites: [],
      Guest_House: [],
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_ACCOMODATION_GROUPED").then((response) => {
        this.hotels = response.data.hotels;
        this.apartments = response.data.apartments;
        this.motels = response.data.motels;
        this.resorts = response.data.resorts;
        this.campsites = response.data.campsites;
        this.Guest_House = response.data.Guest_House;
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
