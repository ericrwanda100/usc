<template>
  <div id="app">
    <router-view />
    <notifications group="status" position="bottom right" :duration="5000" />

    <vue-confirm-dialog></vue-confirm-dialog>
    <div class="app-loader" v-if="$store.state.main_loader">
      <div class="loading-panel">
        <a-spin :spinning="true"></a-spin>
        <span class="text">Loading...</span>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');


* {
  font-family: "Montserrat", sans-serif;
  outline: none;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.all-content{
  min-height:58vh;
}
.app-loader {
  position: fixed;
  z-index: 9999999999999999999999999;
  bottom: 20px;
  right: 25px;
  .loading-panel {
    width: 174px;
    display: flex;
    justify-content: center;
    background: #000;
    padding: 10px 13px;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    .text {
      font-size: 19px;
      margin-left: 19px;
    }
  }
}

$maingreen: #015b0a;
.d-flex {
  display: flex;
}
.flex-btn {
  justify-content: space-between;
  align-items: center;
}
.dir-col {
  flex-direction: column;
}
.c-pointer {
  cursor: pointer;
}
.separator {
  margin: 1rem;
}
.checkin-title {
  font-weight: 500;
  font-size: 25px;
  line-height: 37px;
  color: #000000;
  @media only screen and (max-width: 600px) {
    font-size: 20px;
  }
}
.hotels {
  padding: 1rem 3rem;
  @media only screen and(max-width: 600px) {
    padding: 1rem;
  }
  .body {
    display: grid;
    grid-template-columns: 24% 24% 24% 24%;
    grid-gap: 1rem;
    grid-row-gap: 3rem;
    @media only screen and (max-width: 1000px) {
      grid-template-columns: 49% 49%;
    }
    @media only screen and (max-width: 600px) {
      grid-template-columns: 99%;
      grid-row-gap: 1.5rem;
    }
    .body-item {
      width: 100%;
      padding: 0;
      .body-img {
        width: 100%;
        border: 3px $maingreen solid;
        border-radius: 0.5rem;
        object-fit: cover;
      }
      .foot {
        display: flex;
        flex-direction: column;
        margin-top: 1rem;
        .d-flex {
          column-gap: 1rem;
        }
        label {
          line-height: 1.5;
          font-weight: 500;
          font-size: 1rem;
          color: black;
        @media only screen and (max-width: 600px) {
          font-size: 0.75rem;
        }
          &.money {
            color: $maingreen;
            line-height: 2;
            font-weight: 700;
          }
          &.car-money {
            font-weight: 800;
          }
        }
        .stars {
          img {
            width: 50%;
          }
        }
        .book {
          background: $maingreen;
          padding: 0.25rem;
          color: white;
          font-weight: 600;
        }
        .likes {
          display: flex;
          align-items: center;
          column-gap: 0.25rem;
          i {
            color: red;
          }
          .like {
            font-weight: 800;
            color: black;
          }
        }
      }
    }
  }
}

.hotel-sliders {
  padding: 1rem 3rem;
  @media only screen and(max-width: 600px) {
    padding: 1rem;
  }
  .body {
    height: 100% !important;
    .body-item {
      width: 100%;
      padding: 1rem;
      .body-img {
        width: 100%;
        border: 3px $maingreen solid;
        border-radius: 0.5rem;
        object-fit: cover;
      }
      .foot {
        display: flex;
        flex-direction: column;
        margin-top: 1rem;
        label {
          line-height: 1.5;
          font-weight: 500;
          font-size: 1rem;
          color: black;
          @media only screen and(max-width: 600px) {
            font-size: 10px;
          }
          &.money {
            color: $maingreen;
            line-height: 2;
            font-weight: 700;
          }
          &.car-money {
            font-weight: 800;
          }
        }
        .stars {
          display: flex;
          justify-content: space-between;
          align-items: center;
          @media only screen and(max-width: 600px) {
            flex-direction: column;
            align-items: flex-start;
            row-gap: 10px;
          }
          img {
            width: 35%;
            @media only screen and(max-width: 600px) {
              width: 40%;
            }
          }
        }
        .book {
          background: $maingreen;
          padding: 0.25rem;
          color: white;
          font-weight: 600;
          @media only screen and(max-width: 600px) {
            font-size: 10px;
            width: 100%;
            text-align: center;
          }
        }
        .likes {
          display: flex;
          align-items: center;
          column-gap: 0.25rem;
          i {
            color: red;
          }
          .like {
            font-weight: 800;
            color: black;
          }
        }
      }
    }
  }
}
.admin-content {
  display: flex;
  height: 100vh;
  width: 100vw;
  overflow-y: auto;
  overflow-x: hidden;
}
.admin-body {
  width: calc(100vw - 200px);
}
.page-brand {
  font-size: 1rem;
  color: #2a2a2a;
  padding: 1rem;
  border-bottom: 1px #eee solid;
  width: 100%;
}
.upload {
  padding: 10px 1rem;
  font-size: 0.7rem;
  color: white;
  font-weight: 500;
  border-radius: 3000px;
  border: none;
  outline: none;
  cursor: pointer;
  background: #015b0a;
  box-shadow: 0px 0px 10px 2px #015b0a32;
}

.table {
  padding: 0 2rem;
  overflow-x: auto;
  .table-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    label {
      font-size: 1rem;
      font-weight: 700;
      padding: 1rem 0;
      border-bottom: 1px #f0f0f0 solid;
      line-height: 2;
    }
    .add-new {
      padding: 5px 1rem;
      font-size: 0.9rem;
      color: white;
      font-weight: 500;
      border-radius: 3000px;
      border: none;
      outline: none;
      cursor: pointer;
      background: $maingreen;
      box-shadow: 0px 0px 10px 2px #015b0a32;
    }
  }
  table {
    width: 100%;
    tr {
      border-bottom: 1px #f0f0f0 solid;
      th {
        line-height: 2;
        padding: 0 1rem;
        text-transform: capitalize;
      }
      td {
        font-weight: 500;
        padding: 0 1rem;
        img {
          width: 50px;
          height: 50px;
          object-fit: cover;
          border-radius: 50%;
          padding: 3px;
        }
        button,
        .button {
          padding: 3px 1rem;
          font-size: 0.7rem;
          color: white;
          font-weight: 500;
          border-radius: 3000px;
          border: none;
          outline: none;
          cursor: pointer;
          margin-right: 0.25rem;
          &.edit {
            background: #02b4eb;
            box-shadow: 0px 0px 10px 2px #02b5eb4d;
          }
          &.videos {
            background: #01cc60;
            box-shadow: 0px 0px 10px 2px #01cc6055;
          }
          &.delete {
            background: #b80303;
            box-shadow: 0px 0px 10px 2px #b8030363;
          }
          a {
            color: white;
          }
        }
      }
      .noData {
        text-align: center;
        padding: 3rem;
        color: #f54d4d;
      }
    }
  &.pads{
    th,td{
      padding: 10px 0;
    }
  }
  }
}

.d-flex {
  display: flex;
}
.uploader-btn{
  background: $maingreen;
  padding: .5rem 1.5rem;
  color: white;
  width: auto;
  border-radius: 1000px;
  border: none;
  cursor: pointer;
  margin-top: 1rem !important;
}
.body-hooper{
  height: 50vh;
}
</style>
