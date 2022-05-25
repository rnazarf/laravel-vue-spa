<template>
  <div
    class="modal"
    id="formModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modal-default"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="h6 modal-title">Form Banner</h2>
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
          enctype="multipart/form-data"
        >
          <div class="modal-body">
            <div class="form-group mb-1">
              <label for="title">Title</label>
              <input
                v-model="form.title"
                type="text"
                class="form-control"
                placeholder="Banner Title"
                id="title"
                name="title"
                autofocus
                :class="{ 'is-invalid': form.errors.has('title') }"
              />
              <has-error :form="form" field="title"></has-error>
            </div>
            <div class="form-group mb-1">
              <label for="description">Description</label>
              <textarea
                v-model="form.description"
                class="form-control"
                placeholder="Lorem ipsum dolor sit amet"
                id="description"
                name="description"
                :class="{ 'is-invalid': form.errors.has('description') }"
              >
              </textarea>
              <has-error :form="form" field="description"></has-error>
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
            <div class="form-group mb-1">
              <label for="status">Status</label>
              <select
                v-model="form.status"
                name="status"
                id="status"
                class="form-select"
                :class="{ 'is-invalid': form.errors.has('status') }"
              >
                <option value="N">Tidak Aktif</option>
                <option value="Y">Aktif</option>
              </select>
              <has-error :form="form" field="status"></has-error>
            </div>
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
    dataBanner: {
      id: {
        type: Number,
        default: 0,
      },
      title: {
        type: String,
        default: "",
      },
      description: {
        type: String,
        default: "",
      },
      image: {
        type: String,
        default: "",
      },
      status: {
        type: String,
        default: "",
      },
    },
  },
  data() {
    return {
      form: new Form({
        id: this.dataBanner.id ?? "",
        title: this.dataBanner.title ?? "",
        image: this.dataBanner.image ?? null,
        description: this.dataBanner.description ?? "",
        status: this.dataBanner.status ?? "",
      }),
    };
  },
  methods: {
    closeModal() {
      this.$emit("close-modal");
    },
    handleFile(event) {
      const file = event.target.files[0];
      this.form.image = file;
    },
    createAction() {
      this.$Progress.start();
      this.form
        .submit("post", "api/v1/banner", {
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

          this.$emit("refresh-data", 1, true);
          this.$emit("close-modal");
        })
        .catch((error) => {
          console.log(error);
          Toast.fire({
            icon: "error",
            title: "Some error occured! Please try again",
          });
        });
      this.$Progress.finish();
    },
    updateAction() {
      this.form
        .submit("post", "api/v1/banner/" + this.form.id, {
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