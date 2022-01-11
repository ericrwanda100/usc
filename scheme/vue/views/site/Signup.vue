<template>
  <div class="Signup">
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :color="color"
      :is-full-page="fullPage"
    ></loading>
    <clientHeader />
    <div class="all-content">
      <div class="login">
        <div class="all">
          <div class="center">
            <div class="title">Join Checkin</div>
          </div>
          <form class="form">
            <div class="row">
              <div class="form-group">
                <label for="Firstname">Firstname:</label>
                <input
                  type="text"
                  name="firstname"
                  id=""
                  placeholder="Firstname"
                  v-model="user.firstname"
                />
              </div>
              <div class="form-group">
                <label for="Lastname">Lastname:</label>
                <input
                  type="text"
                  name="lastname"
                  id=""
                  placeholder="Lastname"
                  v-model="user.lastname"
                />
              </div>
              <div class="form-group">
                <label for="">Phone:</label>
                <input
                  type="text"
                  name="Phone"
                  id=""
                  placeholder="Phone"
                  v-model="user.phone"
                />
              </div>
              <div class="form-group">
                <label for="">Email:</label>
                <input
                  type="email"
                  name="Email"
                  id=""
                  placeholder="Email"
                  v-model="user.email"
                />
              </div>
              <div class="form-group">
                <label for="">Gender:</label>
                <select v-model="user.gender">
                  <option value="" disabled selected>--Select--</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Address:</label>
                <input
                  type="address"
                  name="Address"
                  id=""
                  placeholder="Address"
                  v-model="user.address"
                />
              </div>
              <div class="form-group">
                <label for="">Create Password:</label>
                <input
                  type="password"
                  name="nom"
                  id=""
                  placeholder="Password"
                  v-model="user.password"
                />
              </div>
              <div class="form-group">
                <label for="">Confirm Password:</label>
                <input
                  type="password"
                  name="nom"
                  id=""
                  placeholder="Repeat Password"
                  v-model="user.cpassword"
                />
              </div>
            </div>
            <div class="form-group">
              <input
                type="submit"
                value="Register"
                class="btn"
                @click.prevent="registerNow()"
              />
            </div>

            <div class="form-foot">
              <div class="up">
                <hr class="hr1" />
                <label for="Already have account?">Already have account?</label>
                <hr class="hr2" />
              </div>
              <div class="down">
                <router-link to="/signin" class="signup">Sign In</router-link>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <clientFooter />
  </div>
</template>

<script>
export default {
  name: "Signup",
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      user: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    registerNow() {
      this.isLoading = true;
      if (this.user.email != "" && this.user.password != "") {
        this.$store
          .dispatch("ADD_CLIENT", this.user)
          .then((response) => {
            if (response.data.status == "ok") {
              this.$notify({
                group: "status",
                title: "Important message",
                text: response.data.message,
                type: "success",
              });
              this.$localStorage.set(
                "client_access_token",
                response.data.user_token
              );
              this.$localStorage.set(
                "client",
                JSON.stringify(response.data.user)
              );
              this.$router.push({ name: "Home" });
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
          })
          .catch((error) => {
            console.error({
              error,
            });
            this.isLoading = false;
          });
      } else {
        this.$notify({
          group: "status",
          title: "Important message",
          text: "Please fill all fields",
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
$maintragreen: #015b0a21;
.Signup {
  .login {
    width: 100vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 5rem;
    justify-content: center;
    .all {
      border: 1px #000000b0 solid;
      border-radius: 4px;
      width: 40vw;
      padding: 1rem 2rem;
      @media only screen and(max-width: 1200px) {
        width: 50vw;
      }
      @media only screen and(max-width: 900px) {
        width: 60vw;
      }
      @media only screen and(max-width: 700px) {
        width: 70vw;
      }
      @media only screen and(max-width: 600px) {
        width: 80vw;
      }
      @media only screen and(max-width: 400px) {
        width: 90vw;
      }
      @media only screen and(max-width: 300px) {
        width: 95vw;
      }
      .title {
        margin: 2rem 0;
        font-size: 1.5rem;
        @media only screen and(max-width: 900px) {
          margin: 1rem 1rem;
        }
        @media only screen and(max-width: 400px) {
          font-size: 1rem;
        }
      }
      .form {
        flex-direction: column;
        align-items: flex-start;
        .row {
          display: grid;
          grid-template-columns: 48% 48%;
          grid-column-gap: 2%;
          @media only screen and(max-width: 600px) {
            grid-template-columns: 100%;
          }
          .form-group {
            display: flex;
            flex-direction: column;
            width: 100%;
            row-gap: 0.5rem;
            margin: 1rem 0;
            @media only screen and(max-width: 600px) {
              width: 100%;
            }
            @media only screen and(max-width: 400px) {
              font-size: 0.75rem;
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
          textarea,
          select {
            border: 1px lightgray solid;
            padding: 10px;
            border-radius: 3px;
            outline: none;
          }
          .btn {
            border: none;
            background: $maingreen;
            font-size: 1.25rem;
            color: #fff;
            box-shadow: 0px 0px 10px 4px $maintragreen;
            cursor: pointer;
            @media only screen and(max-width: 400px) {
              font-size: 0.75rem;
            }
          }
        }
        .form-foot {
          border-top: 1px #eee solid;
          margin-top: 1.5rem;
          padding-top: 1.5rem;
          label {
            @media only screen and(max-width: 400px) {
              font-size: 0.75rem;
            }
          }
          .up {
            display: flex;
            align-items: center;
            justify-content: space-between;
            hr {
              width: 20%;
            }
          }
          .down {
            display: flex;
            justify-content: center;
            .signup {
              display: block;
              width: 80%;
              border-radius: 300px;
              border: 1px $maingreen solid;
              font-size: 1.25rem;
              color: $maingreen;
              box-shadow: 0px 0px 10px 4px $maintragreen;
              padding: 10px;
              outline: none;
              text-align: center;
              margin-top: 1rem;
              &:hover {
                background: #015b0a09;
              }
              @media only screen and(max-width: 400px) {
                font-size: 0.75rem;
              }
            }
          }
        }
      }
    }
  }
}
</style>
