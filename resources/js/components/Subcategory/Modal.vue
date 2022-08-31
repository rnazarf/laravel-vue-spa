<template>
  <div
    class="modal"
    id="formModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modal-default"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">
            Form Subcategory {{ dataSubcategory.name }}
          </h2>
          <button
            type="button"
            class="btn-close"
            @click="closeModal"
            aria-label="Close"
          ></button>
        </div>
        <form
          @submit.prevent="isEdit ? updateAction() : createAction()"
          autocomplete="off"
        >
          <div class="modal-body">
            <!-- Form -->
            <div class="form-group mb-1">
              <label for="name">Name</label>
              <input
                v-model="dataSubcategory.name"
                type="text"
                class="form-control"
                placeholder="Category Name"
                id="name"
                name="name"
                autofocus
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="category_id">Category</label>
              <select
                v-model="dataSubcategory.category_id"
                name="category_id"
                id="category_id"
                class="form-select"
                :class="{ 'is-invalid': form.errors.has('category_id') }"
              >
                <option value="">Pilih Category</option>
                <option
                  v-for="category in categoryData.data"
                  :key="category.id"
                  :value="category.id"
                  :selected="category.id == dataSubcategory.category_id"
                >
                  {{ category.name }}
                </option>
              </select>
              <has-error :form="form" field="category_id"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="status">Status</label>
              <select
                v-model="dataSubcategory.status"
                name="status"
                id="status"
                class="form-select"
                :class="{ 'is-invalid': form.errors.has('status') }"
              >
                <option value="">Pilih</option>
                <option value="N">Tidak Aktif</option>
                <option value="Y">Aktif</option>
              </select>
              <has-error :form="form" field="status"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="description">Image</label>
              <input
                class="form-control"
                type="file"
                name="image"
                @change="handleFile"
                :class="{ 'is-invalid': form.errors.has('image') }"
              />
              <has-error :form="form" field="image"></has-error>
            </div>
            <!-- End of Form -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary">
              {{ isEdit ? "Update" : "Create" }}
            </button>
            <button
              type="button"
              class="btn btn-link text-gray-600 ms-auto"
              @click="closeModal"
            >
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
const objectToFormData = require("object-to-formdata");

export default {
  name: "modal",
  props: {
    isEdit: {
      type: Boolean,
      default: false,
    },
    dataSubcategory: {
      id: {
        type: Number,
        default: 0,
      },
      name: {
        type: String,
        default: "",
      },
      category_id: {
        type: Number,
        default: "",
      },
      status: {
        type: String,
        default: "",
      },
      image: {
        type: String,
        default: "",
      },
    },
  },
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        category_id: "",
        status: "",
        image: null,
      }),
      categoryData: {},
    };
  },
  mounted() {
    this.loadCategory();
  },
  methods: {
    handleFile(event) {
      const file = event.target.files[0];
      this.dataSubcategory.image = file;
    },
    createAction() {
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataSubcategory);

      this.form
        .submit("post", "api/v1/subcategory", {
          // Transform form data to FormData
          transformRequest: [
            function (data, headers) {
              return objectToFormData(data);
            },
          ],

          onUploadProgress: (e) => {
            // Do whatever you want with the progress event
            // console.log(e)
          },
        })
        .then((response) => {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data");
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      this.$Progress.finish();
    },
    updateAction() {
      this.$Progress.start();
      this.clearForm();
      this.form.fill(this.dataSubcategory);
      console.log(this.form);

      this.form
        .submit("post", "api/v1/subcategory/" + this.form.id, {
          // Transform form data to FormData
          transformRequest: [
            function (data, headers) {
              data["_method"] = "PUT";
              return objectToFormData(data);
            },
          ],

          onUploadProgress: (e) => {
            // Do whatever you want with the progress event
            // console.log(e)
          },
        })
        .then((response) => {
          // success

          Toast.fire({
            icon: "success",
            title: response.data.message,
          });

          this.$emit("refresh-data");
          this.$emit("close-modal");
        })
        .catch(() => {
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
    },
    loadCategory() {
      this.$Progress.start();
      axios.get("api/v1/category").then(({ data }) => {
        this.categoryData = data.data;
      });
      this.$Progress.finish();
    },
    clearForm() {
      this.form.reset();
      this.form.errors.clear();
    },
    closeModal() {
      this.$emit("close-modal");
    },
  },
};
</script>

<style scoped>
.modal {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: block;
  /* overflow: hidden; */
  outline: 0;
  background-color: rgba(0, 0, 0, 0.6);
  transition: opacity 0.15s linear;
}
</style>