<template>
  <div class="Rooms">
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
        <h2 class="page-brand">Rooms</h2>
        <div class="table">
          <div class="table-title">
            <label for="Rooms">Rooms</label>
            <button class="add-new" @click="addModal = true">
              <i class="fa fa-plus"></i> Add
            </button>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>name</th>
                <th>price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id">
                <td>
                  <img
                    :src="'/assets/uploaded/' + item.images"
                    :alt="item.name"
                    class="thumbnail"
                  />
                </td>
                <td>{{ item.name }}</td>
                <td>{{ item.price }}</td>
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
            <h4>Add Room</h4>
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
                <label for="Price">Price:</label>
                <input
                  type="text"
                  name="price"
                  id=""
                  placeholder="price"
                  v-model="newItem.price"
                />
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea
                  type="number"
                  name="description"
                  id=""
                  placeholder="description"
                  v-model="newItem.description"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="features">Features:</label>
                <textarea
                  type="number"
                  name="features"
                  id=""
                  placeholder="features"
                  v-model="newItem.features"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="media">Media:</label>
                <textarea
                  type="number"
                  name="media"
                  id=""
                  placeholder="media"
                  v-model="newItem.media"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="amenities">Amenities:</label>
                <textarea
                  type="number"
                  name="amenities"
                  id=""
                  placeholder="amenities"
                  v-model="newItem.amenities"
                ></textarea>
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
                  :value="newItem.images"
                  @onFileSelected="
                    (data) => {
                      newItem.images = data;
                    }
                  "
                  >Select Image</vupload
                >
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
                      newItem.other_images = data;
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
            <h4>Edit Room</h4>
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
                <label for="Price">Price:</label>
                <input
                  type="text"
                  name="price"
                  id=""
                  placeholder="price"
                  v-model="selectedItem.price"
                />
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea
                  type="number"
                  name="description"
                  id=""
                  placeholder="description"
                  v-model="selectedItem.description"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="features">Features:</label>
                <textarea
                  type="number"
                  name="features"
                  id=""
                  placeholder="features"
                  v-model="selectedItem.features"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="media">Media:</label>
                <textarea
                  type="number"
                  name="media"
                  id=""
                  placeholder="media"
                  v-model="selectedItem.media"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="amenities">Amenities:</label>
                <textarea
                  type="number"
                  name="amenities"
                  id=""
                  placeholder="amenities"
                  v-model="selectedItem.amenities"
                ></textarea>
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
                  :value="selectedItem.images"
                  @onFileSelected="
                    (data) => {
                      selectedItem.images = data;
                    }
                  "
                  >Select Image</vupload
                >
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
                  :value="selectedItem.other_images"
                  @onFileSelected="
                    (data) => {
                      selectedItem.other_images = data;
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
            <h4>Delete Room</h4>
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
      </div>
    </div>
  </div>
</template>

<script>
import Model from "./components/Model.vue";
export default {
  name: "Rooms",
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
      newItem: {
        images: "",
      },
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
      this.newItem.hotel_id = this.$route.params.id;
      this.$store
        .dispatch("GET_ROOMS", this.$route.params.id)
        .then((response) => {
          this.items = response.data;
          this.isLoading = false;
        });
    },
    addItems() {
      this.isLoading = true;
      this.$store
        .dispatch("ADD_ROOMS", this.newItem)
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
            this.newItem.price = "";
            this.newItem.feature = "";
            this.newItem.media = "";
            this.newItem.amenities = "";
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
        .dispatch("UPDATE_ROOMS", this.selectedItem)
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
        .dispatch("DELETE_ROOMS", this.selectedItem.id)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.deleteModal = false;
            this.selectedItem = {};
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
