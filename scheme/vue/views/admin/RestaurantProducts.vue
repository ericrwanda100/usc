<template>
  <div class="RestaurantProducts">
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
        <h2 class="page-brand">Products</h2>
        <div class="table">
          <div class="table-title">
            <label :for="restaurant.name+' Products'" v-if="restaurant">{{restaurant.name}} Products</label>
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
                    :src="'/assets/uploaded/' + item.image"
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
            <h4>Add Product</h4>
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
                  :value="newItem.image"
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
            <h4>Edit Product</h4>
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
            <h4>Delete Product</h4>
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
  name: "RestaurantProducts",
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
        images: '',
      },
      selectedItem: {},
      items: [],
      restaurant: null,
    };
  },
  methods: {
    onCancel() {
      console.log();
    },
    getItems() {
      this.isLoading = true;
      this.newItem.restaurant_id = this.$route.params.id;
      this.$store.dispatch("GET_RESTAURANT_PRODUCTS", this.$route.params.id).then((response) => {
        this.items = response.data['products'];
        this.restaurant = response.data['restaurant'];
        this.isLoading = false;
      });
    },
    addItems() {
      this.isLoading = true;
      this.$store
        .dispatch("ADD_RESTAURANT_PRODUCTS", this.newItem)
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
        .dispatch("UPDATE_RESTAURANT_PRODUCTS", this.selectedItem)
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
        .dispatch("DELETE_RESTAURANT_PRODUCTS", this.selectedItem.id)
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
