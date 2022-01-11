<template>
  <div class="Car">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <Jumbotron :text="'Car Rental'" :img="'banner-car.png'" />
      <div class="separator"></div>
      <div class="hotels">
        <div class="body">
          <div
            class="body-item"
            @click="startViewCar(item)"
            v-for="item in cars"
            :key="item.id"
          >
            <img
              :src="'/assets/uploaded/' + item.image"
              class="body-img c-pointer"
              alt=""
              srcset=""
            />
            <div class="foot">
              <div class="d-flex flex-btn">
                <label for="" class="label">{{ item.model }}</label>
                <label for="" class="label car-money"
                  >{{ item.price }} Rwf/Day</label
                >
              </div>
              <label class="label">{{ item.address }}</label>
              <div class="starts">
                <div class="d-flex flex-btn">
                  <label class="label">Phone: {{ item.phone }}</label>
                  <router-link :to="'bookCar/' + item.id" class="book"
                    >Book Now</router-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="view-car" v-if="viewCar">
        <div class="close" @click="viewCar = false">X</div>
        <div class="content">
          <h1>{{ title }}</h1>
          <hooper :settings="hooperSettings" class="hooper">
            <slide class="slide" v-for="image in images" :key="image">
              <img :src="'/assets/uploaded/' + image" alt="" srcset="" />
            </slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
            <HooperNavigation></HooperNavigation>
          </hooper>
        </div>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "Car",
  data() {
    return {
      isLoading: false,
      color: "#072e4d",
      fullPage: true,
      viewCar: false,
      hooperSettings: {
        infiniteScroll: true,
        centerMode: true,
        autoPlay: false,
        playSpeed: 3500,
        itemsToShow: 1,
        transition: 1000,
        hoverPause: true,
        trimWhiteSpace: true,
        mouseDrag: true,
        touchDrag: true,
        wheelControl: false,
      },
      cars: [],
      images: [],
      title: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_CARS").then((response) => {
        this.cars = response.data;
        this.isLoading = false;
      });
    },
    startViewCar(item) {
      this.images = JSON.parse(item.images);
      this.title = item.model;
      this.viewCar = true;
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>

<style lang="scss" scoped>
.view-car {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: #000000c4;
  display: flex;
  justify-content: center;
  align-items: center;
  .close {
    position: absolute;
    font-size: 2.5rem;
    right: 4rem;
    top: 2rem;
    color: red;
    cursor: pointer;
    font-weight: 900;
    @media only screen and(max-width: 600px) {
      font-weight: 600;
      top: 1rem;
      right: 1rem;
      font-size: 2rem;
    }
  }
  .content {
    height: 80vh;
    width: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    @media only screen and(max-width: 800px) {
      width: 100%;
    }
    h1 {
      color: white;
      @media only screen and(max-width: 600px) {
        font-size: 1rem;
      }
    }
    .hooper {
      height: 600px;
      width: 600px;
      @media only screen and(max-width: 600px) {
        height: 400px;
        width: 400px;
      }
      @media only screen and(max-width: 400px) {
        height: 300px;
        width: 300px;
      }
    }
    .slide {
      height: 80vh;
    }
    img {
      object-fit: contain;
      height: 600px;
      width: 600px;
      @media only screen and(max-width: 600px) {
        height: 400px;
        width: 400px;
      }
      @media only screen and(max-width: 400px) {
        height: 300px;
        width: 300px;
      }
    }
  }
}
.body-item {
  img {
    height: 30vh;
    object-fit: contain;
  }
}
</style>
