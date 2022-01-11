<template>
  <div
    class="jumbotron"
    :style="'background-image:' + 'url(\'' + '/assets/uploaded/' + img + '\')'"
  >
    <label :for="text">{{ text }}</label>
  </div>
</template>

<script>
export default {
  name: "jumbotron",
  props: ["text", "img"],
};
</script>

<style lang="scss" scoped>
.jumbotron {
  width: calc(100vw - 6rem);
  height: 25vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: (0, 0);
  margin: 1rem 3rem;
  border-radius: 0.5rem;
  box-shadow: inset 0 0 0 2000px #00000062;
  @media only screen and(max-width: 600px) {
    width: calc(100vw - 1rem);
    margin: 1rem 0.5rem;
    height: 15vh;
  }
  label {
    font-weight: 600;
    font-size: 30px;
    line-height: 45px;
    color: #ffffff;
    @media only screen and(max-width: 600px) {
      font-size: 24px;
    }
  }
}
</style>
