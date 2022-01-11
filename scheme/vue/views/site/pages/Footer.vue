<template>
  <div class="clientFooter">
    <div class="img-section">
      <div class="img-widget">
        <img src="/assets/images/checkin.png" alt="" />
        <div class="content">
          <p>Subscribe and we'll send the best deals to you</p>
          <div class="form-group">
            <input type="email" name="" id="" placeholder="Your email" />
            <button>Subscribe</button>
          </div>
        </div>
      </div>
      <div class="links">
        <ul>
          <li><router-link to="/">Accomodations</router-link></li>
          <li><router-link to="/">Night Club</router-link></li>
          <li><router-link to="/">Gallery</router-link></li>
        </ul>
        <ul>
          <li><router-link to="/">Restaurants</router-link></li>
          <li><router-link to="/">Flight tickets</router-link></li>
          <li><router-link to="/">Coffee Shop</router-link></li>
        </ul>
        <ul>
          <li><router-link to="/">Car Rental</router-link></li>
          <li><router-link to="/">Bus Tickets</router-link></li>
          <li><router-link to="/">Attractions</router-link></li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>Copyright Checkin 2021</p>
      <div class="right">
        <img src="/assets/images/insta.png" alt="" srcset="" />
        <img src="/assets/images/fb.png" alt="" srcset="" />
        <img src="/assets/images/twi.png" alt="" srcset="" />
        <label for="checkin">@checkin</label>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "clientFooter",
};
</script>

<style lang="scss" scoped>
$maingreen: #015b0a;
.clientFooter {
  background: $maingreen;
  padding: 3rem;
  margin-top: 3rem;
  @media only screen and(max-width: 500px) {
  padding: 1rem;
  }
}
.img-section {
  display: grid;
  grid-template-columns: 30% 70%;
  @media only screen and(max-width: 900px) {
    grid-template-columns: 100%;
    row-gap: 2rem;
  }
  @media only screen and(max-width: 600px) {
    font-size: 12px;
  }
  @media only screen and(max-width: 350px) {
    font-size: 10px;
  }
  .img-widget {
    img{
      width: 200px;
      margin-bottom: 1rem;
    }
    @media only screen and(max-width: 900px) {
      display: flex;
      align-items: center;
      column-gap: 2rem;
    }
  @media only screen and(max-width: 600px) {flex-direction: column;
  }
    p {
      color: #fff;
    }
    button {
      background: $maingreen;
      border: 1px #fff solid;
      padding: 0.25rem 0.75rem;
      color: #fff;
    }
    input {
      padding: 5px 10px;
    }
  }
}
.links {
  display: flex;
  justify-content: space-around;
  ul {
    list-style: none;
    a {
      color: #fff;
      line-height: 2.5;
      font-weight: 600;
    }
  }
}
.copyright {
  display: flex;
  justify-content: space-between;
  color: white;
  @media only screen and(max-width: 600px) {
    font-size: 12px;
    margin-top: 2rem;
  }
  @media only screen and(max-width: 350px) {
    font-size: 10px;
  }
  img {
    margin-right: 0.75rem;
  @media only screen and(max-width: 600px) {
    margin-right: 0.5rem;
  }
  @media only screen and(max-width: 400px) {
    width: 20px;
  }
  }
  label {
    margin-right: 2rem;
  @media only screen and(max-width: 400px) {
    margin-right: .5rem;
  }
  }
}
</style>
