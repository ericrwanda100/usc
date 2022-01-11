<template>
  <div class="BookCar">
    <clientHeader />
    <div class="all-content">
      <div class="bookCar">
          <div><h1>CAR RENTAL</h1></div>
        <div class="bookForm">
          <div class="bookForm-o">
            <label for="">NAME</label>
            <input type="text" />
          </div>
          <div class="bookForm-o">
            <label for="">EMAIL</label>
            <input type="text" />
          </div>
          <div class="bookForm-o bookForm-o-1">
            <label for="">PHONE NUMBER</label>
            <input type="text" />
          </div>
          <div class="bookForm-o bookForm-o-1">
            <label for="">PICKUP LOCATION</label>
            <input type="text" />
          </div>
          <div class="bookForm-o bookForm-o-1">
            <label for="">DESTINATION</label>
            <input type="text" />
          </div>
          <div class="form-group">
            <div class="bookForm-o">
              <label for="">DATE</label>
              <input type="date" />
            </div>
            <div class="bookForm-o">
              <label for="">HOUR</label>
              <select name="" id="">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
            <div class="bookForm-o">
              <label for="">MIN</label>
              <select name="" id="">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option v-for="(number, index) in 49" :key="index">{{number+10}}</option>
              </select>
            </div>
            <div class="bookForm-o">
              <label for="">AM/PM</label>
              <select name="" id="">
                <option>AM</option>
                <option>PM</option>
              </select>
            </div>
            <div class="bookForm-o-file">
              <label for="">UPLOAD YOUR ID / PASSPORT</label>
              <input type="file">
            </div>
          </div>
          <div class="bookForm-o">
              <button>BOOK NOW</button>
          </div>
        </div>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "BookCar",
};
</script>

<style lang="scss" scoped>
.bookCar h1{
    left: 450px;
    position: relative;
    }
.bookCar {
  display: flex;
  justify-content: center;
  
  
  .bookForm {
    display: grid;
    grid-template-columns: 48% 48%;
    grid-column-gap: 2%;
    margin-top: 60px;
    margin-bottom: 60px;
    width: 50vw;
    row-gap: 5%;
    .bookForm-o {
      display: flex;
      flex-flow: column;
    }
    .bookForm-o-1 {
      grid-column: 1/3;
    }
    .form-group {
      grid-column: 1/3;
      display: grid;
      grid-template-columns: 37% 19% 19% 19%;
      grid-column-gap: 2%;
    }
    input {
      width: 100%;
    }
    .bookForm-o button{

        background: #015b0a;
        border-color: #015b0a;
        color: white;
        height: 50px;
        width: 200px;
    }
    .bookForm-o-file{
        margin-top: 20px;
        }
  }
}
</style>
