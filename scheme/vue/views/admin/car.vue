<template>
  <div class="Cars">
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
        <h2 class="page-brand">Cars For Rent</h2>
        <div class="table">
          <div class="table-title">
            <label for="Cars For Rent">Cars</label>
            <button class="add-new" @click="addModal = true">
              <i class="fa fa-plus"></i> Add
            </button>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Model</th>
                <th>address</th>
                <th>Price</th>
                <th>phone</th>
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
                <td>{{ item.model }}</td>
                <td>{{ item.address }}</td>
                <td>{{ item.price }}</td>
                <td>{{ item.phone }}</td>
                <td>
                  <button class="edit" @click="startUpdate(item)">
                    Edit
                  </button>
                  <button class="delete" @click="startDelete(item)">
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <Model v-if="addModal == true">
          <div class="model-header">
            <h4>Add Car</h4>
            <button class="close" @click="addModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="Model">Model:</label>
                <input
                  type="text"
                  Model="Model"
                  id=""
                  placeholder="Model"
                  v-model="newItem.model"
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
                <label for="Price">Price:</label>
                <input
                  type="number"
                  name="Price"
                  id=""
                  placeholder="Price"
                  v-model="newItem.price"
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
                <label for="email address">Image</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="false"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedItem.image"
                  @onFileSelected="
                    (data) => {
                      selectedItem.image = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select image</span>
                </upload-helper>
              </div>
              <div class="form-group">
                <label for="email address">Other Images</label>
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
                  value=""
                  @onFileSelected="
                    (data) => {
                      newItem.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
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
            <h4>Edit Car</h4>
            <button class="close" @click="updateModal = false">X</button>
          </div>
          <div class="model-body">
            <form>
              <div class="form-group">
                <label for="Model">Model:</label>
                <input
                  type="text"
                  Model="Model"
                  id=""
                  placeholder="Model"
                  v-model="selectedItem.model"
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
                <label for="Price">Price:</label>
                <input
                  type="number"
                  name="Price"
                  id=""
                  placeholder="Price"
                  v-model="selectedItem.price"
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
                <label for="email address">Image</label>
                <br />
                <upload-helper
                  :open="false"
                  :enableinput="false"
                  :required="false"
                  :multiple="false"
                  location="assets/uploaded/"
                  :url="$store.state.UPLOAD_BASE_URL"
                  :uploadurl="$store.state.UPLOAD_BASE_URL + 'upload'"
                  name="other-images"
                  :value="selectedItem.image"
                  @onFileSelected="
                    (data) => {
                      selectedItem.image = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
              </div>
              <div class="form-group">
                <label for="email address">Other Images</label>
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
                  :value="selectedItem.images"
                  @onFileSelected="
                    (data) => {
                      selectedItem.images = data;
                    }
                  "
                >
                  <span class="uploader-btn">Select images</span>
                </upload-helper>
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
            <h4>Delete Car</h4>
            <button class="close" @click="deleteModal = false">X</button>
          </div>
          <div class="model-body">
            <h4 class="delete-label">
              Are you sure you want to delete
              <strong>{{ selectedItem.model }}</strong
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
      </div>
    </div>
  </div>
</template>

<script>
import Model from "./components/Model.vue";
export default {
  name: "Cars",
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
      newItem: {},
      selectedItem: {},
      items: [],
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.$store.dispatch("GET_CARS").then((response) => {
        this.items = response.data;
        this.isLoading = false;
      });
    },
    addItems() {
      this.isLoading = true;
      this.$store
        .dispatch("ADD_CARS", this.newItem)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.addModal = false;
            this.newItem.model = "";
            this.newItem.address = "";
            this.newItem.price = "";
            this.newItem.phone = "";
            this.newItem.image = "";
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
        });
      this.isLoading = false;
    },
    startUpdate(item) {
      this.selectedItem = item;
      this.updateModal = true;
    },
    updateItems() {
      this.isLoading = true;
      this.$store
        .dispatch("UPDATE_CARS", this.selectedItem)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.updateModal = false;
            this.selectedItem = "";
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
        });
      this.isLoading = false;
    },
    startDelete(item) {
      this.selectedItem = item;
      this.deleteModal = true;
    },
    deleteItems() {
      this.isLoading = true;
      this.$store
        .dispatch("DELETE_CARS", this.selectedItem.id)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.deleteModal = false;
            this.selectedItem = "";
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
        });
      this.isLoading = false;
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>

<style lang="scss" scoped></style>
