<template>
  <div class="BookCar">
    <clientHeader />

    <div class="all-content">
      <Jumbotron :text="''" :img="'flight.png'" />

      <div class="bookCar">
        <div class="bookForm">
          <div class="bookForm-o">
            <i class="fas fa-fighter-jet"></i>
            <input type="text" placeholder="Departure"/>
          </div>
          <div class="bookForm-o">
            <i class="fas fa-fighter-jet"></i>
            <input type="text" placeholder="Destination"/>
          </div>
          <div class="bookForm-o bookForm-o-1">
            <i class="fas fa-business-time"></i>
            <input type="text" placeholder="Business Class"/>
          </div>
          <div class="bookForm-o bookForm-o-1">
            <i class="far fa-calendar-alt"></i>
            <input type="text" placeholder="Select a date"/>
          </div>
        
          <div class="bookForm-o  bookForm-o-one">
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
  name: "BookFlight",
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
    grid-template-columns: 47% 47%;
    grid-column-gap: 6%;
    margin-top: 60px;
    margin-bottom: 60px;
    width: 50vw;
    row-gap: 10%;
    .bookForm-o {
      display: grid;
      grid-template-columns: 10% 90%;
      column-gap: 5%;
    }
   
    input {
      width: 100%;
      padding: 3px 10px;
      border: 1px grey solid;
    }
    .bookForm-o button{

        background: #015b0a;
        border-color: #015b0a;
        color: white;
        height: 40px;
        width: 150px;
    }
    .bookForm-o-file{
        margin-top: 20px;
        }
        .fas{
            font-size: 30px;
        }
        .far{
            font-size: 30px;
        }
        .bookForm-o-one{
            grid-column: 1/3;
            margin-left: 45vh;
        }
  }
}
</style>
