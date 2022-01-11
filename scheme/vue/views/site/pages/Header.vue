<template>
  <div class="clientHeader">
    <div class="body">
      <router-link to="/" class="logo">
        <img src="/assets/images/checkin.png" alt="" srcset="" />
      </router-link>
      <div class="search">
        <form action="">
          <input
            type="text"
            name=""
            placeholder="Search a location here"
            id=""
          />
        </form>
      </div>
      <div class="right-buttons" v-if="!$loggedClient()">
        <router-link to="/signin" class="btn signin">Sign&nbsp;in</router-link>
        <router-link to="/signup" class="btn register">Register</router-link>
      </div>
      <div
        class="logged-section"
        v-if="$loggedClient()"
        @click="collapse()"
        v-click-outside="hide"
      >
        <img src="/assets/images/avatar.png" alt="" srcset="" />
        <label for="My Account">{{ $loggedClient().lastname }}</label>
      </div>
      <div class="logged-links" v-if="showDrop">
        <ul>
          <li>
            <router-link to="/account" class="logged-item"
              ><span class="fa fa-user"></span> My Account</router-link
            >
          </li>
          <li>
            <router-link to="/" class="logged-item"
              ><span class="fa fa-cog"></span>Security</router-link
            >
          </li>
          <li>
            <button class="logged-item" @click="$clientLogout()">
              <span class="fa fa-power-off"></span>Logout
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import ClickOutside from "vue-click-outside";
export default {
  name: "clientHeader",
  directives: {
    ClickOutside,
  },
  data() {
    return {
      showDrop: false,
      closeOnClickOutside: true,
      transition: true,
      showNav: false,
      client: null,
    };
  },
  methods: {
    collapse() {
      this.showDrop = true;
    },
    hide() {
      this.showDrop = false;
    },
  },
  mounted() {
    window.scrollTo(0, 0);
    if (localStorage.client) {
      this.client = JSON.parse(localStorage.client);
    }
    this.popupItem = this.$el;
  },
};
</script>

<style lang="scss" scoped>
$maingreen: #015b0a;
.clientHeader {
  display: flex;
  justify-content: center;
  .body {
    width: 100vw;
    overflow: hidden;
    background: $maingreen;
    padding: 0.5rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    @media only screen and (min-width: 1500px) {
      // width: 70vw;
    }
    .logo {
      margin-right: 10%;
      @media only screen and (max-width: 400px) {
        width: 40%;
      }
      img {
        width: 200px;
        @media only screen and (max-width: 1200px) {
          width: 150px;
        }
        @media only screen and (max-width: 900px) {
          width: 100px;
        }
        @media only screen and (max-width: 700px) {
          width: 100%;
        }
      }
    }
    .search {
      width: 30%;
      @media only screen and (max-width: 700px) {
        display: none;
      }
      input {
        border: none;
        padding: 0.5rem;
        width: 100%;
        font-size: 14px;
      }
    }
    .right-buttons {
      display: flex;
      column-gap: 1rem;
      .btn {
        background: white;
        padding: 0.5rem;
        font-size: 13px;
        color: $maingreen;
        font-weight: 500;
      }
    }
    .logged-section {
      display: flex;
      flex-direction: column;
      row-gap: 5px;
      align-items: center;
      cursor: pointer;
      img {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        object-fit: cover;
      }
      label {
        color: #fff;
        text-transform: capitalize;
        font-weight: 700;
      }
    }
    .logged-links {
      background: #fff;
      position: absolute;
      top: 70px;
      right: 5px;
      min-width: 60px;
      padding: 5px 1rem;
      border-radius: 0 0 1rem 1rem;
      box-shadow: 5px 0px 10px 10px #00000030;
      li {
        list-style: none;
        display: block;
        border-top: 1px rgba(255, 255, 255, 0.068) solid;
        .logged-item {
          padding: 0.5rem 1rem;
          color: #000;
          display: block;
          font-weight: 400;
          // background: #eef9fd;
          display: flex;
          align-items: center;
          background: none;
          outline: none;
          border: none;
          cursor: pointer;
          span {
            font-size: 0.75rem;
            margin-right: 0.5rem;
          }
        }
        &:hover {
          background: #eee;
        }
      }
    }
  }
}
</style>
