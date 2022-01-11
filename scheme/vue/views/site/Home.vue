<template>
  <div class="rsl-home">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <div class="landing">
        <router-link to="/accomodations" class="land-item">
          <label for="">Accomodations</label>
          <img src="/assets/images/accom.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/clubs" class="land-item">
          <label for="">NIGHT CLUBS</label>
          <img src="/assets/images/night.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/" class="land-item">
          <label for="">GALLERY</label>
          <img src="/assets/images/gall.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/coffee" class="land-item">
          <label for="">COFFEE SHOPS</label>
          <img src="/assets/images/coffee.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/car" class="land-item">
          <label for="">CAR RENTAL</label>
          <img src="/assets/images/car.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/" class="land-item">
          <label for="">ATTRACTIONS</label>
          <img src="/assets/images/attra.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/" class="land-item">
          <label for="">BUS TICKET</label>
          <img src="/assets/images/bus.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/BookFlight" class="land-item">
          <label for="">FLIGHT TICKET</label>
          <img src="/assets/images/flight.svg" alt="" srcset="" />
        </router-link>
        <router-link to="/restaurent" class="land-item">
          <label for="">RESTAURANTS</label>
          <img src="/assets/images/resto.svg" alt="" srcset="" />
        </router-link>
      </div>
      <div class="separator"></div>
      <div class="banner-1">
        <img src="/assets/images/banner-1.png" alt="" srcset="" />
      </div>
      <div class="separator"></div>
      <div class="hotels" v-if="hotels">
        <h4 class="checkin-title">Top Rated Accomodations</h4>
        <div class="body">
          <div class="body-item" v-for="item in hotels" :key="item.id">
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
          </div>
        </div>
      </div>
      <div class="separator"></div>
      <div class="hotels">
        <h4 class="checkin-title">Awesome Nights Clubs</h4>
        <div class="body">
          <div class="body-item" v-for="club in clubs" :key="club.id">
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
          </div>
        </div>
      </div>
      <div class="separator"></div>
      <div class="hotels">
        <h4 class="checkin-title">Visit our gallery</h4>
        <div class="body">
          <div class="body-item">
            <img src="/assets/images/kivu1.png" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">Kivu Lake</label>
              <label class="label">Gisenyi</label>
            </div>
          </div>
          <div class="body-item">
            <img src="/assets/images/kivu2.png" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">Kivu Lake</label>
              <label class="label">Gisenyi</label>
            </div>
          </div>
          <div class="body-item">
            <img src="/assets/images/mus.png" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">National Museum</label>
              <label class="label">Butare</label>
            </div>
          </div>
          <div class="body-item">
            <img src="/assets/images/nyungwe.png" class="body-img" alt="" srcset="" />
            <div class="foot">
              <label class="label">Nyungwe Forest</label>
              <label class="label">Rusizi</label>
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
  name: "Home",
  data() {
    return {
      isLoading: false,
      color: "#072e4d",
      fullPage: true,
      clubs: null,
      hotels: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_TOP_CLUBS").then((response) => {
        this.clubs = response.data;
        this.isLoading = false;
      });
    },
    getHotels() {
      this.isLoading = true;
      this.$store.dispatch("GET_TOP_ACCOMODATION").then((response) => {
        this.hotels = response.data;
        this.isLoading = false;
      });
    },
  },
  mounted() {
    this.getItems();
    this.getHotels();
  },
};
</script>

<style lang="scss">
$maingreen: #015b0a;
$maingreenhover: #013d07;
.all-content {
  .landing {
    padding: 2rem 4rem;
    display: grid;
    grid-template-columns: 33% 33% 33%;
    grid-gap: 1rem;
    grid-row-gap: 1rem;
    margin-bottom: 0;
    @media only screen and (min-width: 1500px) {
      padding: 2rem 12rem;
      margin-bottom: 0;
    }
    @media only screen and (max-width: 800px) {
      grid-template-columns: 49% 49%;
      padding: 2rem 1rem;
      margin-bottom: 0;
    }
    .land-item {
      background: $maingreen;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      border-radius: 0.25rem;
      color: white;
      text-transform: uppercase;
      column-gap: 1rem;
      font-weight: 600;
      transition: all .5s ease-in-out;
        box-shadow: 0px 0px 10px 5px #015b0a50;
      &:hover{
        background: $maingreenhover;
        box-shadow: 0px 0px 10px 5px #c4c3c3;
      }
      @media only screen and (max-width: 800px) {
        flex-direction: column;
        font-size: 0.75rem;
        row-gap: 1rem;
        padding: 1rem;
      }
      img {
        height: 40px;
      }
    }
  }
  .banner-1 {
    // width: 100vw;
    img {
      width: 100%;
    }
  }
}
</style>
