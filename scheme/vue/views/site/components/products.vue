<template>
  <div class="Products">
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
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "Products",
  props: ['items']
};
</script>

<style></style>
