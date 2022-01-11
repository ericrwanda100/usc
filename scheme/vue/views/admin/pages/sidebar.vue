<template>
  <div class="Sidebar">
    <div class="nav">
      <div class="brand">
        <img src="/assets/images/checkin.png" alt="" srcset="" />
      </div>
      <ul class="nav-items">
        <li>
          <router-link to="/admin/dashboard" class="nav-item"
            >Dashboard</router-link
          >
        </li>
        <li>
          <router-link to="/admin/accomodations" class="nav-item"
            >Accomodations</router-link
          >
        </li>
        <li>
          <router-link to="/admin/clubs" class="nav-item"
            >Night&nbsp;Clubs</router-link
          >
        </li>
        <li>
          <router-link to="/admin/coffee" class="nav-item">Coffee&nbsp;Shops</router-link>
        </li>
        <li>
          <router-link to="/admin/restaurants" class="nav-item"
            >Restaurants</router-link
          >
        </li>
        <li>
          <router-link to="/admin/car" class="nav-item"
            >Car&nbsp;Rental</router-link
          >
        </li>
        <li>
          <router-link to="/admin/flights" class="nav-item"
            >Flights</router-link>
        </li>
        <li>
          <router-link to="/admin/users" class="nav-item">Users</router-link>
        </li>
        <li>
          <router-link to="/admin/login" class="nav-item">Sortie</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
};
</script>

<style lang="scss" scoped>
$maingreen: #015b0a;
$maingreenhover: #013d07;
.Sidebar {
  .nav {
    width: 200px;
    background: $maingreen;
    height: 100vh;
    overflow: hidden;
    box-shadow: 0px 5px 20px 10px #f0f0f0;
    @media only screen and(max-width: 600px) {
      width: 100px;
    }
    .brand {
      position: relative;
      padding: 3rem 1.5rem;
      background: #014d08;
      img {
        width: 100%;
      }
    }
    .nav-items {
      display: flex;
      flex-direction: column;
      li {
        display: block;
        border-bottom: 1px #eeeeee3a solid;
        .nav-item {
          padding: 0.75rem 1rem;
          color: white;
          display: block;
          font-size: 0.85rem;
          &.router-link-exact-active,
          &:hover {
            background: $maingreenhover;
          }
        }
      }
    }
  }
}
</style>
