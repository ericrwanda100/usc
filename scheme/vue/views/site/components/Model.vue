<template>
  <div class="model">
    <div class="model-dialog">
      <div class="model-content">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Model",
};
</script>

<style lang="scss" scoped>
$maingreen: #015b0a;
.model {
  position: fixed;
  height: 100vh;
  width: 100vw;
  background: #00000070;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: auto;
  flex-wrap: wrap;
  .model-dialog {
    background: #fff;
    width: 80vw;
    border-radius: 10px;
    overflow: hidden;
    margin: 3rem 0;
    @media only screen and(max-width: 1500px) {
      width: 90vw;
    }
    @media only screen and(max-width: 800px) {
      width: 95vw;
    }
    .model-content {
      .model-header {
        border-bottom: 1px #f0f0f0 solid;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        .close {
          background: none;
          outline: none;
          border: none;
          cursor: pointer;
          &:hover {
            color: #c70202;
          }
        }
      }
      .model-body {
        .top-level {
          padding: 10px;
          display: grid;
          grid-template-columns: 70% 28%;
          grid-gap: 2%;
          @media only screen and(max-width: 900px) {
            grid-template-columns: 100%;
            margin: 0 1rem;
          }
          .roomImages {
            background: #eee;
            height: 50vh;
            .body-item {
              height: 50vh;
              display: flex;
              justify-content: center;
              align-items: center;
              img {
                width: 100%;
                object-fit: contain;
              }
            }
          }
          .roomDesc {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            .name {
              font-size: 2rem;
              font-weight: 600;
              color: $maingreen;
              line-height: 2;
            }
            .price {
              font-size: 1.5rem;
              font-weight: 600;
              color: #000000d0;
              line-height: 2;
            }
            .room-desc {
              font-size: 1rem;
              font-weight: 500;
              color: #0000009b;
              line-height: 1.5;
            }
            .book-room {
              margin: 1rem 0;
              background: $maingreen;
              border-radius: 5px;
              padding: 0.75rem 1.5rem;
              color: white;
            }
          }
        }
        .bottom-level {
          display: flex;
          justify-content: space-between;
          margin: 1rem 2rem;
          @media only screen and(max-width: 900px) {
            flex-direction: column;
            margin: 1rem;
          }
          div {
            display: flex;
            flex-direction: column;
            row-gap: 1rem;
            width: 30%;
            @media only screen and(max-width: 900px) {
              width: 100%;
            }
            label {
              font-size: 1.25rem;
              font-weight: 600;
              color: #000000d0;
              line-height: 2;
            }
            p {
              font-size: 1rem;
              font-weight: 500;
              color: #0000009b;
              line-height: 1.5;
            }
          }
        }
      }
      .model-footer {
        border-top: 1px #f0f0f0 solid;
        padding: 10px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        column-gap: 0.5rem;
        button {
          padding: 10px 1rem;
          font-size: 0.7rem;
          color: white;
          font-weight: 500;
          border-radius: 3000px;
          border: none;
          outline: none;
          cursor: pointer;
          &.submit {
            background: #3d003d;
            box-shadow: 0px 0px 10px 2px #3d003d54;
          }
          &.close {
            background: #b80303;
            box-shadow: 0px 0px 10px 2px #b8030363;
          }
        }
      }
    }
  }
}
</style>
