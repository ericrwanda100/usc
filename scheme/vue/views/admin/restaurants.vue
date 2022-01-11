<template>
  <div class="Restaurant">
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
        <h2 class="page-brand">Restaurant</h2>
        <div class="table">
          <div class="table-title">
            <label for="Restaurant Shops">Restaurant</label>
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
                <td>
                  <button class="edit" @click="startUpdate(item)">
                    Edit
                  </button>
                  <button class="delete" @click="startDelete(item)">
                    Delete
                  </button>
                  <router-link
                    :to="'/admin/restaurant/products/' + item.id"
                    class="button videos"
                  >
                    Products
                  </router-link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <Model v-if="addModal == true">
          <div class="model-header">
            <h4>Add Restaurant</h4>
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
            <h4>Edit Restaurant</h4>
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
            <h4>Delete Restaurant</h4>
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
  name: "Restaurant",
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
      this.$store.dispatch("GET_RESTAURANTS").then((response) => {
        this.items = response.data;
        this.isLoading = false;
      });
    },
    addItems() {
      this.isLoading = true;
      this.$store
        .dispatch("ADD_RESTAURANTS", this.newItem)
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
        .dispatch("UPDATE_RESTAURANTS", this.selectedItem)
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
        .dispatch("DELETE_RESTAURANTS", this.selectedItem.id)
        .then((response) => {
          if (response.data.status == "ok") {
            this.$notify({
              group: "status",
              title: "Important message",
              text: response.data.message,
              type: "success",
            });
            this.deleteModal = false;
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
