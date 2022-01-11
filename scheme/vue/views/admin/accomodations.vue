<template>
  <div class="Accomodations">
    <div class="admin-content">
      <loading
        :active.sync="isLoading"
        :can-cancel="true"
        :on-cancel="onCancel"
        :color="color"
        :is-full-page="fullPage"
      ></loading>
      <adminSidebar />
      <div class="admin-body">
        <h2 class="page-brand">Accomodations</h2>
        <div class="table">
          <div class="table-title">
            <label for="Accomodations Shops">Accomodations</label>
            <button class="add-new" @click="addModal = true">
              <i class="fa fa-plus"></i> Add
            </button>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>name</th>
                <th>address</th>
                <th>email</th>
                <th>phone</th>
                <th>price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id">
                <td>
                  <img
                    :src="'/assets/uploaded/' + item.image"
                    :alt="item.name"
                    class="thumbnail"
                  />
                </td>
                <td>{{ item.name }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.phone }}</td>
                <td>{{ item.price }}</td>
                <td>
                  <button class="edit" @click="startUpdate(item)">
                    Edit
                  </button>
                  <button class="delete" @click="startDelete(item)">
                    Delete
                  </button>
                  <router-link
                    :to="'/admin/rooms/' + item.id"
                    class="button videos"
                    v-if="item.gym"
                  >
                    Rooms
                  </router-link>
                  <button
                    class="button videos"
                    v-if="item.gym"
                    @click="startGym(item)"
                  >
                    Gym
                  </button>
                  <button
                    class="button videos"
                    v-if="item.pool"
                    @click="startPool(item)"
                  >
                    Pool
                  </button>
                  <button
                    class="button videos"
                    v-if="item.hall"
                    @click="startHall(item)"
                  >
                    Hall
                  </button>
                  <button
                    class="button videos"
                    v-if="item.restaurant"
                    @click="startRestaurant(item)"
                  >
                    Restaurant
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <Model v-if="addModal == true">
          <div class="model-header">
            <h4>Add Accomodations</h4>
            <button class="close" @click="addModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="name">Name:</label>
                <input
                  type="text"
                  name="name"
                  id=""
                  placeholder="name"
                  v-model="newItem.name"
                />
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input
                  type="text"
                  name="address"
                  id=""
                  placeholder="address"
                  v-model="newItem.address"
                />
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="text"
                  name="email"
                  id=""
                  placeholder="email"
                  v-model="newItem.email"
                />
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input
                  type="text"
                  name="phone"
                  id=""
                  placeholder="phone"
                  v-model="newItem.phone"
                />
              </div>
              <div class="form-group">
                <label for="Type">Type:</label>
                <select name="Type" id="" v-model="newItem.type">
                  <option>Hotels</option>
                  <option value="Guest_House">Guest House</option>
                  <option>Apartments</option>
                  <option>Motels</option>
                  <option>Resorts</option>
                  <option>Campsites</option>
                </select>
              </div>
              <div class="form-group">
                <label for="" class="mt-2">Details</label>
                <table class="table">
                  <tbody>
                    <tr v-for="(item, index) in details" :key="index">
                      <td>
                        <a-input v-model="item.label"></a-input>
                      </td>
                      <td>
                        <a-input v-model="item.value"></a-input>
                      </td>
                      <td>
                        <a-button
                          icon="close"
                          shape="circle"
                          @click="removeDetails(index)"
                        ></a-button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a-input v-model="label" placeholder="Item"></a-input>
                      </td>
                      <td>
                        <a-input v-model="value" placeholder="Value"></a-input>
                      </td>
                      <td>
                        <a-button icon="plus" @click="addDetails"></a-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group">
                <div class="d-flex checkbox">
                  <input type="checkbox" name="" id="" v-model="newItem.gym" />
                  <label for="gym">Gym</label>
                </div>
                <div class="d-flex checkbox">
                  <input type="checkbox" name="" id="" v-model="newItem.hall" />
                  <label for="gym">Conference hall</label>
                </div>
                <div class="d-flex checkbox">
                  <input type="checkbox" name="" id="" v-model="newItem.pool" />
                  <label for="gym">Swimming Pool</label>
                </div>
                <div class="d-flex checkbox">
                  <input
                    type="checkbox"
                    name=""
                    id=""
                    v-model="newItem.restaurant"
                  />
                  <label for="gym">Restaurant</label>
                </div>
              </div>
              <div class="form-group">
                <label for="instagram"
                  >Instagram:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="instagram"
                  id=""
                  placeholder="Skip if you don't have instagram"
                  v-model="newItem.instagram"
                />
              </div>
              <div class="form-group">
                <label for="facebook"
                  >Facebook:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="facebook"
                  id=""
                  placeholder="Skip if you don't have facebook"
                  v-model="newItem.facebook"
                />
              </div>
              <div class="form-group">
                <label for="twitter"
                  >Twitter:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="twitter"
                  id=""
                  placeholder="Skip if you don't have twitter"
                  v-model="newItem.twitter"
                />
              </div>
              <div class="form-group">
                <label for="email address">Image</label>
                <vupload
                  classlist="upload"
                  :open="false"
                  :enableinput="true"
                  :required="true"
                  :multiple="false"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="image"
                  value=""
                  @onFileSelected="
                    (data) => {
                      newItem.image = data;
                    }
                  "
                  >Select Image</vupload
                >
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="addItems()">
              Submit
            </button>
            <button class="close" @click="addModal = false">Close</button>
          </div>
        </Model>
        <Model v-if="updateModal == true">
          <div class="model-header">
            <h4>Edit Accomodations</h4>
            <button class="close" @click="updateModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="name">Name:</label>
                <input
                  type="text"
                  name="name"
                  id=""
                  placeholder="name"
                  v-model="selectedItem.name"
                />
              </div>
              <div class="form-group">
                <label for="address">Address:</label>
                <input
                  type="text"
                  name="address"
                  id=""
                  placeholder="address"
                  v-model="selectedItem.address"
                />
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="text"
                  name="email"
                  id=""
                  placeholder="email"
                  v-model="selectedItem.email"
                />
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input
                  type="text"
                  name="phone"
                  id=""
                  placeholder="phone"
                  v-model="selectedItem.phone"
                />
              </div>
              <div class="form-group">
                <label for="Type">Type:</label>
                <select name="Type" id="" v-model="selectedItem.type">
                  <option>Hotels</option>
                  <option value="Guest_House">Guest House</option>
                  <option>Apartments</option>
                  <option>Motels</option>
                  <option>Resorts</option>
                  <option>Campsites</option>
                </select>
              </div>
              <div class="form-group">
                <label for="" class="mt-2">Details</label>
                <table class="table">
                  <tbody>
                    <tr v-for="(item, index) in details" :key="index">
                      <td>
                        <a-input v-model="item.label"></a-input>
                      </td>
                      <td>
                        <a-input v-model="item.value"></a-input>
                      </td>
                      <td>
                        <a-button
                          icon="close"
                          shape="circle"
                          @click="removeDetails(index)"
                        ></a-button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a-input v-model="label" placeholder="Item"></a-input>
                      </td>
                      <td>
                        <a-input v-model="value" placeholder="Value"></a-input>
                      </td>
                      <td>
                        <a-button icon="plus" @click="addDetails"></a-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group">
                <div class="d-flex checkbox">
                  <input
                    type="checkbox"
                    name=""
                    id=""
                    v-model="selectedItem.gym"
                  />
                  <label for="gym">Gym</label>
                </div>
                <div class="d-flex checkbox">
                  <input
                    type="checkbox"
                    name=""
                    id=""
                    v-model="selectedItem.hall"
                  />
                  <label for="gym">Conference hall</label>
                </div>
                <div class="d-flex checkbox">
                  <input
                    type="checkbox"
                    name=""
                    id=""
                    v-model="selectedItem.pool"
                  />
                  <label for="gym">Swimming Pool</label>
                </div>
                <div class="d-flex checkbox">
                  <input
                    type="checkbox"
                    name=""
                    id=""
                    v-model="selectedItem.restaurant"
                  />
                  <label for="gym">Restaurant</label>
                </div>
              </div>
              <div class="form-group">
                <label for="instagram"
                  >Instagram:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="instagram"
                  id=""
                  placeholder="Skip if you don't have instagram"
                  v-model="selectedItem.instagram"
                />
              </div>
              <div class="form-group">
                <label for="facebook"
                  >Facebook:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="facebook"
                  id=""
                  placeholder="Skip if you don't have facebook"
                  v-model="selectedItem.facebook"
                />
              </div>
              <div class="form-group">
                <label for="twitter"
                  >Twitter:<span class="optional"> (Optional)</span></label
                >
                <input
                  type="text"
                  name="twitter"
                  id=""
                  placeholder="Skip if you don't have twitter"
                  v-model="selectedItem.twitter"
                />
              </div>
              <div class="form-group">
                <label for="email address">Image</label>
                <vupload
                  classlist="upload"
                  :open="false"
                  :enableinput="true"
                  :required="true"
                  :multiple="false"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="image"
                  :value="selectedItem.image"
                  @onFileSelected="
                    (data) => {
                      selectedItem.image = data;
                    }
                  "
                  >Select Image</vupload
                >
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="updateItems()">
              Update
            </button>
            <button class="close" @click="updateModal = false">Close</button>
          </div>
        </Model>
        <Model v-if="deleteModal == true">
          <div class="model-header">
            <h4>Delete Accomodations</h4>
            <button class="close" @click="deleteModal = false">X</button>
          </div>
          <div class="model-body">
            <h4 class="delete-label">
              Are you sure you want to delete
              <strong>{{ selectedItem.name }}</strong
              >?
            </h4>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="deleteItems()">
              Yes
            </button>
            <button class="close" @click="deleteModal = false">Cancel</button>
          </div>
        </Model>

        <Model v-if="gymModal == true">
          <div class="model-header">
            <h4>Edit Gym</h4>
            <button class="close" @click="gymModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="email address">Images:</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="true"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedGym.images"
                  @onFileSelected="
                    (data) => {
                      selectedGym.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="updateGym()">
              Update
            </button>
            <button class="close" @click="gymModal = false">Close</button>
          </div>
        </Model>
        <Model v-if="poolModal == true">
          <div class="model-header">
            <h4>Edit Pool</h4>
            <button class="close" @click="poolModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="email address">Images:</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="true"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedGym.images"
                  @onFileSelected="
                    (data) => {
                      selectedGym.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="updatePool()">
              Update
            </button>
            <button class="close" @click="poolModal = false">Close</button>
          </div>
        </Model>
        <Model v-if="hallModal == true">
          <div class="model-header">
            <h4>Edit Hall</h4>
            <button class="close" @click="hallModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="email address">Images:</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="true"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedGym.images"
                  @onFileSelected="
                    (data) => {
                      selectedGym.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="updateHall()">
              Update
            </button>
            <button class="close" @click="hallModal = false">Close</button>
          </div>
        </Model>
        <Model v-if="restaurantModal == true">
          <div class="model-header">
            <h4>Edit Restaurant</h4>
            <router-link
              :to="'/admin/hotel/products/' + selectedGym.id"
              style="background: #015b0a; padding: .5rem 1rem;color: white;"
              >Products</router-link
            >
            <button class="close" @click="restaurantModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="email address">Images:</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="true"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedGym.images"
                  @onFileSelected="
                    (data) => {
                      selectedGym.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
              </div>
            </form>
          </div>
          <div class="model-footer">
            <button class="submit" @click.prevent="updateRestaurant()">
              Update
            </button>
            <button class="close" @click="restaurantModal = false">
              Close
            </button>
          </div>
        </Model>
      </div>
    </div>
  </div>
</template>

<script>
import Model from "./components/Model.vue";
export default {
  name: "Accomodations",
  components: {
    Model,
  },
  data() {
    return {
      isLoading: false,
      fullPage: true,
      color: "#015b0a",
      addModal: false,
      updateModal: false,
      deleteModal: false,
      gymModal: false,
      poolModal: false,
      hallModal: false,
      restaurantModal: false,
      newItem: {
        gym: false,
        hall: false,
        pool: false,
        restaurant: false,
      },
      selectedItem: {},
      selectedGym: {},
      items: [],
      details: [],
      label: "",
      value: "",
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_ACCOMODATION").then((response) => {
        this.items = response.data;
        this.isLoading = false;
      });
    },
    addDetails() {
      let vm = this;
      this.details.push({ label: this.label, value: this.value });
      this.label = "";
      this.value = "";
    },
    removeDetails(index) {
      let vm = this;
      this.details.splice(index, 1);
    },
    addItems() {
      this.isLoading = true;
      this.newItem.details = JSON.stringify(this.details);
      this.$store
        .dispatch("ADD_ACCOMODATION", this.newItem)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.addModal = false;
            this.newItem.name = "";
            this.newItem.address = "";
            this.newItem.email = "";
            this.newItem.phone = "";
            this.newItem.image = "";
            this.newItem.instagram = "";
            this.newItem.facebook = "";
            this.newItem.twitter = "";
            this.details = [];
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
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
    },
    startUpdate(item) {
      this.selectedItem = item;
      this.details = JSON.parse(item.details);
      this.updateModal = true;
    },
    updateItems() {
      this.isLoading = true;
      this.selectedItem.details = JSON.stringify(this.details);
      this.$store
        .dispatch("UPDATE_ACCOMODATION", this.selectedItem)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.updateModal = false;
            this.selectedItem = {};
            this.details = [];
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
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
    },
    startDelete(item) {
      this.selectedItem = item;
      this.deleteModal = true;
    },
    deleteItems() {
      this.isLoading = true;
      this.$store
        .dispatch("DELETE_ACCOMODATION", this.selectedItem.id)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.deleteModal = false;
            this.isLoading = false;
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
            });
          }
        })
        .catch((error) => {
          console.error({
            error,
          });
          this.isLoading = false;
        });
    },
    startGym(item) {
      this.selectedGym.hotel_id = item.id;
      if (item.gymData.images) {
        this.selectedGym.images = item.gymData.images;
      } else {
        this.selectedGym.images = null;
      }
      this.selectedGym.id = item.gymData.id;
      this.gymModal = true;
    },
    updateGym() {
      this.isLoading = true;
      this.$store
        .dispatch("UPDATE_GYM", this.selectedGym)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.gymModal = false;
            this.selectedGym = {};
            this.isLoading = false;
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
            });
          }
        })
        .catch((error) => {
          console.error({
            error,
          });
          this.isLoading = false;
        });
    },
    startPool(item) {
      this.selectedGym.hotel_id = item.id;
      if (item.poolData.images) {
        this.selectedGym.images = item.poolData.images;
      } else {
        this.selectedGym.images = null;
      }
      this.selectedGym.id = item.poolData.id;
      this.poolModal = true;
    },
    updatePool() {
      this.isLoading = true;
      this.$store
        .dispatch("UPDATE_POOL", this.selectedGym)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.poolModal = false;
            this.selectedGym = {};
            this.isLoading = false;
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
            });
          }
        })
        .catch((error) => {
          console.error({
            error,
          });
          this.isLoading = false;
        });
    },
    startHall(item) {
      this.selectedGym.hotel_id = item.id;
      if (item.hallData.images) {
        this.selectedGym.images = item.hallData.images;
      } else {
        this.selectedGym.images = null;
      }
      this.selectedGym.id = item.hallData.id;
      this.hallModal = true;
    },
    updateHall() {
      this.isLoading = true;
      this.$store
        .dispatch("UPDATE_HALL", this.selectedGym)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.hallModal = false;
            this.selectedGym = {};
            this.isLoading = false;
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
            });
          }
        })
        .catch((error) => {
          console.error({
            error,
          });
          this.isLoading = false;
        });
    },
    startRestaurant(item) {
      this.selectedGym.hotel_id = item.id;
      if (item.restaurantData.images) {
        this.selectedGym.images = item.restaurantData.images;
      } else {
        this.selectedGym.images = null;
      }
      this.selectedGym.id = item.restaurantData.id;
      this.restaurantModal = true;
    },
    updateRestaurant() {
      this.isLoading = true;
      this.$store
        .dispatch("UPDATE_RESTAURANT", this.selectedGym)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.restaurantModal = false;
            this.selectedGym = {};
            this.isLoading = false;
            this.getItems();
          } else {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "error",
            });
          }
        })
        .catch((error) => {
          console.error({
            error,
          });
          this.isLoading = false;
        });
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>

<style lang="scss" scoped></style>
