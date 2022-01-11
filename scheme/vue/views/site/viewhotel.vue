<template>
  <div class="viewHotel">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content" v-if="hotel">
      <div
        class="landing"
        :style="
          'background: url(\'/assets/uploaded/' +
            hotel.image +
            '\'); background-size: cover;background-position: center;background-repeat: no-repeat;'
        "
      >
        <div class="buttons">
          <button @click="toggleShow('Rooms')">ROOMS</button>
          <button v-if="hotel.hall == true" @click="toggleShow('Hall')">
            CONFERENCE HALL
          </button>
          <button v-if="hotel.gym == true" @click="toggleShow('Gym')">
            GYM
          </button>
          <button v-if="hotel.pool == true" @click="toggleShow('Pool')">
            SWIMING POOL
          </button>
          <button
            v-if="hotel.restaurant == true"
            @click="toggleShow('Restaurant')"
          >
            RESTAURANT
          </button>
        </div>
      </div>
      <div class="desc">
        <h1 class="name">{{ hotel.name }}</h1>
        <router-link to="/bookHotel" class="booknow">Book Now</router-link>
        <div class="socials">
          <h5>You can find us at:</h5>
          <a
            :href="hotel.instagram"
            target="_blank"
            v-if="hotel.instagram != null"
            ><img src="/assets/images/insta.png"
          /></a>
          <a
            :href="hotel.facebook"
            target="_blank"
            v-if="hotel.facebook != null"
            ><img src="/assets/images/fb.png"
          /></a>
          <a :href="hotel.twitter" target="_blank" v-if="hotel.twitter != null"
            ><img src="/assets/images/twi.png"
          /></a>
        </div>
      </div>
      <div class="location">
        <div class="left">
          <img src="/assets/images/location.png" alt="" />
          <div class="data">
            <label for="Address">Address</label>
            <label for="Address">{{ hotel.address }}</label>
            <label for="Address">{{ hotel.phone }}</label>
          </div>
        </div>
        <div class="right">
          <div
            class="group"
            v-for="(detail, index) in parseData(hotel.details)"
            :key="index"
          >
            <label for="">{{ detail.label }}: </label>
            <label for="">{{ detail.value }} </label>
          </div>
          <div class="group">
            <label for="">Ratings: </label>
            <label for=""
              ><img src="/assets/images/stars.png" alt="ratings"
            /></label>
          </div>
        </div>
      </div>
      <div class="toggles">
        <div class="hotel_rooms" v-if="showRooms && rooms.length>0">
          <div
            @click="showRoom(room)"
            class="room-item"
            :style="
              'background-image:' +
                'url(\'' +
                '/assets/uploaded/' +
                room.images +
                '\');background-size: cover;background-position: center;'
            "
            v-for="room in rooms"
            :key="room.id"
          >
            <label for="">{{ room.name }}</label>
          </div>
        </div>
        <div class="conference" v-if="showHall">
          <hooper :settings="singleSettings" class="body-hooper">
            <slide class="body-item" v-for="item in hallData" :key="item.id">
              <img
                :src="'/assets/uploaded/' + item"
                class="body-img"
                alt=""
                srcset=""
            /></slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
          </hooper>
        </div>
        <div class="gym" v-if="showGym">
          <hooper :settings="singleSettings" class="body-hooper">
            <slide class="body-item" v-for="item in gymData" :key="item.id">
              <img
                :src="'/assets/uploaded/' + item"
                class="body-img"
                alt=""
                srcset=""
            /></slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
          </hooper>
        </div>
        <div class="pool" v-if="showPool">
          <hooper :settings="singleSettings" class="body-hooper">
            <slide class="body-item" v-for="item in poolData" :key="item.id">
              <img
                :src="'/assets/uploaded/' + item"
                class="body-img"
                alt=""
                srcset=""
            /></slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
          </hooper>
        </div>
        <div class="restaurant" v-if="showRestaurant">
          <hooper :settings="singleSettings" class="body-hooper">
            <slide
              class="body-item"
              v-for="item in restaurantData"
              :key="item.id"
            >
              <img
                :src="'/assets/uploaded/' + item"
                class="body-img"
                alt=""
                srcset=""
            /></slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
          </hooper>
          <div class="resto-buttons">
            <button
              @click.prevent="
                showLunch = false;
                showDinner = false;
                showBreakfast = true;
                menu = 'Breakfast';
              "
            >
              Breakfast
            </button>
            <button
              @click.prevent="
                showBreakfast = false;
                showDinner = false;
                showLunch = true;
                menu = 'Lunch';
              "
            >
              Lunch
            </button>
            <button
              @click.prevent="
                showBreakfast = false;
                showLunch = false;
                showDinner = true;
                menu = 'Dinner';
              "
            >
              Dinner
            </button>
          </div>
        </div>
      </div>
      <div class="menu-list" v-if="showRestaurant">
        <div class="hotels">
          <h4 class="checkin-title">{{ menu }} Menu</h4>
          <Products :items="breakfast" v-if="showBreakfast" />
          <Products :items="lunch" v-if="showLunch" />
          <Products :items="dinner" v-if="showDinner" />
        </div>
      </div>
      <div class="hotel-sliders" v-if="relateds.length > 0">
        <h4 class="checkin-title">Other Accomodations Near You</h4>
        <hooper :settings="hooperSettings" class="body">
          <slide class="body-item" v-for="item in relateds" :key="item.id">
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
          <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
        </hooper>
      </div>

      <!-- rooms model -->

      <Model v-if="viewRoom">
        <div class="model-header">
          <h4>{{ roomData.name }}</h4>
          <button class="close" @click="viewRoom = false">X</button>
        </div>
        <div class="model-body">
          <div class="top-level">
            <hooper :settings="roomSettings" class="roomImages">
              <slide class="body-item">
                <img
                  :src="'/assets/uploaded/' + roomData.images"
                  class="body-img"
                  alt=""
                  srcset=""
                  style="width: 100%;object-fit: contain;height: 50vh;"
              /></slide>
              <slide
                class="body-item"
                v-for="item in JSON.parse(roomData.other_images)"
                :key="item.id"
              >
                <img
                  :src="'/assets/uploaded/' + item"
                  class="body-img"
                  alt=""
                  srcset=""
                  style="width: 100%;object-fit: contain;height: 50vh;"
              /></slide>
              <hooper-navigation slot="hooper-addons"></hooper-navigation>
              <!-- <hooper-navigation slot="hooper-addons"></hooper-navigation> -->
            </hooper>
            <div class="roomDesc">
              <label for="room name" class="name">{{ roomData.name }}</label>
              <label for="room name" class="price">{{ roomData.price }} Rwf</label>
              <p class="room-desc">{{ roomData.description }}</p>
              <router-link to="/bookHotel" class="book-room">Book Room</router-link>
            </div>
          </div>
          <div class="bottom-level">
            <div>
              <label for="features">Features</label>
              <p>{{roomData.features}}</p>
            </div>
            <div>
              <label for="media">Media</label>
              <p>{{roomData.media}}</p>
            </div>
            <div>
              <label for="amenities">Amenities</label>
              <p>{{roomData.amenities}}</p>
            </div>
          </div>
        </div>
        <div class="model-footer">
          <button class="close" @click="viewRoom = false">Close</button>
        </div>
      </Model>
    </div>
    <clientFooter />
  </div>
</template>

<script>
import Products from "./components/products.vue";
import Model from "./components/Model.vue";
export default {
  name: "viewHotel",
  components: {
    Products,
    Model,
  },
  data() {
    return {
      isLoading: false,
      color: "#072e4d",
      fullPage: true,
      viewRoom: false,
      roomData: null,
      hotel: null,
      rooms: [],
      gymData: [],
      hallData: [],
      poolData: [],
      restaurantData: [],
      breakfast: [],
      lunch: [],
      dinner: [],
      relateds: [],
      showRooms: true,
      showHall: false,
      showGym: false,
      showPool: false,
      showRestaurant: false,
      showBreakfast: false,
      showlunch: false,
      showdinner: false,
      menu: null,
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
      singleSettings: {
        itemsToShow: 1,
        centerMode: false,
        autoPlay: false,
        wheelControl: false,
        trimWhiteSpace: true,
        infiniteScroll: true,
        playSpeed: 4000,
        transition: 1000,
        hoverPause: false,
      },
      roomSettings: {
        itemsToShow: 1,
        centerMode: true,
        autoPlay: false,
        wheelControl: false,
        trimWhiteSpace: false,
        infiniteScroll: false,
        playSpeed: 4000,
        transition: 1000,
        hoverPause: false,
      },
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store
        .dispatch("GET_SINGLE_ACCOMODATION", this.$route.params.id)
        .then((response) => {
          this.hotel = response.data;
          if (response.data.gym && response.data.gymData.images != null) {
            this.gymData = JSON.parse(response.data.gymData.images);
          }
          if (response.data.hall && response.data.hallData.images != null) {
            this.hallData = JSON.parse(response.data.hallData.images);
          }
          if (response.data.pool && response.data.poolData.images != null) {
            this.poolData = JSON.parse(response.data.poolData.images);
          }
          if (
            response.data.restaurant &&
            response.data.restaurantData.images != null
          ) {
            this.restaurantData = JSON.parse(
              response.data.restaurantData.images
            );
            this.breakfast = response.data.breakfast;
            this.lunch = response.data.lunch;
            this.dinner = response.data.dinner;
          }
          this.rooms = response.data.rooms;
          this.relateds = response.data.relateds;
          this.isLoading = false;
        });
    },
    parseData(data) {
      if (data) {
        return JSON.parse(data);
      }
    },
    toggleShow(item) {
      if (item == "Rooms") {
        this.showRooms = true;
        this.showHall = false;
        this.showGym = false;
        this.showPool = false;
        this.showRestaurant = false;
      }
      if (item == "Gym") {
        this.showRooms = false;
        this.showHall = false;
        this.showGym = true;
        this.showPool = false;
        this.showRestaurant = false;
      }
      if (item == "Hall") {
        this.showRooms = false;
        this.showHall = true;
        this.showGym = false;
        this.showPool = false;
        this.showRestaurant = false;
      }
      if (item == "Pool") {
        this.showRooms = false;
        this.showHall = false;
        this.showGym = false;
        this.showPool = true;
        this.showRestaurant = false;
      }
      if (item == "Restaurant") {
        this.showRooms = false;
        this.showHall = false;
        this.showGym = false;
        this.showPool = false;
        this.showRestaurant = true;
      }
    },
    showRoom(room) {
      this.roomData = room;
      this.viewRoom = true;
    },
  },
  mounted() {
    this.getItems();
  },
  watch: {
    "$route.params.id": function() {
      // this.getItems();
      window.location.reload();
    },
  },
};
</script>

<style lang="scss" scoped>
.landing {
  margin: 2rem 3rem;
  display: flex;
  justify-content: flex-end;
  min-height: 50vh;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  @media only screen and(max-width: 600px) {
    margin: 0;
  }
  .buttons {
    display: flex;
    flex-direction: column;
    row-gap: 2rem;
    @media only screen and(max-width: 600px) {
      row-gap: 1rem;
    }
    button {
      background: #015b0a;
      border-radius: 2px;
      border: none;
      padding: 1.5rem 2rem;
      font-weight: bold;
      font-size: 20px;
      line-height: 30px;
      color: #ffffff;
      cursor: pointer;
      @media only screen and(max-width: 900px) {
        font-size: 1rem;
        padding: 1rem 2rem;
        font-weight: 500;
      }
      @media only screen and(max-width: 600px) {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
      }
    }
  }
}
.desc {
  margin: 2rem 3rem;
  display: flex;
  justify-content: space-between;
  @media only screen and(max-width: 600px) {
    margin: 1rem 1.5rem;
  }
  @media only screen and(max-width: 480px) {
    margin: 1rem 0.75rem;
  }
  h1 {
    font-weight: bold;
    font-size: 30px;
    line-height: 45px;
    @media only screen and(max-width: 900px) {
      font-weight: bold;
      font-size: 23px;
      line-height: 25px;
    }
    @media only screen and(max-width: 600px) {
      font-weight: 700;
      font-size: 19px;
      line-height: 25px;
    }
    @media only screen and(max-width: 480px) {
      font-weight: 700;
      font-size: 15px;
      line-height: 25px;
    }
    @media only screen and(max-width: 370px) {
      font-weight: 700;
      font-size: 13px;
      line-height: 25px;
    }
  }
  .price-tag {
    display: flex;
    align-items: baseline;
    h5 {
      @media only screen and(max-width: 480px) {
        font-weight: 400;
        font-size: 10px;
      }
    }
  }
  .socials {
    img {
      margin-left: 0.5rem;
    }
  }
}
.location {
  margin: 2rem 3rem;
  display: flex;
  column-gap: 2rem;
  @media only screen and(max-width: 600px) {
    margin: 1rem 1.5rem;
    font-size: 10px;
  }
  @media only screen and(max-width: 480px) {
    margin: 1rem 0.75rem;
  }
  .left {
    display: flex;
    align-items: flex-start;
    .data {
      display: flex;
      flex-direction: column;
      padding-top: 0.75rem;
    }
    img {
      @media only screen and(max-width: 600px) {
        width: 65px;
      }
    }
  }
  .right {
    display: flex;
    flex-direction: column;
    padding-top: 0.75rem;
    img {
      width: 80px;
    }
  }
}
.hotel_rooms {
  display: grid;
  grid-template-columns: 49% 49%;
  grid-gap: 1rem;
  grid-row-gap: 1rem;
  @media only screen and(max-width: 800px) {
    grid-template-columns: 99%;
  }
  .room-item {
    height: 30vh;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    label {
      color: white;
      font-size: 1.5rem;
      font-weight: 600;
    }
  }
}
.conference,
.gym,
.pool,
.restaurant {
  .body-hooper {
    height: 60vh;
    @media only screen and(max-width: 650px) {
      height: 40vh;
    }
  }
  position: relative;
  img {
    height: 60vh;
    object-fit: cover;
    width: 100%;
  }
  .resto-buttons {
    position: absolute;
    bottom: 2rem;
    display: flex;
    justify-content: center;
    width: 100%;
    column-gap: 2rem;
    @media only screen and(max-width: 650px) {
      // flex-direction: column;
      row-gap: 1rem;
      column-gap: 0.75rem;
    }
    button {
      background: #015b0a;
      border-radius: 2px;
      border: none;
      padding: 1.5rem 2.5rem;
      font-weight: bold;
      font-size: 20px;
      line-height: 30px;
      color: #ffffff;
      cursor: pointer;
      @media only screen and(max-width: 650px) {
        align-self: center;
        font-size: 15px;
        font-weight: 600;
        padding: 0.5rem 1rem;
      }
    }
  }
}
.toggles {
  margin: 2rem 3rem;
  @media only screen and(max-width: 600px) {
    margin: 1rem 1.5rem;
  }
  @media only screen and(max-width: 480px) {
    margin: 1rem 0.75rem;
  }
}
.booknow {
  background: #015b0a;
  border-radius: 2px;
  border: none;
  padding: 1.5rem 2rem;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;
  color: #ffffff;
  cursor: pointer;
  @media only screen and(max-width: 900px) {
    font-size: 1rem;
    padding: 1rem 2rem;
    font-weight: 500;
  }
  @media only screen and(max-width: 600px) {
    font-size: 0.75rem;
    padding: 0.5rem 1rem;
    font-weight: 500;
  }
}

.hooper-next,
.hooper-prev {
  background-color: white !important;
  opacity: 0.4;
}
</style>
