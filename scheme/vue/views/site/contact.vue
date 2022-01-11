<template>
  <div class="Contact">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <div class="center">
        <div class="title">Contact us</div>
      </div>
      <div class="body-items">
        <div class="form">
          <div class="row">
            <div class="form-group">
              <label for="">Firstname:</label>
              <input
                type="text"
                name="Firstname"
                id=""
                placeholder="Firstname"
                v-model="contacts.Firstname"
              />
            </div>
            <div class="form-group">
              <label for="">Lastname:</label>
              <input
                type="text"
                name="Firstname"
                id=""
                placeholder="Lastname"
                v-model="contacts.Lastname"
              />
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="">Email:</label>
              <input
                type="text"
                name="Firstname"
                id=""
                placeholder="email"
                v-model="contacts.email"
              />
            </div>
            <div class="form-group">
              <label for="">Subject:</label>
              <input
                type="text"
                name="Subject"
                id=""
                placeholder="Subject"
                v-model="contacts.subject"
              />
            </div>
          </div>
          <div class="form-group">
            <label for="">Message:</label>
            <textarea
              name=""
              id=""
              cols="30"
              rows="10"
              placeholder="message"
              v-model="contacts.message"
            ></textarea>
          </div>
          <div class="form-group">
            <input
              type="submit"
              value="Send"
              class="btn"
              @click.prevent="contactNow()"
            />
          </div>
        </div>
        <div class="right">
          <label for="Contact us" class="pres"
            >You can also reach us through:</label
          >
          <ul class="items">
            <li>
              <label for="checkin facebook"
                ><span class="fab fa-facebook"></span
              ></label>
              <label for="checkin facebook">checkintours</label>
            </li>
            <li>
              <label for="checkin instagram"
                ><span class="fab fa-instagram"></span
              ></label>
              <label for="checkin instagram">@checkintoursrwanda</label>
            </li>
            <li>
              <label for="contact twitter"
                ><span class="fab fa-twitter"></span
              ></label>
              <label for="contact twitter">@checkintours</label>
            </li>
          </ul>
          <label for="Contact us" class="pres">Or contact us at:</label>
          <ul class="items">
            <li>
              <label for="email us"><span class="fa fa-envelope"></span></label>
              <label for="email us">checkintours@gmail.com</label>
            </li>
            <li>
              <label for="contact us"><span class="fa fa-phone"></span></label>
              <label for="contact us">(+250) 788 334 634</label>
            </li>
          </ul>
          <label for="Contact us" class="pres">Working hours:</label>
          <ul class="items">
            <li>
              <label for="Working hours"
                ><span class="fa fa-clock"></span
              ></label>
              <label for="Working hours"
                >Monday - Sunday (8:00 AM - 9:00 PM)</label
              >
            </li>
          </ul>
        </div>
      </div>
      <br /><br />
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1257.783522901813!2d30.05799166802344!3d-1.9430626322492999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca422f40e6a6d%3A0xd0a7c7dfabcbfa23!2sDown%20Town%20Complex!5e1!3m2!1sen!2srw!4v1632404481466!5m2!1sen!2srw"
        style="border:0;"
        allowfullscreen="1"
        loading="lazy"
        class="map"
      ></iframe>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "Contact",
  components: {},
  data() {
    return {
      isLoading: false,
      color: "#072e4d",
      fullPage: true,
      contacts: {
        Firstname: "",
        Lastname: "",
        email: "",
        subject: "",
        message: "",
      },
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    contactNow() {
      this.isLoading = true;
      if (
        this.contacts.Firstname != "" &&
        this.contacts.Lastname != "" &&
        this.contacts.email != "" &&
        this.contacts.subject != "" &&
        this.contacts.message != ""
      ) {
        this.$store.dispatch("CONTACT_NOW", this.contacts).then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.contacts.Firstname = "";
            this.contacts.Lastname = "";
            this.contacts.email = "";
            this.contacts.subject = "";
            this.contacts.message = "";
            this.isLoading = false;
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "warn",
            });
            this.isLoading = false;
          }
        });
      } else {
        this.$notify({
          group: "status",
          title: "Important message",
          text: "All fields are required",
          type: "error",
        });
        this.isLoading = false;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
$maingreen: #015b0a;
.Contact {
  .title {
    margin: 3rem 0;
    font-size: 2rem;
    text-align: center;
    font-weight: 700;
    color: #000000e0;
    @media only screen and(max-width: 900px) {
      margin: 1rem 1rem;
    }
  }
  .body-items {
    display: grid;
    grid-template-columns: 70% 28%;
    grid-gap: 2%;
    @media only screen and(max-width: 900px) {
      grid-template-columns: 100%;
    }
    .form {
      margin: 0 10rem;
      @media only screen and(max-width: 900px) {
        margin: 0 5rem;
      }
      @media only screen and(max-width: 900px) {
        margin: 0 2rem;
      }
      .row {
        display: flex;
        align-items: center;
        column-gap: 2rem;
        @media only screen and(max-width: 600px) {
          flex-direction: column;
          align-items: flex-start;
        }
        .form-group {
          display: flex;
          flex-direction: column;
          width: 50%;
          row-gap: 0.5rem;
          margin: 1rem 0;
          @media only screen and(max-width: 600px) {
            width: 100%;
          }
          input {
            border: 1px lightgray solid;
            padding: 10px;
            border-radius: 3px;
            outline: none;
          }
        }
      }
      .form-group {
        display: flex;
        flex-direction: column;
        width: 100%;
        row-gap: 0.5rem;
        margin: 1rem 0;
        input,
        textarea {
          border: 1px lightgray solid;
          padding: 10px;
          border-radius: 3px;
          outline: none;
        }
        .btn {
          border: none;
          background: $maingreen;
          color: #fff;
          font-size: 1.25rem;
          cursor: pointer;
        }
      }
    }
    .right {
      margin: 0 2rem;
      .pres {
        font-size: 1.5rem;
        text-align: center;
        font-weight: 600;
        color: #000000e0;
        line-height: 2;
        @media only screen and(max-width: 600px) {
          font-size: 1rem;
          line-height: 2;
        }
      }
      ul {
        list-style-type: none;
        li {
          label {
            line-height: 2;
            font-weight: 500;
            margin-right: 0.75rem;
            @media only screen and(max-width: 600px) {
              font-size: 0.85rem;
              line-height: 1.5;
            }
          }
          span {
            color: $maingreen;
          }
        }
      }
    }
  }
  .map {
    width: 99vw;
    height: 50vh;
  }
}
</style>
